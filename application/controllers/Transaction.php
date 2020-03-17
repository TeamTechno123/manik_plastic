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
    $mani_user_id = $this->session->userdata('mani_user_id');
    $mani_company_id = $this->session->userdata('mani_company_id');
    $mani_role_id = $this->session->userdata('mani_role_id');
    if($mani_user_id == '' && $mani_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('receipt_no', 'Type', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $data = array(
        'company_id' => $mani_company_id,
        'receipt_addedby' => $mani_user_id,
        'receipt_no' => $this->input->post('receipt_no'),
        'receipt_date' => $this->input->post('receipt_date'),
        'customer_id' => $this->input->post('customer_id'),
        'bill_type' => $this->input->post('bill_type'),
        'bill_id' => $this->input->post('bill_id'),
        'received_amount' => $this->input->post('received_amount'),
        'balance_amount' => $this->input->post('balance_amount'),
        // 'receipt_status' => $this->input->post('receipt_status'),
      );
      $receipt_id = $this->User_Model->save_data('receipt', $data);
      $this->session->set_flashdata('save_success','success');
      header('location:'.base_url().'Transaction/receipt_list');
    }
    $data['bill_list'] = $this->User_Model->get_list($mani_company_id,'bill_id','ASC','bill');
    $data['customer_list'] = $this->User_Model->get_list($mani_company_id,'customer_id','ASC','customer');
    $data['receipt_no'] = $this->User_Model->get_count_no($mani_company_id,'receipt_id','receipt');
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/receipt',$data);
    $this->load->view('Include/footer',$data);
  }

  public function receipt_list(){
    $mani_user_id = $this->session->userdata('mani_user_id');
    $mani_company_id = $this->session->userdata('mani_company_id');
    $mani_role_id = $this->session->userdata('mani_role_id');
    if($mani_user_id == '' && $mani_company_id == ''){ header('location:'.base_url().'User'); }
    $data['receipt_list'] = $this->User_Model->get_receipt_list($mani_company_id);
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/receipt_list', $data);
    $this->load->view('Include/footer', $data);
  }

  public function edit_receipt($receipt_id){
    $mani_user_id = $this->session->userdata('mani_user_id');
    $mani_company_id = $this->session->userdata('mani_company_id');
    $mani_role_id = $this->session->userdata('mani_role_id');
    if($mani_user_id == '' && $mani_company_id == ''){ header('location:'.base_url().'User'); }
    $this->form_validation->set_rules('receipt_no', 'Receipt No.', 'trim|required');
    if ($this->form_validation->run() != FALSE) {
      $update_data = array(
        'company_id' => $mani_company_id,
        'receipt_addedby' => $mani_user_id,
        'receipt_no' => $this->input->post('receipt_no'),
        'receipt_date' => $this->input->post('receipt_date'),
        'customer_id' => $this->input->post('customer_id'),
        'bill_type' => $this->input->post('bill_type'),
        'bill_id' => $this->input->post('bill_id'),
        'received_amount' => $this->input->post('received_amount'),
        'balance_amount' => $this->input->post('balance_amount'),
        'receipt_addedby' => $mani_user_id,
      );
      $this->User_Model->update_info('receipt_id', $receipt_id, 'receipt', $update_data);
      $this->session->set_flashdata('update_success','success');
    header('location:'.base_url().'Transaction/receipt_list');
    }

    // $data['receipt_list'] = $this->User_Model->get_receipt_list($mani_company_id);
    $receipt_list = $this->User_Model->get_info('receipt_id', $receipt_id, 'receipt');
    $data['bill_list'] = $this->User_Model->get_list($mani_company_id,'bill_id','ASC','bill');
    $data['customer_list'] = $this->User_Model->get_list($mani_company_id,'customer_id','ASC','customer');
    if($receipt_list == ''){ header('location:'.base_url().'Transaction/receipt_list'); }
    foreach($receipt_list as $info){
      $data['update'] = 'update';
      $data['receipt_id'] = $info->receipt_id;
      $data['receipt_no'] = $info->receipt_no;
      $data['receipt_date'] = $info->receipt_date;
      $data['customer_id'] = $info->customer_id;
      // $data['customer_name'] = $info->customer_name;
      $data['bill_type'] = $info->bill_type;
      $data['bill_id'] = $info->bill_id;
      $data['received_amount'] = $info->received_amount;
      $data['balance_amount'] = $info->balance_amount;
    }
    $this->load->view('Include/head',$data);
    $this->load->view('Include/navbar',$data);
    $this->load->view('Transaction/receipt',$data);
    $this->load->view('Include/footer',$data);
  }

  // Delete User....
  public function delete_receipt($receipt_id){
    $mani_user_id = $this->session->userdata('mani_user_id');
    $mani_company_id = $this->session->userdata('mani_company_id');
    $mani_role_id = $this->session->userdata('mani_role_id');
    if($mani_user_id == '' && $mani_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('receipt_id', $receipt_id, 'receipt');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Transaction/receipt_list');
  }

  public function get_bill_amount(){
    $bill_type = $this->input->post('bill_type');
    $bill_list = $this->User_Model->bill_list($bill_type);
    echo "<option value='' selected >Select Bill No.</option>";
    foreach ($bill_list as $list) {
      echo "<option class=''> ".$list->bill_id." </option>";
    }
  }

  public function get_bill_net_amount(){
    $bill_id = $this->input->post('bill_id');
    $total_received = $this->User_Model->get_total_received_bill($bill_id);
    $bill_amount = $this->User_Model->get_info_arr_fields('bill_net_tot_amt','bill_id', $bill_id, 'bill');
    $pending_amt=$bill_amount[0]['bill_net_tot_amt']-$total_received;
    // $final_received=($bill_list['0']['bill_net_tot_amt'] )- ($bill_list['0']['received_amount']);
    echo $pending_amt;


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

  public function bill_list(){
    $mani_user_id = $this->session->userdata('mani_user_id');
    $mani_company_id = $this->session->userdata('mani_company_id');
    $mani_role_id = $this->session->userdata('mani_role_id');
    if($mani_user_id == '' && $mani_company_id == ''){ header('location:'.base_url().'User'); }
    $data['bill_list'] = $this->User_Model->get_list($mani_company_id,'bill_id','ASC','bill');
    $this->load->view('Include/head', $data);
    $this->load->view('Include/navbar', $data);
    $this->load->view('Transaction/bill_list', $data);
    $this->load->view('Include/footer', $data);
  }

  // Delete User....
  public function delete_bill($bill_id){
    $mani_user_id = $this->session->userdata('mani_user_id');
    $mani_company_id = $this->session->userdata('mani_company_id');
    $mani_role_id = $this->session->userdata('mani_role_id');
    if($mani_user_id == '' && $mani_company_id == ''){ header('location:'.base_url().'User'); }
    $this->User_Model->delete_info('bill_id', $bill_id, 'bill');
    $this->session->set_flashdata('delete_success','success');
    header('location:'.base_url().'Transaction/bill_list');
  }

  public function get_bill_no(){
    $bill_type = $this->input->post('bill_type');
    $bill_no = $this->User_Model->get_bill_no($bill_type);
    echo $bill_no;
  }
}
