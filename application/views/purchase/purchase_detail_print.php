

<div class="content-wrapper">
    <section class="content-header" >

    </section>
  <!-- Invoice information -->
  <?php
        $myArray = explode('(',$total_tax); 
       $tax_amt=$myArray[0];
       $tax_des=$myArray[1];
      
      
      ?>
     <div class="container" id="content">
        <?php
    
    if($template==2)
    {
    ?>
<div class="brand-section" style="background-color:<?php echo $color; ?>">
<div class="row" >

<div class="col-sm-2"><img src="<?php echo  base_url().$logo; ?>" style='width: 50%;'>

</div>
<div class="col-sm-4 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
<div class="col-sm-4" style="color:white;font-weight:bold;" id='company_info'>
   
  <b> Company name : </b><?php echo $company_info[0]['company_name']; ?><br>
  <b>   Address : </b><?php echo $company_info[0]['address']; ?><br>
  <b>   Email : </b><?php echo $company_info[0]['email']; ?><br>
  <b>   Contact : </b><?php echo $company_info[0]['mobile']; ?><br>
</div>
</div>
</div>

<div class="body-section">
    <div class="row">
        <div class="col-6">
        <table id="one" style="border:none;">
<tr><td  class="key"><?php echo display('Vendor');?></td><td >:</td><td calss="value"><?php echo $supplier_nam;  ?></td></tr>
<tr><td  class="key"><?php echo display('Vendor Type');?></td><td >:</td><td calss="value"><?php echo $vendor_type;  ?></td></tr>
<tr><td  class="key"><?php echo display('invoice_no');  ?></td><td >:</td><td calss="value"><?php echo $chalan_no;  ?></td></tr>
<tr><td  class="key"><?php echo display('Payment Due Date');?></td><td >:</td><td calss="value"><?php echo $payment_due_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Payment Terms');?></td><td >:</td><td calss="value"><?php echo $payment_terms;  ?></td></tr>
<tr><td  class="key"><?php
        echo display('payment_type');
        ?></td><td >:</td><td calss="value"><?php echo $payment_type;  ?></td></tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Depature');?></td><td >:</td><td calss="value"><?php echo $etd;  ?></td></tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Arrival');?></td><td >:</td><td calss="value"><?php echo $eta;  ?></td></tr>
<?php  if(!empty($isf_filling)) { ?>
<tr><td  class="key"><?php echo display('ISF NO');?></td><td >:</td><td calss="value"><?php echo $isf_filling;  ?></td></tr>
<tr><td  class="key"><?php echo display('B/L No');?></td><td >:</td><td calss="value"><?php echo $bl_number;  ?></td></tr>
<?php   }  ?>

</table>

        </div>
        <div class="col-6">
        <table id="two">
        <tr><td  class="key"><?php echo display('Vendor Address');?></td><td >:</td><td calss="value"><?php echo $address."-".$city ."<br/>".$state."-".$zip."-".$country ."<br/>".$primaryemail."-".$mobile ; ?></td></tr>
<tr><td  class="key"><?php echo display('Expenses / Bill date');?></td><td >:</td><td calss="value"><?php echo $final_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Container Number');?></td><td>:</td><td calss="value"><?php echo $container_no;  ?></td></tr>


<tr><td  class="key"><?php echo display('Port Of Discharge');?></td><td>:</td><td calss="value"><?php echo $Port_of_discharge;  ?></td></tr>
<!-- <tr><td  class="key">Attachments</td><td style="width:10px;">:</td><td calss="value"><?php  ?></td></tr> -->


</table> </div> 
    </div>
</div>
 <div class="body-section" >
          <div class="table-responsive">
     
  

<?php 


for($m=1;$m<count($purchase_all_data);$m++){ 
    ?>
    <table class="table table-bordered normalinvoice table-hover" style="border:none;" id="normalinvoice_<?php  echo $m; ?>" >
            <thead style="background-color:<?php echo $color; ?>">
                    <tr>
                    <!-- <th rowspan="1" style="border-style : hidden!important; class="text-center ">S.No</th> -->
                        <th rowspan="1" class="absorbing-column text-center " style="width:6px;">Product<br/> Name</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Des<br/>crip<br/>tion</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Thick<br/>ness</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Supp<br/>lier<br/> Block<br/> No</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Supp<br/>lier<br/>Slab<br/> No</th> 
                       <th colspan="2"  class="text-center "style="width:6px;">Gross<br/> Mea<br/>sure<br/>ment<br/>Wth&#9474;Hght</th>
                        <th rowspan="1" class="text-center "style="width:5px;">Gross<br/>Sq.<br/>ft</th>
                        <th rowspan="1" class="text-center "style="width:5px;">Bun<br/>dle <br/>No</th>
                         <th rowspan="1" class="text-center "style="width:3px;">Slab No</th>
                         <th colspan="2" class="text-center "style="width:4px;">Net<br/> Mea<br/>sure<br/>Wth&#9474;Hght</th>
                            <th rowspan="1" class="text-center "style="width:6px;">Net Sq.Ft</th>
                            <th rowspan="1"  class="text-center "style="width:4px;">Cost<br/>per Sq.Ft</th>
                            <th rowspan="1" class="text-center"style="width:5px;">Cost <br/>per <br/>Slab</th>
                        <th rowspan="1"  class="text-center "style="width:2px;">Ori<br/>gin </th>
                          <th rowspan="1" style="width:80px;"  class="text-center ">Total</th>
                    </tr> 
<tr>

   </tr>
                </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($purchase_all_data as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                    <tr>
                    <!-- <td style="font-size: 10px;"><?php //echo $count; ?></td> -->
                         <td style="font-size: 9px;"><?php echo $inv['product_name']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['thickness']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_block_no']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_slab_no']; ?></td>
                     
               
                       <td style="font-size: 9px;"><?php echo $inv['gross_width']; ?></td> 
                     <td style="font-size: 9px;"><?php echo $inv['gross_height']; ?></td> 
                          <td style="font-size: 9px;" class="gross_sq_ft"><?php  echo $inv['gross_sq_ft_1'];  ?></td> 
                  
                         <td style="font-size: 9px;"><?php echo $inv['bundle_no']; ?></td>
                  
                         <td style="font-size: 9px;"><?php echo $n+1;?></td>
                       <td style="font-size: 9px;"><?php echo $inv['net_width']?></td>
                           <td style="font-size: 9px;"><?php echo  $inv['net_height']; ?></td>
                            <td style="font-size: 9px;" class="net_sq_ft"><?php  echo $inv['net_sq_ft'];  ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency ?><?php echo $inv['cost_sq_ft']; ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency ; ?><?php echo  $inv['cost_sq_slab']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['origin']; ?></td>
                       <td style="font-size: 9px;" >            <table><tr><td style="padding-bottom: 2px; border: none !important;font-size: 9px;">
                       <?php  echo $currency ; ?> </td><td style=" text-align: left;border: none !important;"><input  type="text" class="total_price" style="border:none;width:80px;font-size: 9px;text-align: left;"   value="<?php  echo $inv['total'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></td>
</tr></table></td> 
                    </tr>
                    <?php $n++;}}  ?><br>
                         
                            
                            <?php   } ?>
        
                            <table border="0" class="overall table table-hover" style="border:none;">
<tr style="border:none;">

 <td colspan="2" style="text-align:left;border:none;"><b><?php  echo display('Overall TOTAL');?>  :</b></td><td style="border:none;"> <?php  echo $currency; ?><?php echo $overall_total; ?> </td>
 <td style="text-align:right;border:none;" colspan="12"><b><?php echo  "Tax( ".$tax_des;  ?></b></td>
                         
                   <td  style="border:none;"><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
</tr>
<tr style="border:none;">
<td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_gross'];  ?></td>
<td style="text-align:right;border:none;" colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
                            <td style="border:none;">
     <?php  echo $currency; ?><?php echo $purchase_all_data[0]['grand_total_amount']; ?></span>
</td>
</tr>
                          
                            <tr style="border:none;">
                                
                            <td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Net Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_net'];  ?></td>
                            
                            <td style="text-align:right;border:none;"  colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</br><b>(<?php  echo display('Preferred Currency');?>)</b></td>
                            <td style="border:none;">
  <table border="0">
<tr>

<td style=style="border:none;">    <?php echo $currency_type." ".$purchase_all_data[0]['gtotal_preferred_currency'] ;?></td>
  </tr>
  
</table>                               

                                    <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                    <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                            </tr> 
<?php  //  if($all_invoice[0]['amt_paid'] !==''){   ?>
                                <tr id="amt">
                               
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php  echo display('Amount Paid');?>:</b></td>
                                      
                                        <td style="border:none;">
                                   <?php echo $currency_type." ".$purchase_all_data[0]['paid_amount'] ;?>
                                   </td>

                                        
                                      
                                        </tr> 
                                        <tr id="bal">
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php echo display('balance_ammount');  ?>:</b></td>
                                        <td style="border:none;">
                                       
                                      <?php echo $currency_type." ".$purchase_all_data[0]['balance'];?>
                                     
                                        </td>
                                        </tr> 
</table></table>
                           

                  
            <br>
<h4><?php echo  display('Remarks / Details');?> :</h4><?php echo $purchase_all_data[0]['remarks']; ?><br>
<h4><?php echo  display('Message on Invoice');?> :</h4><?php echo $purchase_all_data[0]['message_invoice']; ?>
<br><br>
        </div> </div>


        <?php  

}
elseif($template==1)
{
?>     
   <div class="brand-section" style="background-color:<?php echo $color; ?>">
   <div class="row">
      

     <div class="col-sm-5" id='company_info' style="color:white;">
            
          <b>  Company name : </b><?php echo $company_info[0]['company_name']; ?><br>
          <b> Address : </b><?php echo $company_info[0]['address']; ?><br>
          <b>  Email : </b><?php echo $company_info[0]['email']; ?><br>
          <b>  Contact : </b><?php echo $company_info[0]['mobile']; ?><br>
        </div>
        <div class="col-sm-5 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
        <div class="col-sm-2"><img src="<?php echo  base_url().$logo; ?>" style='width: 100%;'>
         
         </div>
      
  </div>
        </div>
        <div class="body-section">
    <div class="row">
        <div class="col-6">
             <table id="one" style="border:none;">
<tr><td  class="key"><?php echo display('Vendor');?></td><td >:</td><td calss="value"><?php echo $supplier_nam;  ?></td></tr>
<tr><td  class="key"><?php echo display('Vendor Type');?></td><td >:</td><td calss="value"><?php echo $vendor_type;  ?></td></tr>
<tr><td  class="key"><?php echo display('invoice_no');  ?></td><td >:</td><td calss="value"><?php echo $chalan_no;  ?></td></tr>
<tr><td  class="key"><?php echo display('Payment Due Date');?></td><td >:</td><td calss="value"><?php echo $payment_due_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Payment Terms');?></td><td >:</td><td calss="value"><?php echo $payment_terms;  ?></td></tr>
<tr><td  class="key"><?php
        echo display('payment_type');
        ?></td><td >:</td><td calss="value"><?php echo $payment_type;  ?></td></tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Depature');?></td><td >:</td><td calss="value"><?php echo $etd;  ?></td></tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Arrival');?></td><td >:</td><td calss="value"><?php echo $eta;  ?></td></tr>
<?php  if(!empty($isf_filling)) { ?>
<tr><td  class="key"><?php echo display('ISF NO');?></td><td >:</td><td calss="value"><?php echo $isf_filling;  ?></td></tr>
<tr><td  class="key"><?php echo display('B/L No');?></td><td >:</td><td calss="value"><?php echo $bl_number;  ?></td></tr>
<?php   }  ?>

</table>

        </div>
        <div class="col-6">
        <table id="two">
        <tr><td  class="key"><?php echo display('Vendor Address');?></td><td >:</td><td calss="value"><?php echo $address."-".$city ."<br/>".$state."-".$zip."-".$country ."<br/>".$primaryemail."-".$mobile ; ?></td></tr>
<tr><td  class="key"><?php echo display('Expenses / Bill date');?></td><td >:</td><td calss="value"><?php echo $final_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Container Number');?></td><td>:</td><td calss="value"><?php echo $container_no;  ?></td></tr>


<tr><td  class="key"><?php echo display('Port Of Discharge');?></td><td>:</td><td calss="value"><?php echo $Port_of_discharge;  ?></td></tr>
<!-- <tr><td  class="key">Attachments</td><td style="width:10px;">:</td><td calss="value"><?php  ?></td></tr> -->


</table> </div> 
    </div>
</div>
<div class="body-section" >
          <div class="table-responsive">
     
  

<?php 


for($m=1;$m<count($purchase_all_data);$m++){ 
    ?>
    <table class="table table-bordered normalinvoice table-hover" style="border:none;" id="normalinvoice_<?php  echo $m; ?>" >
            <thead style="background-color:<?php echo $color; ?>">
                    <tr>
                    <!-- <th rowspan="1" style="border-style : hidden!important; class="text-center ">S.No</th> -->
                        <th rowspan="1" class="absorbing-column text-center " style="width:6px;">Product<br/> Name</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Des<br/>crip<br/>tion</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Thick<br/>ness</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Supp<br/>lier<br/> Block<br/> No</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Supp<br/>lier<br/>Slab<br/> No</th> 
                       <th colspan="2"  class="text-center "style="width:6px;">Gross<br/> Mea<br/>sure<br/>ment<br/>Wth&#9474;Hght</th>
                        <th rowspan="1" class="text-center "style="width:5px;">Gross<br/>Sq.<br/>ft</th>
                        <th rowspan="1" class="text-center "style="width:5px;">Bun<br/>dle <br/>No</th>
                         <th rowspan="1" class="text-center "style="width:3px;">Slab No</th>
                         <th colspan="2" class="text-center "style="width:4px;">Net<br/> Mea<br/>sure<br/>Wth&#9474;Hght</th>
                           <th rowspan="1" class="text-center "style="width:6px;">Net Sq.Ft</th>
                            <th rowspan="1"  class="text-center "style="width:4px;">Cost<br/>per Sq.Ft</th>
                            <th rowspan="1" class="text-center"style="width:5px;">Cost <br/>per <br/>Slab</th>
                        <th rowspan="1"  class="text-center "style="width:2px;">Ori<br/>gin </th>
                          <th rowspan="1" style="width:80px;"  class="text-center ">Total</th>
                    </tr> 
<tr>

   </tr>
                </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($purchase_all_data as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                      <tr>
                    <!-- <td style="font-size: 10px;"><?php //echo $count; ?></td> -->
                         <td style="font-size: 9px;"><?php echo $inv['product_name']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['thickness']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_block_no']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_slab_no']; ?></td>
                     
               
                       <td style="font-size: 9px;"><?php echo $inv['gross_width']; ?></td> 
                     <td style="font-size: 9px;"><?php echo $inv['gross_height']; ?></td> 
                          <td style="font-size: 9px;" class="gross_sq_ft"><?php  echo $inv['gross_sq_ft_1'];  ?></td> 
                  
                         <td style="font-size: 9px;"><?php echo $inv['bundle_no']; ?></td>
                  
                         <td style="font-size: 9px;"><?php echo $n+1;?></td>
                       <td style="font-size: 9px;"><?php echo $inv['net_width']?></td>
                           <td style="font-size: 9px;"><?php echo  $inv['net_height']; ?></td>
                            <td style="font-size: 9px;" class="net_sq_ft"><?php  echo $inv['net_sq_ft'];  ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency ?><?php echo $inv['cost_sq_ft']; ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency ; ?><?php echo  $inv['cost_sq_slab']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['origin']; ?></td>
                       <td style="font-size: 9px;" >            <table><tr><td style="padding-bottom: 2px; border: none !important;font-size: 9px;">
                       <?php  echo $currency ; ?> </td><td style=" text-align: left;border: none !important;"><input  type="text" class="total_price" style="border:none;width:80px;font-size: 9px;text-align: left;"   value="<?php  echo $inv['total'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></td>
</tr></table></td> 
                    </tr>
                    <?php $n++;}}  ?><br>
                         
                            
                            <?php   } ?>
        
                                             <table border="0" class="overall table table-hover" style="border:none;">
<tr style="border:none;">

 <td colspan="2" style="text-align:left;border:none;"><b><?php  echo display('Overall TOTAL');?>  :</b></td><td style="border:none;"> <?php  echo $currency; ?><?php echo $overall_total; ?> </td>
 <td style="text-align:right;border:none;" colspan="12"><b><?php echo  "Tax( ".$tax_des;  ?></b></td>
                         
                   <td  style="border:none;"><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
</tr>
<tr style="border:none;">
<td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_gross'];  ?></td>
<td style="text-align:right;border:none;" colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
                            <td style="border:none;">
     <?php  echo $currency; ?><?php echo $purchase_all_data[0]['grand_total_amount']; ?></span>
</td>
</tr>
                          
                            <tr style="border:none;">
                                
                            <td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Net Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_net'];  ?></td>
                            
                            <td style="text-align:right;border:none;"  colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</br><b>(<?php  echo display('Preferred Currency');?>)</b></td>
                            <td style="border:none;">
  <table border="0">
<tr>

<td style=style="border:none;">    <?php echo $currency_type." ".$purchase_all_data[0]['gtotal_preferred_currency'] ;?></td>
  </tr>
  
</table>                               

                                    <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                    <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                            </tr> 
<?php  //  if($all_invoice[0]['amt_paid'] !==''){   ?>
                                <tr id="amt">
                               
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php  echo display('Amount Paid');?>:</b></td>
                                      
                                        <td style="border:none;">
                                   <?php echo $currency_type." ".$purchase_all_data[0]['paid_amount'] ;?>
                                   </td>

                                        
                                      
                                        </tr> 
                                        <tr id="bal">
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php echo display('balance_ammount');  ?>:</b></td>
                                        <td style="border:none;">
                                       
                                      <?php echo $currency_type." ".$purchase_all_data[0]['balance'];?>
                                     
                                        </td>
                                        </tr> 
</table></table>
                           

                  
            <br>
<h4><?php echo  display('Remarks / Details');?> :</h4><?php echo $purchase_all_data[0]['remarks']; ?><br>
<h4><?php echo  display('Message on Invoice');?> :</h4><?php echo $purchase_all_data[0]['message_invoice']; ?>
<br><br>
        </div> </div>


        <?php   

}
elseif($template==3)
{
?>
<div class="brand-section" style="background-color:<?php echo $color; ?>">
<div class="row">
       
       <div class="col-sm-2"><img src="<?php echo  base_url().$logo; ?>" style='width: 100%;'>
          
         </div>
       <div class="col-sm-6 text-center" style="color:white;"><h3><?php echo $header; ?></h3></div>
    
   </div>
        </div>

        <div class="body-section">
    <div class="row">
        <div class="col-6">
              <table id="one" style="border:none;">
<tr><td  class="key"><?php echo display('Vendor');?></td><td >:</td><td calss="value"><?php echo $supplier_nam;  ?></td></tr>
<tr><td  class="key"><?php echo display('Vendor Type');?></td><td >:</td><td calss="value"><?php echo $vendor_type;  ?></td></tr>
<tr><td  class="key"><?php echo display('invoice_no');  ?></td><td >:</td><td calss="value"><?php echo $chalan_no;  ?></td></tr>
<tr><td  class="key"><?php echo display('Payment Due Date');?></td><td >:</td><td calss="value"><?php echo $payment_due_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Payment Terms');?></td><td >:</td><td calss="value"><?php echo $payment_terms;  ?></td></tr>
<tr><td  class="key"><?php
        echo display('payment_type');
        ?></td><td >:</td><td calss="value"><?php echo $payment_type;  ?></td></tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Depature');?></td><td >:</td><td calss="value"><?php echo $etd;  ?></td></tr>
<tr><td  class="key"><?php echo display('Estimated Time Of Arrival');?></td><td >:</td><td calss="value"><?php echo $eta;  ?></td></tr>
<?php  if(!empty($isf_filling)) { ?>
<tr><td  class="key"><?php echo display('ISF NO');?></td><td >:</td><td calss="value"><?php echo $isf_filling;  ?></td></tr>
<tr><td  class="key"><?php echo display('B/L No');?></td><td >:</td><td calss="value"><?php echo $bl_number;  ?></td></tr>
<?php   }  ?>

</table>

        </div>
        <div class="col-6">
        <table id="two">
        <tr><td  class="key"><?php echo display('Vendor Address');?></td><td >:</td><td calss="value"><?php echo $address."-".$city ."<br/>".$state."-".$zip."-".$country ."<br/>".$primaryemail."-".$mobile ; ?></td></tr>
<tr><td  class="key"><?php echo display('Expenses / Bill date');?></td><td >:</td><td calss="value"><?php echo $final_date;  ?></td></tr>
<tr><td  class="key"><?php echo display('Container Number');?></td><td>:</td><td calss="value"><?php echo $container_no;  ?></td></tr>


<tr><td  class="key"><?php echo display('Port Of Discharge');?></td><td>:</td><td calss="value"><?php echo $Port_of_discharge;  ?></td></tr>
<!-- <tr><td  class="key">Attachments</td><td style="width:10px;">:</td><td calss="value"><?php  ?></td></tr> -->


</table> 
 </div> 
    </div>
</div>
<div class="body-section" >
          <div class="table-responsive">
     
  

<?php 


for($m=1;$m<count($purchase_all_data);$m++){ 
    ?>
    <table class="table table-bordered normalinvoice table-hover" style="border:none;" id="normalinvoice_<?php  echo $m; ?>" >
            <thead style="background-color:<?php echo $color; ?>">
                    <tr>
                    <!-- <th rowspan="1" style="border-style : hidden!important; class="text-center ">S.No</th> -->
                        <th rowspan="1" class="absorbing-column text-center " style="width:6px;">Product<br/> Name</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Des<br/>crip<br/>tion</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Thick<br/>ness</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Supp<br/>lier<br/> Block<br/> No</th>
                        <th rowspan="1" class="text-center "style="width:4px;">Supp<br/>lier<br/>Slab<br/> No</th> 
                       <th colspan="2"  class="text-center "style="width:6px;">Gross<br/> Mea<br/>sure<br/>ment<br/>Wth&#9474;Hght</th>
                        <th rowspan="1" class="text-center "style="width:5px;">Gross<br/>Sq.<br/>ft</th>
                        <th rowspan="1" class="text-center "style="width:5px;">Bun<br/>dle <br/>No</th>
                         <th rowspan="1" class="text-center "style="width:3px;">Slab No</th>
                         <th colspan="2" class="text-center "style="width:4px;">Net<br/> Mea<br/>sure<br/>Wth&#9474;Hght</th>
                           <th rowspan="1" class="text-center "style="width:6px;">Net Sq.Ft</th>
                            <th rowspan="1"  class="text-center "style="width:4px;">Cost<br/>per Sq.Ft</th>
                            <th rowspan="1" class="text-center"style="width:5px;">Cost <br/>per <br/>Slab</th>
                        <th rowspan="1"  class="text-center "style="width:2px;">Ori<br/>gin </th>
                          <th rowspan="1" style="width:80px;"  class="text-center ">Total</th>
                    </tr> 
<tr>

   </tr>
                </thead>
               <tbody id="addPurchaseItem_<?php echo $m;  ?>">
                                    <?php  $n=0; ?>
                                    <?php foreach($purchase_all_data as $inv){
                                        
                                      

$a = substr($inv['tableid'], 0, 1);
if($a==$m){
                                    
                                        ?>

                    <tr>
                    <!-- <td style="font-size: 10px;"><?php //echo $count; ?></td> -->
                         <td style="font-size: 9px;"><?php echo $inv['product_name']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['description']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['thickness']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_block_no']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['supplier_slab_no']; ?></td>
                     
               
                       <td style="font-size: 9px;"><?php echo $inv['gross_width']; ?></td> 
                     <td style="font-size: 9px;"><?php echo $inv['gross_height']; ?></td> 
                          <td style="font-size: 9px;" class="gross_sq_ft"><?php  echo $inv['gross_sq_ft_1'];  ?></td> 
                  
                         <td style="font-size: 9px;"><?php echo $inv['bundle_no']; ?></td>
                  
                         <td style="font-size: 9px;"><?php echo $n+1;?></td>
                       <td style="font-size: 9px;"><?php echo $inv['net_width']?></td>
                           <td style="font-size: 9px;"><?php echo  $inv['net_height']; ?></td>
                            <td style="font-size: 9px;" class="net_sq_ft"><?php  echo $inv['net_sq_ft'];  ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency ?><?php echo $inv['cost_sq_ft']; ?></td>
                       <td style="font-size: 9px;"><?php  echo $currency ; ?><?php echo  $inv['cost_sq_slab']; ?></td>
                       <td style="font-size: 9px;"><?php echo $inv['origin']; ?></td>
                       <td style="font-size: 9px;" >            <table><tr><td style="padding-bottom: 2px; border: none !important;font-size: 9px;">
                       <?php  echo $currency ; ?> </td><td style=" text-align: left;border: none !important;"><input  type="text" class="total_price" style="border:none;width:80px;font-size: 9px;text-align: left;"   value="<?php  echo $inv['total'];  ?>"  id="total_<?php  echo $m.$n; ?>"     name="total_amt[]"/></td>
</tr></table></td> 
                    </tr>
                    <?php $n++;}}  ?><br>
                         
                            
                            <?php   } ?>
        
                                                  <table border="0" class="overall table table-hover" style="border:none;">
<tr style="border:none;">

 <td colspan="2" style="text-align:left;border:none;"><b><?php  echo display('Overall TOTAL');?>  :</b></td><td style="border:none;"> <?php  echo $currency; ?><?php echo $overall_total; ?> </td>
 <td style="text-align:right;border:none;" colspan="12"><b><?php echo  "Tax( ".$tax_des;  ?></b></td>
                         
                   <td  style="border:none;"><?php  echo $currency; ?><?php echo $tax_amt;  ?></td>
</tr>
<tr style="border:none;">
<td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Gross Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_gross'];  ?></td>
<td style="text-align:right;border:none;" colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</b></td>
                            <td style="border:none;">
     <?php  echo $currency; ?><?php echo $purchase_all_data[0]['grand_total_amount']; ?></span>
</td>
</tr>
                          
                            <tr style="border:none;">
                                
                            <td colspan="2"  style="vertical-align:top;text-align:left;border:none;"><b><?php  echo display('Overall Net Sq.Ft');?> :</b></td><td style="border:none;" colspan="3"><?php echo  $purchase_all_data[0]['total_net'];  ?></td>
                            
                            <td style="text-align:right;border:none;"  colspan="10"><b><?php  echo display('GRAND TOTAL');?> :</br><b>(<?php  echo display('Preferred Currency');?>)</b></td>
                            <td style="border:none;">
  <table border="0">
<tr>

<td style=style="border:none;">    <?php echo $currency_type." ".$purchase_all_data[0]['gtotal_preferred_currency'] ;?></td>
  </tr>
  
</table>                               

                                    <input type="hidden" id="final_gtotal"  name="final_gtotal" />

                                    <input type="hidden" name="baseUrl" class="baseUrl" value="<?php echo base_url();?>"/></td>
                            </tr> 
<?php  //  if($all_invoice[0]['amt_paid'] !==''){   ?>
                                <tr id="amt">
                               
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php  echo display('Amount Paid');?>:</b></td>
                                      
                                        <td style="border:none;">
                                   <?php echo $currency_type." ".$purchase_all_data[0]['paid_amount'] ;?>
                                   </td>

                                        
                                      
                                        </tr> 
                                        <tr id="bal">
                                        <td style="border:none;text-align:right;"  colspan="15"><b><?php echo display('balance_ammount');  ?>:</b></td>
                                        <td style="border:none;">
                                       
                                      <?php echo $currency_type." ".$purchase_all_data[0]['balance'];?>
                                     
                                        </td>
                                        </tr> 
</table></table>
                           

                  
            <br>
<h4><?php echo  display('Remarks / Details');?> :</h4><?php echo $purchase_all_data[0]['remarks']; ?><br>
<h4><?php echo  display('Message on Invoice');?> :</h4><?php echo $purchase_all_data[0]['message_invoice']; ?>
<br><br>
        </div> </div>


        <?php    } ?>

    </div>

</div>

<div class="modal fade" id="myModal_ex" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 500px;height:100px;text-align:center;margin-bottom: 300px;">
        <div class="modal-header" style="">
      
          <h4 class="modal-title">New Expenses</h4>
        </div>
        <div class="content">

        <div class="modal-body">
          
          <h4>New Expenses Downloaded Successfully</h4>
     
        </div>
        <div class="modal-footer">
        </div>
        </div>
      </div>
      
    </div>
    </div>

<style>

.key{
  text-align:left;
font-weight:bold;

}
.value{
  text-align:left;
}
#one,#two{
  border:none ;
float:left;
width:100%;
}
body{
  background-color: #fcf8f8; 
  margin: 0;
  padding: 0;
}
h1,h2,h3,h4,h5,h6{
  margin: 0;
  padding: 0;
}
p{
  margin: 0;
  padding: 0;
}
.heading_name{
  font-weight: bold;
}
.container{
  width: 100%;
  margin-right: auto;
  margin-left: auto;
  margin-top: 50px;
}
.brand-section{
 background-color: #5961b3;
 padding: 10px 40px;
}
.logo{
  width: 50%;
}

.row{
  display: flex;
  flex-wrap: wrap;
  
}
.col-6{
  width: 50%;
  flex: 0 0 auto;
 
}
.{
  color: #fff;
}
.company-details{
  float: right;
  text-align: right;
}

.body-section{
  padding: 16px;
  border: 1px solid gray;
  
}
th{
  font-size: 15px;
  font-weight:bold;
}
.heading{
  font-size: 20px;
  margin-bottom: 08px;
}
.sub-heading{
  color: #262626;
  margin-bottom: 05px;
}
table{
  padding:10px;
 font-size:15px;
  /*background-color: #fff;*/
  width: 100%;
  border-collapse: collapse;

 
}

table thead tr{

  background-color: #5961b3;
 
}
.table-bordered td, .table-bordered th {
   border: 1px solid black !important; 
}
.table-bordered td{
  text-align:center;
  
}
table td {
  vertical-align: middle !important;

  word-wrap: break-word;
}
th{
  text-align:center;
  color:black;
  font-size:9px;
}
table th, table td {
  padding-top: 08px;
  padding-bottom: 08px;
}
.table-bordered{
  box-shadow: 0px 0px 5px 0.5px gray !important;
  
}

.text-right{
  text-align: right;
}
.w-20{
  width: 20%;
}
.float-right{
  float: right;
}
@media only screen and (max-width: 600px) {
  
}
.modal {
position: fixed;
top: 0;
left: 0;
display: flex;
width: 100%;
height: 100vh;
justify-content: center;
align-items: center;
opacity: 0;
visibility: hidden;
}

.modal .content {
position: relative;
padding: 10px;

border-radius: 8px;
background-color: #fff;
box-shadow: rgba(112, 128, 175, 0.2) 0px 16px 24px 0px;
transform: scale(0);
transition: transform 300ms cubic-bezier(0.57, 0.21, 0.69, 1.25);
}

.modal .close {
position: absolute;
top: 5px;
right: 5px;
width: 30px;
height: 30px;
cursor: pointer;
border-radius: 8px;
background-color: #7080af;
clip-path: polygon(0 10%, 10% 0, 50% 40%, 89% 0, 100% 10%, 60% 50%, 100% 90%, 90% 100%, 50% 60%, 10% 100%, 0 89%, 40% 50%);
}

.modal.open {
  background-color:#38469f;
opacity: 1;
visibility: visible;
}
.modal.open .content {
transform: scale(1);
}
.content-wrapper.blur {
filter: blur(5px);
}
.content {
 min-height: 0px;
}
  @media only print {
    
 
      .content-header{
           display:none;
      }

      footer, header, .sidebar {
          display:none;
      }
  }
@page {
  size: auto;
  size: A3;
  margin: 0mm;
}

   #content{display:none;} 
@media print 
{ 
#head{display:none;} 
#content{display:block;} 
} 
  
  </style>

<div class="modal fade" id="myModal_sale" role="dialog" >
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content" style="width: 500px;height:100px;text-align:center;margin-bottom: 300px;">
        <div class="modal-header" style="">
      
          <h4 class="modal-title">Expense</h4>
        </div>
        <div class="content">

        <div class="modal-body" style="text-align:center;font-weight:bold;">
          
          <h4>Purchase Order Downloaded Successfully</h4>
     
        </div>
        <div class="modal-footer">
        </div>
        </div>
      </div>
      
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


$(document).ready(function () {
printDiv('content')
});
function printDiv(elementId) {
    var a = document.getElementById('content').value;
    var b = document.getElementById(elementId).innerHTML;
    window.frames["print_frame"].document.title = document.title;
    window.frames["print_frame"].document.body.innerHTML = '<style> .key{ text-align:left; font-weight:bold;  }, .value{ text-align:left; }, #one,#two{ float:left; width:100%; }, body{ background-color: #fcf8f8; margin: 0; padding: 0; }, h1,h2,h3,h4,h5,h6{ margin: 0; padding: 0; }, p{ margin: 0; padding: 0; }, .heading_name{ font-weight: bold; }, .container{ width: 100%; margin-right: auto; margin-left: auto; margin-top: 50px; }, .brand-section{ background-color: #5961b3; padding: 10px 40px; }, .logo{ width: 50%; },  .row{ display: flex; flex-wrap: wrap;  }, .col-6{ width: 50%; flex: 0 0 auto;  }, .{ color: #fff; }, .company-details{ float: right; text-align: right; },  .body-section{ padding: 16px; border: 1px solid gray;  }, .heading{ font-size: 20px; margin-bottom: 08px; }, .sub-heading{ color: #262626; margin-bottom: 05px; }, table{  background-color: #fff; width: 100%; border-collapse: collapse;  },  table thead tr{ border: 1px solid #111; background-color: #5961b3;  }, .table-bordered td{ text-align:center; }, table td { vertical-align: middle !important;  word-wrap: break-word; }, th{  }, table th, table td { padding-top: 08px; padding-bottom: 08px; }, .table-bordered{ box-shadow: 0px 0px 5px 0.5px gray !important; }, .table-bordered td, .table-bordered th { border: 1px solid #dee2e6 !important; }, .text-right{ text-align: right; }, .w-20{ width: 20%; }, .float-right{ float: right; }, @media only screen and (max-width: 600px) {  }, .modal { position: fixed; top: 0; left: 0; display: flex; width: 100%; height: 100vh; justify-content: center; align-items: center; opacity: 0; visibility: hidden; },  .modal .content { position: relative; padding: 10px;  border-radius: 8px; background-color: #fff; box-shadow: rgba(112, 128, 175, 0.2) 0px 16px 24px 0px; transform: scale(0); transition: transform 300ms cubic-bezier(0.57, 0.21, 0.69, 1.25); },  .modal .close { position: absolute; top: 5px; right: 5px; width: 30px; height: 30px; cursor: pointer; border-radius: 8px; background-color: #7080af; clip-path: polygon(0 10%, 10% 0, 50% 40%, 89% 0, 100% 10%, 60% 50%, 100% 90%, 90% 100%, 50% 60%, 10% 100%, 0 89%, 40% 50%); },  .modal.open { background-color:#38469f; opacity: 1; visibility: visible; }, .modal.open .content { transform: scale(1); }, .content-wrapper.blur { filter: blur(5px); }, .content { min-height: 0px; }</style>' + b;
    window.frames["print_frame"].window.focus();
    window.frames["print_frame"].window.print();
}
   </script>


<script>
                    $(document).ready(function(){
                    
                    $(".normalinvoice").each(function(i,v){
                      if($(this).find("tbody").html().trim().length === 0){
                          $(this).hide()
                      }
                   })
                });
   </script>
  





