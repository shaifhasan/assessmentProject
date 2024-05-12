
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
  
  <title>Bank</title>

</head>
<body>

@include('layouts.header')
<div class="row">
                      <div class="col-lg-12">
                      <div align="right">
                          <button id="add_data" class="btn btn-primary btn-lg">
                            
                            Withdrawal Money
                          </button>
                        </div>
                         </div>
            </div>   
        <div class="row">
              <div class="col-12 ">
              
              @if(count($data)>0)
             
             <span class="float-right date">
               <b>
                
                 
               </b></span>
                <table id="" class="table table-bordered table-striped report bol ">
                 <thead>
                 <tr>
                   
                  
                   <th>Date Time </th>
                   <th>Type </th>
                   <th>Amount </th>
                   <th>Fee</th>
                   
                   
                 </tr>
                 </thead>
                 <tbody>
                 @foreach($data as $datas)
                 <tr>
                   
                   <td>{{$datas['date']}} </td>
                   <td>{{$datas['transaction_type']}}</td>
                   <td>{{$datas['amount']}}</td>
                   <td>{{$datas['fee']}}</td>
                   
                 </tr>
                 @endforeach
                 </tbody>
                
               </table>
              
              @endif
              <span class="float-right date"><b>Current Balance :{{$balance}}</b></span>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      @include('modals.withdrawal')
    </section>
    <!-- /.content -->
    </div>


    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="{{ asset('js/withdrawal.js')}}"></script>  

</body>
</html>