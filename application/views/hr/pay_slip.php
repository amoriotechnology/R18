
<style>
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

    <section class="content-header">

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

            <div class="container" id="content">

<div class="payTop_details row">

    <div class="col-md-6">
        <p>
           
        <strong>ADDRESS</strong>:<?php echo $company[0]['address']; ?><br> 
        <strong>  EMAIL</strong>:<?php echo $company[0]['email']; ?><br>
        </p>
  </div>
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
    width: 100%;
     
    margin: 0 auto; /* or margin: 0 auto 0 auto */
  }
    /* table{
         border: 1px solid black;
  border-collapse: collapse;
   text-align: center;
   padding: 8px 14px;
    } */
    table th {
                    border-top: ridge;
    border-bottom: groove;
  padding: 8px 14px;
  text-align: center;
 
}
    </style>
    
   
<table >
    <tr style="outline: thin solid" rowspan="6">
    <th colspan="6">Earnings</th>

    </tr>
    <tr style="height: 50px;">
    <th>DESCRIPTION</th>
     <th>HRS/ UNITS</th>
      <th>RATE</th>
       <th>THIS PERIOD($)</th>
        <th>YTD HOURS</th>
         <th>YTD($)</th>
</tr>

    <tr style="height: 70px;">
        <td>Salary</td>
           <td>  <?php echo $infotime[0]['total_hours']; ?></td>
              <td>  <?php echo $infoemployee[0]['hrate']; ?></td>
                 <td><?php echo $total; ?></td>
                    <td><?php echo $overalltotalhours; ?></td>
                       <td><?php echo $overalltotalamount; ?></td>

    </tr>

</table>


 </div>
 <div class="col-md-12"><br/></div>
  <div class="col-md-12">
 <div class="col-md-6">
 <table class="proposedWork pay_table" id="price">
  <tr  rowspan="6">
    <th colspan="6">PERSONAL AND CHECK INFORMATION</th>

    </tr>

                            <tr style="text-align:left;"><td style="font-weight:bold;width:100px;">Name  </td><td style="width:10px;"> :</td><td><?php echo $adm_name[0]['adm_name']; ?></td></tr>

                             <tr style="text-align:left;"><td style="font-weight:bold;width:100px;">Address  </td><td style="width:10px;"> :</td><td ><?php echo $adm_name[0]['adm_address']; ?></td></tr>
                             
                             
                             <tr style="text-align:left;"><td style="font-weight:bold;width:100px;text-wrap:nowrap;">Emp.ID </td><td style="width:10px;"> :</td><td><?php echo $infotime[0]['admin_name']; ?></td></tr>
                              <tr style="text-align:left;"><td style="font-weight:bold;width:100px;">Pay Period</td><td style="width:10px;"> :</td><td style="text-wrap:nowrap;"><?php echo $infotime[0]['month']; ?></td></tr>

                               <tr style="text-align:left;"><td style="font-weight:bold;width:100px;text-wrap:nowrap;">Chq Date</td><td style="width:10px;"> :</td><td><?php echo $infotime[0]['cheque_date']; ?></td></tr>
 <tr style="text-align:left;"><td style="font-weight:bold;width:100px;text-wrap:nowrap;">Chq No</td><td style="width:10px;"> :</td><td> <?php echo $infotime[0]['cheque_no']; ?></td></tr>
</table>



                               <br/>
<table>
    <tr style="outline: thin solid" rowspan="3">
    <th colspan="3">NET PAY ALLOCATION</th>

    </tr>
<tr>
    <th style="text-align:left;"><strong>DESCRIPTION</strong>
</th>
    <th><strong>THIS PERIOD($)</strong>
</th>
    <th><strong>YTD($)</strong>
</th>
</tr>
<tr>
   <td style="text-align:left;"><strong>Check Amount</strong>
</td>
   <td> <strong style="border-top: 1px solid;
    padding-top: 2px;">765.10</strong>
</td>
   <td>0.00
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
   <td>0.00
</td>
   <td>0.00
</td>
</tr>
</table>
 </div>
<div class="col-md-6">
<table class="table" style=" width: 100%; display: table-cell;">
        <tr style="outline: thin solid" rowspan="6">
    <th colspan="6">WITHHOLDINGS</th>

    </tr>
    <tr>
    <th style="text-align:left;">DESCRIPTION</th>
     <th>FILING STATUS</th>
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
$split=explode('-',$k);
$rep=str_replace("'",'',$split[1]);

    ?>
    <tr>
       
        <td style="text-align:left;"><?php echo $rep;  ?></td>
       <td></td>
          
            
              <td>  <?php echo $v; ?></td>
            
                 <td><?php echo $total; ?></td>
                

    </tr>
      <?php } ?>
</table>
</div>
</div>
    
 
                      
               
                     <!-- <a id="download" style="color:white;background-color:#38469f;" class='btn btn-primary'><?php echo display('Download') ?></a>   -->

            </div>

        </div>

    </div>
    </div>

</div>



    

    </section>

</div>





 

