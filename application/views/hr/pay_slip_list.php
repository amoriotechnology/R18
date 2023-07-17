<?php error_reporting(1);  ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
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



<!-- Manage Invoice Start -->

<div class="content-wrapper">

    <section class="content-header">

        <div class="header-icon">

            <i class="pe-7s-note2"></i>

        </div>

        <div class="header-title">

            <h1>Generated Pay Slips List</h1>

            <small> </small>

            <ol class="breadcrumb">

                <li><a href="#"><i class="pe-7s-home"></i> <?php echo display('home') ?></a></li>

                <li><a href="#"><?php echo display('hrm') ?></a></li>

                <li class="active" style="color:orange">Generated Pay Slips List</li>

            </ol>

        </div>

    </section>



    <section class="content">
      
        <!-- Manage Invoice report -->

        <div class="row">

            <div class="col-sm-12">

                <div class="panel panel-bd lobidrag">

                    <div class="panel-heading">

                    </div>

                    <div class="panel-body">

                        <div class="table-responsive" style="overflow-x:hidden;">

                            <table class="table table-hover table-bordered" cellspacing="0" width="100%" id=""> 

                                <thead>

                                    <tr>

                                    <th><?php echo display('sl') ?></th>


                                    <th style="text-align:center;">Employee Name</th>
                                    <th style="text-align:center;">Job Title</th>
                                    <th style="text-align:center;">Daily Break</th>
                                    <th style="text-align:center;">Payment Term</th>
                                    <th style="text-align:center;">Total Hours </th>

                                    <th style="text-align:center;">Month</th>


                                    <th class="text-center"><?php echo display('action') ?></th>

                                    </tr>

                                </thead>

                                <tbody>


                                <?php $s = 1; foreach ($dataforpayslip as $key => $list) { ?>
                                    <tr role="row" class="odd">
 
                                        <td style="text-align:center;" tabindex="0"><?php echo $s; ?></td>
                                     <td style="text-align:center;"><?php echo $list['first_name']." ".$list['last_name']; ?></td>
                                        <td style="text-align:center;"><?php echo $list['job_title']; ?></td>
                                        <td style="text-align:center;"><?php echo $list['dailybreak']; ?></td>
                                        <td style="text-align:center;"><?php echo $list['payment_term']; ?></td>
                                        <td style="text-align:center;"><?php echo $list['total_hours']; ?></td>
                                        <td style="text-align:center;"><?php echo $list['month']; ?></td>



                                        <td style="text-align:center;"><a href="<?php echo base_url('Chrm/time_list/'.$list['timesheet_id'] .'/'. trim($list['templ_name'])) ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="left" title="" data-original-title="View Pay Slip"><i class="fa fa-window-restore" aria-hidden="true"></i></a>
                                        </td>
                                        <input type="hidden" value="<?php echo $list['timesheet_id']; ?>">
                                        <input type="hidden" value="<?php echo $list['create_by']; ?>">
                                    </tr>

                                <?php $s++; } ?>

                                </tbody>

                            </table>

                            

                        </div>

                       



                    </div>

                </div>

                <input type="hidden" id="total_invoice" value="<?php echo $total_invoice;?>" name="">

                 <input type="hidden" id="currency" value="{currency}" name="">

            </div>

        </div>

    </section>

</div>

<!-- Manage Invoice End -->

<link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css">



<script type="text/javascript">
$(function() {
 
  $('table th').resizable({
    handles: 'e',
    stop: function(e, ui) {
      $(this).width(ui.size.width);
    }
  });

});

</script>
