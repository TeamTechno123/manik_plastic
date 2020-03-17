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
            <h1>Receipt</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-10 offset-md-1">
            <!-- general form elements -->
            <div class="card card-default">

              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" autocomplete="off">
                <div class="card-body row">
                  <div class="form-group col-md-6">
                    <label>Receipt No.</label>
                    <input type="text" class="form-control form-control-sm" name="receipt_no" id="receipt_no" value="<?php if(isset($receipt_no)){ echo $receipt_no; } ?>" placeholder="Receipt No." readonly required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Date</label>
                    <input type="text" class="form-control form-control-sm" name="receipt_date" value="<?php if(isset($receipt_date)){ echo $receipt_date; } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" required>
                  </div>
                  <?php //echo $bill_list->bill_net_tot_amt; ?>
                  <div class="form-group col-md-4 select_sm">
                    <label>Party</label>
                    <select class="form-control select2" name="customer_id" id="customer_id" data-placeholder="Select Party">
                      <option value="">Select Party</option>
                      <?php
                      foreach ($customer_list as $customer_list) { ?>
                        <option value="<?php echo $customer_list->customer_id; ?>" <?php if(isset($customer_id) && $customer_id==$customer_list->customer_id ){ echo 'selected'; } ?>><?php echo $customer_list->customer_name; ?> </option>
                      <?php } ?>

                    </select>
                  </div>

                  <div class="form-group col-md-4  select_sm">
                    <label>Bill Type</label>
                    <select class="form-control select2" name="bill_type" id="bill_type" data-placeholder="Select Bill Type">
                      <option value="">Select Bill Type</option>
                      <option value="1" <?php if(isset($bill_type) && $bill_type == 1 ){ echo 'selected'; } ?>>Cash Credit</option>
                      <option value="2" <?php if(isset($bill_type) && $bill_type == 2 ){ echo 'selected'; } ?>>GST</option>
                    </select>
                  </div>
                  <?php //echo $bill_list->bill_net_tot_amt; ?>
                  <div class="form-group col-md-4 select_sm">
                    <label>Bill No.</label>
                    <select class="form-control select2" name="bill_id" id="bill_id" data-placeholder="Select Bill No.">
                      <option value="">Select Bill No.</option>
                      <?php
                      foreach ($bill_list as $bill_list) { ?>
                        <option value="<?php echo $bill_list->bill_id; ?>"<?php if(isset($bill_id) && $bill_id==$bill_list->bill_id ){ echo 'selected'; } ?>><?php echo $bill_list->bill_id ; ?></option>
                      <?php } ?>
                    </select>
                  </div>



                  <input type="hidden" name="bill_net_tot_amt1" id="bill_net_tot_amt1" >
                  <div class="form-group col-md-6">
                    <label>Received Amount</label>
                    <input type="text" class="form-control form-control-sm" name="received_amount" id="received_amount" value="<?php if(isset($received_amount)){ echo $received_amount; } ?>" placeholder="Received Amount"  required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Total Balance Amount</label>
                    <input type="text" class="form-control form-control-sm" name="balance_amount" id="balance_amount" value="<?php if(isset($balance_amount)){ echo $balance_amount; } ?>" placeholder="Total Balance Amount"  readonly  required>
                  </div>
                </div>
                <div class="card-footer row">

                  <div class="col-md-12 text-center">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>Transaction/receipt_list" class="btn btn-default ml-4">Cancel</a>
                  </div>
                </div>
              </form>
            </div>

          </div>
          <!--/.col (left) -->
          <!-- right column -->
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">
  $("#bill_type").on("change", function(){
  var bill_type =  $('#bill_type').find("option:selected").val();
  $.ajax({
    url:'<?php echo base_url(); ?>Transaction/get_bill_amount',
    type: 'POST',
    data: {"bill_type":bill_type},
    context: this,
    success: function(result){
      $('#bill_id').html(result);

// If json_encode responce..
var data = JSON.parse(result)
      alert(data[0]['application_date']);

    }
  });
});

  </script>

  <script type="text/javascript">
  $("#bill_id").on("change", function(){
  var bill_id =  $('#bill_id').find("option:selected").val();
  $.ajax({
    url:'<?php echo base_url(); ?>Transaction/get_bill_net_amount',
    type: 'POST',
    data: {"bill_id":bill_id},
    context: this,
    success: function(result){
      // $('#bill_net_tot_amt').html(alert(result));
        $('#bill_net_tot_amt1').val(result);
// If json_encode responce..
// var data = JSON.parse(result)
//       alert(data[0]['application_date']);

    }
  });
});

  </script>

<script type="text/javascript">
$(function() {
    $("#received_amount").on("keydown keyup", subt);
 function subt() {
 $("#balance_amount").val(Number($("#bill_net_tot_amt1").val()) - Number($("#received_amount").val()));
 }
});
</script>

</body>
</html>
