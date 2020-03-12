<?php
  $out_user_id = $this->session->userdata('out_user_id');
  $out_company_id = $this->session->userdata('out_company_id');
  $out_roll_id = $this->session->userdata('out_roll_id');
  $company_info = $this->User_Model->get_info_arr_fields('company_name','company_id', $out_company_id, 'company');
  $user_info = $this->User_Model->get_info_arr_fields('user_name','user_id', $out_user_id, 'user');
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo base_url(); ?>User/dashboard" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?php echo base_url(); ?>Transaction/receipt" class="nav-link">Receipt</a>
        </li>
      </ul>


  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" href="<?php echo base_url(); ?>User/logout">
        <i class="fas fa-sign-out-alt"></i>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#">
        <i class="fas fa-th-large"></i>
      </a>
    </li>
  </ul>
</nav>
