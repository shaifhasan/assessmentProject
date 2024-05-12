

<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-8">
            
            <span class="float-right date"><b>Date :{{Date('d/m/Y')}}</b></span></br>
            <span class="float-right date"><b>Name :{{request()->session()->get('user')->name}} Account:({{request()->session()->get('user')->account_type}}) Email: {{request()->session()->get('user')->email}}
            </b></span>
           
          </div><!-- /.col -->
         <!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
 <div class="container">
    <!-- Main content -->
   <section class="">
      <div class="row">
        <div class="col-12">
         

          
        <div class="card">
       
            <div class="row">
              <div class="col-12 ">
              
                  <a   href="{{route('user')}}" class="btn btn-primary btn-lg " >All Transaction And Balance</a>
                  <a   href="{{route('deposit')}}" class="btn btn-primary btn-lg " >Deposits</a>
                  <a   href="{{route('withdrawal')}}" class="btn btn-primary btn-lg " >Withdraws</a>
                  <a href="{{route('logout')}}" class="btn btn-primary btn-lg " >Logout </a>

                
              </div>
        </div>
        