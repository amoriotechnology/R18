
<?php error_reporting(1);  ?>

<!-- Manage Invoice Start -->
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
<style>
  .table{
      display: block;
    overflow-x: auto;
   
  }
  </style>

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>Bank Ledger List</h1>

            <small><?php echo ""; ?></small>

            <ol class="breadcrumb">

                <li><a href="<?php   echo base_url(); ?>"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#">Bank</a></li>

                <li class="active" style="color:orange;">Bank Ledger List</li>

            </ol>

        </div>

    </section>



    <section class="content">

        <!-- Alert Message -->

        <?php

$message = $this->session->userdata('show');

if (isset($message)) {

    ?>

    <div class="alert alert-info alert-dismissable" style="background-color:#38469f;color:white;font-weight:bold;">

        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

        <?php echo $message; ?>                    

    </div>

    <?php

    // $this->session->unset_userdata('message');

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














  













         <div class="row">
                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading" style="height: 60px;">
   <div class="col-sm-10">

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
  









        <!-- Manage Invoice report -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">
      <div class="row"> 
<div id="for_filter_by" class="for_filter_by" style="display: inline;"><label for="filter_by"> <?php echo display('Filter By') ?> &nbsp;&nbsp;
                  
                   </label><select id="filterby" style="border-radius:5px;height:25px;">
                  <option value="1"> <?php echo display('ID') ?></option>
<option value="2"> <?php echo display('bank_name')?></option>
<option value="3"> <?php echo display('ac_name')?></option>
<option value="4"><?php echo display('ac_no')?></option>
<option value="5"><?php echo display('branch')?></option>
<option value="6"><?php echo display('balance')?></option>

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
      <th class="1 value" data-col="1"      style="width: 80px; height: 40.0114px;" ><?php echo display('sl') ?></th>
        <th class="2 value"  data-col="2"    style="height: 45.0114px; width: 234.011px" > <?php echo display('bank_name')?></th>
        <th class="3 value"  data-col="3"   style="width: 248.011px;"        ><?php echo display('ac_name')?></th>
        <th class="4 value" data-col="4"    style="width: 298.011px;"       ><?php echo display('ac_no')?></th>
		<th class="5 value" data-col="5"    style="width: 298.011px;"       ><?php echo display('branch')?></th>
		<th class="6 value" data-col="6"    style="width: 198.011px;"       ><?php echo display('balance')?></th>
        
      <div class="myButtonClass Action">
         <th class="7 text-center" data-col="7" data-column-id="7" data-formatter="commands" data-sortable="false"   style="  width: 480.011px;  height: 39.0114px;"  ><?php echo display('Action')?></th>
        </div>
      </tr>
    </thead>
    <tbody class="sortableTable__body" id="tab">
     <?php
	 if ($bank_list) { ?>
	 {bank_list}
	<tr style="text-align:center" ><td data-col="1" class="1">{sl}</td>
		<td data-col="2" class="2">{bank_name}</td>
		<td data-col="3" class="3">{ac_name}</td>
		<td data-col="4" class="4">{ac_number}</td>
		<td data-col="5" class="5">{branch}</td>
		<td data-col="6" class="6"><?php echo (($position==0)?"$currency {balance}":"{balance} $currency") ?></td>
		<td data-col="7" class="7">
		<a href="<?php echo base_url().'Csettings/bank_ledgers/{bank_id}'; ?>" class="btnclr btn m-b-5 m-r-2" data-toggle="tooltip" data-placement="left" title="" data-original-title="view"><i class="fa fa-eye" aria-hidden="true"></i></a>
		</td>

	</tr>

	{/bank_list}

	<?php } ?>
</tr>
  
    </tbody>
    <!--
    <tfoot>





<th></th>  

<th></th> 

            </tfoot>-->
  </table>
      </div> </div>
</section>



<input type="hidden" value="Sale/New Sale" id="url"/>

<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>


<div id="myModal_colSwitch"  class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:25%;height:30%;">
                    <span class="close_colSwitch">&times;</span>
                       
                          <div class="col-sm-2" ></div>


                          <div class="col-sm-3" ><br>
                          <div class="form-group row"  > 
                         
                          <br><input type="checkbox"  data-control-column="1" checked = "checked" class="1" value="1"/>&nbsp;<?php echo display('ID')?><br>
                          <br><input type="checkbox"  data-control-column="2" checked = "checked" class="2" value="2"/>&nbsp;<?php echo display('bank_name')?><br>
                          <br><input type="checkbox"  data-control-column="3" checked = "checked" class="3 " value="3  "/>&nbsp;<?php echo display('ac_name')?> <br>
                          <br><input type="checkbox"  data-control-column="4" checked = "checked" class="4" value="4"/>&nbsp;<?php echo display('ac_no')?><br>
             </div>
        </div>



        <div class="col-sm-2" ><br>
        <div class="form-group row"  >

        <br><input type="checkbox"  data-control-column="5" checked = "checked" class="5" value="5"/>&nbsp;<?php echo display('branch')?><br>

        <br><input type="checkbox"  data-control-column="6" checked = "checked" class="6" value="6"/>&nbsp;<?php echo display('balance')?><br>


<br><input type="checkbox"  data-control-column="7"  checked = "checked"   class="7" value="7"/>&nbsp;<?php echo display('Action');?><br>
                          </div>
                       </div>
                    



     
                    </div>
    </section>
</div>










<script src="<?php echo base_url()?>assets/js/jquery.bootgrid.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.5/jspdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.0.0-alpha.1/jspdf.plugin.autotable.js"></script>


<div id="myModal_colSwitch"  class="modal_colSwitch">
                    <div class="modal-content_colSwitch" style="width:25%;height:30%;">
                    <span class="close_colSwitch">&times;</span>
                       
                          <div class="col-sm-2" ></div>


                          <div class="col-sm-3" ><br>
                          <div class="form-group row"  > 
                         
                          <br><input type="checkbox"  data-control-column="1" checked = "checked" class="1" value="1"/>&nbsp;<?php echo display('ID')?><br>
                          <br><input type="checkbox"  data-control-column="2" checked = "checked" class="2" value="2"/>&nbsp;<?php echo display('bank_name')?><br>
                          <br><input type="checkbox"  data-control-column="3" checked = "checked" class="3 " value="3  "/>&nbsp;<?php echo display('ac_name')?> <br>
                          <br><input type="checkbox"  data-control-column="4" checked = "checked" class="4" value="4"/>&nbsp;<?php echo display('ac_no')?><br>
             </div>
        </div>



        <div class="col-sm-2" ><br>
        <div class="form-group row"  >

        <br><input type="checkbox"  data-control-column="5" checked = "checked" class="5" value="5"/>&nbsp;<?php echo display('branch')?><br>

        <br><input type="checkbox"  data-control-column="6" checked = "checked" class="6" value="6"/>&nbsp;<?php echo display('balance')?><br>


<br><input type="checkbox"  data-control-column="7"  checked = "checked"   class="7" value="7"/>&nbsp;<?php echo display('Action');?><br>
                          </div>
                       </div>
                    



     
                    </div>
    </section>
</div>











<!-- Manage Invoice End -->

<script type="text/javascript" src="<?php echo base_url()?>my-assets/js/profarma.js"></script>
<script>
 $(document).on('keyup', '#filterinput', function(){
  
    var value = $(this).val().toLowerCase();
    var filter=$("#filterby").val();
    $("#ProfarmaInvList tr:not(:eq(0))").filter(function() {
        $(this).toggle($(this).find("td."+filter).text().toLowerCase().indexOf(value) > -1)
    });
});
</script>
<script>
function reload(){
    location.reload();
}
    var csrfName = '<?php echo $this->security->get_csrf_token_name();?>';
var csrfHash = '<?php echo $this->security->get_csrf_hash();?>';
$editor = $('#submit'),
  $editor.on('click', function(e) {
    if (this.checkValidity && !this.checkValidity()) return;
    e.preventDefault();
    var yourArray = [];
    //loop through all checkboxes which is checked
    $('.modal-content_colSwitch input[type=checkbox]:not(:checked)').each(function() {
      yourArray.push($(this).val());//push value in array
    });
   
    values = {
    
      extralist_text: yourArray
    
    };
    console.log(values)
    var json=values;
    var data = {
        page:$('#url').val(),
          content: yourArray
       
       };
       data[csrfName] = csrfHash;
$.ajax({
    
    type: "POST",  
    url:'<?php echo base_url();?>Cinvoice/setting',
   
    data: data,
    dataType: "json", 
    success: function(data) {
        if(data) {
           console.log(data);
        }
    }  
});
  });

  $( document ).ready(function() {
   
   var page=$('#url').val();
   page=page.split('/');
    var data = {
        'menu':page[0],
        'submenu':page[1]
         
       
       };
      
       data[csrfName] = csrfHash;
    $.ajax({
    
    type: "POST",  
    url:'<?php echo base_url();?>Cinvoice/get_setting',
   
    data: data,
    dataType: "json", 
    success: function(data) {
     var menu=data.menu;
     var submenu=data.submenu;
     if(menu=='Sale' && submenu=='New Sale'){
     var s=data.setting;
s=JSON.parse(s);
console.log(s);
for (var i = 0; i < s.length; i++) {
    console.log(s[i]);
    $('td.'+s[i]).hide(); // hide the column header th
    $('th.'+s[i]).hide();
$('tr').each(function(){
     $(this).find('td:eq('+$('td.'+s[i]).index()+')').hide();
});
    }
    for (var i = 0; i < s.length; i++) {
        if( $('.'+s[i]))
  $('.'+s[i]).prop('checked', false); //check the box from the array, note: you need to add a class to your checkbox group to only select the checkboxes, right now it selects all input elements that have the values in the array 
    }  
}
    }
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


// $("input:checkbox:not(:checked)").each(function() {
//     var column = "table ." + $(this).attr("name");
//     $(column).hide();
// });

// $("input:checkbox").click(function(){
//     var column = "table ." + $(this).attr("name");
//     $(column).toggle();
// });

///************** */

    </script>


