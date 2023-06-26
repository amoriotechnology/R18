<script src="<?php echo base_url() ?>my-assets/js/admin_js/account.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div class="content-wrapper">
<style>

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
    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1><?php echo display('customer_receive') ?></h1>

            <small><?php //echo display('customer_receive') ?></small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('accounts') ?></a></li>

                <li class="active" style="color:orange"><?php echo display('customer_receive') ?></li>

            </ol>

        </div>

    </section>

<style>
.select2-selection__rendered{
    display:none;
}
    </style>
</style>

    <section class="content">

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

<div class="row">

    <div class="col-sm-12 col-md-12">

        <div class="panel panel-bd lobidrag">

            <div class="panel-heading">

                <div class="panel-title">

                    <h4>

                      <?php //echo display('customer_receive')?>   

                    </h4>

                </div>

            </div>

            <div class="panel-body">

              

                         <?php echo  form_open_multipart('accounts/create_customer_receive','id="validate"') ?>

                     <div class="form-group row">

                        <label for="vo_no" class="col-sm-2 col-form-label"><?php echo display('voucher_no')?></label>

                        <div class="col-sm-4">

                             <input type="text" name="txtVNo" id="txtVNo" value="" class="form-control" placeholder="Voucher No">

                        </div>

                    </div> 

                     <div class="form-group row">

                        <label for="date" class="col-sm-2 col-form-label"><?php echo display('date')?><i class="text-danger">*</i></label>

                        <div class="col-sm-4">

                             <input type="text" name="dtpDate" id="dtpDate" class="form-control datepicker" value="<?php  echo date('Y-m-d');?>" required>

                        </div>

                    </div> 

                   

                                <div class="form-group row">

                                    <label for="payment_type" class="col-sm-2 col-form-label"><?php

                                        echo display('payment_type');

                                        ?> <i class="text-danger">*</i></label>

                                <div class="col-sm-4">

                                    <select name="paytype" class="form-control" required="" onchange="bank_paymet(this.value)" tabindex="3">

                              <option value="1"><?php echo display('cash_payment');?></option>

                              <option value="2"><?php echo display('bank_payment');?></option> 

                                    </select>

                                </div>

                             

                               

                    </div>



                       

                            <div class="form-group row" id="bank_div">

                                <label for="bank" class="col-sm-2 col-form-label"><?php

                                    echo display('bank');

                                    ?> <i class="text-danger">*</i></label>

                                <div class="col-sm-4">

                                   <select name="bank_id" class="form-control bankpayment"  id="bank_id">

                         <option value="">Select Location</option>

                                        <?php foreach($bank_list as $bank){?>

                                            <option value="<?php echo html_escape($bank['bank_id'])?>"><?php echo html_escape($bank['bank_name']);?></option>

                                        <?php }?>

                                    </select>

                                 

                                </div>

                             

                            </div>

                        

                       <div class="form-group row">

                        <label for="txtRemarks" class="col-sm-2 col-form-label"><?php echo display('remark')?></label>

                        <div class="col-sm-4">

                          <textarea  name="txtRemarks" id="txtRemarks" class="form-control"></textarea>

                        </div>

                    </div> 

                   

                       <div class="table-responsive">

                            <table class="table table-bordered table-hover" id="debtAccVoucher"> 

                                <thead>

                                    <tr>

                              <th class="text-center"><?php echo display('customer_name')?><i class="text-danger">*</i></th>

                              <th class="text-center"><?php echo display('code')?></th>

                              <th class="text-center"><?php echo display('amount')?><i class="text-danger">*</i></th>

                                

                                    </tr>

                                </thead>

                                <tbody id="debitvoucher">

                                   

                                    <tr>

                                        <td class="" width="300">  

                           <select name="customer_id" id="customer_id_1" class="form-control" onchange="load_customer_code(this.value,1)" required>

                            <option value="">Select Customer</option>

                        

                             <?php foreach ($customer_list as $customer) {?>

                       <option value="<?php echo html_escape($customer->customer_id);?>"><?php echo html_escape($customer->customer_name);?></option>

                             <?php }?>

                           </select>



                                         </td>

                                        <td><input type="text" name="txtCode" value="" class="form-control "  id="txtCode_1" readonly=""></td>

                                        <td style="width:600px;">    <span class="input-symbol-euro"><input type="number" name="txtAmount" value="" class="form-control total_price text-right"  id="txtAmount_1" onkeyup="CustomerRcvcalculation(1)" required></span>

                                           </td>

                                      

                                    </tr>                              

                              

                                </tbody>                               

                             <tfoot>

                                    <tr>

                                      <td >

                                           

                                        </td>

                                        <td colspan="1" class="text-right"><label  for="reason" class="  col-form-label"><?php echo display('total') ?></label>

                                           </td>

                                        <td class="text-left" style="width:600px;">

                                               <span class="input-symbol-euro"> <input type="text" id="grandTotal" class="form-control text-right " name="grand_total" value="" readonly="readonly" /></span>

                                        </td>

                                    </tr>

                                </tfoot>

                            </table>

                        </div>

                        <div class="form-group row">

                           

                            <div class="col-sm-12 text-right">



                                <input type="submit" id="add_receive" class="btn btn-success btn-large" style="color:white;background-color: #38469f;" name="save" value="<?php echo display('save') ?>" tabindex="9"/>

                               

                            </div>

                        </div>

                  <?php echo form_close() ?>

            </div>  

        </div>

    </div>

</div>

</section>

</div>

