<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Hrm_model extends CI_Model {



    public function __construct() {

        parent::__construct();

    }


       public function office_loan_list(){

        $this->db->select('*');
        $this->db->from('person_ledger');
         $this->db->where('create_by',$this->session->userdata('user_id'));
         $query = $this->db->get();
      //   echo $this->db->last_query(); 
         if ($query->num_rows() > 0) {
           return $query->result_array();
         }
         return false;
    }




    public function empl_data_info(){

        $this->db->select('*');
        $this->db->from('timesheet_info');
         $this->db->where('create_by',$this->session->userdata('user_id'));
         $query = $this->db->get();
         if ($query->num_rows() > 0) {
           return $query->result_array();
         }
         return false;
    }









    public function federal_tax_info($employee_status,$final,$federal_range){
        $this->db->select('employee');
        $this->db->from('federal_tax');
        $this->db->where($employee_status,$federal_range);
       $query = $this->db->get();
    //  echo $this->db->last_query();
       if ($query->num_rows() > 0) {
           return $query->result_array();
        }else{
  return 0;
        }
}


public function unemployment_tax_info($employee_status,$final,$unemployment_range){
    $this->db->select('employee,employer');
    $this->db->from('federal_tax');
    $this->db->where($employee_status,$unemployment_range);
   $query = $this->db->get();
  // echo  $this->db->last_query();
         if ($query->num_rows() > 0) {
       return $query->result_array();
    }else{
return 0;
    }
}



 public function social_tax_info($employee_status,$final,$social_range){
        $this->db->select('employee,employer');
        $this->db->from('federal_tax');
        $this->db->where($employee_status,$social_range);
       $query = $this->db->get();
     // echo  $this->db->last_query();
       if ($query->num_rows() > 0) {
           return $query->result_array();
        }
         return true;
}
public function  insert_taxesname($postData){
        $data=array(
            'status' => 1,
        );
        $this->db->where('state',$postData);
        $this->db->update('state_and_tax', $data);
    }
    public function Medicare_tax_info($employee_status,$final,$Medicare_range){
        $this->db->select('employee,employer');
        $this->db->from('federal_tax');
        $this->db->where($employee_status,$Medicare_range);
       $query = $this->db->get();
    //   echo  $this->db->last_query();
             if ($query->num_rows() > 0) {
           return $query->result_array();
        }else{
  return 0;
        }
}


<<<<<<< HEAD
public function get_data_pay($empid,$timesheetid){
=======
public function get_data_pay($empid){
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
        $this->db->select('*');
        $this->db->from('info_payslip');
        $this->db->where('id',$empid);
        $this->db->where('create_by',$this->session->userdata('user_id'));
<<<<<<< HEAD
         $this->db->where('timesheet_id',$timesheetid);
        $query = $this->db->get();
        //echo $this->db->last_query(); die();
=======
        $query = $this->db->get();
        // echo $this->db->last_query(); die();
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
        if ($query->num_rows() > 0) {
          return $query->result_array();
        }
        return false;
    }














 public function local_state_tax($employee_status,$final,$local_tax_range){
  $this->db->select('employee,employer');
        $this->db->from('state_localtax');
        $this->db->where($employee_status,$local_tax_range);
       $query = $this->db->get();
<<<<<<< HEAD
     // echo  $this->db->last_query();
=======
      echo  $this->db->last_query();
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
       if ($query->num_rows() > 0) {
           return $query->result_array();
        }
         return true;

 }
    public function employee_info($templ_name){

        $this->db->select('*');
        $this->db->from('employee_history');
        $this->db->where('id', $templ_name);
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
       //  echo $this->db->last_query(); 
         if ($query->num_rows() > 0) {
           return $query->result_array();
         }

        return true;
    }


    public function timesheet_info_data($timesheet_id){
        $this->db->select('*');
        $this->db->from('timesheet_info');
        $this->db->where('timesheet_id', $timesheet_id);
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
     //    echo $this->db->last_query();
         if ($query->num_rows() > 0) {
           return $query->result_array();
         }
        return true;
    }






    public function delete_off_loan($transaction_id){
        $this->db->where('transaction_id', $transaction_id);
        $this->db->delete('person_ledger');
        return true;
      }




      public function get_data_payslip(){

        $this->db->select('a.*,b.*');
        $this->db->from('timesheet_info a');
      
      //  $this->db->where('a.id', $templ_name);
      

          $this->db->join('employee_history b' , 'a.templ_name = b.id');
            $this->db->where('a.uneditable', '1');
 
         $this->db->where('a.create_by',$this->session->userdata('user_id'));
         
         
         
         
         $query = $this->db->get();


     //     echo $this->db->last_query(); 


         if ($query->num_rows() > 0) {
           return $query->result_array();
         }

        return true;
    }







    
    public function office_loan_datas($transaction_id){

        $this->db->select('*');
        $this->db->from('person_ledger');
        
        $this->db->where('transaction_id', $transaction_id);

         $this->db->where('create_by',$this->session->userdata('user_id'));
         $query = $this->db->get();
         if ($query->num_rows() > 0) {
           return $query->result_array();
         }
         return false;
    }
    

  public function timesheet_list(){
  $this->db->select('*');
    $this->db->from('timesheet_info a');
 
        $this->db->join('employee_history b' , 'a.templ_name = b.id');
 
         $this->db->where('a.create_by',$this->session->userdata('user_id'));
         $query = $this->db->get();
         //echo $this->db->last_query(); die();
         if ($query->num_rows() > 0) {
           return $query->result_array();
         }
         return false;
    }
    
    // Update Expense

    public function update_expense_id($id)
    {
        $data = array(
            'expense_name' => $this->input->post('expense_name',TRUE),
            'expense_date' => $this->input->post('expense_date',TRUE),
            'expense_amount' => $this->input->post('expense_amount',TRUE),
            'total_amount' => $this->input->post('total_amount',TRUE),
            'expense_payment_date' => $this->input->post('expense_payment_date',TRUE),
            'description' => $this->input->post('description',TRUE),
        );
        
        $this->db->where('id', $id);
        $this->db->update('expense', $data);
        // echo $this->db->last_query(); die();
        return true;
    }



    //Get expense by id
    public function get_expense_by_id($id) {
        $this->db->select('*');
        $this->db->from('expense');
        $this->db->where('id', $id);
        $query = $this->db->get();
        // echo $this->db->last_query(); die();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    // public function federal(){

    // }
public function administrator_info($ads_id){
        $this->db->select('*');
        $this->db->from('administrator');
        $this->db->where('adm_id',$ads_id);
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
       //   echo $this->db->last_query();
         if ($query->num_rows() > 0) {
           return $query->result_array();
         }
        return true;
    }
    // Pdf Download Expense
    public function pdf_expense($id)
    {
        $this->db->select('*');
        $this->db->from('expense');
        $this->db->where('id', $id);
        $query = $this->db->get();
        // echo $this->db->last_query(); die();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
    }
    
 public function tax_info($id){
<<<<<<< HEAD
=======
    $this->db->select('*');
    $this->db->from('info_payslip');
 
    //    $this->db->join('timesheet_info_details b' , 'a.timesheet_id = b.timesheet_id');
   $this->db->where('timesheet_id' , $id);
   // $this->db->where('a.created_by' ,$this->session->userdata('user_id'));
 $query = $this->db->get(); 
// echo $this->db->last_query();
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }

  }
  public function time_sheet_data($id){
>>>>>>> dffda8f6e82574e4422d8aa8dfec7d070ddffcd0
    $this->db->select('*');
    $this->db->from('info_payslip');
 
    //    $this->db->join('timesheet_info_details b' , 'a.timesheet_id = b.timesheet_id');
   $this->db->where('timesheet_id' , $id);
   // $this->db->where('a.created_by' ,$this->session->userdata('user_id'));
 $query = $this->db->get(); 
// echo $this->db->last_query();
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }

  }
  public function time_sheet_data($id){
    $this->db->select('*');
    $this->db->from('timesheet_info a');
        $this->db->join('timesheet_info_details b' , 'a.timesheet_id = b.timesheet_id');
   $this->db->where('a.timesheet_id' , $id);
   // $this->db->where('a.created_by' ,$this->session->userdata('user_id'));
 $query = $this->db->get();
// echo $this->db->last_query();
    if ($query->num_rows() > 0) {
        return $query->result_array();
    }
  }

    public function administrator_data(){

        $this->db->select('*');
        $this->db->from('administrator');
         $this->db->where('create_by',$this->session->userdata('user_id'));
         $query = $this->db->get();
        //  echo $this->db->last_query(); die();
         if ($query->num_rows() > 0) {
           return $query->result_array();
         }
         return false;
    }
    




    public function employee_name1() {

        $this->db->select('*');
        $this->db->from('employee_history');
          $this->db->where('create_by',$this->session->userdata('user_id'));
     
         $query = $this->db->get();
      //  echo $this->db->last_query();die();
       if ($query->num_rows() > 0) {
        return $query->result_array();

    }
        return false;

    }








    public function employee_name($id) {

        $this->db->select('*');
        $this->db->from('employee_history');
          $this->db->where('create_by',$this->session->userdata('user_id'));
         $this->db->where('id',$id);
         $query = $this->db->get();
      //  echo $this->db->last_query();die();
       if ($query->num_rows() > 0) {
        return $query->result_array();

    }
        return false;

    }



    

    public function employeeinfo() {

        $this->db->select('*');
        $this->db->from('timesheet_info');
         $this->db->where('create_by',$this->session->userdata('user_id'));
         $query = $this->db->get();
    //    echo $this->db->last_query();
       if ($query->num_rows() > 0) {
        return $query->result_array();

    }
        return false;

    }



    public function insert_adsrs_data($data) {

        // $this->db->insert('administrator', $data);


        $this->db->select('*');
        $this->db->from('administrator');
        // $this->db->where('customer_name', $data['customer_name']);
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();

               echo $this->db->last_query();

        $this->db->insert('administrator', $data);
        return $query->result_array();

    }






    public function get_payment_terms(){

        $this->db->select('*');
        $this->db->from('payment_terms');
        $this->db->where('create_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
    }
    

    public function insert_duration_data($postData){
        $data=array(
            'duration_name' => $postData,
            'create_by' => $this->session->userdata('user_id')
        );
        // print_r($data);
        $this->db->insert('duration', $data);
        // echo $this->db->last_query(); die();
        $this->db->select('*');
        $this->db->from('duration');
        $this->db->where('create_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_dailybreak(){
    
        $this->db->select('*');
        $this->db->from('dailybreak');
        $this->db->where('create_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query->result_array();
    }
    

    public function get_duration_data(){
        
        $this->db->select('*');
        $this->db->from('duration');
        $this->db->where('create_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query->result_array();
    }



    public function getemp_data($value){
        $this->db->select('*');
        $this->db->from('employee_history');
        $this->db->where('id', $value);
        $query = $this->db->get()->result();
    //  echo $this->db->last_query(); die();
        return $query;
    
    }






    public function insert_dailybreak_data($postData){
        $data=array(
            'dailybreak_name' => $postData,
            'create_by' => $this->session->userdata('user_id')
        );
        // print_r($data);
        $this->db->insert('dailybreak', $data);
        // echo $this->db->last_query(); die();
        $this->db->select('*');
        $this->db->from('dailybreak');
        $this->db->where('create_by' ,$this->session->userdata('user_id'));
        $query = $this->db->get();

                // echo $this->db->last_query(); die();


        return $query->result_array();
    }
    














public function timesheet_data($id) {
    $this->db->select('*');
    $this->db->from('employee_history');
    $this->db->where('id', $id);
    $query = $this->db->get();
//  echo $this->db->last_query(); die();
      if ($query->num_rows() > 0) {
          return $query->result_array();
      }
}
    //Count designation

    public function count_designation() {

        return $this->db->count_all("designation");

    }

public function create_designation($data = []){
$data['create_by']=$this->session->userdata('user_id');
return $this->db->insert('designation',$data);

}
public function designation_info($postData){
        $data=array(
            'designation' => $postData,
            'create_by' => $this->session->userdata('user_id')
        );
        $this->db->insert('designation', $data);
        //echo $this->db->last_query();
        $this->db->select('*');
        $this->db->from('designation');
        $this->db->where('create_by' ,$this->session->userdata('user_id'));
       //   $this->db->order_by('payment_type','desc');
        $query = $this->db->get();
        return $query->result_array();
    }

public function paytype_dropdown(){
        $this->db->select('payment_type');
        $this->db->from('payment_type');
       $this->db->where('create_by', $this->session->userdata('user_id'));
         $this->db->order_by('payment_type','asc');
       $query = $this->db->get();
         if ($query->num_rows() > 0) {
             return $query->result_array();
         }
        }
public function designation_dropdown(){
        $this->db->select('*');
        $this->db->from('designation');
        $this->db->where('create_by',$this->session->userdata('user_id'));
        $query = $this->db->get();
        return $query->result_array();
    }




    //designation List

    public function designation_list() {

        $this->db->select('*');

        $this->db->from('designation');

        $this->db->where('create_by',$this->session->userdata('user_id'));

        $this->db->order_by('id', 'DESC');

        $query = $this->db->get();



        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }





    //Retrieve designation Edit Data

    public function designation_editdata($id) {

        $this->db->select('*');

        $this->db->from('designation');

        $this->db->where('create_by',$this->session->userdata('user_id'));

        $this->db->where('id', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

    }





    //Update Categories

    public function update_designation($data = []) {

        $this->db->where('id', $data['id']);

        $this->db->update('designation', $data);

        return true;

    }





    // Delete designation Item

    public function delete_designation($id) {

        $this->db->where('id', $id);

        $this->db->delete('designation');

        return true;

    }

//  public function designation_dropdown(){

//         $this->db->select('*');

//         $this->db->from('designation');

//         $this->db->where('create_by',$this->session->userdata('user_id'));

//         $query=$this->db->get();

//         $data=$query->result();

//         $list[''] = display('select_option');

//         if(!empty($data)){

//             foreach ($data as  $value) {

//                 $list[$value->id]=$value->designation;

//             }

//         }

//         return $list;

//     }

//=========================== employeee data start ===========================

    // create employee

   public function create_employee($data = []){

     $this->db->insert('employee_history',$data);

     $id =$this->db->insert_id();

     $coa = $this->headcode();

           if($coa->HeadCode!=NULL){

                $headcode=$coa->HeadCode+1;

           }else{

                $headcode="502040001";

            }

    $c_acc=$id.'-'.$data['first_name'].''.$data['last_name'];

  $createby=$this->session->userdata('user_id');

  $createdate=date('Y-m-d H:i:s');

    $employee_coa = [

             'HeadCode'         => $headcode,

             'HeadName'         => $c_acc,

             'PHeadName'        => 'Employee Ledger',

             'HeadLevel'        => '3',

             'IsActive'         => '1',

             'IsTransaction'    => '1',

             'IsGL'             => '0',

             'HeadType'         => 'L',

             'IsBudget'         => '0',

             'IsDepreciation'   => '0',

             'DepreciationRate' => '0',

             'CreateBy'         => $createby,

             'CreateDate'       => $createdate,

        ];

        $this->db->insert('acc_coa',$employee_coa);

        return true;



   }
   public function delete_tax($tax=null,$state){


if($tax){
 $sql="UPDATE state_and_tax SET tax = replace(replace(tax, '$tax', ''), ',', ',') where state='".$state."'";

 $query=$this->db->query($sql);
}else{
      $this->db->where('state',$state);
       $this->db->delete('state_and_tax');
}
$sql1="UPDATE state_and_tax
SET tax = TRIM(BOTH ',' FROM tax)";
$query1=$this->db->query($sql1);
$sql3="UPDATE state_and_tax SET tax = replace(replace(tax, ',,', ','), ',', ',') where state='".$state."'";

 $query=$this->db->query($sql3);
     return true;
   }

   // Employee list

//   public function employee_list(){

//       $this->db->select('a.*,b.designation');

//         $this->db->from('employee_history a');

//         $this->db->join('designation b','a.designation = b.id');

//         $this->db->where('a.create_by',$this->session->userdata('user_id'));

//         $this->db->order_by('a.id', 'DESC');

//         $query = $this->db->get();

// // echo $this->db->last_query(); die();

//         if ($query->num_rows() > 0) {

//             return $query->result_array();

//         }

//         return false;

//   }




   public function employee_list(){

     $this->db->select('a.*,b.designation');
     $this->db->from('employee_history a');
     $this->db->join('designation b','a.designation = b.designation');
     $this->db->where('a.create_by',$this->session->userdata('user_id'));
     $this->db->order_by('a.designation', 'DESC');
     $query = $this->db->get();
    //  echo $this->db->last_query(); die();
     if ($query->num_rows() > 0) {
       return $query->result_array();
     }
     return false;
}



   // Employee Edit data

   public function employee_editdata($id){

        $this->db->select('*');

        $this->db->from('employee_history');

        $this->db->where('id', $id);

        $query = $this->db->get();

        if ($query->num_rows() > 0) {

            return $query->result_array();

        }

        return false;

   }



     public function headcode(){

        $query=$this->db->query("SELECT MAX(HeadCode) as HeadCode FROM acc_coa WHERE HeadLevel='3' And HeadCode LIKE '50204000%'");

        return $query->row();



    }

// update employee

    public function update_employee($data = [],$headname){

        $this->db->where('id', $data['id']);

        $this->db->update('employee_history',$data);

     $id = $data['id'];

    $up_headname = $id.'-'.$data['first_name'].''.$data['last_name'];

    $updatedby   = $this->session->userdata('user_id');

    $updateddate = date('Y-m-d H:i:s');

    $employee_coa = [

             'HeadName'         => $up_headname,

             'UpdateBy'         => $updatedby,

             'UpdateDate'       => $updateddate,

        ];

        $this->db->where('HeadName', $headname);

        $this->db->update('acc_coa',$employee_coa);

        return true;

    }

    //delete employee

        public function delete_employee($id) {

        $this->db->where('id', $id);

        $this->db->delete('employee_history');

        return true;

    }



//       public function employee_details($id){

//         $this->db->select('a.*,b.designation');

//         $this->db->from('employee_history a');

//         $this->db->join('designation b','a.designation = b.id');

//         $this->db->where('a.id', $id);

//         $query = $this->db->get();

//         if ($query->num_rows() > 0) {

//             return $query->result_array();

//         }

//         return false;

//   }
   
   
   
      public function employee_details($id){
        $this->db->select('*');
        $this->db->from('employee_history ');
        // $this->db->join('designation b','a.designation = b.designation');
        $this->db->where('id', $id);
        $query = $this->db->get();
    //  echo $this->db->last_query(); die();
        if ($query->num_rows() > 0) {
            return $query->result_array();
        }
        return false;
   }
   
   
   
   
   

}

