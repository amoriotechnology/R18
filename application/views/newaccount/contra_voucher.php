<script src="<?php echo base_url() ?>my-assets/js/admin_js/account.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>my-assets/css/css.css" />


<style>
    .select2{
        display:none;
    }
 

.input-symbol-euro::before {
 content: '<?php echo $currency; ?>';
  
  font-size: 1.5em;
  position: absolute;
  left: 5px;
  top: 50%;
  transform: translateY(-50%);
}
.input-symbol-euro {
      font-size: 10px;
  display: inline-block;
  position: relative;
}


    </style>
<div class="content-wrapper">
    <section class="content-header">
        <div class="header-icon">
            <i class="pe-7s-note2"></i>
        </div>
        <div class="header-title">
            <h1><?php echo display('contra_voucher') ?></h1>
            <small><?php //echo display('contra_voucher') ?></small>
            <ol class="breadcrumb">
                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>
                <li><a href="#"><?php echo display('accounts') ?></a></li>
                <li class="active" style="color:orange"><?php echo display('contra_voucher') ?></li>
            </ol>
        </div>
    </section>

    <section class="content">
            <?php
        $message = $this->session->userdata('message');
        if (isset($message)) {
            ?>
            <div class="alert alert-info alert-dismissable" style="background: #38469f;color:white;font-weight:bold;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('message');
        }
        $error_message = $this->session->userdata('error_message');
        if (isset($error_message)) {
            ?>
            <div class="alert alert-danger alert-dismissable" style="background: #38469f;color:white;font-weight:bold;">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $error_message ?>                    
            </div>
            <?php
            $this->session->unset_userdata('error_message');
        }
        ?>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h4>
                     <?php //echo display('contra_voucher')?>
                    </h4>
                </div>
            </div>
            <div class="panel-body">
               
                         <?php echo  form_open_multipart('accounts/create_contra_voucher','id="validate"') ?>
                     <div class="form-group row">
                        <label for="vo_no" class="col-sm-2 col-form-label"> <?php echo display('voucher_no')?></label>
                        <div class="col-sm-4">
                             <input type="text" name="txtVNo" id="txtVNo" value="<?php if(!empty($voucher_no[0]['voucher'])){
                               $vn = substr($voucher_no[0]['voucher'],7)+1;
                              echo $voucher_n = 'Contra-'.$vn;
                             }else{
                               echo $voucher_n = 'Contra-1';
                             } ?>" class="form-control" readonly>
                        </div>
                    </div> 
                    
                     <div class="form-group row">
                        <label for="date" class="col-sm-2 col-form-label"> <?php echo display('date')?><i class="text-danger">*</i></label>
                        <div class="col-sm-4">
                             <input type="date" name="dtpDate" id="dtpDate" class="form-control datepicker" value="<?php echo  date('Y-m-d')?>" required>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label for="txtRemarks" class="col-sm-2 col-form-label"> <?php echo display('remark')?></label>
                        <div class="col-sm-4">
                          <textarea  name="txtRemarks" id="txtRemarks" class="form-control"></textarea>
                        </div>
                    </div> 
                       <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="debtAccVoucher"> 
                                <thead>
                                    <tr>
                                <th class="text-center"> <?php echo display('account_name')?><i class="text-danger">*</i></th>
                                <th class="text-center"> <?php echo display('code')?></th>
                                <th class="text-center" style="width:300px;"> <?php echo display('debit')?></th>
                                <th class="text-center" style="width:300px;"> <?php echo display('credit')?></th>
                                <th class="text-center"> <?php echo display('action')?></th>  
                                    </tr>
                                </thead>
                                <tbody id="debitvoucher">
                                   
                                    <tr>
                                        <td class="" width="300">  
       <select name="cmbCode[]" id="cmbCode_1" class="form-control" onchange="load_dbtvouchercode(this.value,1)" required="">
        <option value="">Select Account Name</option>
         <?php foreach ($acc as $acc1) {?>
   <option value="<?php echo $acc1->HeadCode;?>"><?php echo $acc1->HeadName;?></option>
         <?php }?>
       </select>

                                         </td>
                                        <td><input type="text" name="txtCode[]"  class="form-control "  id="txtCode_1" ></td>
                                        <td><span class="input-symbol-euro"><input type="number" name="txtAmount[]" placeholder="0.00" class="form-control total_price text-left"  id="txtAmount_1" onkeyup="calculationContravoucher(1)" ></span>
                                           </td>
                                            <td ><span class="input-symbol-euro"><input type="number" name="txtAmountcr[]" placeholder="0.00" class="form-control total_price1 text-left"  id="txtAmount1_1" onkeyup="calculationContravoucher(1)" ></span>
                                           </td>
                                       <td style="text-align:center;">
                                                <button  class="btn btn-danger red" type="button"  onclick="deleteRowContravoucher(this)"><i class="fa fa-trash-o"></i></button>
                                            </td>
                                    </tr>                              
                              
                                </tbody>                               
                             <tfoot>
                                    <tr>
                                      <td >
                                            
                                        </td>
                                        <td colspan="1" class="text-right"><label  for="reason" class="  col-form-label"><?php echo display('total') ?></label>
                                           </td>
                                        <td class="text-left">
                                            <span class="input-symbol-euro"><input type="text" id="grandTotal" class="form-control text-left " name="grand_total" value="0.00" readonly="readonly" /></span>
                                        </td>
                                         <td  class="text-left">
                                          <span class="input-symbol-euro">  <input type="text" id="grandTotal1" class="form-control text-left " name="grand_total1" value="0.00" readonly="readonly" /></span>
                                        </td>
                                        <td style="text-align:center;" ><a id="add_more" class="btn" style="color:white;background-color:#38469f;" name="add_more"  onClick="addaccountContravoucher('debitvoucher')"><i class="fa fa-plus"></i></a>
                                         
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="form-group row">
                           
                            <div class="col-sm-12 text-left">

                                <input type="submit" id="add_receive" class="btn" style="color:white;background-color:#38469f;" name="save" value="<?php echo display('save') ?>" tabindex="9"/>
                               
                            </div>
                        </div>
                  <?php echo form_close() ?>
            </div>  
        </div>
         <input type="hidden" id="headoption" value="<option value=''>Select One</option><?php foreach ($acc as $acc2) {?><option value='<?php echo html_escape($acc2->HeadCode);?>'><?php echo html_escape($acc2->HeadName);?></option><?php }?>" name="">
    </div>
</div>
</section>
</div>
