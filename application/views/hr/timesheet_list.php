
<?php error_reporting(1);  ?>


<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/3/css/bootstrap.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css"/>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.base64.js"></script>
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
<script type="text/javascript" src="<?php echo base_url()?>assets/js/drag_drop_index_table.js"></script>

<style>
    th,td{
        text-align:center;
    }
#content {

padding:0px;
}
    </style>


<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo ('Manage Time Sheet') ?></h1>

            <small></small>

            <ol class="breadcrumb">

                <li><a href=""><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('hrm') ?></a></li>

                <li class="active" style="color:orange"><?php echo ('Manage Time Sheet') ?></li>

            </ol>

        </div>

    </section>



    <section class="content">



        <!-- Alert Message -->

        <?php

        $message = $this->session->userdata('message');

        if (isset($message)) {

            ?>

            <div class="alert alert-info alert-dismissable" style="color: white;background-color: #38469f;">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <?php echo $message ?>                    

            </div>

            <?php

            $this->session->unset_userdata('message');

        }

        $error_message = $this->session->userdata('error_message');

        if (isset($error_message)) {

            ?>

            <div class="alert alert-danger alert-dismissable" style="color: white;background-color: #38469f;">

                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                <?php echo $error_message ?>                    

            </div>

            <?php

            $this->session->unset_userdata('error_message');

        }

        ?>

<script>
    $('.alert').delay(1000).fadeOut('slow');
</script>

        <!-- Manage Category -->

        <div class="row">

            <div class="col-sm-12">


                









                    













                <div class="row">
                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading" style="height: 60px;">
   <div class="col-sm-10">
                






   
   <?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='hrm' && $_SESSION['u_type'] ==3 && trim($split[1])=='1000'){
      
      
       ?>

<a href="<?php echo base_url('Chrm/add_timesheet') ?>" class="btn btnclr dropdown-toggle" style="color:white;background-color: #337ab7;border-color: #2e6da4;"> <?php echo ('Add Time Sheet') ?></a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a href="<?php echo base_url('Chrm/add_timesheet') ?>" class="btn btnclr dropdown-toggle" style="color:white;background-color: #337ab7;border-color: #2e6da4;"> <?php echo ('Add Time Sheet') ?></a>

                        <?php  } ?>

























                    <a onclick="reload();"  >  <i class="fa fa-refresh" style="font-size:25px;float:right;" aria-hidden="true"></i> </a>
                  </div>

                           <div class="col-sm-2">


                    <i class="fa fa-cog"  aria-hidden="true" id="myBtn" style="font-size:25px;" onClick="columnSwitchMODAL()"></i> <!-- onclick opens MODAL -->

                    <div class="dropdown bootcol" id="drop" style="float:right;padding-right:20px;padding-bottom:10px;">
                    <button class="btn btnclr dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
       <span class="glyphicon glyphicon-th-list"></span>  <?php echo display('download') ?>
     
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
   
  
                
      <li><a href="#" onclick="generate()"> <img src="<?php echo base_url()?>assets/images/pdf.png" width="24px"><?php echo display('PDF') ?> </a></li>
      
      <li class="divider"></li>         
                  
      <li><a href="#" onclick="$('#ProfarmaInvList').tableExport({type:'excel',escape:'false'});"> <img src="<?php echo base_url()?>assets/images/xls.png" width="24px">  <?php echo display('XLS') ?></a></li>
                 
    </ul>

    &nbsp;
    <input type="button" class="btn btnclr" name="btnPrint" id="btnPrint"   value="Print" onclick="printDiv('printArea');"/>
  </div>
  </div>
  </div>      
  </div>














   <!-- Manage  Employee -->

   <div class="row">

<div class="col-sm-12">

    <div class="panel panel-bd lobidrag">

        <div class="panel-heading">
<div class="row"> 
<div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by"> <?php echo display('Filter By') ?> &nbsp;&nbsp;
      
       </label><select id="filterby" style="border-radius:5px;height:25px;">
       <option value="1"><?php echo display('Sl') ?></option>
<option value="2">Employee Name</option>
<option value="3">Job title</option>
<option value="4">Duration</option>
<option value="5">Daily Break</option>
<option value="6">Payment terms</option>
<option value="7">month</option>
      </select> <input id="filterinput" style="border-radius:5px;height:25px;" type="text"></div>
</div>
        </div>





        <div class="panel-body" style="padding-top: 0px;">
<div class="sortableTable__container">

<div  id="printArea">
             <div id="content" id="printArea">
<div class="sortableTable__discard">
</div>
        <div id="customers">


<table class="table table-bordered" cellspacing="0" width="100%" id="ProfarmaInvList">


<thead class="sortableTable">
<tr style="background-color: #337AB7;border-color: #2E6DA4;" class="sortableTable__header">
<th class="1 value"  data-col="1"  data-resizable-column-id="1"    ><?php echo display('sl') ?></th>

<th class="2 value"  data-col="2"  data-resizable-column-id="2"    >Employee Name</th>

<th class="3 value"  data-col="3"  data-resizable-column-id="3"   >Job title</th>

<th class="4 value"  data-col="4"  data-resizable-column-id="4"   >Duration</th>

<th class="5 value"  data-col="5"  data-resizable-column-id="5"   >Daily Break</th>

<th class="6 value"  data-col="6"  data-resizable-column-id="6" >Payment terms</th>

<th class="7 value"  data-col="7"  data-resizable-column-id="7">month</th>


<th class="8 value"  data-col="8"  data-resizable-column-id="8">Action</th>

</tr>
</thead>
<tbody class="sortableTable__body" id="tab" >


<?php




if ($timesheet_list) {

    ?>

   

    <?php

    $sl = 1;

     foreach($timesheet_list as $timsht){?>




    <tr>

    <td class="1 value" data-col="1"><?php echo $sl;?></td>

<td class="2 value"  data-col="2">  <?php echo html_escape($timsht['first_name']." ".$timsht['last_name']);?></a></td>
<td class="3 value"  data-col="3"><?php echo html_escape($timsht['job_title']);?></td>

<td class="4 value"  data-col="4"><?php echo html_escape($timsht['duration']);?></td>

<td class="5 value"  data-col="5"><?php echo html_escape($timsht['dailybreak']);?></td>

<!-- <td class="6 value"  data-col="6"><img src="<?php //echo html_escape($timsht['payment_term']);?>" height="60px" width="80px"></td>  -->

<td class="6 value"  data-col="6"><?php echo html_escape($timsht['payment_term']);?></td>



<td class="7 value"  data-col="7"><?php echo html_escape($timsht['month']);?></td>



<td class="8 value"  data-col="8" >

<center>

    <?php echo form_open() ?>



<a href="<?php echo base_url() . 'Chrm/employee_payslip_permission/'.$timsht['timesheet_id']; ?>" class="btnclr btn m-b-5 m-r-2" data-toggle="tooltip" data-placement="left" title="Administrator Update"><i class="fas fa-user-tie" aria-hidden="true"></i></a>

<a class="btnclr btn m-b-5 m-r-2" href="<?php echo base_url('Chrm/time_sheet_pdf/'.$timsht['timesheet_id'])?>"><i class="fa fa-download" aria-hidden="true"></i></a>















<?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='hrm' && $_SESSION['u_type'] ==3 && trim($split[1])=='0010'){
      
      
       ?>

<a href="<?php echo base_url() . 'Chrm/edit_timesheet/'.$timsht['timesheet_id']; ?>" class="btnclr btn m-b-5 m-r-2" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a href="<?php echo base_url() . 'Chrm/edit_timesheet/'.$timsht['timesheet_id']; ?>" class="btnclr btn m-b-5 m-r-2" data-toggle="tooltip" data-placement="left" title="<?php echo display('update') ?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                        <?php  } ?>








                        <?php    foreach(  $this->session->userdata('perm_data') as $test){
    $split=explode('-',$test);
    if(trim($split[0])=='hrm' && $_SESSION['u_type'] ==3 && trim($split[1])=='0001'){
      
      
       ?>

<a href="<?php echo base_url('Chrm/timesheet_delete/'.$timsht['timesheet_id']) ?>" class="btnclr btn m-b-5 m-r-2" onclick="return confirm('<?php echo display('are_you_sure') ?>')" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                    
                    <?php break;}} 
                    if($_SESSION['u_type'] ==2){ ?>

<a href="<?php echo base_url('Chrm/timesheet_delete/'.$timsht['timesheet_id']) ?>" class="btnclr btn m-b-5 m-r-2" onclick="return confirm('<?php echo display('are_you_sure') ?>')" data-toggle="tooltip" data-placement="right" title="" data-original-title="<?php echo display('delete') ?> "><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                        <?php  } ?>







        <?php echo form_close() ?>

</center>

</td>

</tr>



<?php

$sl++;

}
}

?>

</tbody>
</table>


</div> 
</div>
</section>
</div> 
</div> 
</div> 
</div>

















           <div id="myModal_colSwitch" class="modal_colSwitch" >
                    <div class="modal-content_colSwitch" style="width:25%;height:30%;">
                          <span class="close_colSwitch">&times;</span>
                           <div class="col-sm-2"></div>
                          <div class="col-sm-4"><br><br>
                          <div class="form-group row">
                          <input type="checkbox"  data-control-column="1" checked = "checked" class="1"  value="1"/>&nbsp; <?php echo display('Sl')?><br><br>
<input type="checkbox"  data-control-column="2" checked = "checked" class="2"  value="2"/>&nbsp;Employee Name<br><br>
<input type="checkbox"  data-control-column="3" checked = "checked" class="3"   value="3"/>&nbsp;Job title<br><br>
<input type="checkbox"  data-control-column="4" checked = "checked" class="4"   value="4"/>&nbsp;Duration<br><br>


                          </div> </div>
                           <div class="col-sm-2"></div>
                          <div class="col-sm-4"><br><br>
                          <div class="form-group row">
                        
<input type="checkbox"  data-control-column="5"  class="5" value="5"/>&nbsp;Daily Break<br><br>
<input type="checkbox"  data-control-column="6"  class="6" value="6"/>&nbsp;Payment terms<br><br>
<input type="checkbox"  data-control-column="7"  class="7" value="7"/>&nbsp;Month<br><br>

    <input type="checkbox"  data-control-column="8" checked = "checked" class="8"   value="8"/>&nbsp;<?php echo display('Action')?><br>
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

