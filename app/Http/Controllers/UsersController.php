<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserVerify;
use App\Models\User;
use App\Models\Transaction;

class UsersController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    

    public function create_user()
    {
        return view('create_user');
    }


     public function post_login(LoginRequest $request)
    {
            
       
     $user=User::Verify($request->email,$request->password)->first();

   

         if(!$user)
        {
            $request->session()->flash('message', 'Invalid email or password ');
            return redirect()->route('login');
        }
         else
         {   
            if(isset($request->remember_me) && !empty($request->remember_me)){
                setcookie('email',$request->email,time()+3600);
                setcookie('password',$request->password,time()+3600);
            }
            else{
                setcookie('email',"");
                setcookie('password',"");
            }
            
           
                $request->session()->put('user', $user);
                return redirect()->route('user');
            
           
        }

    }

    public function post_user(UserVerify $request)
    {
       


       $date = [

            "name"=>$request->name,
            "account_type"=>$request->account_type,
            "balance"=>0,
            "email"=>$request->email,
            "password"=>$request->password

       ];

       $user=new User($date);
       $user->save();

       return redirect()->route('login');
    }


    public function user(Request $request)
    {
        $user=$request->session()->get('user');

        $user_data=User::findorFail($user->id);

        $data=Transaction::usertransaction($user->id)->get();


                
        return view('user')
             ->with('balance',$user_data->balance)
             ->with('data',$data);


    }

    public function deposit(Request $request)
    {
        $user=$request->session()->get('user');

        $user_data=User::findorFail($user->id);
        $data=Transaction::userdeposit($user->id)->get();

        
                
        return view('deposit')
              ->with('balance',$user_data->balance)
              ->with('data',$data);

    }

    public function deposit_amount(Request $request)
    {
        $user=$request->session()->get('user');

        $user_data=User::findorFail($user->id);

        $balance_new= $user_data->balance+$request->deposit_amount;

        $data = [

            "balance"=>$balance_new
        ];
        
         User::findOrFail($user->id)->update($data);

        $transaction = [

            "user_id"=>$user->id,
            "transaction_type"=>"deposit",
            "amount"=>$request->deposit_amount,
            "fee"=>0,
            "date"=>date('Y-m-d')

        ];

        Transaction::insert($transaction);
                
        return back();

    }

    public function withdrawal(Request $request)
    {
        $user=$request->session()->get('user');

        $user_data=User::findorFail($user->id);

        $data=Transaction::userwithdrawal($user->id)->get();
                
        return view('withdrawal')
                ->with('balance',$user_data->balance)
                ->with('data',$data);

    }

    public function withdraw_amount(Request $request)
    {
        $user=$request->session()->get('user');

        $user_data=User::findorFail($user->id);

       
        $month=date("n");

        $month_sum=Transaction::withdrawalmonth($user->id,$month);
        
        $total_withdraw=Transaction::withdrawaltotal($user->id,$month);


        $fee=0.0;
        $fee_amount=0.0;

        if($user_data->account_type=='Business')
        {

            if($total_withdraw>=50000)
                $fee=0.015;
            else
                $fee=0.025;

          $fee_amount=($request->withdraw_amount*$fee)/100;

         
        }
        else if($user_data->account_type=='Individual')
        {
            if(date('l')=='Friday')
                 $fee=0;
            else if($month_sum<=5000)
                 $fee=0;
            else if($request->withdraw_amount<1000)
                 $fee=0;
            else
                $fee=0.015;
                
                $fee_amount=(($request->withdraw_amount-1000)*$fee)/100;

            
        }

        

        $total_withdraw=$request->withdraw_amount+$fee_amount;

        

        if($user_data->balance > 0 && $user_data->balance > $total_withdraw){

        $balance_new= $user_data->balance-$total_withdraw;
      
        $data = [

            "balance"=>$balance_new
        ];
        
         User::findOrFail($user->id)->update($data);

        $transaction = [

            "user_id"=>$user->id,
            "transaction_type"=>"withdrawal",
            "amount"=>$request->withdraw_amount,
            "fee"=>$fee_amount,
            "date"=>date('Y-m-d')

        ];

        Transaction::insert($transaction);
    }
        return back();

    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login');
    }

}
