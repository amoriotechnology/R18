
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
           
           COMPANY NAME:<?php echo $company[0]['business_name']; ?><br>
           ADDRESS:<?php echo $company[0]['address']; ?><br> 
           EMAIL:<?php echo $company[0]['email']; ?><br>
           PHONE:<?php echo $company[0]['phone']; ?>
        </p>

        <div style="float: right;">TIMESHEET ID:<?php echo $infotime[0]['timesheet_id']; ?>  
<br>
            <span>EMPLOYEE ID:<?php echo $infoemployee[0]['id']; ?></span>
        </div>

    </div>

</div>

<div class="Employee_details row">

  
EMPLOYEE NAME: <?php echo $infotime[0]['templ_name']; ?>  
<br>
EMPLOYEE JOB:<?php echo $infotime[0]['job_title']; ?>  

</div>


           <table class="proposedWork pay_table" id="price" width="100%" style="margin-top:20px">
                        
                        <tbody>
                           <tr>
                              <td class="col-md-4"><h3>PERSONAL AND CHECK INFORMATION</h3>
                                
                                <p><?php echo $adm_name[0]['adm_name']; ?></p>

                              <p><?php echo $adm_name[0]['adm_address']; ?></p>
                             
                             
                              <p>Soc Sec #: xxx-xx-xxxx <span>Employee ID: 1</span> </p>
                                <br>
                                <br>
                               <p>Pay Period: 12/04/22 to 12/10/22</p>
                                <p>Check Date: 12/10/22 <span>Check #: 6176</span> </p>
                                <hr>


                                <h3>NET PAY ALLOCATION</h3>

                                <br>

                                <div class="row">
                                    <div class="col-md-4">
                                        <p>DESCRIPTION</p>
                                          <p>Check Amount</p>
                                            <p>Chkg 404</p>
                                             <p> <strong>NET PAY</strong></p>


                                    </div>

                                    <div class="col-md-4">
                                         <p>THIS PERIOD($)</p>
                                          <p>0.00</p>
                                            <p>765.10</p>
                                             <p>  <strong style="border-top: 1px solid;
    padding-top: 2px;">765.10</strong> </p>

                                    </div>

                                    <div class="col-md-4">
                                         <p>YTD($)</p>
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

                                <P>DESCRIPTION </P>
                                <br>
                                <p>Salary</p>
                                <p>Total Hrs</p>
                                <p>Gross Earnings</p>
                                <p>Total Hrs Worked</p>

                                </div>

                                <div class="col-md-1">
                                <P>HRS/ UNITS</P>
                                <br>
                                <?php echo $infotime[0]['total_hours']; ?>
                                </div>



                                 <div class="col-md-1">
                                <P>RATE </P>
                                <br>
                                <?php echo $infoemployee[0]['hrate']; ?>
                                </div>



                                  <div class="col-md-2">
                               <p>THIS PERIOD($)</p>
                               <br>
                                <p><?php echo $total; ?></p>                        
                                </div>

                                 <div class="col-md-2">

                               <p>YTD HOURS</p>
                               <br>

                                </div>
                                  <div class="col-md-2">

                               <p>YTD($)</p>
                               <br>
                               <p><?php echo $total; ?></p>
                               <p></p>
                               <p><?php echo $total; ?></p>
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

                                <P>DESCRIPTION </P>
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

                                <P>FILING STATUS</P>
                                <br>

                                <P>S O</P>

                                <P>SMCU O</P>

                                </div>


                                <div class="col-md-1">

                            

                                </div>
                               
                                  <div class="col-md-2">

                               <p>THIS PERIOD($)</p>
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

                               <p>YTD($)</p>
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

                                </div>


                                </div>

                            

                              </td>
                             
                           </tr>
                        </tbody>
                        
                        <tfoot>
                          
                         
                        </tfoot>
                     </table>
                     <a id="download" style="color:white;background-color:#38469f;" class='btn btn-primary'><?php echo display('Download') ?></a>  

            </div>

        </div>

    </div>
    </div>

</div>



    

    </section>

</div>





 

