<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chrm extends CI_Controller {

    public $menu;

    function __construct() {
        parent::__construct();
        $this->db->query('SET SESSION sql_mode = ""');
        $this->load->library('auth');
        $this->load->library('session');
         $this->load->model('Web_settings');
        $this->load->model('Hrm_model');
        $this->auth->check_admin_auth();
    }


 public function edit_timesheet($id) {
       $this->load->model('Hrm_model');
       $data['title']            = display('Payment_Administration');
       $data['time_sheet_data'] = $this->Hrm_model->time_sheet_data($id);
         $data['employee_name'] = $this->Hrm_model->employee_name($data['time_sheet_data'][0]['templ_name']);
       $data['designation'] = $this->db->select('designation')->from('employee_history')->where('id',$data['employee_name'][0]['id'])->get()->row()->designation;
       $data['payment_terms'] = $this->Hrm_model->get_payment_terms();
       $data['dailybreak'] = $this->Hrm_model->get_dailybreak();
       $data['duration'] = $this->Hrm_model->get_duration_data();
       $data['administrator'] = $this->Hrm_model->administrator_data();
     
      //  print_r($data);
         $content                  = $this->parser->parse('hr/edit_timesheet', $data, true);
         $this->template->full_admin_html_view($content);
        }


   public function time_list($timesheet_id = null,$templ_name)
        {
           $CI = & get_instance();
           $CC = & get_instance();
            $CII = & get_instance();
           $CI->load->model('invoice_content');
              $CII->load->model('invoice_design');
           $this->load->model('Hrm_model');
                 $w = & get_instance();
           $w->load->model('Ppurchases');
           $company_info = $w->Ppurchases->retrieve_company();
           $datacontent = $CC->invoice_content->retrieve_data();
           $data['employee_data'] = $this->Hrm_model->employee_info($templ_name);
           $data['timesheet_data'] = $this->Hrm_model-> timesheet_info_data($timesheet_id);
           $timesheetdata =$data['timesheet_data'];
           $employeedata  =$data['employee_data'];
           $hrate= $data['employee_data'][0]['hrate'];
           $total_hours=  $data['timesheet_data'][0]['total_hours'];
              $dataw = $CII->invoice_design->retrieve_data($this->session->userdata('user_id'));
           $final=$hrate *$total_hours;
   $s='';$u='';$m='';$f='';
           // Federal Income Tax
           $federal_tax = $this->db->select('*')->from('federal_tax')->where('tax','Federal Income tax')->get()->result_array();
           $federal_range='';
           $f_tax='';
           foreach($federal_tax as $amt){
              $split=explode('-',$amt[$data['employee_data'][0]['employee_tax']]);
               if($final > $split[0] && $final < $split[1]){
                 $federal_range=$split[0]."-".$split[1];
               }
               }
                 $query_row_count = $this->db->select('*')->from('tax_history') ->where("employee_id",$data['employee_data'][0]['id'])->get();
           $data['federal'] = $this->Hrm_model->federal_tax_info($data['employee_data'][0]['employee_tax'],$final,$federal_range);
           if(!empty($data['federal'])){
           $Federal_employee= $data['federal'][0]['employee'];
            $f=($Federal_employee/100)*$final;
          //  echo $f;echo "<br/>";
             
             if($query_row_count->num_rows() > 1){
                 $ar = $this->db->select('f_tax')->from('tax_history') ->where("employee_id",$data['employee_data'][0]['id'])->get()->row()->f_tax;
         //  echo $ar;echo "<br/>";
             //    $f_tax=$ar+$f;
             //   echo $f_tax;echo "<br/>";
              }else{
              // $f_tax=0;
              }
           }
           //Social Security
           $social_tax = $this->db->select('*')->from('federal_tax')->where('tax','Social Security')->get()->result_array();
           $social_range='';
           $s_tax='';
              $split=explode('-',$social_tax[0][$data['employee_data'][0]['employee_tax']]);
               if($final > $split[0] && $final < $split[1]){
              $social_range=$split[0]."-".$split[1];
               }
           $data['social'] = $this->Hrm_model->social_tax_info($data['employee_data'][0]['employee_tax'],$final,$social_range);
           if(!empty($data['social'][0]['employee'])){
           $social_employee= $data['social'][0]['employee'];
             $s=($social_employee/100)*$final;
           if($query_row_count->num_rows() > 1){
                 $ar = $this->db->select('s_tax')->from('tax_history') ->where("employee_id",$data['employee_data'][0]['id'])->get()->row()->s_tax;
           // $s_tax=$ar+$s;
             }else{
           //    $s_tax=0;
             }
     }
              //Medicare
           $Medicare = $this->db->select('*')->from('federal_tax')->where('tax','Medicare')->get()->result_array();
           $Medicare_range='';
           $m_tax='';
           foreach($Medicare as $social_amt){
              $split=explode('-',$social_amt[$data['employee_data'][0]['employee_tax']]);
               if($final > $split[0] && $final < $split[1]){
              $Medicare_range=$split[0]."-".$split[1];
               }
               }
           $data['Medicare'] = $this->Hrm_model->Medicare_tax_info($data['employee_data'][0]['employee_tax'],$final,$Medicare_range);
           if(!empty($data['Medicare'])){
           $Medicare_employee= $data['Medicare'][0]['employee'];
           $m=($Medicare_employee/100)*$final;
           
             if($query_row_count->num_rows() > 1){
                 $ar = $this->db->select('m_tax')->from('tax_history') ->where("employee_id",$data['employee_data'][0]['id'])->get()->row()->m_tax;
           // $m_tax=$ar+$m;
              }else{
             //  $m_tax=0;
              }
           }
           //Federal unemployment
           $unemployment = $this->db->select('*')->from('federal_tax')->where('tax','Federal unemployment')->get()->result_array();
           $unemployment_range='';
           $u_tax='';
           foreach($unemployment as $social_amt){
              $split=explode('-',$social_amt[$data['employee_data'][0]['employee_tax']]);
               if($final > $split[0] && $final < $split[1]){
              $unemployment_range=$split[0]."-".$split[1];
               }
               }
           $data['unemployment'] = $this->Hrm_model->unemployment_tax_info($data['employee_data'][0]['employee_tax'],$final,$unemployment_range);
           if(!empty($data['unemployment'])){
           $unemployment_employee= $data['Medicare'][0]['employee'];
              $u=($unemployment_employee/100)*$final;
              if($query_row_count->num_rows() > 1){
                 $ar = $this->db->select('u_tax')->from('tax_history') ->where("employee_id",$data['employee_data'][0]['id'])->get()->row()->u_tax;
         //   $u_tax=$ar+$u;
              }else{
              // $u_tax=0;
              }
           }
    $state_tax = $this->db->select('*')->from('state_and_tax')->where('Status','1')->get()->result_array();
    $state= $this->db->select('*')->from('state_and_tax')->where('state',$state_tax[0]['state'])->get()->result_array();
    $tax_split=explode(',',$state[0]['tax']);
    //print_r($state);
    $local_tax_range='';
           $local_tax='';
           $local_sum=array();
        $local_tax=array();
   foreach($tax_split as $tax){
       $tax=$this->db->select('*')->from('state_localtax')->where('tax',$state_tax[0]['state']."-".$tax)->get()->result_array();
    foreach($tax as $tx){
              $split=explode('-',$tx[$data['employee_data'][0]['employee_tax']]);
           if($split[0] && $split[1]){
               if($final > $split[0] && $final < $split[1]){
          $local_tax_range=$split[0]."-".$split[1];
         $data['localtax'] = $this->Hrm_model->local_state_tax($data['employee_data'][0]['employee_tax'],$final,$local_tax_range);
           if(!empty( $data['localtax'])){
               $i=0;
                foreach( $data['localtax'] as $lt){
        $local_tax_employee=$lt['employee'];
        $local_tax_employer=$lt['employer'];
            $local_tax_ee=($local_tax_employee/100)*$final;
        
              $local_tax_er=($local_tax_employer/100)*$final;
       $row = $this->db->select('*')->from('state_localtax')->where('employee',$local_tax_employee)->where('tax',$tx['tax'])->where($data['employee_data'][0]['employee_tax'],$local_tax_range)->count_all_results();
             $data_employee="'employee_".$tx['tax']."'";
             $search_tax=explode('-',$tx['tax']);
           // /  echo $this->db->last_query();
          if($row==1){
       $ar = $this->db->select('amount')->from('tax_history')->where('tax',$search_tax[1])->where('time_sheet_id',$timesheetdata[0]['timesheet_id'])->get()->row()->amount;
        // echo $local_tax_ee."///".$ar;
     //  echo $this->db->last_query();
       if($ar){
       $t_tx=$ar;
    //   echo $t_tx;
        }else{
           $t_tx=0;
        }
     //  echo $this->db->last_query();
   $query = $this->db->select("*")
                     ->from("tax_history")
                     ->where("employee_id",$data['employee_data'][0]['id'])
                     ->where("tax",$search_tax[1])
                     ->get();
   if($query->num_rows() > 1){
     $query = $this->db->select_sum("amount")
                     ->from("tax_history")
                     ->where("employee_id",$data['employee_data'][0]['id'])
                     ->where("tax",$search_tax[1])
                     ->get()->row()->amount;
                     //   echo $this->db->last_query();
                     $amt = $query;
     $local_sum[$search_tax[1]]=$amt;
   }else{
         $local_sum[$search_tax[1]]=$local_tax_ee;
   }
               $local_tax[$data_employee]=$t_tx;
            }
               $i++;
           }  
       }
                }
       }
   }
   }
  //   print_r($local_tax);
  //  // echo "<br/>";
  //   print_r($local_sum);
   // echo "<br/>";
           $ads_id = $data['timesheet_data'][0]['admin_name'];
           $adminis_data = $this->Hrm_model->administrator_info($ads_id);
           $s_tax = $this->db->select_sum("s_tax")->from("tax_history")->where("employee_id",$data['employee_data'][0]['id'])->get()->row()->s_tax;
$m_tax = $this->db->select_sum("m_tax")->from("tax_history")->where("employee_id",$data['employee_data'][0]['id'])->get()->row()->m_tax;               
$f_tax = $this->db->select_sum("f_tax")->from("tax_history")->where("employee_id",$data['employee_data'][0]['id'])->get()->row()->f_tax; 
$u_tax = $this->db->select_sum("u_tax")->from("tax_history")->where("employee_id",$data['employee_data'][0]['id'])->get()->row()->u_tax; 
$payslip_design=$this->db->select('*')->from('payslip_invoice_design')->where('user_id',$this->session->userdata('user_id'))->get()->result_array();
            $currency_details = $CI->Web_settings->retrieve_setting_editdata();
$data=array(
     'currency'  =>$currency_details[0]['currency'],
      'color'=> $dataw[0]['color'],
               'state_tax'=>$local_tax,
                  's_tax'=>(!empty($s_tax)?$s_tax:0),
               'm_tax'=>(!empty($m_tax)?$m_tax:0),
               'u_tax'=>(!empty($u_tax)?$u_tax:0),
               'f_tax'=>(!empty($f_tax)?$f_tax:0),
               's'=>$s,
               'f'=>$f,
               'u'=>$u,
               'm'=>$m,
   'sum'=>$local_sum,
           'company'=> $datacontent,
           'template' =>$payslip_design[0]['template'],
    'business_name'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),  
               'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),  
               'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),  
              'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),
          'logo'=>base_url().$company_info[0]['logo'],  
           'infotime' =>  $timesheetdata,
           'infoemployee' =>  $employeedata,
           'total' => $final,
           'adm_name'  => $adminis_data,
           'adm_address'=> $adminis_data,
       );
    //  echo "<br/>";
  
       
        // echo $this->db->last_query();
      //    print_r($local_tax);die();
           // echo $this->db->last_query();die();
         //  echo $this->db->last_query();
                $empid = $employeedata[0]['id'];
           $query=$this->db->select('*')->from('info_payslip')->where('id',$empid)->where('create_by',$this->session->userdata('user_id'))->get();
              if ($query->num_rows() > 1) {
           $info_datapay = $this->Hrm_model->get_data_pay($empid,$timesheetdata[0]['timesheet_id']);
               $total_hours = $info_datapay[0]['total_hours'];
               $addtime= $timesheetdata[0]['total_hours'];
               $data['overalltotalhours']=$total_hours + $addtime;
               $oatamount = $info_datapay[0]['total_amount'];
               $curamount= $final;
               $data['overalltotalamount']=$oatamount + $curamount;
              }else{
    $data['overalltotalhours']=$timesheetdata[0]['total_hours'];
       $data['overalltotalamount']=$final;
              }
               // $total_s_tax= $info_datapay[0]['s_tax']; $data['t_s'] = $info_datapay[0]['s_tax']+$s_tax;
               //  $total_m_tax= $info_datapay[0]['m_tax'];$data['t_m'] = $info_datapay[0]['m_tax']+$m_tax;
               //   $total_f_tax= $info_datapay[0]['f_tax'];$data['t_f']= $info_datapay[0]['f_tax']+$f_tax;
               //    $total_u_tax= $info_datapay[0]['u_tax'];    $data['t_u'] = $info_datapay[0]['u_tax']+$u_tax;
   //            foreach($local_tax as $k=>$v){
   //     $split=explode('-',$k);
   //   $tx_n=str_replace("'","",$split[1]);
   //            }
 
       $content = $this->parser->parse('hr/pay_slip', $data, true);
 
      $this->template->full_admin_html_view($content);
        }
     
     
     
public function updatepayslipinvoicedesign($id)
   {
     $query='update payslip_invoice_design set template='.$id;
     $this->db->query($query);
     redirect('Chrm/payslip_setting');
}

public function add_taxname_data(){
        $this->load->model('Hrm_model');
        $postData = $this->input->post('value');
        $data = $this->Hrm_model->insert_taxesname($postData);
     //   echo json_encode($data);
    }

public function payslip_setting() {
        $data['title'] = display('payslip');
        $CI = & get_instance();
        $CD = & get_instance();
        $CI->load->model('invoice_design');
        $CD->load->model('Companies');
        $CI->load->model('Web_settings');
        $CI->load->model('invoice_content');
       $setting_detail = $CI->Web_settings->retrieve_setting_editdata();
       $dataw = $CI->invoice_design->get_data_payslip();
       $datac = $CD->Companies->company_details();
           $datacontent = $CI->invoice_content->retrieve_data();
       $data= array(
            'header'=> (!empty($dataw[0]['header']) ? $dataw[0]['header'] : '') ,
        'logo'=> (!empty($dataw[0]['logo']) ? $dataw[0]['logo'] : '') ,
        'color'=> (!empty($dataw[0]['color']) ? $dataw[0]['color'] : '') ,
        'invoice_logo' =>(!empty($setting_detail[0]['invoice_logo']) ? $setting_detail[0]['invoice_logo'] : '') ,
        'address'=>(!empty($datacontent[0]['address']) ? $datacontent[0]['address'] : '') ,
        'cname'=>(!empty($datacontent[0]['business_name']) ? $datacontent[0]['business_name'] : '') ,
        'mobile'=>(!empty($datacontent[0]['phone']) ? $datacontent[0]['phone'] : '') ,
        'email'=>(!empty($datacontent[0]['email']) ? $datacontent[0]['email'] : '') ,
        // 'reg_number'=>(!empty($datacontent[0]['reg_number']) ? $datacontent[0]['reg_number'] : '') ,
        // 'website'=>(!empty($datacontent[0]['website']) ? $datacontent[0]['website'] : '') ,
        // 'address'=>(!empty($datacontent[0]['address']) ? $datacontent[0]['address'] : '') ,
        'template'=> (!empty($dataw[0]['template']) ? $dataw[0]['template'] : '')
   );
    // print_r($data);
        $content = $this->parser->parse('hr/payslip_view', $data, true);
        $this->template->full_admin_html_view($content);
        }














    public function employee_payslip_permission($id) {
        $this->load->model('Hrm_model');
         $data['title']            = display('Payment_Administration');
        $data['time_sheet_data'] = $this->Hrm_model->time_sheet_data($id);

        $data['employee_name'] = $this->Hrm_model->employee_name($data['time_sheet_data'][0]['templ_name']);
$data['designation'] = $this->db->select('designation')->from('employee_history')->where('id',$data['employee_name'][0]['id'])->get()->row()->designation;
        $data['payment_terms'] = $this->Hrm_model->get_payment_terms();
   

       $data['dailybreak'] = $this->Hrm_model->get_dailybreak();
       
       $data['duration'] = $this->Hrm_model->get_duration_data();

       $data['administrator'] = $this->Hrm_model->administrator_data();
       
     //  print_r($data);
   
         $content                  = $this->parser->parse('hr/emp_payslip_permission', $data, true);
         $this->template->full_admin_html_view($content);
        }
    



    public function officeloan_edit($transaction_id) {
            $this->load->model('Hrm_model');
            $CI = & get_instance();
            $CI->load->model('Web_settings');
            $CI->load->model('Invoices');
           $CI->load->model('Settings');

           $office_loan_datas = $this->Hrm_model->office_loan_datas($transaction_id);

         

           $bank_name = $CI->db->select('bank_id,bank_name')
           ->from('bank_add')
           ->get()
           ->result_array();
           $data['bank_list']   =  $CI->Web_settings->bank_list();
            
           
           $paytype=$CI->Invoices->payment_type();
           $CI = & get_instance();
           $CI->load->model('Web_settings');
 $selected_bank_name = $this->db->select('bank_name')->from('bank_add')->where('bank_id',$office_loan_datas[0]['bank_name'])->get()->row()->bank_name;

        
           $data['payment_typ']  =$paytype;
           $data['bank_name']  =$bank_name;
          
        //    print_r( $data['bank_name']);
        $person_listdaa =  $CI->Settings->office_loan_person();

           $data=array(
            'id' =>$office_loan_datas[0]['id'],
            'person_id' =>$office_loan_datas[0]['person_id'],
            'date'  =>$office_loan_datas[0]['date'],
            'debit' => $office_loan_datas[0]['debit'],
            'details' => $office_loan_datas[0]['details'],
            'phone' => $office_loan_datas[0]['phone'],
           'paytype' => $office_loan_datas[0]['paytype'],
           'bank_name1' => $office_loan_datas[0]['bank_name'],
             'selected_bank_name' =>$selected_bank_name,
           'transaction_id' => $office_loan_datas[0]['transaction_id'],
           'person_list' =>$person_listdaa ,

           'bank_name' =>$bank_name,
           'payment_typ' =>$paytype,

           'tran_id' =>$transaction_id,


           );

        //  print_r($data); 

             $content                  = $this->parser->parse('hr/edit_officeloan', $data, true);
             $this->template->full_admin_html_view($content);
            }



// Delete Expense
    public function delete_expense($id = null)
    {
        // echo $id; die();
        $this->db->where('id', $id);
        $this->db->delete('expense');
        redirect('Chrm/expense_list');
        $this->template->full_admin_html_view($content);
    }
    // Edit Expense Data
    public function edit_expense($id)
    {
       $this->load->library('lsettings');
       $content = $this->lsettings->expense_show_by_id($id);
       $this->template->full_admin_html_view($content);
    }











    // Pdf Download Expenses
    public function expense_download($id)
    {
        $CI = & get_instance();
        $CC = & get_instance();
        $CA = & get_instance();
        $CI->load->model('Web_settings');
        $CI->load->model('Hrm_model');
        $CA->load->model('invoice_design');
        $CC->load->model('invoice_content');
        $CI->load->model('invoice_content');
        $w = & get_instance();
        $w->load->model('Ppurchases');
        $company_info = $w->Ppurchases->retrieve_company();
        $expense_pdf = $CI->Hrm_model->pdf_expense($id);
         // print_r($expense_pdf);
        $setting=  $CI->Web_settings->retrieve_setting_editdata();
        $dataw = $CA->invoice_design->retrieve_data();
        // print_r($dataw); die();
        // $datacontent = $CC->invoice_content->retrieve_data();
        $datacontent = $CI->invoice_content->retrieve_info_data();

        $currency_details = $CI->Web_settings->retrieve_setting_editdata();
        $curn_info_default = $CI->db->select('*')->from('currency_tbl')->where('icon',$currency_details[0]['currency'])->get()->result_array();
        $data=array(
            'curn_info_default' =>$curn_info_default[0]['currency_name'],
            'currency'  =>$currency_details[0]['currency'],
            'header'=> $dataw[0]['header'],
            'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  
            'color'=> $dataw[0]['color'],
            'template'=> $dataw[0]['template'],
            'company'=> $datacontent,
            'expense_pdf' => $expense_pdf,

            
          'company'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
          'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
          'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
          // 'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:$company_info[0]['reg_number']),  
          'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
          'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address'])
        );
        print_r($dataw[0]['color']);

        $content = $this->load->view('hr/expense_html_pdf', $data, true);
        $this->template->full_admin_html_view($content);
    }













    public function update_expense($id)
    {
       $this->load->library('lsettings');
       $content = $this->lsettings->update_expense_id($id);
       $this->template->full_admin_html_view($content);
        redirect('Chrm/expense_list');
    }
   // Expense Insert data
    public function create_expense()
    {
        $this->form_validation->set_rules('expense_name',display('expense_name'),'required|max_length[100]');
        $this->form_validation->set_rules('expense_date',display('expense_date'),'required|max_length[100]');
        $this->form_validation->set_rules('expense_payment_date',display('expense_payment_date'),'required|max_length[100]');
         $postData = [
            'expense_name'    => $this->input->post('expense_name',true),
            'expense_date'     => $this->input->post('expense_date',true),
            'expense_amount'   => $this->input->post('expense_amount',true),
            'total_amount'         => $this->input->post('total_amount',true),
            'expense_payment_date'     => $this->input->post('expense_payment_date',true),
            'description'         => $this->input->post('description',true),
            'create_by' => $this->session->userdata('user_id')

            
        ];
        $this->db->insert('expense',$postData);
        // echo $this->db->last_query(); die();
        redirect(base_url('Chrm/expense_list'));
    }




            public function office_loan_inserthtml($transaction_id) {
                $CC = & get_instance();
                $CA = & get_instance();
                $CI = & get_instance();
                $CI->auth->check_admin_auth();
      
                $CI->load->model('invoice_content');
                $w = & get_instance();
                $w->load->model('Ppurchases');
                $CI->load->model('Invoices');
                $CI->load->model('Web_settings');
                $CA->load->model('invoice_design');
                $CC->load->model('invoice_content');
                $this->load->model('Hrm_model');


                $company_info = $w->Ppurchases->retrieve_company();



                 $office_loan_datas = $this->Hrm_model->office_loan_datas($transaction_id);
                 $datacontent = $CC->invoice_content->retrieve_data();
                 $dataw = $CA->invoice_design->retrieve_data();
                 $setting=  $CI->Web_settings->retrieve_setting_editdata();

                 $data=array(
                //     'curn_info_default' =>$curn_info_default[0]['currency_name'],
                //     'currency'  =>$currency_details[0]['currency'],
                    'header'=> $dataw[0]['header'],
                    'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  
                    'color'=> $dataw[0]['color'],
                    'template'=> $dataw[0]['template'],

                   'person_id'      => $office_loan_datas[0]['person_id'],
                    'date'     => $office_loan_datas[0]['date'],
                    'debit'   => $office_loan_datas[0]['debit'],
                    'details'   => $office_loan_datas[0]['details'],
                    'phone'   => $office_loan_datas[0]['phone'],
                    'paytype'   => $office_loan_datas[0]['paytype'],
                    'paytype'   => $office_loan_datas[0]['paytype'],
                    'paytype'   => $office_loan_datas[0]['paytype'],

                    'company'=> $datacontent,


                    'company'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
                    'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
                    'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
                    // 'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:$company_info[0]['reg_number']),  
                    'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
                    'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),


                    'office_loan_datas' => $office_loan_datas
                );

                // print_r($office_loan_datas); die();

                print_r($dataw[0]['color']);

                $content = $this->load->view('hr/office_loan_html', $data, true);
                $this->template->full_admin_html_view($content);
                }







                public function time_sheet_pdf($id) {
                  $CI = & get_instance();
                      $CC = & get_instance();
                      $CA = & get_instance();
           
                      $w = & get_instance();
                      $w->load->model('Ppurchases');
                    //  $CI->load->model('Invoices');
                      $CI->load->model('Web_settings');
                      $CA->load->model('invoice_design');
                      $CC->load->model('invoice_content');
                      $CI = & get_instance();
                      $this->auth->check_admin_auth();
                      $CI->load->model('Hrm_model');
                         $pdf = $CI->Hrm_model->time_sheet_data($id);
                         $company_info = $w->Ppurchases->retrieve_company();

                          $employee_data = $this->db->select('first_name,last_name,designation')->from('employee_history')->where('id',$pdf[0]['templ_name'])->get()->row();
                         $setting=  $CI->Web_settings->retrieve_setting_editdata();
                         $dataw = $CA->invoice_design->retrieve_data();
                         $datacontent = $CC->invoice_content->retrieve_data();
                         $data=array(
                       
                        
                          'header'=> $dataw[0]['header'],
                          'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  
                          'color'=> $dataw[0]['color'],
                          'template'=> $dataw[0]['template'],
                           'company'=> $datacontent,
                          'employee_name' => $employee_data->first_name." ".$employee_data->last_name,
                          'destination'  => $employee_data->designation,
                         
                          'company'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
                          'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
                          'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
                          // 'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:$company_info[0]['reg_number']),  
                          'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
                          'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),
      
      
                          'time_sheet' =>$pdf
           
                           );
                           // print_r($data);
                           print_r($dataw[0]['color']);
           
                         $content = $this->load->view('hr/timesheet_pdf', $data, true);
                  $this->template->full_admin_html_view($content);   
           
           }






           public function timesheed_inserted_data($id) {
            //    echo $id; die();
               $CI = & get_instance();
               $CC = & get_instance();
               $CA = & get_instance();
    
               $w = & get_instance();
               $w->load->model('Ppurchases');
               $CI->load->model('Invoices');
               $CI->load->model('Web_settings');
               $CA->load->model('invoice_design');
               $CC->load->model('invoice_content');
               $CI = & get_instance();
               $this->auth->check_admin_auth();
               $CI->load->model('Hrm_model');
                  $timesheet_data = $CI->Hrm_model->timesheet_data($id);
                  $setting=  $CI->Web_settings->retrieve_setting_editdata();
                  $dataw = $CA->invoice_design->retrieve_data();
                  $datacontent = $CC->invoice_content->retrieve_data();
                  $company_info = $w->Ppurchases->retrieve_company();

                  // $invoice_data_info = $CC->invoice_content->invoice_data_info();
    
                  
                  // print_r()
    
                   $data=array(
                   'curn_info_default' =>$curn_info_default[0]['currency_name'],
                   'currency'  =>$currency_details[0]['currency'],
                   'header'=> $dataw[0]['header'],
                   'logo'=>(!empty($setting[0]['invoice_logo'])?$setting[0]['invoice_logo']:$company_info[0]['logo']),  
                   'color'=> $dataw[0]['color'],
                   'template'=> $dataw[0]['template'],
                  'first_name'      => $timesheet_data[0]['first_name'],
                   'last_name'     => $timesheet_data[0]['last_name'],
                   'designation'   => $timesheet_data[0]['designation'],
                   'phone'            => $timesheet_data[0]['phone'],
                   'rate_type' => $timesheet_data[0]['rate_type'],
                   'hrate' => $timesheet_data[0]['hrate'],
                   'email'=> $timesheet_data[0]['email'],
                   'blood_group'=> $timesheet_data[0]['blood_group'],
                   'social_security_number'=> $timesheet_data[0]['social_security_number'],
                   'routing_number'=> $timesheet_data[0]['routing_number'],
                   'address_line_1'=> $timesheet_data[0]['address_line_1'],
                   'address_line_2'=> $timesheet_data[0]['address_line_2'],
                   'country'=> $timesheet_data[0]['country'],
                   'city'=> $timesheet_data[0]['city'],
                   'zip'=> $timesheet_data[0]['zip'],
                   'company'=> $datacontent,
                   'invoice_data_info'=> $invoice_data_info,
    
                   'company'=>(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']),   
                   'phone'=>(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']),   
                   'email'=>(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']),   
                   // 'reg_number'=>(!empty($datacontent[0]['reg_number'])?$datacontent[0]['reg_number']:$company_info[0]['reg_number']),  
                   'website'=>(!empty($datacontent[0]['website'])?$datacontent[0]['website']:$company_info[0]['website']),   
                   'address'=>(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']),

    
               );
                // print_r($data);
                print_r($dataw[0]['color']);
                // $timesheet_data[0]['first_name']
           $content = $this->load->view('invoice/employe_timesheet_html', $data, true);
           $this->template->full_admin_html_view($content);
           }
    


                public function office_loan_delete($transaction_id){

                    $this->load->model('Hrm_model');
                    $this->Hrm_model->delete_off_loan($transaction_id);
                    $this->session->set_userdata(array('message' => display('successfully_delete')));
                   redirect("Chrm/manage_officeloan");
            
                }
            

                



        public function manage_timesheet() {
            $this->load->model('Hrm_model');
             $data['title']            = display('manage_employee');
             $data['timesheet_list']    = $this->Hrm_model->timesheet_list();
         
             $content                  = $this->parser->parse('hr/timesheet_list', $data, true);
            $this->template->full_admin_html_view($content);
            }
    
    










            public function manage_officeloan() {
                $this->load->model('Hrm_model');
                $data['title']            = display('manage_employee');

                 $data['office_loan_list']    = $this->Hrm_model->office_loan_list();

 
                 $content                  = $this->parser->parse('hr/officeloan_list', $data, true);
                $this->template->full_admin_html_view($content);
                }
        






    public function add_dailybreak_info(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Hrm_model');
        $postData = $this->input->post('dailybreak_name');
        // print_r($postData);
        $data = $this->Hrm_model->insert_dailybreak_data($postData);
        echo json_encode($data);
    }
    
    


public function timesheet_delete($id){
  $this->db->where('timesheet_id',$id);
  $this->db->delete('timesheet_info');
    $this->db->delete('timesheet_info_details');
    $this->session->set_flashdata('message', "Deleted Successfully");
       redirect("Chrm/manage_timesheet");
}




public function pay_slip() {
  $CI = & get_instance();
  $CI->load->model('invoice_content');
       $w = & get_instance();
       $w->load->model('Ppurchases');
       $company_info = $w->Ppurchases->retrieve_company();
  $datacontent = $CI->invoice_content->retrieve_data();
   $this->load->model('Hrm_model');
   $data['title'] = display('pay_slip');
     $data['business_name']=(!empty($datacontent[0]['company_name'])?$datacontent[0]['company_name']:$company_info[0]['company_name']);
          $data['phone']=(!empty($datacontent[0]['mobile'])?$datacontent[0]['mobile']:$company_info[0]['mobile']);
          $data['email']=(!empty($datacontent[0]['email'])?$datacontent[0]['email']:$company_info[0]['email']);
           $data['address']=(!empty($datacontent[0]['address'])?$datacontent[0]['address']:$company_info[0]['address']);
       $data_timesheet['total_hours'] = $this->input->post('total_net');
       $data_timesheet['templ_name'] = $this->input->post('templ_name');
       $data_timesheet['duration'] = $this->input->post('duration');
       $data_timesheet['job_title'] = $this->input->post('job_title');
       $data_timesheet['dailybreak'] = $this->input->post('dailybreak');
       $data_timesheet['payment_term'] = $this->input->post('payment_term');
       $data_timesheet['month'] = $this->input->post('date_range');
       $data_timesheet['timesheet_id'] =  $this->input->post('tsheet_id');
       $data_timesheet['create_by'] =$this->session->userdata('user_id');
       $data_timesheet['admin_name'] = (!empty($this->input->post('administrator_person',TRUE))?$this->input->post('administrator_person',TRUE):'');
       $data_timesheet['payment_method'] =(!empty($this->input->post('payment_method',TRUE))?$this->input->post('payment_method',TRUE):'');
       $data_timesheet['cheque_no'] =(!empty($this->input->post('cheque_no',TRUE))?$this->input->post('cheque_no',TRUE):'');
       $data_timesheet['cheque_date'] =(!empty($this->input->post('cheque_date',TRUE))?$this->input->post('cheque_date',TRUE):'');
         $data_timesheet['bank_name'] =(!empty($this->input->post('bank_name',TRUE))?$this->input->post('bank_name',TRUE):'');
           $data_timesheet['payment_ref_no'] =(!empty($this->input->post('payment_refno',TRUE))?$this->input->post('payment_refno',TRUE):'');
       if(!empty($this->input->post('administrator_person',TRUE))){
            $data_timesheet['uneditable']=1;
       }else{
             $data_timesheet['uneditable']=0;
       }
  $employee_detail = $this->db->where('id', $this->input->post('templ_name'));
  $q=$this->db->get('employee_history');
    //  echo $this->db->last_query();
       $row = $q->row_array();
   if(!empty($row['id'])){
$data['templ_name']=$row['first_name']." ".$row['last_name'];
$data['job_title']=$row['designation'];
   }
        $date1 = $this->input->post('date');
       $day1 = $this->input->post('day');
       $time_start1 = $this->input->post('start');
       $time_end1 = $this->input->post('end');
       $hours_per_day1 = $this->input->post('sum');
              $purchase_id_1 = $this->db->where('templ_name', $this->input->post('templ_name'))->where('month', $this->input->post('date_range'));
       $q=$this->db->get('timesheet_info');
    //    echo $this->db->last_query();
       $row = $q->row_array();
       $old_id=trim($row['timesheet_id']);
   if(!empty($old_id)){
       $this->session->set_userdata("timesheet_id_old",$row['timesheet_id']);
  $this->db->where('timesheet_id', $this->session->userdata("timesheet_id_old"));
 $this->db->delete('timesheet_info');
     $this->db->where('timesheet_id', $this->session->userdata("timesheet_id_old"));
       $this->db->delete('timesheet_info_details');
 //  echo $this->db->last_query();
      $this->db->insert('timesheet_info', $data_timesheet);
   //  echo $this->db->last_query();
  }
   else{
   $this->db->insert('timesheet_info', $data_timesheet);
 //  echo $this->db->last_query();
   }
   $purchase_id_2 = $this->db->select('timesheet_id')->from('timesheet_info')->where('templ_name',$this->input->post('templ_name'))->where('month', $this->input->post('date_range'))->get()->row()->timesheet_id;
  // echo $this->db->last_query();
   $this->session->set_userdata("timesheet_id_new",$purchase_id_2);
   
  //   echo $this->db->last_query();
        for ($i = 0, $n = count($date1); $i < $n; $i++) {
           $date = $date1[$i];
           $day = $day1[$i];
           $time_start = $time_start1[$i];
           $time_end = $time_end1[$i];
           $hours_per_day = $hours_per_day1[$i];
           $data1 = array(
             'timesheet_id' =>$this->session->userdata("timesheet_id_new"),
               'Date'    => $date,
               'Day'      => $day,
               'time_start'  => $time_start,
               'time_end'   =>  $time_end,
               'hours_per_day' => $hours_per_day,
               'created_by' => $this->session->userdata('user_id')
       );
          $this->db->insert('timesheet_info_details', $data1);
 //echo $this->db->last_query();
   // $content = $this->parser->parse('hr/pay_slip', $data, true);
   // $this->template->full_admin_html_view($content);
   }
       $data['employee_data'] = $this->Hrm_model->employee_info($this->input->post('templ_name'));
       $data['timesheet_data'] = $this->Hrm_model-> timesheet_info_data($this->session->userdata("timesheet_id_new"));
       $timesheetdata =$data['timesheet_data'];
       $employeedata  =$data['employee_data'];
       $hrate= $data['employee_data'][0]['hrate'];
       $total_hours=  $data['timesheet_data'][0]['total_hours'];
       $final=$hrate *$total_hours;
       // Federal Income Tax
       $federal_tax = $this->db->select('*')->from('federal_tax')->where('tax','Federal Income tax')->get()->result_array();
       $federal_range='';
       $f_tax='';
       foreach($federal_tax as $amt){
          $split=explode('-',$amt[$data['employee_data'][0]['employee_tax']]);
           if($final > $split[0] && $final < $split[1]){
             $federal_range=$split[0]."-".$split[1];
           }
           }
       $data['federal'] = $this->Hrm_model->federal_tax_info($data['employee_data'][0]['employee_tax'],$final,$federal_range);
       if(!empty($data['federal'])){
       $Federal_employee= $data['federal'][0]['employee'];
        $f=($Federal_employee/100)*$final;
     //   echo "<br/>";
      //  echo "f :".$f;echo "<br/>";
           $ar = $this->db->select('f_tax')->from('tax_history')->where('employee_id',$this->input->post('templ_name'))->get()->row()->f_tax;
           // echo $this->db->last_query();
              
       
        $f_tax=$ar+$f;
    //     echo "f_tax :". $f_tax;echo "<br/>";
        
       }
       //Social Security
       $social_tax = $this->db->select('*')->from('federal_tax')->where('tax','Social Security')->get()->result_array();
       $social_range='';
       $s_tax='';
          $split=explode('-',$social_tax[0][$data['employee_data'][0]['employee_tax']]);
           if($final > $split[0] && $final < $split[1]){
          $social_range=$split[0]."-".$split[1];
           }
       $data['social'] = $this->Hrm_model->social_tax_info($data['employee_data'][0]['employee_tax'],$final,$social_range);
       if(!empty($data['social'][0]['employee'])){
       $social_employee= $data['social'][0]['employee'];
         $s=($social_employee/100)*$final;
        //  echo "<br/>";
    //    echo "s :".$s;echo "<br/>";
          $ar = $this->db->select('s_tax')->from('tax_history')->where('employee_id',$this->input->post('templ_name'))->get()->row()->s_tax;
        
       
          $s_tax=$ar+$s;
         
 }
          //Medicare
       $Medicare = $this->db->select('*')->from('federal_tax')->where('tax','Medicare')->get()->result_array();
       $Medicare_range='';
       $m_tax='';
       foreach($Medicare as $social_amt){
          $split=explode('-',$social_amt[$data['employee_data'][0]['employee_tax']]);
           if($final > $split[0] && $final < $split[1]){
          $Medicare_range=$split[0]."-".$split[1];
           }
           }
       $data['Medicare'] = $this->Hrm_model->Medicare_tax_info($data['employee_data'][0]['employee_tax'],$final,$Medicare_range);
       if(!empty($data['Medicare'])){
       $Medicare_employee= $data['Medicare'][0]['employee'];
       $m=($Medicare_employee/100)*$final;
    //     echo "<br/>";
     //   echo "m :".$m;echo "<br/>";
           $ar = $this->db->select('m_tax')->from('tax_history')->where('employee_id',$this->input->post('templ_name'))->get()->row()->m_tax;
        
       
           $m_tax=$ar+$m;
       
         //   echo "m_tax :". $m_tax;echo "<br/>";
          
         //  $m_tax=$ar+$m;
       }
       //Federal unemployment
       $unemployment = $this->db->select('*')->from('federal_tax')->where('tax','Federal unemployment')->get()->result_array();
       $unemployment_range='';
       $u_tax='';
       foreach($unemployment as $social_amt){
          $split=explode('-',$social_amt[$data['employee_data'][0]['employee_tax']]);
           if($final > $split[0] && $final < $split[1]){
          $unemployment_range=$split[0]."-".$split[1];
           }
           }
       $data['unemployment'] = $this->Hrm_model->unemployment_tax_info($data['employee_data'][0]['employee_tax'],$final,$unemployment_range);
       if(!empty($data['unemployment'])){
       $unemployment_employee= $data['Medicare'][0]['employee'];
          $u=($unemployment_employee/100)*$final;
       //     echo "<br/>";
     //   echo "u :".$u;echo "<br/>";
          $ar = $this->db->select('u_tax')->from('tax_history')->where('employee_id',$this->input->post('templ_name'))->get()->row()->u_tax;
          
        
          $u_tax=$ar+$u;
          
       }

$state_tax = $this->db->select('*')->from('state_and_tax')->where('Status','1')->get()->result_array();
$state= $this->db->select('*')->from('state_and_tax')->where('state',$state_tax[0]['state'])->get()->result_array();
$tax_split=explode(',',$state[0]['tax']);
//print_r($state);
$local_tax_range='';
       $local_tax='';
    $local_tax=array();
foreach($tax_split as $tax){
   $tax=$this->db->select('*')->from('state_localtax')->where('tax',$state_tax[0]['state']."-".$tax)->get()->result_array();
foreach($tax as $tx){
          $split=explode('-',$tx[$data['employee_data'][0]['employee_tax']]);
       if($split[0] && $split[1]){
           if($final > $split[0] && $final < $split[1]){
      $local_tax_range=$split[0]."-".$split[1];
     $data['localtax'] = $this->Hrm_model->local_state_tax($data['employee_data'][0]['employee_tax'],$final,$local_tax_range);
       if(!empty( $data['localtax'])){
           $i=0;
            foreach( $data['localtax'] as $lt){
    $local_tax_employee=$lt['employee'];
    $local_tax_employer=$lt['employer'];
        $local_tax_ee=($local_tax_employee/100)*$final;
          $local_tax_er=($local_tax_employer/100)*$final;
   $row = $this->db->select('*')->from('state_localtax')->where('employee',$local_tax_employee)->where('tax',$tx['tax'])->where($data['employee_data'][0]['employee_tax'],$local_tax_range)->count_all_results();
  // echo $this->db->last_query();    
   $data_employee="'employee_".$tx['tax']."'";
         $search_tax=explode('-',$tx['tax']);
      if($row==1){
   $ar = $this->db->select('tax_amount')->from('info_payslip')->where('tax',$search_tax[1])->where('timesheet_id',$timesheetdata[0]['timesheet_id'])->get()->row()->tax_amount;
   $t_tx=$ar+$local_tax_ee;
//   echo $this->db->last_query();
           $local_tax[$data_employee]=$t_tx;
        }
           $i++;
       }
   }
            }
   }
}
}


         $test2= $this->db->select('*')->from('info_payslip')->where('timesheet_id',$timesheetdata[0]['timesheet_id'])
          ->get()->row();
       //  print_r($test);die();
   //    echo $this->db->last_query();
        if(!empty($test2->timesheet_id)) {
       $this->db->where('timesheet_id',$test2->timesheet_id);
       $this->db->delete('info_payslip');
      // echo $this->db->last_query();
        }

//echo "<br/>";
//print_r($local_tax);
///echo "<br/>";
 $test= $this->db->select('time_sheet_id')->from('tax_history')->where('time_sheet_id',$timesheetdata[0]['timesheet_id'])
        ->get()->row();
   //  print_r($test);die();
    if(!empty($test->time_sheet_id)) {
   $this->db->where('time_sheet_id',$test->time_sheet_id);
   $this->db->delete('tax_history');
    }

if($local_tax){
foreach($local_tax as $k=>$v){
   $split=explode('-',$k);
 $tx_n=str_replace("'","",$split[1]);
$data1 = array(
           's_tax'=>$s,
           'm_tax'=>$m,
           'u_tax'=>$u,
           'f_tax'=>$f,
           'tax'  => $tx_n,
           'amount' => $v,
       'time_sheet_id'   => $timesheetdata[0]['timesheet_id'],
       'employee_id'     => $timesheetdata[0]['templ_name'],
       // 'month'          => $timesheetdata[0]['month'],
        'created_by'     => $this->session->userdata('user_id'),
      );
    $this->db->insert('tax_history',$data1);
  // echo $this->db->last_query();
   }
 }else{ 
$data1 = array(
           's_tax'=>$s,
           'm_tax'=>$m,
           'u_tax'=>$u,
           'f_tax'=>$f,
           'tax'  =>'',
           'amount' => '',
       'time_sheet_id'   => $timesheetdata[0]['timesheet_id'],
       'employee_id'     => $timesheetdata[0]['templ_name'],
       // 'month'          => $timesheetdata[0]['month'],
        'created_by'     => $this->session->userdata('user_id'),
      );
    $this->db->insert('tax_history',$data1);
 //  echo $this->db->last_query();
 }
 $data2 = array(
           // 's_tax'=>$s_tax,
           // 'm_tax'=>$m_tax,
           // 'u_tax'=>$u_tax,
           // 'f_tax'=>$f_tax,
           // 'tax'  => $tx_n,
           // 'tax_amount' => $v,
       'total_amount'          => $final,
       'timesheet_id'   => $timesheetdata[0]['timesheet_id'],
       'total_hours'    => $timesheetdata[0]['total_hours'],
       'templ_name'     => $timesheetdata[0]['templ_name'],
       'employee_tax'   => $employeedata[0]['employee_tax'],
       'hrate'          => $employeedata[0]['hrate'],
       'id'             => $employeedata[0]['id'],
       // 'month'          => $timesheetdata[0]['month'],
        'create_by'     => $this->session->userdata('user_id'),
      );
    $this->db->insert('info_payslip',$data2);
       //echo $this->db->last_query();
       $this->session->set_flashdata('message', display('save_successfully'));
     redirect("Chrm/manage_timesheet");
 }


        








    public function expense_list()
    {
       $data['expen_list'] = $this->db->select('*')->from('expense')->get()->result_array();
       // print_r($data['expen_list']);
       $content = $this->parser->parse('hr/expense_list', $data, true);
       $this->template->full_admin_html_view($content);
    }




    public function pay_slip_list() {
    $data['title'] = display('pay_slip_list');

    $this->load->model('Hrm_model');

    $datainfo = $this->Hrm_model->get_data_payslip();

    $data=array(
        'dataforpayslip' => $datainfo,
   );

    $content = $this->parser->parse('hr/pay_slip_list', $data, true);

      
    $this->template->full_admin_html_view($content);
    }







    public function  payroll_reports() {
      $this->load->model('Hrm_model');
      $data['title']            = display('payroll_manage');

      $datainfo = $this->Hrm_model->get_data_payslip();
      $emplinfo = $this->Hrm_model->empl_data_info();
      $data=array(
          'dataforpayslip' => $datainfo,
          'employee_info' => $emplinfo,

     );
  // print_r($emplinfo); 
  // die();
      $content                  = $this->parser->parse('hr/payroll_manage_list', $data, true);
      $this->template->full_admin_html_view($content);
      }





public function add_state(){
  $CI = & get_instance();
$state_name = $this->input->post('state_name');
        $data=array(
             'state' => $state_name,
             'created_by' => $this->session->userdata('user_id')
        );
      $this->db->insert('state_and_tax', $data);
      $this->session->set_userdata(array('message' => 'New State Added Successfully'));
     redirect("Chrm/payroll_setting");
}
public function add_state_tax(){
  $CI = & get_instance();
$tx = $this->input->post('state_tax_name');
$selected_state = $this->input->post('selected_state');

 $this->db->where('state', $selected_state);
 $this->db->set('tax', "CONCAT(tax,',','".$tx."')", FALSE); 
 $this->db->update('state_and_tax'); 
 $query = $this->db->get();

$sql1="UPDATE state_and_tax
SET tax = TRIM(BOTH ',' FROM tax)";
$query1=$this->db->query($sql1);
 //echo $this->db->last_query();
 $this->session->set_userdata(array('message' =>'New Tax Has been assigned Successfully'));
 redirect("Chrm/payroll_setting");
}

public function add_designation_data(){
        $this->load->model('Hrm_model');
        $postData = $this->input->post('designation');
        $data = $this->Hrm_model->designation_info($postData);
        echo json_encode($data);
    }




        public function add_office_loan() {
              $CI = & get_instance();
        $CI->load->model('Web_settings');
          $CI->load->model('Invoices');
         $CI->load->model('Settings');
         $data['person_list'] =  $CI->Settings->office_loan_person();
  
         $bank_name = $CI->db->select('bank_id,bank_name')
        ->from('bank_add')
        ->get()
        ->result_array();
         $data['bank_list']   =  $CI->Web_settings->bank_list();
           $paytype=$CI->Invoices->payment_type();
        $CI = & get_instance();
  
  
  
    $CI->load->model('Web_settings');
       $data['payment_typ']  =$paytype;
         $data['bank_name']  =$bank_name;
    $currency_details    = $CI->Web_settings->retrieve_setting_editdata();
             $data['title'] = display('add_office_loan');
             $data['currency']=  $currency_details[0]['currency'];
  $content = $this->parser->parse('hr/add_office_loan', $data, true);
    $this->template->full_admin_html_view($content);

    }


    public function add_expense_item()
    {
        $CI = & get_instance();
        $CI->load->model('Web_settings');
        $currency_details    = $CI->Web_settings->retrieve_setting_editdata();
        $data['title'] = display('expense_item_form');
        $data['currency']=  $currency_details[0]['currency'];
    $content = $this->parser->parse('hr/expense_item_form', $data, true);
    $this->template->full_admin_html_view($content);
    }



    public function tax_list() {
    $data['title'] = display('tax_list');
    $content = $this->parser->parse('hr/payroll_setting', $data, true);
    $this->template->full_admin_html_view($content);
    }

     public function payroll_setting() {
    $data['title'] = display('federal_taxes');
     $data['states_list'] = $this->db->select("state,tax")->from('state_and_tax')->where('created_by',$this->session->userdata('user_id'))->get()->result_array();
    $content = $this->parser->parse('hr/federal_taxes', $data, true);
    $this->template->full_admin_html_view($content);
    }
public function delete_tax() {
  
$tax= $this->input->post('tax');
$state= $this->input->post('state');
 $this->load->model('Hrm_model');
    $this->Hrm_model->delete_tax($tax,$state);
        $this->session->set_flashdata('show', display('successfully_delete'));
      
    
     
        // alert('Successfully Delete');
     // redirect('Cinvoice/manage_invoice');
  //  $this->session->set_userdata(array('message' => display('successfully_delete')));
     redirect("Chrm/payroll_setting");
}




public function getemployee_data(){
    $CI = & get_instance();
    $this->auth->check_admin_auth();
    $CI->load->model('Hrm_model');
    $value = $this->input->post('value',TRUE);
    $customer_info = $CI->Hrm_model->getemp_data($value);
 
    echo json_encode($customer_info);
    
}








public function add_state_taxes_detail($tax=0) {
    
    $data['taxinfo'] = $this->db->select("*")->from('state_localtax')->where('tax',$tax)->get()->result_array();
    // $data['taxinfo'] = $this->db->select("*")->from('federal_tax')->where('tax',$tax)->get()->result_array();
    //print_r($data['taxinfo']); 
    // echo $this->db->last_query(); die();
    $data['title'] = display('add_taxes_detail');
    $content = $this->parser->parse('hr/add_state_tax_detail', $data, true);
    $this->template->full_admin_html_view($content);
    // echo json_encode($data);
    }
   public function add_taxes_detail() {
     $tax = $this->input->post('tax');
    $data['taxinfo'] = $this->db->select("*")->from('federal_tax')->get()->result_array();
    // $data['taxinfo'] = $this->db->select("*")->from('federal_tax')->where('tax',$tax)->get()->result_array();
    // print_r($data['taxinfo']); die();
    // echo $this->db->last_query(); die();
    $data['title'] = display('add_taxes_detail');
    $content = $this->parser->parse('hr/add_taxes_detail', $data, true);
    $this->template->full_admin_html_view($content);
    // echo json_encode($data);
    }
    public function socialsecurity_detail() {
    // $tax = $this->input->post('tax');
    $data['taxinfo'] = $this->db->select("*")->from('federal_tax')->get()->result_array();
    $data['title'] = display('add_taxes_detail');
    $content = $this->parser->parse('hr/social_security_list', $data, true);
    $this->template->full_admin_html_view($content);
    }
    public function medicare_detail() {
    $data['taxinfo'] = $this->db->select("*")->from('federal_tax')->get()->result_array();
    $data['title'] = display('add_taxes_detail');
    $content = $this->parser->parse('hr/medicare_list', $data, true);
    $this->template->full_admin_html_view($content);
    }
    public function federalunemployment_detail() {
    $data['taxinfo'] = $this->db->select("*")->from('federal_tax')->get()->result_array();
    $data['title'] = display('add_taxes_detail');
    $content = $this->parser->parse('hr/federalunemployment_list', $data, true);
    $this->template->full_admin_html_view($content);
    }


     public function add_timesheet() {
    $data['title'] = display('add_timesheet');
    
        $this->load->model('Hrm_model');

        $data['employee_name'] = $this->Hrm_model->employee_name1();

         $data['payment_terms'] = $this->Hrm_model->get_payment_terms();
    

        $data['dailybreak'] = $this->Hrm_model->get_dailybreak();
        
        $data['duration'] = $this->Hrm_model->get_duration_data();
    
        $content = $this->parser->parse('hr/add_timesheet', $data, true);
        $this->template->full_admin_html_view($content);
        }
    

        public function add_durat_info(){
            $CI = & get_instance();
            $CI->auth->check_admin_auth();
            $CI->load->model('Hrm_model');
            $postData = $this->input->post('duration_name');
            $data = $this->Hrm_model->insert_duration_data($postData);
            echo json_encode($data);
        }
    // $content = $this->parser->parse('hr/add_timesheet', $data, true);
    // $this->template->full_admin_html_view($content);
    // }

    public function add_adm_data(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Hrm_model');
        $postData = $this->input->post('data_name');
        $postData = $this->input->post('data_adres');

        //  print_r($postData); die();

        $data = $this->Hrm_model->insert_adsrs_data($postData);
        echo json_encode($data);
    }



    public function insert_data_adsr(){
        $CI = & get_instance();
        $CI->auth->check_admin_auth();
        $CI->load->model('Hrm_model');
    $data = array(
        'adm_name'   => $this->input->post('adms_name',TRUE),
        'adm_address'=> $this->input->post('address',TRUE),
        'create_by'       => $this->session->userdata('user_id'),
  );
  // print_r($data); die();
    // $result = $this->Customers->customer_entry($data);
    $data = $this->Hrm_model->insert_adsrs_data($data);
    echo json_encode($data);
    }








    //Designation form
    public function add_designation() {
    $data['title'] = display('add_designation');
    $content = $this->parser->parse('hr/employee_type', $data, true);
    $this->template->full_admin_html_view($content);
    }
    // create designation
    public function create_designation(){
    $this->form_validation->set_rules('designation',display('designation'),'required|max_length[100]');
    $this->form_validation->set_rules('details',display('details'),'max_length[250]');
        #-------------------------------#
        if ($this->form_validation->run()) {
            $postData = [
                'id'            => $this->input->post('id',true),
                'designation'   => $this->input->post('designation',true),
                'details'       => $this->input->post('details',true),
            ];   
           if(empty($this->input->post('id',true))){
            if ($this->Hrm_model->create_designation($postData)) { 
                $this->session->set_flashdata('message', display('save_successfully'));
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
        }else{
             if ($this->Hrm_model->update_designation($postData)) { 
                $this->session->set_flashdata('message', display('successfully_updated'));
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
           
        }
  redirect("Chrm/manage_designation");
        }
         redirect("Chrm/add_designation");
    }


    //Manage designation
    public function manage_designation() {
        $this->load->model('Hrm_model');
     $data['title']            = display('manage_designation');
     $data['designation_list'] = $this->Hrm_model->designation_list();
     $content                  = $this->parser->parse('hr/designation_list', $data, true);
    $this->template->full_admin_html_view($content);
    }

    //designation Update Form
    public function designation_update_form($id) {
    $this->load->model('Hrm_model');
     $data['title']            = display('designation_update_form');
     $data['designation_data'] = $this->Hrm_model->designation_editdata($id);
     $content                  = $this->parser->parse('hr/employee_type', $data, true);
     $this->template->full_admin_html_view($content);
    }

    // designation delete
    public function designation_delete($id) {
    $this->load->model('Hrm_model');
    $this->Hrm_model->delete_designation($id);
    $this->session->set_userdata(array('message' => display('successfully_delete')));
     redirect("Chrm/manage_designation");
    }
    // ================== Employee part ============================= 
  public function add_employee() {
    $this->auth->check_admin_auth();
    $this->load->model('Hrm_model');
    $data['title'] = display('add_employee');
    $data['desig'] = $this->Hrm_model->designation_dropdown();
    $data['paytype'] = $this->Hrm_model->paytype_dropdown();
    $data['desig'] = $this->Hrm_model->designation_dropdown();
    // print_r( $data['desig'] ); die();
    $content = $this->parser->parse('hr/employee_form', $data, true);
    $this->template->full_admin_html_view($content);
    }

   public function employee_create()
    {
        $config = array(
            'upload_path' => "assets/images/profile/",
            'allowed_types' => "gif|jpg|png|jpeg|pdf",
            'encrypt_name' => true
        );
        $this->load->library('upload',$config);
        if($this->upload->do_upload('image'))
        {
            $view = $this->upload->data();
            $image = base_url($config['upload_path'] . $view['file_name']);
        }else{
            $view = $this->upload->data();
            $image = base_url($config['upload_path'] . $view['file_name']);
        }
        $data_empolyee['last_name'] = $this->input->post('last_name');
        $data_empolyee['designation'] = $this->input->post('designation');
        $data_empolyee['first_name'] = $this->input->post('first_name');
        $data_empolyee['phone'] = $this->input->post('phone');
        $data_empolyee['image'] = $image;
        $data_empolyee['rate_type'] = $this->input->post('rate_type');
        $data_empolyee['email'] = $this->input->post('email');
        $data_empolyee['hrate'] = $this->input->post('hrate');
        $data_empolyee['address_line_1'] = $this->input->post('address_line_1');
        $data_empolyee['address_line_2'] = $this->input->post('address_line_2');
        $data_empolyee['blood_group'] = $this->input->post('blood_group');
        $data_empolyee['social_security_number'] = $this->input->post('ssn');
        $data_empolyee['routing_number'] = $this->input->post('routing_number');
        $data_empolyee['country'] = $this->input->post('country');
        $data_empolyee['city'] = $this->input->post('city');
        $data_empolyee['zip'] = $this->input->post('zip');

        $data_empolyee['employee_tax'] = $this->input->post('emp_tax_detail');

        $data_empolyee['create_by'] =$this->session->userdata('user_id');
    //     echo '<pre>';
    //    print_r($data_empolyee); exit();
    //    echo '</pre>';
       $this->db->insert('employee_history', $data_empolyee);
    //    echo $this->db->last_query(); exit();
       $this->session->set_flashdata('message', display('save_successfully'));
       redirect(base_url('Chrm/manage_employee'));
    }


    // create employee
//     public function create_employee(){
//         $this->load->model('Hrm_model');
        
//         echo '<pre>';
//        print_r($_POST);
//         echo '</pre>';
//         exit();

//      $this->form_validation->set_rules('first_name',display('first_name'),'required|max_length[100]');
//       $this->form_validation->set_rules('last_name',display('last_name'),'required|max_length[100]');
//       $this->form_validation->set_rules('designation',display('designation'),'required|max_length[100]');
//     $this->form_validation->set_rules('phone',display('phone'),'max_length[20]');
//      $this->form_validation->set_rules('hrate',display('salary'),'max_length[20]');
//         #-------------------------------#
//         if ($this->form_validation->run()) {
//          if ($_FILES['image']['name']) {
//             $config['upload_path'] = 'assets/images/employee/';
//             $config['allowed_types'] = 'gif|jpg|png';
//             $config['max_size'] = "*";
//             $config['max_width'] = "*";
//             $config['max_height'] = "*";
//             $config['encrypt_name'] = TRUE;

//             $this->load->library('upload', $config);
//             if (!$this->upload->do_upload('image')) {
//                 $error = array('error' => $this->upload->display_errors());
//                 $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
//                 redirect(base_url('Chrm/add_employee'));
//             } else {
//                 $image = $this->upload->data();
//                 $image_url = base_url() . "assets/images/employee/" . $image['file_name'];
//             }
//         }


//          $postData = [
//                 'first_name'    => $this->input->post('first_name',true),
//                 'last_name'     => $this->input->post('last_name',true),
//                 'designation'   => $this->input->post('designation',true),
//                 'phone'         => $this->input->post('phone',true),
//                 'image'         => $image_url,
//                 'rate_type'     => $this->input->post('rate_type',true),
//                 'email'         => $this->input->post('email',true),
//                 'hrate'         => $this->input->post('hrate',true),
//                 'address_line_1'=> $this->input->post('address_line_1',true),
//                 'address_line_2'=> $this->input->post('address_line_2',true),
//                 'blood_group'   => $this->input->post('blood_group',true),
//                 'social_security_number'   => $this->input->post('social_security_number',true),
//                 'routing_number'   => $this->input->post('routing_number',true),
//                 'country'       => $this->input->post('country',true),
//                 'city'          => $this->input->post('city',true),
//                 'zip'           => $this->input->post('zip',true),
//             ];   

//              if ($this->Hrm_model->create_employee($postData)) { 
//                 $this->session->set_flashdata('message', display('save_successfully'));
//                  redirect("Chrm/manage_employee");
//             } else {
//                 $this->session->set_flashdata('error_message',  display('please_try_again'));
//                  redirect("Chrm/manage_employee");
//             }
//               } else {
//                 $this->session->set_flashdata('error_message',  display('please_try_again'));
//                  redirect("Chrm/add_employee");
//             }
//     }

//     // Manage employee
    public function manage_employee() {
    $this->load->model('Hrm_model');
     $data['title']            = display('manage_employee');
     $data['employee_list']    = $this->Hrm_model->employee_list();

    //  print_r($data['employee_list']);

     $content                  = $this->parser->parse('hr/employee_list', $data, true);
    $this->template->full_admin_html_view($content);
    }


    // Employee Update form
   public function employee_update_form($id) {
    $this->load->model('Hrm_model');
     $data['title']            = display('employee_update');
     $data['employee_data']    = $this->Hrm_model->employee_editdata($id);
     $data['desig']            = $this->Hrm_model->designation_dropdown();
     $content                  = $this->parser->parse('hr/employee_updateform', $data, true);
     $this->template->full_admin_html_view($content);
    }










//     // Update employee
    public function update_employee(){
        $this->load->model('Hrm_model');

         if ($_FILES['image']['name']) {
            $config['upload_path'] = './my-assets/image/employee/';
            $config['allowed_types'] = 'gif|jpg|png|jpeg|JPEG|GIF|JPG|PNG';
            $config['max_size'] = "*";
            $config['max_width'] = "*";
            $config['max_height'] = "*";
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
                redirect(base_url('Chrm/add_employee'));
            } else {
                $image = $this->upload->data();
                $image_url = base_url() . "my-assets/image/employee/" . $image['file_name'];
            }
        }
        $headname = $this->input->post('id',true).'-'.$this->input->post('old_first_name',true).''.$this->input->post('old_last_name',true);
         $postData = [
                'id'            => $this->input->post('id',true),
                'first_name'    => $this->input->post('first_name',true),
                'last_name'     => $this->input->post('last_name',true),
                'designation'   => $this->input->post('designation',true),
                'phone'         => $this->input->post('phone',true),
                'image'         => (!empty($image_url) ? $image_url :$this->input->post('old_image',true)),
                'rate_type'     => $this->input->post('rate_type',true),
                'email'         => $this->input->post('email',true),
                'hrate'         => $this->input->post('hrate',true),
                'address_line_1'=> $this->input->post('address_line_1',true),
                'address_line_2'=> $this->input->post('address_line_2',true),
                'blood_group'   => $this->input->post('blood_group',true),
                'country'       => $this->input->post('country',true),
                'city'          => $this->input->post('city',true),
                'zip'           => $this->input->post('zip',true),
            ];   

             if ($this->Hrm_model->update_employee($postData,$headname)) { 
                $this->session->set_flashdata('message', display('successfully_updated'));
            } else {
                $this->session->set_flashdata('error_message',  display('please_try_again'));
            }
             redirect("Chrm/manage_employee");
    }
    // delete employee
    public function employee_delete($id) {
    $this->load->model('Hrm_model');
    $this->Hrm_model->delete_employee($id);
    $this->session->set_userdata(array('message' => display('successfully_delete')));
   redirect("Chrm/manage_employee");
    }


    public function employee_details($id) {
    $this->load->model('Hrm_model');
     $data['title']            = display('employee_update');
     $data['row']              = $this->Hrm_model->employee_details($id);
     $content                  = $this->parser->parse('hr/resumepdf', $data, true);
     $this->template->full_admin_html_view($content);
    }


  // create employee
  public function create_employee(){
    $this->load->model('Hrm_model');
    


  $this->form_validation->set_rules('first_name',display('first_name'),'required|max_length[100]');
  $this->form_validation->set_rules('last_name',display('last_name'),'required|max_length[100]');
  $this->form_validation->set_rules('designation',display('designation'),'required|max_length[100]');
  $this->form_validation->set_rules('phone',display('phone'),'max_length[20]');
  $this->form_validation->set_rules('hrate',display('salary'),'max_length[20]');
    #-------------------------------#
    if ($this->form_validation->run()) {
     if ($_FILES['image']['name']) {
        $config['upload_path'] = 'assets/images/employee/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = "*";
        $config['max_width'] = "*";
        $config['max_height'] = "*";
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_userdata(array('error_message' => $this->upload->display_errors()));
            // redirect(base_url('Chrm/add_employee'));
        } else {
            $image = $this->upload->data();
            $image_url = base_url() . "assets/images/employee/" . $image['file_name'];
        }
    }


     $postData = [
            'first_name'    => $this->input->post('first_name',true),
            'last_name'     => $this->input->post('last_name',true),
            'designation'   => $this->input->post('designation',true),
            'phone'         => $this->input->post('phone',true),
            'image'         => $image_url,
            'rate_type'     => $this->input->post('rate_type',true),
            'email'         => $this->input->post('email',true),
            'hrate'         => $this->input->post('hrate',true),
            'address_line_1'=> $this->input->post('address_line_1',true),
            'address_line_2'=> $this->input->post('address_line_2',true),
            'blood_group'   => $this->input->post('blood_group',true),
            'social_security_number'   => $this->input->post('social_security_number',true),
            'routing_number'   => $this->input->post('routing_number',true),
            'country'       => $this->input->post('country',true),
            'city'          => $this->input->post('city',true),
            'zip'           => $this->input->post('zip',true),
        ];   

        // pritn

         if ($this->Hrm_model->create_employee($postData)) { 
            $this->session->set_flashdata('message', display('save_successfully'));
             redirect("Chrm/manage_employee"); 
        } else {
            $this->session->set_flashdata('error_message',  display('please_try_again'));
             redirect("Chrm/manage_employee");
        }
          } else {
            $this->session->set_flashdata('error_message',  display('please_try_again'));
             redirect("Chrm/add_employee");
        }
         
}








}
