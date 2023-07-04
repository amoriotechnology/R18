

<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/> -->
<!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php //echo base_url()?>my-assets/css/css.css" /> -->









<?php 
echo base_url() ;


?>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<!-- Add new customer start -->
<style type="text/css">
.panel-body{
  padding:25px;
}
    .dot1 {
  height: 25px;
  width: 25px;
  background-color: #D7163A;

  display: inline-block;
}
.colorpad:hover;
{

 color: #f4511e;
}
.dot2 {
  height: 25px;
  width: 25px;
  background-color: #720303;

  display: inline-block;
}
.dot3 {
  height: 25px;
  width: 25px;
  background-color: #71D716;

  display: inline-block;
}
.dot4 {
  height: 25px;
  width: 25px;
  background-color: #3616D7;

  display: inline-block;
}
.dot5 {
  height: 25px;
  width: 25px;
  background-color: #D7B916;

  display: inline-block;
}
.dot6 {
  height: 25px;
  width: 25px;
  background-color: #D79A16;

  display: inline-block;
}
#templates>img:hover
{

background-color: orange;
border: 1px solid orange;
}
#templates>img
{
    width: 50%;
}
#templatetext
{
    margin-left:20px;
     font-size: 10px;
    font-style: italic;
    font-family: ui-monospace;
}
</style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo ('Payslip Design') ?></h1>
<small><?php echo display('') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('web_settings') ?></a></li>
                <li class="active" style="color:orange;" ><?php echo ('Payslip Design') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
        <!-- Alert Message -->      
        <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            ?>
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) {
            ?>
            <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error_message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('error_message');
        }
        ?>



        <!-- New customer -->
        <div class="row">
            <div class="col-sm-6">
                <div class="panel panel-bd lobidrag" >
                    <div class="panel-heading" >
                    <!-- <div class="panel-body"> -->

                        <div class="panel-title">
                      <div class="container">
                          <div class="row">
                              <div class="col-sm-3"> <div class="panel panel-default" style="text-align:center;">

                                <label><?php echo display('Invoice Header') ?></label>

    <div class="panel-body">
        <br>
        <img src="<?php echo base_url().'assets/images/templatelogo.png'; ?>" id='template' style='width: 17%;'>  <?php echo display('Dive in with Template' )?>
        <br><br>

            <table id="templateformart">
                <tr>
                    <td>
                        <a href=<?php echo base_url('Chrm/updatepayslipinvoicedesign/1').'/'.$_SESSION['user_id']; ?> id='templates' ><img  src="data:image/png;base64,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"></a>
                        <p   id='templatetext'   >Classic</p>
                    </td>
                    <td><a href="<?php echo base_url('Chrm/updatepayslipinvoicedesign/2').'/'.$_SESSION['user_id'];; ?> " id='templates'><img  src="data:image/png;base64,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"></a><p   id='templatetext'   >Mild</p></td>
                    
                </tr>
            </table>
<br>
<br>

          

 
  
  </tbody>
</table>

    </div>
  </div>    </div>
            <?php
            //////////////Design one///////////// 
            if($template==1)
            {
            ?>

        <div class="col-sm-8" > <div class="panel panel-default" style="    width: max-content;">
    <div class="panel-body">
        
        <div class="row">
        
              <div class="col-sm-3" id='company_info'>
                  
              <strong>ADDRESS</strong>:<br> 
        <strong>  EMAIL</strong>:<br>
        </p>

        <div style="float: right;"><strong>TIMESHEET ID</strong>:  
<br>
            <span><strong>EMPLOYEE ID:</strong></span>
        </div>

    </div>

</div>

<div class="Employee_details row" >

  
<strong>EMPLOYEE NAME</strong> : 
<br>
<strong>EMPLOYEE TITLE</strong> :

</div>


           <table class="proposedWork pay_table" id="price" width="100%" style="margin-top:20px">
                        
                        <tbody>
                           <tr>
                             <hr>
                              <td class="col-md-4"><h3>PERSONAL AND CHECK INFORMATION</h3>
                              <hr>

                             
                             
                              <p>Soc Sec #: xxx-xx-xxxx <span>Employee ID: <?php ?></span> </p>
                               <p>Pay Period: <?php  ?></p>

                                <p>Check Date:<?php ?><span>Check #: <?php ?></span> </p>

                                <hr>

                                <h3>NET PAY ALLOCATION</h3>

                                <hr>


                                <!-- <br> -->

                                <div class="row">
                                    <div class="col-md-4">
                                        <p><strong>DESCRIPTION</strong></p>
                                          <p><strong>Check Amount</p>
                                            <p><strong>Chkg 404</strong></p>
                                             <p> <strong>NET PAY</strong></p>


                                    </div>

                                    <div class="col-md-4">
                                         <p><strong>THIS PERIOD($)</strong></p>
                                          <p>0.00</p>
                                            <p>765.10</p>
                                             <p>  <strong style="border-top: 1px solid;
    padding-top: 2px;">765.10</strong> </p>

                                    </div>

                                    <div class="col-md-4">
                                         <p><strong>YTD($)</strong></p>
                                          <p>0.00</p>
                                            <p>39114.04</p>
                                             <p> <strong style="border-top: 1px solid;
    padding-top: 2px;">39114.04</strong> </p>
                                    </div>      
                                </div>
                                 
                              </td>
                              <td class="col-md-8">

                                <div class="row">
                                    <div class="col-md-2">

                                <P><strong>EARNINGS</strong> </P>
                                <br>

                                </div>

                                 <div class="col-md-2">

                                <P><strong>DESCRIPTION </strong></P>
                                <br>
                                <p>Salary</p>
                                <!-- <p>Total Hrs</p> -->
                                <!-- <p>Gross Earnings</p>
                                <p>Total Hrs Worked</p> -->

                                </div>

                                <div class="col-md-1">
                                <P><strong>HRS/ UNITS</strong></P>
                                <br>
                                </div>



                                 <div class="col-md-1">
                                <P><strong>RATE</strong> </P>
                                <br>
                                <!-- <p><?php// echo // $total_hours; ?></p> -->
                                <!-- <p>1000.00</p>
                                <p>1000.00</p> -->

                                </div>



                                  <div class="col-md-2">
                               <p><strong>THIS PERIOD($)</strong></p>
                               <br>
                                </div>

                                 <div class="col-md-2">

                               <p><strong>YTD HOURS</strong></p>
                               <br>

                                </div>
                                  <div class="col-md-2">

                               <p><strong>YTD($)</strong></p>
                               <br>
                               <p></p>




                                </div>
                                </div>
                               





                                <hr>












                                 <div class="row">
                                    <div class="col-md-2">

                                <P><strong>WITHHOLDINGS</strong> </P>
                               

                                <br>


                                </div>

                                 <div class="col-md-2">

                                <P><strong>DESCRIPTION</strong> </P>
                                <br>
                                <p>Social Security</p>
                                <p>Madicare</p>
                                <p>Fed Income Tax</p>
                                <p>NJ Income Tax</p>
                                <p>NJ Disability</p>
                                 <p>NJ Unemploy</p>
                                  <p>NJ EE Work Dev</p>
                                  <br>
                                  <p> <strong>TOTAL</strong> </p>
                               
                                </div>

                                <div class="col-md-1">

                                <P><strong>FILING STATUS</strong></P>
                                <br>

                                <P>S O</P>

                                <P>SMCU O</P>

                                </div>


                                <div class="col-md-1">

                            

                                </div>
                               
                                  <div class="col-md-2">

                               <p><strong>THIS PERIOD($)</strong></p>
                               <br>
                               <p>62.00</p>
                                <p>14.50</p>
                                 <p>121.53</p>
                                  <p>29.37</p>
                                   <p>7.50</p>
                                    <p></p>
                                     <p></p>
                                     <br>
                                      <p> <strong style="border-top: 1px solid;
    padding-top: 2px;"> 234.90</strong></p>


                                </div>

                                     <div class="col-md-2">


                                </div>

                                  <div class="col-md-2">

                               <p><strong>YTD($)</strong></p>
                               <br>
                                <p>3211.00</p>
                                <p>751.10</p>
                                 <p>6570.97</p>
                                  <p>1609.93</p>
                                   <p>388.50</p>
                                    <p>138.47</p>
                                     <p>15.39</p>
                                     <br>
                                      <p> <strong style="border-top: 1px solid;
    padding-top: 2px;">12685.95 </strong> </p>
   <br><button type="button"  class="btnclr btn m-b-5 m-r-2"   style="color:white;background-color: #337ab7;border-color: #2e6da4;"  data-toggle="modal" data-target="#myModal">
Preview
</button>
        </div>
    </div>
  </div></div>

            <?php 

            }
    elseif($template==2)
    {
            ?>
          <div class="col-sm-8" > 
            <div class="panel panel-default">


            <div class="salary-slip" >
            <table class="empDetail">
              <tr height="100px" style='background-color: #c2d69b'>
                <td colspan='4'>
                  <img height="90px" src='https://organisationmedia.toggleflow.com/demo/logo.png' />

                </td>

              
                  <td colspan='4' class="companyName"> Co-Operative Bank Ltd.</td>
              </tr>
              <tr>
                <th>
                  Name
      </th>
                <td>
                  Example
      </td>
                <td></td>
                <th>
                  Bank Code
      </th>
                <td>
                  ABC123
      </td>
                <td></td>
                <th>
                  Branch Name
      </th>
                <td>
                  ABC123
      </td>
              </tr>
              <tr>
                <th>
                  Employee Code
      </th>
                <td>
                  XXXXXXXXXXX
      </td>
                <td></td>
                <th>
                  Bank Name
      </th>
                <td>
                  XXXXXXXXXXX
      </td>
                <td></td>
                <th>
                  Payslip no.
      </th>
                <td>
                  XXXXXXXXXX
      </td>
              </tr>
              <tr>
                <th>
                  Cost Centre
      </th>
                <td>
                  XXXXXXXXXXX
      </td><td></td>
                <th>
                  Bank Branch
      </th>
                <td>
                  XXXXXXXXXX
      </td><td></td>
                <th>
                  Pay Period
      </th>
                <td>
                  XXXXXXXXXXX
      </td>
              </tr>
              <tr>
                <th>
                  CC Description:
      </th>
                <td>
                  XXXXXXXXXXX
      </td><td></td>
                <th>
                  Bank A/C no.
      </th>
                <td>
                  XXXXXXXXXX
      </td><td></td>
                <th>
                  Personel Area
      </th>
                <td>
                  XXXXXXXXXX
      </td>
              </tr>
              <tr>
                <th>
                  Grade:
      </th>
                <td>
                  18
      </td><td></td>
                <th>
                  Employee Group
      </th>
                <td>
                  Sales Manager
      </td><td></td>
                <th>
                  PAN No:
      </th>
                <td>
                  MOP72182E
      </td>
              </tr>
              <tr class="myBackground">
                <th colspan="2">
                  Payments
      </th>
                <th >
                  Particular
      </th>
                <th class="table-border-right">
                  Amount (Rs.)
      </th>
                <th colspan="2">
                  Deductions
      </th>
                <th >
                  Particular
      </th>
                <th >
                  Amount (Rs.)
      </th>
              </tr>
              <tr>
                <th colspan="2">
                  Basic Salary
      </th>
                <td></td>
                <td class="myAlign">
                  4935.00
      </td>
                <th colspan="2" >
                  Provident Fund
      </th >
                <td></td>

                <td class="myAlign">
                  00.00
      </td>
              </tr >
              <tr>
                <th colspan="2">
                  Fixed Dearness Allowance
      </th>
                <td></td>

                <td class="myAlign">
                  00.00
      </td>
                <th colspan="2" >
                  LIC
      </th >
                <td></td>

                <td class="myAlign">
                  00.00
      </td>
              </tr >
              <tr>
                <th colspan="2">
                  Variable Dearness Allowance
      </th>
                <td></td>

                <td class="myAlign">
                  00.00
      </td>
                <th colspan="2" >
                  Loan
      </th >
                <td></td>

                <td class="myAlign">
                  00.00
      </td>
              </tr >
              <tr>
                <th colspan="2">
                  House Rent Allowance
      </th>
                <td></td>
                <td class="myAlign">
                  00.00
      </td>
                <th colspan="2" >
                  Professional Tax
      </th >
                <td></td>
                <td class="myAlign">
                  00.00
      </td>
              </tr >
              <tr>
                <th colspan="2">
                  Graduation Allowance
      </th>
                <td></td>

                <td class="myAlign">
                  00.00
      </td>
                <th colspan="2" >
                  Security Deposite(SD)
      </th >
                <td></td>

                <td class="myAlign">
                  00.00
      </td>
              </tr >
              <tr>
                <th colspan="2">
                  Conveyance Allowance
      </th> <td></td>
                <td class="myAlign">
                  00.00
      </td>
                <th colspan="2" >
                  Staff Benefit(SB)
      </th >
                <td></td>
                <td class="myAlign">
                  00.00
      </td>
              </tr >
              <tr>
                <th colspan="2">
                  Post Allowance
      </th>
                <td></td>
                <td class="myAlign">
                  00.00
      </td>
                <th colspan="2" >
                  Labour Welfare Fund
      </th >
                <td></td>
                <td class="myAlign">
                  00.00
      </td>
              </tr >
              <tr>
                <th colspan="2">
                  Special Allowance
      </th>
                <td></td>
                <td class="myAlign">
                  00.00
      </td>
                <th colspan="2" >
                  NSC
      </th >
                <td></td>
                <td class="myAlign">
                  00.00
      </td>
              </tr >
              <tr>
                <td colspan="4" class="table-border-right"></td>
                <th colspan="2" >
                  Union Thanco Officer(UTO)
      </th >
                <td></td>
                <td class="myAlign">
                  00.00
      </td>
              </tr >
              <tr>
                <td colspan="4" class="table-border-right"></td>
                <th colspan="2" >
                  Advance
      </th >
                <td></td>
                <td class="myAlign">
                  00.00
      </td>
              </tr >
              <tr>
                <td colspan="4" class="table-border-right"></td>
                <th colspan="2" >
                  Income Tax
      </th > <td></td>
                <td class="myAlign">
                  00.00
      </td>
              </tr >
              <tr class="myBackground">
                <th colspan="3">
                  Total Payments
      </th>
                <td class="myAlign">
                  10000
      </td>
                <th colspan="3" >
                  Total Deductions
      </th >
                <td class="myAlign">
                  1000
      </td>
              </tr >
              <tr height="40px">
                <th colspan="2">
                  Projection for Financial Year:
                </th>
                <th>
                </th>
                <td class="table-border-right">
                </td>
                <th colspan="2" class="table-border-bottom" >
                  Net Salary
                </th >
                <td >
                </td>
                <td >
                  XXXXXXXXXX
                </td>
              </tr >
              <tr>
                <td colspan="2">
                  Gross Salary
                </td> <td></td>
                <td class="myAlign">
                  00.00
      </td><td colspan="4"></td>
              </tr >
              <tr>
                <td colspan="2">
                  Aggr. Dedu - P.Tax & Std Ded
      </td> <td></td>
                <td class="myAlign">
                  00.00
      </td>
                <th colspan="2" >
                  Cumulative
      </th >
                <td colspan="2"></td>
              </tr >
              <tr>
                <td colspan="2">
                  Gross Total Income
      </td> <td></td>
                <td class="myAlign">
                  00.00
      </td>
                <td colspan="2" >
                  Empl PF Contribution
      </td > <td></td>
                <td class="myAlign">
                  00.00
      </td>
              </tr >
              <tr>
                <td colspan="2">
                  Aggr of Chapter "PF"
      </td> <td></td>
                <td class="myAlign">
                  00.00
      </td><td colspan="4"></td>
              </tr >
              <tr>
                <td colspan="2">
                  Total Income
      </td> <td></td>
                <td class="myAlign">
                  00.00
      </td>
                <td colspan="4"></td>
              </tr >
              <tbody class="border-center">
                <tr>
                  <th>
                    Attend/ Absence
      </th>
                  <th>
                    Days in Month
      </th>
                  <th>
                    Days Paid
      </th>
                  <th>
                    Days Not Paid
      </th>
                  <th>
                    Leave Position
      </th>
                  <th>
                    Privilege Leave
      </th>
                  <th>
                    Sick Leave
      </th>
                  <th>
                    Casual Leave
      </th>
                </tr>
                <tr>
                  <td ></td>
                  <td ></td>
                  <td ></td>
                  <td ></td>
                  <td>Yrly Open Balance</td>
                  <td>0.0</td> <td>0.0</td>
                  <td>0.0</td>
                </tr >
                <tr>
                  <th >Current Month</th>
                  <td >31.0</td>
                  <td >31.0</td>
                  <td >31.0</td>
                  <td>Availed</td>
                  <td>0.0</td> <td>0.0</td>
                  <td>0.0</td>
                </tr >
                <tr>
                  <td colspan="4"></td>
                  <td>Closing Balance</td>
                  <td>0.0</td> <td>0.0</td>
                  <td>0.0</td>
                </tr >
                <tr>
                  <td colspan="4"> &nbsp; </td>
                  <td > </td>
                  <td > </td>
                  <td > </td>
                  <td > </td>
                </tr >
                <tr>
                  <td colspan="4"></td>
                  <td>Company Pool Leave Balance</td>
                  <td>1500</td>
                  <td ></td>
                  <td ></td>
                </tr >
              </tbody>
            </table >

          </div >

  </div>
</div>

           
 
    <?php 

}
?>




<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content" style='width:1200px;'>

      <!-- Modal Header -->
   

      <!-- Modal body -->
      <div >
      <?php
            //////////////Design one///////////// 
            if($template==1)
            {
            ?>

        <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
        
              <div class="col-sm-3" id='company_info'>
                  
                  Company name:<?php echo $cname; ?><br>
                  Address:<?php echo $address; ?><br>
                  Email:<?php echo $email; ?><br>
                  Contact:<?php echo $mobile; ?><br>
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
            <div class="col-sm-3"><img src="<?php echo  base_url().$logo; ?>" style='width: 40%;'></div>
        </div>
        <div class="row">
            <br>
            <br>
            <table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO </b> </td>
  </tr>
  <tr>
    <td>fdfdsdsf</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>

   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
   Close
</button>
        </div>
    </div>
  </div></div>

            <?php 

            }
    elseif($template==2)
    {
            ?>
          <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-2"><img src="<?php echo  base_url().$logo; ?>" style='width: 40%;'>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
           <div class="col-sm-4" id='company_info'>
                  
                  Company name:<?php echo $cname; ?><br>
                  Address:<?php echo $address; ?><br>
                  Email:<?php echo $email; ?><br>
                  Contact:<?php echo $mobile; ?><br>
              </div>
        </div>

        <div class="row">
            <div class="col-sm-6"><table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO </b> </td>
  </tr>
  <tr>
    <td>fdfdsdsf</td>
  </tr>
</table>
<br>
<br>


</div>
            <div class="col-sm-6"></div>
            
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>

   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
   Close
</button>
        </div>
    </div>
  </div></div>


    <?php 
           }
    else
    {
    ?>
    <div class="col-sm-8" > <div class="panel panel-default">
    <div class="panel-body">
        
        <div class="row">
            <div class="col-sm-3"><br>
               
              </div>
            <div class="col-sm-6 text-center"><h3><?php echo $header; ?></h3></div>
            <div class="col-sm-3"><img src="<?php echo  base_url().$logo; ?>" style='width: 40%;'></div>
        </div>
        <div class="row">
            <table width="348" height="79" border="1" style="color: #000;">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;"><b>BILL TO 5</b> </td>
  </tr>
  <tr>
    <td>fdfdsdsf</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
    
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
 
  </tr>
</table>

   <br><button type="button" class="btn btn-primary " data-toggle="modal" data-target="#myModal">
Close
</button>
        </div>
    </div>
  </div></div>
    <?php 

}
?>
  </div>

      <!-- Modal footer -->
     

    </div>
  </div>
</div>


                            </div>
                          </div>
                      </div>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>










    </section>
</div>
<?php
$csrf = array(
  'name' => $this->security->get_csrf_token_name(),
  'hash' => $this->security->get_csrf_hash()
);

?>
<!-- Add new customer end -->

<script type="text/javascript">
    ////////////Show & Hide///////////

    $('#templateformart').hide();
    $('#colorcombo').hide();
    $('#uploadlogo').hide();
    $('#template').click(function(){
        $("#templateformart").toggle();
    });
     $('#templatecolor').click(function(){
        $("#colorcombo").toggle();
    });
      $('#templatelogo').click(function(){
        $("#uploadlogo").toggle();

    });
      /////////////Ajax////////////////////



///////////////Ajax Dot////////
var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
function dot(value)
{
    var uid='<?php echo $_SESSION['user_id']; ?>';
    var tokenHash=jQuery("input[name=csrf_test_name]").val();
$.ajax({
  method: "POST",
  url:"<?php echo base_url(); ?>Cweb_setting/update_templates",

  data: { value: value, id: uid ,input:"color",'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
 success:function (result) {

  
    //    alert('Color '+result);  
      location.reload();
    
      
  }});
 }
 function header(value)
{
    var uid='<?php echo $_SESSION['user_id']; ?>';
    var tokenHash=jQuery("input[name=csrf_test_name]").val();
$.ajax({
  method: "POST",
url:"<?php echo base_url(); ?>Cweb_setting/update_templates",
  data: { value: value, id: uid ,input:"header",'<?php echo $this->security->get_csrf_token_name(); ?>':'<?php echo $this->security->get_csrf_hash(); ?>'},
 success:function (result) {

  
        //  alert('Color '+result);  
        location.reload();
    
      
  }});
 }
    

</script>
<!-- The Modal -->
  <div class="modal" id="myModal" >
  <div class="modal-dialog" style="width:1250px;height:1250px;">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Invoice Header</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- Modal body -->
      <div class="modal-body">
      <div class="col-sm-6 text-center"><?php echo $header; ?></div>
            <div class="col-sm-3"><img src="<?php echo base_url().$logo; ?>" style='width: 40%;'></div>
      <br/>
      <table width="348" height="79" border="1">
  <tr>
    <td width="204" height="30" style="background-color:#<?php echo $color; ?>;color:white;"><b>BILL TO</b> </td>
  </tr>
  <tr>
    <td>fdfdsdsf</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;color: white;">
    <td>Commercial</td>
    <td>Date</td>
    <td>Total Due</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>enclosed</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
<br>
<br>
<table width="100%" height='100%' border="1">
  <tr style="background-color: #<?php echo $color; ?>;color: white;">
    <td>Material</td>
    <td>Description</td>
    <td>Qty</td>
    <td>Rate</td>
    <td>Amount</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
  </div>
      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


