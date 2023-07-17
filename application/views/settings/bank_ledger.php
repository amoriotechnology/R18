
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />




<script src="<?php echo base_url() ?>my-assets/js/admin_js/account.js" type="text/javascript"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/html2canvas.js"></script>
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.plugin.autotable"></script>
  <script type="text/javascript" src="<?php echo base_url()?>assets/js/jspdf.umd.js"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<script type="text/javascript" src="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.js"></script>
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
 <script type="text/javascript" src="<?php echo base_url()?>my-assets/js/tableManager.js"></script>
<script type="text/javascript" src="https://unpkg.com/xlsx@0.15.1/dist/xlsx.full.min.js"></script>
<script type="text/javascript" src="http://mrrio.github.io/jsPDF/dist/jspdf.debug.js"></script>
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<script type="text/javascript" src="http://www.bacubacu.com/colresizable/js/colResizable-1.5.min.js"></script>



<!-- Stock List Supplier Wise Start -->
<div class="content-wrapper">
	<section class="content-header">
	    <div class="header-icon">
	        <i class="pe-7s-note2"></i>
	    </div>
	    <div class="header-title">
	        <h1><?php echo display('bank_ledger') ?></h1>
	        <small><?php echo display('') ?></small>
	        <ol class="breadcrumb">
	            <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
	            <li><a href="#"><?php echo display('bank') ?></a></li>
	            <li class="active"><?php echo display('bank_ledger') ?></li>
	        </ol>
	    </div>
	</section>

	<section class="content">

	 <div class="row">
            <div class="col-sm-12">

      
               
            </div>
        </div>
         <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-body"> 
                        <?php echo form_open('Csettings/bank_ledger/', array('class' => 'form-inline', 'method' => 'post')) ?>
                        <?php $today = date('Y-m-d'); ?>
                      <label class="select"><?php echo display('bank') ?> : </label>
                        <select name="bank_id" class="form-control" style="width:400px;" >
                        	<option value="">Select Bank</option>
                        	<?php foreach($bank_list as $banks){?>
                        	<option value="<?php echo $banks['bank_id']?>"><?php echo $banks['bank_name']?></option>
                        <?php }?>
                        </select> 
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                     <label class="select"><?php echo display('search_by_date') ?>: <?php echo display('from') ?></label>
                        <input type="date" name="from_date"  value="<?php echo $today; ?>" class="datepicker form-control"/>
                        <label class="select"><?php echo display('to') ?></label>
                        <input type="date" name="to_date" class="datepicker form-control" value="<?php echo $today; ?>"/>
                        <button type="submit"  class="btnclr btn m-b-5 m-r-2" >&nbsp;&nbsp;<?php echo display('search') ?></button>
                        <!-- <a class="btnclr btn m-b-5 m-r-2" href="#" onclick="printDiv('printableArea')"><?php echo display('print') ?></a>  -->
                        <?php echo form_close() ?>		            
                    </div>
                </div>
            </div>
             </div> 









<div class="row">
                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading" style="height: 60px;">
   <div class="col-sm-10">

   <a href="<?php  echo base_url(); ?>/Csettings/ledger_lists" class="btnclr btn m-b-5 m-r-2" style="color:white;background-color: #337ab7;border-color: #2e6da4;"><?php echo ('Manage Bank Ledger List') ?></a>

                    <a onclick="reload();"  >  <i class="fa fa-refresh" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>
                  </div>




                           <div class="col-sm-2">


                    <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i> <!-- onclick opens MODAL -->

                    <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
    <button class="btnclr btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
       <span class="glyphicon glyphicon-th-list"></span> <?php  echo  display('download')?>
    </button>

    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   
  
                
      <li><a href="#" onclick="generate()"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"> <?php  echo  display('PDF')?></a></li>
      
      <li class="divider"></li>         
                  
      <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px"> <?php  echo  display('XLS')?></a></li>
                 
    </ul>

    &nbsp;
    <input type="button" class="btn btnclr" name="btnPrint" id="btnPrint"   value="Print" onclick="printDiv('printArea');"/>
  </div>
  </div>
  </div>      
  </div>










  
   <!-- Manage Invoice report -->

   <div class="row">

<div class="col-sm-12">

    <div class="panel panel-bd lobidrag">

        <div class="panel-heading">

		
<div class="row"> 
<div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by"> <?php echo display('Filter By') ?> &nbsp;&nbsp;
      
       </label><select id="filterby" style="border-radius:5px;height:25px;">
      <option value="1"> <?php echo display('Date') ?></option>
<option value="2"> <?php echo ('Bank Name')?></option>
<option value="3"> <?php echo display('Description')?></option>
<option value="4"><?php echo ('Withdraw/Deposite ID')?></option>
<option value="5"><?php echo ('Debit ')?></option>
<option value="6"><?php echo display('Credit ')?></option>
<option value="7"><?php echo ('Balance')?></option>

      </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text"></div>
</div>
        </div>







        <div class="panel-body" style="padding-top: 0px;">
<div class="sortableTable__container">
<div  id="printArea">
                         <div id="content" id="printArea">

<table class="print-table" width="100%">
                                                
                                                <tr>
                                                    <td align="left" class="print-table-tr">
                                                        <img src="<?php echo  base_url().$logo; ?>" style='width: 100px;'  alt="logo">

                                                    </td>
                                                    <td align="center" class="print-cominfo">
                                                        <span class="company-txt">
                                                        <b> </b><?php echo $company; ?><br>
        <b>   </b><?php echo $address; ?><br>
        <b> </b><?php echo $email; ?><br>
        <b>   </b><?php echo $phone; ?><br>
                                                    </td>
                                                   
                                                     <td align="right" class="print-table-tr">
                                                        <date>
                                                        <?php echo display('date')?>: <?php
                                                        echo date('d-M-Y');
                                                        ?> 
                                                    </date>
                                                    </td>
                                                </tr>            
                                   
                                </table>











<div class="sortableTable__discard">
</div>
        <div id="customers">
<table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">
<thead class="sortableTable">

<tr style="background-color: #337AB7;border-color: #2E6DA4;" class="sortableTable__header">

<th class="1 value" data-col="1"      style="width: 110px; height: 40.0114px;" ><?php echo display('date') ?></th>
<th class="2 value"  data-col="2"    style="height: 45.0114px; width: 234.011px" > <?php echo display('bank_name') ?></th>
<th class="3 value"  data-col="3"   style="width: 248.011px;"        ><?php echo display('description') ?></th>
<th class="4 value"  data-col="4"   style="width: 248.011px;"        ><?php echo display('withdraw_deposite_id') ?></th>
<th class="5 value" data-col="5" data-resizable-column-id="5"    style="width: 298.011px;"       ><?php echo display('debit_plus') ?></th>
<th class="6 value" data-col="6" data-resizable-column-id="6"    style="width: 258.011px;"       ><?php echo display('credit_minus') ?></th>								
<th class="7 value" data-col="7" data-resizable-column-id="7"    style="width: 258.011px;"       ><?php echo display('balance') ?></th>
</tr>

</thead>
<tbody   class="sortableTable__body" id="tab">


<?php
										if ($ledger) {
									?>
									{ledger}
										<tr>
											<td data-col="1" class="1" >{VDate}</td>
											<td data-col="2" class="2" >{HeadName}</td>
											<td data-col="3" class="3" >{Narration}</td>
											<td data-col="4" class="4" align="center">{VNo}</td>
											<td data-col="5" class="5" align="right"><?php echo (($position==0)?"$currency {debit}":"{debit} $currency") ?></td>
											<td data-col="6" class="6" align="right"><?php echo (($position==0)?"$currency {credit}":"{credit} $currency") ?></td>

											<td data-col="7" class="7" align="right"><?php echo (($position==0)?"$currency {balance}":"{balance} $currency") ?></td>
									
									
									
									
									
										</tr>
									{/ledger}
									<?php
										}
									?>





</tbody>

</table>
</div> 
</div>
</section>

</div>
</div>









<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>




<div id="myModal_colSwitch"  class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:40%;height:30%;">
                    <span class="close_colSwitch">&times;</span>
                       
                          <div class="col-sm-1" ></div>


                          <div class="col-sm-3" ><br>
                          <div class="form-group row"  > 
                         
                          <br><input type="checkbox"  data-control-column="1" checked = "checked" class="1" value="1"/> &nbsp;<?php echo display('date') ?><br>
                          <br><input type="checkbox"  data-control-column="2" checked = "checked" class="2" value="2"/>&nbsp;<?php echo ('Bank Name');?><br>
                          <br><input type="checkbox"  data-control-column="3" checked = "checked" class="3 " value="3  "/>&nbsp;<?php  echo  display('Description');?> <br>
                          <br><input type="checkbox"  data-control-column="4" checked = "checked" class="4" value="4"/>&nbsp;<?php  echo  ('Withdraw / Deposite ID');?><br>
             </div>
        </div>



        <div class="col-sm-3" ><br>
        <div class="form-group row"  >
        <br><input type="checkbox"  data-control-column="5" checked = "checked" class="5" value="5"/>&nbsp;<?php  echo  ('Debit');?><br>
<br><input type="checkbox"  data-control-column="6" checked = "checked" class="6" value="6"/>&nbsp;<?php  echo  display('Credit');?><br>

<br><input type="checkbox"  data-control-column="7" checked = "checked" class="7" value="7"/>&nbsp;<?php  echo  ('Balance');?><br>

                          </div>
                       </div>
                    
        

                    




                    </div>
                </div>
    </section>
</div>




<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>
<script>
    $(document).on('keyup', '#filterinput', function(){
  
    var value = $(this).val().toLowerCase();
    var filter=$("#filterby").val();
    $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
        $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
    });
});

$("input:checkbox:not(:checked)").each(function() {
    var column = "table ." + $(this).attr("value");
    console.log("Heyy : "+column);
    $(column).hide();
});

$("input:checkbox").click(function(){
    var column = "table ." + $(this).attr("value");
      console.log("Heyy : "+column);
    $(column).toggle();
});


$('#cmd').click(function() {

  var pdf = new jsPDF('p','pt','a4');
  $('#for_numrows,#pagesControllers').hide();
    const invoice = document.getElementById("content");
             console.log(invoice);
             console.log(window);
             var pageWidth = 8.5;
             var margin=0.5;
             var opt = {
   lineHeight : 1.2,
   margin : 0.2,
   maxLineWidth : pageWidth - margin *1,
                 filename: 'tax_details'+'.pdf',
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
  }).save('tax_details.pdf');
    setTimeout( function(){
      $('#for_numrows,#pagesControllers').show();
    }, 4500 );
});




function reload(){
    location.reload();
}


    </script>


<style>
	.select2-selection{
     display:none;
	}
</style>