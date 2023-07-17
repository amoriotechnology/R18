
<style>
    #download{
        margin-left: 830px;
    }
  th{
    background-color:<?php echo '#'.$color; ?>;
  }
    .payTop_details p{
        display: inline-block;
    }

    .payTop_details span{
        display: block;
    }

    .Employee_details {
        text-align: center;
        margin: auto;
    }

    .Employee_details p {
    margin-bottom: 0;
    }

    .proposedWork.pay_table h3 {
    font-size: 18px;
    text-align: left;
    font-weight: 600;
    margin: 5px 0 0;
    }

    .proposedWork.pay_table p {
    margin: 0;
    height: 36px;
    }


    .proposedWork.pay_table hr {
   margin: 5px;
    border-top: 1px solid #4b4b4b;
}
</style>
<div class="content-wrapper">

    <section class="content-header" style="height:70px;">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>Employee Payslip</h1>

            <small></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#">Payslip</a></li>

                <li class="active">Add Employee Payslip</li>

            </ol>

        </div>

    </section>



    <section class="content">

 <div class="row">

    <!--  table area -->

    <div class="col-sm-12">



        <div class="panel panel-default thumbnail"> 



            <div class="panel-body">
<?php   if($template==1){ ?>
            <div  id="content">

<div class="payTop_details row">

    <div class="col-md-6">
        <p>
<<<<<<< HEAD
        <strong>NAME</strong>:<?php echo $business_name; ?><br> 
        <strong>PHONE</strong>:<?php echo $phone; ?><br> 
        <strong>ADDRESS</strong>:<?php echo $address; ?><br> 
        <strong>  EMAIL</strong>:<?php echo $email; ?><br>
        </p>
  </div>
   <!-- <div class="col-md-2"><img src="<?php //echo  $logo; ?>" width="50px;" height="50px;" /></div> -->
=======
           
        <strong>ADDRESS</strong>:<?php echo $company[0]['address']; ?><br> 
        <strong>  EMAIL</strong>:<?php echo $company[0]['email']; ?><br>
        </p>
  </div>
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
   <div class="col-md-6">
        <div style="float: right;"><strong>TIMESHEET ID</strong>:<?php echo $infotime[0]['timesheet_id']; ?>  
<br>
            <span><strong>EMPLOYEE ID:</strong><?php echo $infoemployee[0]['id']; ?></span>
        </div>

  

</div>
 <div class="col-md-12">
 <div class="col-md-4"></div>
<div class="col-md-4 Employee_details row" >

  
<strong>EMPLOYEE NAME</strong> : <?php echo $infoemployee[0]['first_name']; ?><?php echo $infoemployee[0]['last_name']; ?>   
<br>
<strong>EMPLOYEE TITLE</strong> :<?php echo $infotime[0]['job_title']; ?>  

</div>
 <div class="col-md-4"></div>
</div>
 <div class="col-md-12"><br/></div>
 <div class="col-md-12" style="float:center;">
  <style>
    .table td{
        padding:10px;
      
    }
    table {
         /* border: 3px #00000099 solid;
            background-color: #fff; */
            /* border-radius: 10px; */
        
         

            border: none;
    text-align: center;
    table-layout: fixed;
<<<<<<< HEAD

=======
    width: 100%;
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
     
    margin: 0 auto; /* or margin: 0 auto 0 auto */
  }
    /* table{
         border: 1px solid black;
  border-collapse: collapse;
   text-align: center;
   padding: 8px 14px;
    } */
    table th {
<<<<<<< HEAD

=======
                    border-top: ridge;
    border-bottom: groove;
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
  padding: 8px 14px;
  text-align: center;
 
}
    </style>
    
   
<<<<<<< HEAD
<table class="table" >
=======
<table >
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
    <tr style="outline: thin solid" rowspan="6">
    <th colspan="6">Earnings</th>

    </tr>
    <tr style="height: 50px;">
    <th>DESCRIPTION</th>
     <th>HRS/ UNITS</th>
      <th>RATE</th>
<<<<<<< HEAD
       <th>THIS PERIOD(<?php  echo $currency; ?>)</th>
        <th>YTD HOURS</th>
         <th>YTD(<?php  echo $currency; ?>)</th>
=======
       <th>THIS PERIOD($)</th>
        <th>YTD HOURS</th>
         <th>YTD($)</th>
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
</tr>

    <tr style="height: 70px;">
        <td>Salary</td>
           <td>  <?php echo $infotime[0]['total_hours']; ?></td>
              <td>  <?php echo $infoemployee[0]['hrate']; ?></td>
<<<<<<< HEAD
                 <td id="total_period"><?php echo $total; ?></td>
                    <td><?php echo $overalltotalhours; ?></td>
                       <td id="total_ytd"><?php echo $overalltotalamount; ?></td>
=======
                 <td><?php echo $total; ?></td>
                    <td><?php echo $overalltotalhours; ?></td>
                       <td><?php echo $overalltotalamount; ?></td>
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0

    </tr>

</table>


 </div>
 <div class="col-md-12"><br/></div>
  <div class="col-md-12">
 <div class="col-md-6">
<<<<<<< HEAD
 <table class="proposedWork pay_table table" id="price">
  <tr  rowspan="6" style="outline: thin solid">
=======
 <table class="proposedWork pay_table" id="price">
  <tr  rowspan="6">
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
    <th colspan="6">PERSONAL AND CHECK INFORMATION</th>

    </tr>

                            <tr style="text-align:left;"><td style="font-weight:bold;width:100px;">Name  </td><td style="width:10px;"> :</td><td><?php echo $adm_name[0]['adm_name']; ?></td></tr>

                             <tr style="text-align:left;"><td style="font-weight:bold;width:100px;">Address  </td><td style="width:10px;"> :</td><td ><?php echo $adm_name[0]['adm_address']; ?></td></tr>
                             
                             
                             <tr style="text-align:left;"><td style="font-weight:bold;width:100px;text-wrap:nowrap;">Emp.ID </td><td style="width:10px;"> :</td><td><?php echo $infotime[0]['admin_name']; ?></td></tr>
                              <tr style="text-align:left;"><td style="font-weight:bold;width:100px;">Pay Period</td><td style="width:10px;"> :</td><td style="text-wrap:nowrap;"><?php echo $infotime[0]['month']; ?></td></tr>
<<<<<<< HEAD
<?php if(!empty($infotime[0]['cheque_date'])) { ?>
                               <tr style="text-align:left;"><td style="font-weight:bold;width:100px;text-wrap:nowrap;">Chq Date</td><td style="width:10px;"> :</td><td><?php echo $infotime[0]['cheque_date']; ?></td></tr>
 <tr style="text-align:left;"><td style="font-weight:bold;width:100px;text-wrap:nowrap;">Chq No</td><td style="width:10px;"> :</td><td> <?php echo $infotime[0]['cheque_no']; ?></td></tr>
<?php }else{ ?>
 <tr style="text-align:left;"><td style="font-weight:bold;width:100px;text-wrap:nowrap;">Bank Name</td><td style="width:10px;"> :</td><td><?php echo $infotime[0]['bank_name']; ?></td></tr>
 <tr style="text-align:left;"><td style="font-weight:bold;width:100px;text-wrap:nowrap;">Ref No</td><td style="width:10px;"> :</td><td> <?php echo $infotime[0]['payment_ref_no']; ?></td></tr>


<?php  }  ?>


=======

                               <tr style="text-align:left;"><td style="font-weight:bold;width:100px;text-wrap:nowrap;">Chq Date</td><td style="width:10px;"> :</td><td><?php echo $infotime[0]['cheque_date']; ?></td></tr>
 <tr style="text-align:left;"><td style="font-weight:bold;width:100px;text-wrap:nowrap;">Chq No</td><td style="width:10px;"> :</td><td> <?php echo $infotime[0]['cheque_no']; ?></td></tr>
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
</table>



                               <br/>
<<<<<<< HEAD
<table class="table">
=======
<table>
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
    <tr style="outline: thin solid" rowspan="3">
    <th colspan="3">NET PAY ALLOCATION</th>

    </tr>
<tr>
    <th style="text-align:left;"><strong>DESCRIPTION</strong>
</th>
<<<<<<< HEAD
    <th><strong>THIS PERIOD(<?php  echo $currency; ?>)</strong>
</th>
    <th><strong>YTD(<?php  echo $currency; ?>)</strong>
=======
    <th><strong>THIS PERIOD($)</strong>
</th>
    <th><strong>YTD($)</strong>
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
</th>
</tr>
<tr>
   <td style="text-align:left;"><strong>Check Amount</strong>
</td>
<<<<<<< HEAD
   <td class="net_period"> <strong style="
    padding-top: 2px;">765.10</strong>
</td>
   <td class="net_ytd">
=======
   <td> <strong style="border-top: 1px solid;
    padding-top: 2px;">765.10</strong>
</td>
   <td>0.00
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
</td>
</tr>
<tr>
   <td style="text-align:left;"><strong>Chkg 404</strong>
</td>
   <td>0.00
</td>
   <td>0.00
</td>
</tr>
<tr>
   <td style="text-align:left;"><strong>NET PAY</strong>
</td>
<<<<<<< HEAD
   <td class="net_period" style="font-weight:bold;border-top: groove;">
</td>
   <td class="net_ytd" style="font-weight:bold;border-top: groove;">
=======
   <td>0.00
</td>
   <td>0.00
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
</td>
</tr>
</table>
 </div>
<div class="col-md-6">
<<<<<<< HEAD
<table class="table" id="table" style=" width: 100%; display: table-cell;">
=======
<table class="table" style=" width: 100%; display: table-cell;">
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
        <tr style="outline: thin solid" rowspan="6">
    <th colspan="6">WITHHOLDINGS</th>

    </tr>
    <tr>
    <th style="text-align:left;">DESCRIPTION</th>
     <th>FILING STATUS</th>
<<<<<<< HEAD
      <th>THIS PERIOD(<?php  echo $currency; ?>)</th>
       <th>YTD(<?php  echo $currency; ?>)</th>
       
</tr>
<?php if($s){ ?>
<tr>
<td style="text-align:left;"> Social Security</td>
<td>S O</td>
<td class="current"><?php if($s){echo $s; } ?></td>
<td class="ytd"><?php if($s_tax){echo round($s_tax,2); } ?></td>
</tr>
<?php  } ?>
<?php if($m){ ?>
<tr>
<td style="text-align:left;">Madicare</td>
<td>SMCU O</td>
<td class="current"><?php if($m){echo $m;}  ?></td>
<td class="ytd"><?php if($m_tax){echo round($m_tax,2); } ?></td>
</tr>
<?php  } ?>
<?php if($f){ ?>
<tr>
<td style="text-align:left;">Fed Income Tax</td>
<td></td>
<td class="current"><?php if($f){echo $f; } ?></td>
<td class="ytd"><?php if($f_tax){echo round($f_tax,2); } ?></td>
</tr>
<?php  } ?>
<?php if($u){ ?>
<tr>
<td style="text-align:left;">Unemployment Tax</td>
<td></td>
<td class="current"><?php if($u){echo $u; } ?></td>
<td class="ytd"><?php if($u_tax){echo round($u_tax,2); } ?></td>
</tr>
<?php  } ?>
 <?php foreach($state_tax as $k=>$v){

=======
      <th>THIS PERIOD($)</th>
       <th>YTD($)</th>
       
</tr>

<tr>
<td style="text-align:left;"> Social Security</td>
<td></td>
<td><?php if($s){echo $s; } ?></td>
<td><?php if($s_tax){echo $s_tax; } ?></td>
</tr>


<tr>
<td style="text-align:left;">Madicare</td>
<td></td>
<td><?php if($m){echo $m;}  ?></td>
<td><?php if($m_tax){echo $m_tax; } ?></td>
</tr>


<tr>
<td style="text-align:left;">Fed Income Tax</td>
<td></td>
<td><?php if($f){echo $f; } ?></td>
<td><?php if($f_tax){echo $f_tax; } ?></td>
</tr>


<tr>
<td style="text-align:left;">Unemployment Tax</td>
<td></td>
<td><?php if($u){echo $u; } ?></td>
<td><?php if($u_tax){echo $u_tax; } ?></td>
</tr>

 <?php foreach($state_tax as $k=>$v){
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
$split=explode('-',$k);
$rep=str_replace("'",'',$split[1]);

    ?>
    <tr>
       
        <td style="text-align:left;"><?php echo $rep;  ?></td>
       <td></td>
          
            
<<<<<<< HEAD
              <td class="current">  <?php echo $v; ?></td>
            
                 <td class="ytd"><?php echo round($sum[$rep],2); ?></td>
                

    </tr>
      <?php  } ?>
      <tr>
        <td></td><td></td>
        <td style="border-top: groove;" id="Total_current"></td><td style="border-top: groove;" id="Total_ytd"></td>
 </tr>
=======
              <td>  <?php echo $v; ?></td>
            
                 <td><?php echo $total; ?></td>
                

    </tr>
      <?php } ?>
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
</table>
</div>
</div>
    
 
                      
               
<<<<<<< HEAD

=======
                     <!-- <a id="download" style="color:white;background-color:#38469f;" class='btn btn-primary'><?php echo display('Download') ?></a>   -->
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0

            </div>

        </div>
        <script>
  $(document).ready(function(){
 
  var sum=0;

 $('.table').find('.current').each(function() {
var v=$(this).html();
  sum += parseFloat(v);

});
debugger;
 $('#Total_current').html(sum.toFixed(3));
  var sum_ytd=0;

 $('#table').find('.ytd').each(function() {
var v=$(this).html();
  sum_ytd += parseFloat(v);
   sum_ytd = isNaN(parseInt(sum_ytd)) ? 0 : parseInt(sum_ytd);

});

 $('#Total_ytd').html(sum_ytd.toFixed(3));
//net_period
 var period_wise_total=$('#total_period').html();
 var tax_deduction_period_wise=$('#Total_current').html();
 var net_period=period_wise_total-tax_deduction_period_wise;
 $('.net_period').html(net_period.toFixed(3));
//net_ytd
  var ytd_wise_total=$('#total_ytd').html();
 var tax_deduction_ytd_wise=$('#Total_ytd').html();
 var net_ytd=ytd_wise_total-tax_deduction_ytd_wise;
 $('.net_ytd').html(net_ytd.toFixed(3));


    });
    </script>
        <?php }else { ?>
            <style>
    .salary-slip{
      margin: 15px;
      .empDetail {
        width: 100%;
        text-align: left;
        border: 2px solid black;
        border-collapse: collapse;
        table-layout: fixed;
      }
      
      .head {
        margin: 10px;
        margin-bottom: 50px;
        width: 100%;
      }
      
      .companyName {
        text-align: right;
        font-size: 25px;
        font-weight: bold;
      }
      
      .salaryMonth {
        text-align: center;
      }
      
      .table-border-bottom {
        border-bottom: 1px solid;
      }
      
      .table-border-right {
        border-right: 1px solid;
      }
      
      .myBackground {
        padding-top: 10px;
        text-align: left;
        border: 1px solid black;
        height: 40px;
      }
      
      .myAlign {
        text-align: center;
        border-right: 1px solid black;
      }
      
      .myTotalBackground {
        padding-top: 10px;
        text-align: left;
        background-color: #EBF1DE;
        border-spacing: 0px;
      }
      
      .align-4 {
        width: 25%;
        float: left;
      }
      
      .tail {
        margin-top: 35px;
      }
      
      .align-2 {
        margin-top: 25px;
        width: 50%;
        float: left;
      }
      
      .border-center {
        text-align: center;
      }
      .border-center th, .border-center td {
        border: 1px solid black;
      }
      
      th, td {
        padding-left: 6px;
      }
}
.top {
      border: 3px #00000099 solid ;
            background-color: #fff; 
            border-radius: 10px;
   border-collapse: collapse;
  width: 100%;

 table-layout: fixed;
   border: 1px solid #ddd;
  text-align: left;

}

.top td{
         border: 1px #00000099 solid ;
            background-color: #fff; 
     padding: 10px;

}
.col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 0px; 
    padding-left: 0px;
}

/* th{
    background-color:#D6A195;
} */
</style> 
                       <div  id="content">

<div class="payTop_details row">

<div class="col-md-12">
    <div class="col-md-4">
   <table class="top" style="border:none;">
       <tr  style="text-align:center;">
<th colspan="2" style="    height: 40px;
   text-align: center;">EMPLOYEE INFO</th>
</tr>
       <tr>
       <td><strong>NAME</strong></td>
   <td><?php echo $infoemployee[0]['first_name']; ?><?php echo $infoemployee[0]['last_name']; ?></td>
</tr>
<tr>
<td><strong>TITLE</strong> :</td>
<td><?php echo $infotime[0]['job_title']; ?>  </td>

</tr>
<tr>
<td><strong>ID</strong> </td>
<td><?php echo $infoemployee[0]['id']; ?>  </td>

</tr>
<tr>
<td><strong>TIMESHEET ID</strong>:</td>
<td><?php echo $infotime[0]['timesheet_id']; ?>  </td>

</tr>
</table>
</div>
 <div class="col-md-4">
     <table class="top" style="border:none;">
              <tr  style="text-align:center;text-wrap: nowrap;">
<th colspan="2"     style="height: 40px;
   text-align: center;">PERSONAL AND CHECK INFO</th>
</tr>
       <tr>
       <td><strong> NAME</strong></td>
   <td><?php echo $infoemployee[0]['first_name']; ?><?php echo $infoemployee[0]['last_name']; ?></td>
</tr>

<tr>
<td><strong>ID</strong> :</td>
<td><?php echo $infoemployee[0]['id']; ?>  </td>

</tr>
<tr>
<td><strong>Bank Name</strong>:</td>
<td><?php echo $infotime[0]['timesheet_id']; ?>  </td>

</tr>
<tr>
<td><strong>Ref No</strong>:</td>
<td><?php echo $infotime[0]['timesheet_id']; ?>  </td>

</tr>
</table>
</div>
<div class="col-md-4">
      <table class="top" style="border:none;">
                   <tr  style="text-align:center;">
<th colspan="2"  style="height: 40px;
   text-align: center;">COMPANY INFO</th>
</tr>
       <tr>
       <td><strong>NAME </strong></td>
   <td><?php  echo $address; ?></td>
</tr>
<tr>
<td><strong>Address</strong> :</td>
<td><?php echo $infotime[0]['job_title']; ?>  </td>

</tr>
<tr>
<td><strong>Phone</strong> :</td>
<td><?php echo $infoemployee[0]['id']; ?>  </td>

</tr>
<tr>
<td><strong>Email</strong>:</td>
<td><?php echo $infotime[0]['timesheet_id']; ?>  </td>

</tr>
</table>
</div>
</div>
</div>
<br/>
<div class="row">
<div class="col-md-12">
<div class="col-md-6">
<table class="top">
                      <tr  style="text-align:center;">
<th style="    text-align: center;
   height: 40px;" colspan="2">EARNINGS</th>
</tr>
   <tr><td><strong>DESCRIPTION</strong></td><td>Salary</td></tr>
<tr><td><strong>HRS/ UNITS</strong></td><td> <?php echo $infotime[0]['total_hours']; ?></td></tr>
<tr><td><strong>RATE</strong></td><td> <?php echo $infoemployee[0]['hrate']; ?></td></tr>
<tr><td><strong>THIS PERIOD(<?php  echo $currency; ?>)</strong></td>  <td id="total_period"><?php echo $total; ?></td></tr>
<tr><td><strong>YTD HOURS</strong></td> <td><?php echo $overalltotalhours; ?></td></tr>
<tr><td><strong>YTD(<?php  echo $currency; ?>)</strong></td><td id="total_ytd"><?php echo $overalltotalamount; ?></td></tr>
</table>

<table class="top">
   <tr  rowspan="3">
   <th style="height: 30px;
    text-align: center;" colspan="3">NET PAY ALLOCATION</th>

   </tr>
<tr>
   <td style="text-align:left;"><strong>DESCRIPTION</strong>
</td>
   <td><strong>THIS PERIOD(<?php  echo $currency; ?>)</strong>
</td>
   <td><strong>YTD(<?php  echo $currency; ?>)</strong>
</td>
</tr>
<tr>
  <td style="text-align:left;"><strong>Check Amount</strong>
</td>
  <td class="net_period"> <strong style="border-top: 1px solid;
   padding-top: 2px;">765.10</strong>
</td>
  <td class="net_ytd">
</td>
</tr>
<tr>
  <td style="text-align:left;"><strong>Chkg 404</strong>
</td>
  <td>0.00
</td>
  <td>0.00
</td>
</tr>
<tr>
  <td style="text-align:left;"><strong>NET PAY</strong>
</td>
  <td class="net_period" style="font-weight:bold;border-top: groove;">
</td>
  <td class="net_ytd" style="font-weight:bold;border-top: groove;">
</td>
</tr>
</table>
</div>
<div class="col-md-6">
<table class="top">
<tr  rowspan="6">
   <th style="height: 40px;text-align: center;" colspan="4">WITHHOLDINGS</th>

   </tr>
   <tr>
   <td style="font-size:10px;font-weight:bold;">DESCRIPTION</td>
    <td style="font-size:10px;font-weight:bold;">FILING STATUS</td>
     <td style="font-size:10px;font-weight:bold;">THIS PERIOD(<?php  echo $currency; ?>)</td>
      <td style="font-size:10px;font-weight:bold;">YTD(<?php  echo $currency; ?>)</td>
      
</tr>
<?php if($s){ ?>
<tr>
<td style="text-align:left;font-weight:bold;"> Social Security</td>
<td>S O</td>
<td class="current"><?php if($s){echo $s; } ?></td>
<td class="ytd"><?php if($s_tax){echo round($s_tax,2); } ?></td>
</tr>
<?php  } ?>
<?php if($m){ ?>
<tr>
<td style="text-align:left;font-weight:bold;">Madicare</td>
<td>SMCU O</td>
<td class="current"><?php if($m){echo $m;}  ?></td>
<td class="ytd"><?php if($m_tax){echo round($m_tax,2); } ?></td>
</tr>
<?php  } ?>
<?php if($f){ ?>
<tr>
<td style="text-align:left;font-weight:bold;">Fed Income Tax</td>
<td></td>
<td class="current"><?php if($f){echo $f; } ?></td>
<td class="ytd"><?php if($f_tax){echo round($f_tax,2); } ?></td>
</tr>
<?php  } ?>
<?php if($u){ ?>
<tr>
<td style="text-align:left;font-weight:bold;">Unemployment Tax</td>
<td></td>
<td class="current"><?php if($u){echo $u; } ?></td>
<td class="ytd"><?php if($u_tax){echo round($u_tax,2); } ?></td>
</tr>
<?php  } ?>
<?php foreach($state_tax as $k=>$v){

$split=explode('-',$k);
$rep=str_replace("'",'',$split[1]);

   ?>
   <tr>
      
       <td style="text-align:left;font-weight:bold;"><?php echo $rep;  ?></td>
      <td></td>
         
           
             <td class="current">  <?php echo $v; ?></td>
           
                <td class="ytd"><?php echo round($sum[$rep],2); ?></td>
               

   </tr>
     <?php  } ?>
     <tr>
       <td></td><td></td>
       <td style="border-top: groove;" id="Total_current"></td><td style="border-top: groove;" id="Total_ytd"></td>
</tr>
</table>
</div>
</div>
</div>
       </div>
            <script>
  $(document).ready(function(){
 
  var sum=0;

 $('.table').find('.current').each(function() {
var v=$(this).html();
  sum += parseFloat(v);

});

 $('#Total_current').html(sum.toFixed(3));
  var sum_ytd=0;

 $('.table').find('.ytd').each(function() {
var v=$(this).html();
  sum_ytd += parseFloat(v);
    sum_ytd = isNaN(parseInt(sum_ytd)) ? 0 : parseInt(sum_ytd);

});

 $('#Total_ytd').html(sum_ytd.toFixed(3));
//net_period
 var period_wise_total=$('#total_period').html();
 var tax_deduction_period_wise=$('#Total_current').html();
 var net_period=period_wise_total-tax_deduction_period_wise;
 $('.net_period').html(net_period.toFixed(3));
//net_ytd
  var ytd_wise_total=$('#total_ytd').html();
 var tax_deduction_ytd_wise=$('#Total_ytd').html();
 var net_ytd=ytd_wise_total-tax_deduction_ytd_wise;
 $('.net_ytd').html(net_ytd.toFixed(3));


    });
    </script>
            <?php }?>

    </div>
      <a id="download" style="color:white;background-color:#38469f;" class='btn btn-primary'><?php echo display('Download') ?></a>  
</div>
    </div>
                   

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.0.272/jspdf.debug.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
//   $(document).ready(function(){
 
//   var sum=0;

//  $('.table').find('.current').each(function() {
// var v=$(this).html();
//   sum += parseFloat(v);

// });

//  $('#Total_current').html(sum.toFixed(3));
//   var sum_ytd=0;

//  $('.table').find('.ytd').each(function() {
// var v=$(this).html();
//   sum_ytd += parseFloat(v);

// });

//  $('#Total_ytd').html(sum_ytd.toFixed(3));
// //net_period
//  var period_wise_total=$('#total_period').html();
//  var tax_deduction_period_wise=$('#Total_current').html();
//  var net_period=period_wise_total-tax_deduction_period_wise;
//  $('.net_period').html(net_period.toFixed(3));
// //net_ytd
//   var ytd_wise_total=$('#total_ytd').html();
//  var tax_deduction_ytd_wise=$('#Total_ytd').html();
//  var net_ytd=ytd_wise_total-tax_deduction_ytd_wise;
//  $('.net_ytd').html(net_ytd.toFixed(3));


//     });
    $('#download').on('click',function () {


function first(callback1,callback2){
setTimeout( function(){
     var pdf = new jsPDF('p','pt','a4');
     const invoice = document.getElementById("content");
            // console.log(invoice);
             console.log(window);
             var pageWidth = 8.5;
             var margin=0.5;
             var opt = {
   lineHeight : 1.2,
   margin : 0,
   maxLineWidth : pageWidth - margin *1,
                 filename: 'invoice'+'.pdf',
                 allowTaint: true,
                 html2canvas: { scale: 3 },
                 jsPDF: { unit: 'in', format: 'a4', orientation: 'portrait' }
             };
              html2pdf().from(invoice).set(opt).toPdf().get('pdf').then(function (pdf) {
  var totalPages = pdf.internal.getNumberOfPages();
 for (var i = 1; i <= totalPages; i++) {
    pdf.setPage(i);
    pdf.setFontSize(10);
    pdf.setTextColor(150);
  }
  }).save('PaySlip_<?php echo $infoemployee[0]['first_name']." ".$infoemployee[0]['last_name']."_".$infotime[0]['month']?>.pdf');
    callback1();
    callback2();
         clonedElement.remove();
 $("#content").attr("hidden", true);
 }, 3000 );
}
function second(){
setTimeout( function(){
    $( '#myModal_sale' ).addClass( 'open' );
if ( $( '#myModal_sale' ).hasClass( 'open' ) ) {
  $( '.container' ).addClass( 'blur' );
}
$( '.close' ).click(function() {
  $( '#myModal_sale' ).removeClass( 'open' );
  $( '.cont' ).removeClass( 'blur' );
});
}, 3500 );
}
function third(){
    setTimeout( function(){
        window.location='<?php  echo base_url();   ?>'+'Cinvoice/manage_invoice';
        window.close();
    }, 4000 );
}
first(second,third);
});

    </script>

    

    </section>

</div>




<<<<<<< HEAD
=======

>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
 

