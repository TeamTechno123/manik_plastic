<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Transaction extends CI_Controller{
  public function __construct(){
    parent::__construct();
    $this->load->model('User_Model');
    $this->load->model('Transaction_Model');
    date_default_timezone_set('Asia/Kolkata');
  }

  /**************************************************************************************/
  /*******                                  Sales                               *********/
  /**************************************************************************************/


  /*******************************    Quote Information      ****************************/


  public function receipt(){
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Transaction/receipt');
    $this->load->view('Include/footer');
  }

  public function receipt_list(){
    $this->load->view('Include/head');
    $this->load->view('Include/navbar');
    $this->load->view('Transaction/receipt_list');
    $this->load->view('Include/footer');
  }

  public function bill_list(){

  }

  public function bill(){
    $mani_user_id = $this->session->userdata('mani_user_id');
    $mani_company_id = $this->session->userdata('mani_company_id');
    $mani_role_id = $this->session->userdata('mani_role_id');
    if($mani_user_id == '' && $mani_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('bill_type', 'Type', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $date_time = date('d-m-Y H:i:s A');
      $save_data = $_POST;
      $save_data['company_id'] = $mani_company_id;
      $save_data['bill_addedby'] = $mani_user_id;
      $save_data['bill_date2'] = $date_time;
      unset($save_data['input']);
      $bill_id = $this->User_Model->save_data('bill', $save_data);

      foreach($_POST['input'] as $multi_data){
        $multi_data['bill_id'] = $bill_id;
        $multi_data['bill_ch_date'] = date('d-m-Y h:i:s A');
        $this->db->insert('bill_ch', $multi_data);
      }
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Transaction/bill');
    }
    $data['bill_list'] = $this->User_Model->get_list($mani_company_id,'bill_id','ASC','bill');
    $data['customer_list'] = $this->User_Model->get_list($mani_company_id,'customer_id','ASC','customer');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/top_link2', $data);
    $this->load->view('Transaction/bill', $data);
    $this->load->view('Include/footer', $data);
  }

  public function get_bill_no(){
    $bill_type = $this->input->post('bill_type');
    $bill_no = $this->User_Model->get_bill_no($bill_type);
    echo $bill_no;
  }
}
