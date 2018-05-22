<!DOCTYPE html>
<html>
<head>
  <title></title>
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

</style>
<body>


<?php 
    use App\http\Controllers\labController;
    use App\Http\Controllers\companyController; 
    $company = companyController::company();
 ?>
<div class="content-wrapper">
  <div class="row">
     <div class="col-sm-4">
    <div class="image img-circle" style="position: relative;width: 30%">
      <img src="{{asset(companyController::company()->logo)}}"  alt="User Image" class="img-circle" style="width: 100%">
    </div>
    <p class="large"><strong>{{$company->name}}</strong></p>
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
   <div class="row">
 
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
    <section class="content">
      <div class="box  " style="padding: 0px 0px 0px 0px; background:inherit;">
    
        <div class="box-body">
        <div class="table-responsive" style="">
          <div class="errorController">
             <table id="resultentrytable"  class="table  table-hover w3-padding">
         
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
</body>
</html>





