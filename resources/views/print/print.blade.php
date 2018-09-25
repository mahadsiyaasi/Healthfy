<?php 
    use  Healthfy\http\Controllers\labController;
    use  Healthfy\Http\Controllers\companyController; 
    $company = companyController::company();
 ?>
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<title>@if(Auth::check()) @yield('title', Route::currentRouteName())  @endif</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="icon" href="{{ url('webicon/cropped.png') }}" type="image/gif" sizes="16x16">
<link href="{{ asset('css/w3.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<style type="text/css">
  @page  
{ 
     size: 21cm 29.7cm;    /* auto is the initial value */ 

    /* this affects the margin in the printer settings */ 
    margin: 10mm 1mm 1mm 1mm;  
} 

body  
{ 
    /* this affects the margin on the content before sending to printer */ 
    margin: 10px;  
} 
.equal, .equal > div[class*='col-'] {  
      display: -webkit-box;
      display: -moz-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      flex:1 0 auto;
  }
  @media  (min-width: 768px) {
    div.col-sm-7.five-three {
    width: 60% !important;
    }

    div.col-sm-5.five-two {
    width: 40% !important;
    }
}
.header,
.footer {
    width: 100%;
    text-align: center;
    position: fixed;
}
.pagenum:before {
    content: counter(page);
}   </style>
<body>



<div class="content-wrapper">
  <div class="pull-right">
    Page <span class="pagenum"></span> of <span class="pagenum"></span>
    <br>
</div>
  <div class="">
  <div class="row w3-padding">
     <div class="col-sm-4">
    <div class="image img-circle" style="position: relative;width: 30%">
      <img src="{{asset(companyController::company()->logo)}}"  alt="User Image" class="img-circle" style="width: 100%">
    </div>
    <br>
    <p class="large padding-16"><strong>{{$company->name}}</strong></p>
  </div>
  <div class="col-sm-4">
  </div> 
    <div class="col-sm-4">
        <div class="text-left">
            <h5 class="condensed">{{$company->country}}
            <br>{{$company->state}}
            <br>{{$company->city}}
            <br>{{$company->distruct}}
            <br>{{$company->address}}
          </h5>
            </div> 
           
  </div>
  
  </div>
   <div class="row w3-padding">
 
      <div class="col-sm-4">        
       <p class="condensed">
        <strong>Patient</strong>
          <br>{{$Result[0]->patient_name}}
          <br>{{$Result[0]->patient_tell}}
          <br>{{$Result[0]->country}},  {{$Result[0]->state}}   {{$Result[0]->district}}
              <br>{{$Result[0]->datebirth}}, {{$Result[0]->gender}}
              


       </p>
         </div>
         <div class="col-sm-4">
         <p class="condensed">
        <strong>Doctor</strong>
          <br>{{$Result[0]->doctor_name}}
          <br>{{$Result[0]->tell}}
          <br>{{$Result[0]->nationality}},  {{$Result[0]->address}}
          <br>{{$Result[0]->datebirth}}
              


       </p>
         </div>
         <div class="col-sm-4">
         <p class="condensed">
        <strong>Order Master</strong>
        <br>{{$Result[0]->master_status}}
          <br>{{$Result[0]->total_amount}} $
          <br>{{$Result[0]->date}}          
          <br> -- --
              


       </p>
         </div>
     
    </div>
  </div>
    <section class="content">
      <div class="box  " style="padding: 0px 0px 0px 0px; background:inherit;">
      <div class="w3-padding" style="height: 20px">
        
      </div>
        <div class="box-body">
        <div class="table-responsive" style="">
          <div class="errorController">
             <table id="resultentrytable"  class="table w3-padding">
         
            <tbody class="" style="position: relative;width: 100%">
                 <?php $last =0; 
                  $detail_id = 0;
                  $patient_check = 0;
                 ?>
                @foreach($Result as $vals)
                  @if($last != $vals['master_id'])
                     <tr class="allback">
                      
                        <td class=" " colspan="3"> Patient : <span class="badge w3-red">{{ $vals['patient_name'] }}</span> <a class="btn"></a> </td>
                       
                        <td class="  text-right">Done due to date  <span class="badge w3-black  ">{{ $vals['date'] }} </span></td>
                    </tr>
                 
                <?php $last = $vals['master_id']; 
                  $patient_check = $vals['patient_id']
                ?>
                 @endif
                <?php $detail_id = $vals['id']; ?>
                @foreach($Result as $val)
                @if($val['test_order_id'] == $vals['master_id'] && $detail_id == $val['id'] )
                <?php $unitAndRange = labController::getRangeAndUnit($val['test_id']) ?>
                  <tr>     
                  <td> {{ $val['testname'] }}</td>
                  <td>{{ $val['result'] }}</td>
                  <td>{{ $val['ranges'] }}</td>  
                  <td class="text-center">{{ $val['units'] }}</td>                
                </tr>
                @endif                
                 @endforeach
                 @endforeach
              </tbody>
             <tfoot class="main-footer">
              <tr class="allback">
                <td colspan="3">
                      <p class=" ">{{$Result[0]->note}}</p>
              
            
           </td>
           <td class="= text-right    w3-padding">
             <span class=" "><p>Priscriped By  <strong> {{$Result[0]->doctor_name}}</strong></p></span>
           </td>
   </tr>
  </tfoot>
  </table>
           
  </div>
</div>
  </div>
 </div>
</section>

</div>
<div class="" style="position: absolute;bottom: 0px">
    <p>This charge that counted as revenue of this service will not be possible to return
    <hr>
      <div class="row" class="w3-border w3-border-black">
      <div style="width: 100%">
        <div class="col-sm-8">
        <p> Bill to             :   {{$company->name}}
            <br> Bill ID        :   0000{{$Result[0]->id}}
            <br>Invoice number  :   {{$Result[0]->account}}
        </p>
        </div>
        <div class="col-sm-3">
          <p class="w3-border w3-border-blue">Amount Due to USD: ${{$Result[0]->balance}}</p>
        </div>
      </div>
      </div>
      </p>
</div>
</body>
</html>





