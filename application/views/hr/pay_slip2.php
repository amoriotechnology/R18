<?php error_reporting(0);?>
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
   border-collapse: collapse;
  width: 100%;

 table-layout: fixed;
   border: 1px solid #ddd;
  text-align: left;

}

.top td{
       border: 1px solid #ddd;
     padding: 10px;

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
       <td><strong>NAME : </strong></td>
   <td><?php echo $infoemployee[0]['first_name']; ?><?php echo $infoemployee[0]['last_name']; ?></td>
</tr>
<tr>
<td><strong>TITLE</strong> :</td>
<td><?php echo $infotime[0]['job_title']; ?>  </td>

</tr>
<tr>
<td><strong>ID</strong> :</td>
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
       <td><strong> NAME : </strong></td>
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
       <td><strong>NAME : </strong></td>
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
   height: 30px;" colspan="2">EARNINGS</th>
</tr>
   <tr><td><strong>DESCRIPTION :</strong></td><td>Salary</td></tr>
<tr><td><strong>HRS/ UNITS  :</strong></td><td> <?php echo $infotime[0]['total_hours']; ?></td></tr>
<tr><td><strong>RATE  :</strong></td><td> <?php echo $infoemployee[0]['hrate']; ?></td></tr>
<tr><td><strong>THIS PERIOD($)  :</strong></td>  <td id="total_period"><?php echo $total; ?></td></tr>
<tr><td><strong>YTD HOURS  :</strong></td> <td><?php echo $overalltotalhours; ?></td></tr>
<tr><td><strong>YTD($)  :</strong></td><td id="total_ytd"><?php echo $overalltotalamount; ?></td></tr>
</table>

<table class="top">
   <tr  rowspan="3">
   <th style="height: 30px;
    text-align: center;" colspan="3">NET PAY ALLOCATION</th>

   </tr>
<tr>
   <td style="text-align:left;"><strong>DESCRIPTION</strong>
</td>
   <td><strong>THIS PERIOD($)</strong>
</td>
   <td><strong>YTD($)</strong>
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
   <td style="font-size:12px;font-weight:bold;">DESCRIPTION</td>
    <td style="font-size:12px;font-weight:bold;">FILING STATUS</td>
     <td style="font-size:12px;font-weight:bold;">THIS PERIOD($)</td>
      <td style="font-size:12px;font-weight:bold;">YTD($)</td>
      
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
  }).save('Payslip_<?php  echo $all_invoice[0]['commercial_invoice_number'].'.pdf'  ?>');
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
        window.location='<?php  echo base_url();   ?>'+'Chrm/pay_slip_list';
        window.close();
    }, 4000 );
}
first(second,third);
});

    </script>

    

    </section>

</div>




 

