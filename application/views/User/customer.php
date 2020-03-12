<!DOCTYPE html>
<html>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 text-center mt-2">
            <h1>Customer</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="card-header">
                <?php if(isset($update)){ ?>
                  <h3 class="card-title">Update Customer</h3>
                <?php } else{ ?>
                  <h3 class="card-title">Add Customer</h3>
                <?php } ?>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post">
                <div class="card-body row">
                  <div class="col-md-8 offset-md-2 py-0 px-3">
                    <div class="row">
                      <div class="form-group col-md-12">
                        <label>Company Name</label>
                        <input type="text" class="form-control form-control-sm" name="customer_company" id="customer_company" value="<?php if(isset($customer_info)){ echo $customer_info['customer_company']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Contact Person Name</label>
                        <input type="text" class="form-control form-control-sm" name="customer_name" id="customer_name" value="<?php if(isset($customer_info)){ echo $customer_info['customer_name']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-12 select_sm">
                        <label>Customer Group</label>
                        <select class="form-control select2" name="customer_group_id" id="customer_group_id" data-placeholder="Select Customer Group">
                          <option value="">Select Customer Group</option>
                          <?php if(isset($customer_group_list)){ foreach ($customer_group_list as $list) { ?>
                          <option value="<?php echo $list->customer_group_id; ?>" <?php if(isset($customer_info) && $customer_info['customer_group_id'] == $list->customer_group_id){ echo 'selected'; } ?>><?php echo $list->customer_group_name; ?></option>
                          <?php } } ?>
                        </select>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Address</label>
                        <input type="text" class="form-control form-control-sm" name="customer_addr" id="customer_addr" value="<?php if(isset($customer_info)){ echo $customer_info['customer_addr']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>City</label>
                        <input type="text" class="form-control form-control-sm" name="customer_city" id="customer_city" value="<?php if(isset($customer_info)){ echo $customer_info['customer_city']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>State</label>
                        <input type="text" class="form-control form-control-sm" name="customer_state" id="customer_state" value="<?php if(isset($customer_info)){ echo $customer_info['customer_state']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Pin</label>
                        <input type="text" class="form-control form-control-sm" name="customer_pin" id="customer_pin" value="<?php if(isset($customer_info)){ echo $customer_info['customer_pin']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Statecode</label>
                        <input type="text" class="form-control form-control-sm" name="customer_statecode" id="customer_statecode" value="<?php if(isset($customer_info)){ echo $customer_info['customer_statecode']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>GSTIN</label>
                        <input type="text" class="form-control form-control-sm" name="customer_gstin" id="customer_gstin" value="<?php if(isset($customer_info)){ echo $customer_info['customer_gstin']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>PAN</label>
                        <input type="text" class="form-control form-control-sm" name="customer_pan" id="customer_pan" value="<?php if(isset($customer_info)){ echo $customer_info['customer_pan']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Contact Mobile</label>
                        <input type="number" class="form-control form-control-sm" name="customer_mobile" id="customer_mobile" value="<?php if(isset($customer_info)){ echo $customer_info['customer_mobile']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Work Phone</label>
                        <input type="number" class="form-control form-control-sm" name="customer_phone" id="customer_phone" value="<?php if(isset($customer_info)){ echo $customer_info['customer_phone']; } ?>" placeholder="" required>
                      </div>
                      <div class="form-group col-md-12">
                        <label>Email Id</label>
                        <input type="email" class="form-control form-control-sm" name="customer_email" id="customer_email" value="<?php if(isset($customer_info)){ echo $customer_info['customer_email']; } ?>" placeholder="" required>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer row">
                  <div class="col-md-6">
                    <div class="custom-control custom-checkbox ml-2">
                      <input class="custom-control-input" type="checkbox" name="customer_status" id="customer_status" value="1" <?php if(isset($customer_info) && $customer_info['customer_status'] == 1){ echo 'checked'; } elseif (!isset($customer_info)){ echo 'checked'; } ?>>
                      <label for="customer_status" class="custom-control-label">Active</label>
                    </div>
                  </div>
                  <div class="col-md-6 text-right">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>User/customer_list" class="btn btn-default ml-4">Cancel</a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>

<script type="text/javascript">
// Check Mobile Duplication..
  var customer_mobile1 = $('#customer_mobile').val();
  $('#customer_mobile').on('change',function(){
    var customer_mobile = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"customer_mobile",
             "column_val":customer_mobile,
             "table_name":"user"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#customer_mobile').val(customer_mobile1);
          toastr.error(customer_mobile+' Mobile No Exist.');
        }
      }
    });
  });

// Check Email Duplication..
  var customer_email1 = $('#mobile').val();
  $('#customer_email').on('change',function(){
    var customer_email = $(this).val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/check_duplication',
      type: 'POST',
      data: {"column_name":"customer_email",
             "column_val":customer_email,
             "table_name":"user"},
      context: this,
      success: function(result){
        if(result > 0){
          $('#customer_email').val(customer_email1);
          toastr.error(customer_email+' Email Id Exist.');
        }
      }
    });
  });

// Shipping Address...
  $(document).ready(function(){
    if ($('#is_addr_same').prop('checked')==true){
      $('#customer_s_addr1, #customer_s_addr2, #customer_s_city, #customer_s_pin, #country_s_id, #state_s_id').attr('disabled',true);
    } else{
      $('#customer_s_addr1, #customer_s_addr2, #customer_s_city, #customer_s_pin, #country_s_id, #state_s_id').attr('disabled',false);
    }
  });

  $('#is_addr_same').change(function() {
    if(this.checked) {
      $('#customer_s_addr1, #customer_s_addr2, #customer_s_city, #customer_s_pin, #country_s_id, #state_s_id').attr('disabled',true);
    } else{
      $('#customer_s_addr1, #customer_s_addr2, #customer_s_city, #customer_s_pin, #country_s_id, #state_s_id').attr('disabled',false);
    }
  });

// Get State By Country...
  $("#country_id").on("change", function(){
    var country_id =  $('#country_id').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/get_state_by_country',
      type: 'POST',
      data: {"country_id":country_id},
      context: this,
      success: function(result){
        $('#state_id').html(result);
      }
    });
  });

  $("#country_s_id").on("change", function(){
    var country_id =  $('#country_s_id').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>User/get_state_by_country',
      type: 'POST',
      data: {"country_id":country_id},
      context: this,
      success: function(result){
        $('#state_s_id').html(result);
      }
    });
  });
</script>
</body>
</html>
