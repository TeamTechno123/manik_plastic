<!DOCTYPE html>
<html>
<body class="sidebar-mini layout-fixed sidebar-collapse">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="margin-left:0px!important;">

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12 mt-2">
            <!-- general form elements -->
            <div class="card card-default">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Add Bill</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-2" style="height: 250px; overflow-x:auto;">
                      <table id="example1" class="table table-head-fixed">
                        <thead>
                          <tr>
                            <th>Bill No.</th>
                            <th class="wt_100">Date</th>
                            <th class="wt_150">Party</th>
                            <th>Details </th>
                            <th>Bundls</th>
                            <th>Bags</th>
                            <th>Kg</th>
                            <th>Rate</th>
                            <th>Rate Per</th>
                            <th>GST %</th>
                            <th>Bill Amount</th>
                            <th>Frieght</th>
                            <th>GST</th>
                            <th>Net Total </th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($bill_list as $bill_list2) {
                            $bill_id = $bill_list2->bill_id;
                            $bill_ch_list = $this->User_Model->get_list_by_id('bill_id',$bill_id,'','','bill_ch_id','ASC','bill_ch');
                            $customer_id = $bill_list2->customer_id;
                            $customer_info = $this->User_Model->get_info_arr_fields('customer_company','customer_id', $customer_id, 'customer');
                            foreach ($bill_ch_list as $bill_ch_list2) {
                          ?>
                            <tr>
                              <td><?php echo $bill_list2->bill_no; ?></td>
                              <td class="wt_100"><?php echo $bill_list2->bill_date; ?></td>
                              <td class="wt_150"><?php echo $customer_info[0]['customer_company']; ?></td>
                              <td><?php echo $bill_ch_list2->bill_ch_details; ?></td>
                              <td><?php echo $bill_ch_list2->bill_ch_bundls; ?></td>
                              <td><?php echo $bill_ch_list2->bill_ch_bags; ?></td>
                              <td><?php echo $bill_ch_list2->bill_ch_kg; ?></td>
                              <td><?php echo $bill_ch_list2->bill_ch_rate; ?></td>
                              <td><?php echo $bill_ch_list2->bill_ch_rate_type; ?></td>
                              <td><?php echo $bill_ch_list2->bill_ch_gst_per; ?></td>
                              <td><?php echo $bill_ch_list2->bill_ch_bill_amt; ?></td>
                              <td><?php echo $bill_ch_list2->bill_ch_frieght; ?></td>
                              <td><?php echo $bill_ch_list2->bill_ch_gst_amt; ?></td>
                              <td><?php echo $bill_list2->bill_net_tot_amt; ?></td>
                            </tr>
                          <?php } } ?>
                        </tbody>
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
              </div>

              <!-- /.card-header -->
              <!-- form start -->
              <form class="m-0 input_form" id="form_action" role="form" action="" method="post" autocomplete="off">
                <div class="card-body row">
                  <div class="form-group col-md-4 offset-md-2 select_sm">
                    <label>Bill Type</label>
                    <select class="form-control select2" name="bill_type" id="bill_type" data-placeholder="Select Bill Type">
                      <option value="">Select Bill Type</option>
                      <option value="1" <?php if(isset($bill_info) && $bill_info['bill_type'] == 1 ){ echo 'selected'; } ?>>Cash Credit</option>
                      <option value="2" <?php if(isset($bill_info) && $bill_info['bill_type'] == 2 ){ echo 'selected'; } ?>>GST</option>
                    </select>
                  </div>
                  <div class="form-group col-md-4 ">
                    <label>Date</label>
                    <input type="text" class="form-control form-control-sm" name="bill_date" value="<?php if(isset($bill_info)){ echo $bill_info['bill_date']; } else{ echo date('d-m-Y'); } ?>" id="date1" data-target="#date1" data-toggle="datetimepicker" required>
                  </div>
                  <div class="form-group col-md-4 offset-md-2">
                    <label>Bill No.</label>
                    <input type="text" class="form-control form-control-sm" name="bill_no" id="bill_no" value="<?php if(isset($bill_info)){ echo $bill_info['bill_no']; } ?>" required readonly>
                  </div>
                  <?php
                  // foreach ($customer_list as $customer_list) {
                  //   echo $customer_list->customer_id;
                  // }
                   //print_r($customer_list); ?>
                  <div class="form-group col-md-4 select_sm">
                    <label>Party</label>
                    <select class="form-control select2" name="customer_id" id="customer_id" data-placeholder="Select Party">
                      <option value="">Select Party</option>
                      <?php
                      foreach ($customer_list as $customer_list) { ?>
                        <option value="<?php echo $customer_list->customer_id; ?>"><?php echo $customer_list->customer_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <div class="form-group col-md-12 text-right">
                    <button type="button" id="add_row" class="btn btn-sm btn-primary">Add Row</button>
                  </div>
                  <div class="form-group col-md-12"  style="overflow-x:auto;">
                    <div class="">
                    <table id="myTable" class="table table-bordered tbl_list"  style="min-width:1500px;">
                      <thead>
                        <tr>
                          <th>Details</th>
                          <th>BUNDLS</th>
                          <th>BAGS</th>
                          <th>KG.</th>
                          <th>RATE</th>
                          <th style="width: 50px;">RATE_PER</th>
                          <th>BILL AMOUNT</th>
                          <th>FRIEGHT</th>
                          <th>VAT AMOUNT</th>
                          <th style="width: 120px;">GST %</th>
                          <th>GST</th>
                          <th>TOTAL</th>
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="wt_150">
                            <input type="text" class="form-control form-control-sm" name="input[0][bill_ch_details]" required>
                          </td>
                          <td class="wt_150">
                            <input type="number" class="form-control form-control-sm" name="input[0][bill_ch_bundls]" required>
                          </td>
                          <td class="wt_100">
                            <input type="number" class="form-control form-control-sm bill_ch_bags" name="input[0][bill_ch_bags]" required>
                          </td>
                          <td class="wt_100">
                            <input type="number" min="0.01" step="0.01" class="form-control form-control-sm bill_ch_kg" name="input[0][bill_ch_kg]" required>
                          </td>
                          <td class="wt_100">
                            <input type="number" min="0.01" step="0.01" class="form-control form-control-sm bill_ch_rate" name="input[0][bill_ch_rate]" required>
                          </td>
                          <td class="wt_100">
                            <select class="form-control form-control-sm bill_ch_rate_type" name="input[0][bill_ch_rate_type]" data-placeholder="Rate Per">
                              <option value="Bag"> Bag</option>
                              <option  value="KG"> KG</option>
                            </select>
                          </td>
                          <td class="wt_100">
                            <input type="number" min="0.01" step="0.01" class="form-control form-control-sm bill_ch_bill_amt" name="input[0][bill_ch_bill_amt]" required readonly>
                          </td>
                          <td class="wt_100">
                            <input type="number" min="0.01" step="0.01" class="form-control form-control-sm bill_ch_frieght" name="input[0][bill_ch_frieght]" required>
                          </td>
                          <td class="wt_100">
                            <input type="number" min="0.01" step="0.01" class="form-control form-control-sm bill_ch_vat_amt" name="input[0][bill_ch_vat_amt]" required readonly>
                          </td>
                          <td class="wt_100">
                            <select class="form-control form-control-sm bill_ch_gst_per" name="input[0][bill_ch_gst_per]" data-placeholder="Rate Per">
                              <option value="0">0% GST</option>
                              <option  value="5">5% GST</option>
                            </select>
                          </td>
                          <td class="wt_100">
                            <input type="number" min="0.01" step="0.01" class="form-control form-control-sm bill_ch_gst_amt" name="input[0][bill_ch_gst_amt]" required readonly>
                          </td>
                          <td class="wt_100">
                            <input type="number" min="0.01" step="0.01" class="form-control form-control-sm bill_ch_total_amt" name="input[0][bill_ch_total_amt]" required readonly>
                          </td>
                          <td class="wt_50"></td>
                        </tr>
                      </tbody>
                    </table>
                    </div>
                  </div>
                  <div class="form-group col-md-6 select_sm">
                  </div>
                  <div class="col-md-2 offset-md-4">
                    <div class="form-group ">
                      <label>Basic Total</label>
                      <input type="number" class="form-control form-control-sm" name="bill_basic_amt" id="bill_basic_amt" value="<?php if(isset($bill_info)){ echo $bill_info['bill_basic_amt']; } ?>" readonly>
                    </div>
                    <div class="form-group ">
                      <label>GST Total</label>
                      <input type="number" class="form-control form-control-sm" name="bill_gst_amt" id="bill_gst_amt" value="<?php if(isset($bill_info)){ echo $bill_info['bill_gst_amt']; } ?>" readonly>
                    </div>
                    <div class="form-group ">
                      <label>Net Total</label>
                      <input type="number" class="form-control form-control-sm" name="bill_net_tot_amt" id="bill_net_tot_amt" value="<?php if(isset($bill_info)){ echo $bill_info['bill_net_tot_amt']; } ?>" readonly>
                    </div>
                  </div>
                </div>
                <div class="card-footer row">
                  <div class="col-md-12 text-right">
                    <?php if(isset($update)){ ?>
                      <button id="btn_update" type="submit" class="btn btn-primary">Update </button>
                    <?php } else{ ?>
                      <button id="btn_save" type="submit" class="btn btn-success px-4">Save</button>
                    <?php } ?>
                    <a href="<?php echo base_url() ?>User/supplier_list" class="btn btn-default ml-4">Cancel</a>
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
  $('#bill_type').on('change', function(){
    var bill_type = $('#bill_type').find("option:selected").val();
    $.ajax({
      url:'<?php echo base_url(); ?>Transaction/get_bill_no',
      type: 'POST',
      data: {"bill_type":bill_type},
      context: this,
      success: function(result){
        $('#bill_no').val(result);
      }
    });
    // alert(bill_type);
  });
  // Add Row...
  <?php if(isset($update)){ ?>
  var i = <?php echo $i-1; ?>
  <?php } else { ?>
  var i = 0;
  <?php } ?>

  $('#add_row').click(function(){
    i++;
    var row = ''+
    '<tr>'+
    '<td class="wt_150">'+
      '<input type="text" class="form-control form-control-sm" name="input['+i+'][bill_ch_details]" required>'+
    '</td>'+
    '<td class="wt_150">'+
      '<input type="number" class="form-control form-control-sm" name="input['+i+'][bill_ch_bundls]" required>'+
    '</td>'+
    '<td class="wt_100">'+
      '<input type="number" class="form-control form-control-sm bill_ch_bags" name="input['+i+'][bill_ch_bags]" required>'+
    '</td>'+
    '<td class="wt_100">'+
      '<input type="number" class="form-control form-control-sm bill_ch_kg" name="input['+i+'][bill_ch_kg]" required>'+
    '</td>'+
    '<td class="wt_100">'+
      '<input type="number" min="0.01" step="0.01" class="form-control form-control-sm bill_ch_rate" name="input['+i+'][bill_ch_rate]" required>'+
    '</td>'+
    '<td class="wt_100">'+
      '<select class="form-control form-control-sm bill_ch_rate_type" name="input['+i+'][bill_ch_rate_type]" data-placeholder="Rate Per">'+
        '<option value="Bag"> Bag</option>'+
        '<option  value="KG"> KG</option>'+
      '</select>'+
    '</td>'+
    '<td class="wt_100">'+
      '<input type="number" min="0.01" step="0.01" class="form-control form-control-sm bill_ch_bill_amt" name="input['+i+'][bill_ch_bill_amt]" required readonly>'+
    '</td>'+
    '<td class="wt_100">'+
      '<input type="number" min="0.01" step="0.01" class="form-control form-control-sm bill_ch_frieght" name="input['+i+'][bill_ch_frieght]" required>'+
    '</td>'+
    '<td class="wt_100">'+
      '<input type="number" min="0.01" step="0.01" class="form-control form-control-sm bill_ch_vat_amt" name="input['+i+'][bill_ch_vat_amt]" required readonly>'+
    '</td>'+
    '<td class="wt_100">'+
      '<select class="form-control form-control-sm bill_ch_gst_per" name="input['+i+'][bill_ch_gst_per]" data-placeholder="Rate Per">'+
        '<option value="0">0% GST</option>'+
        '<option  value="5">5% GST</option>'+
      '</select>'+
    '</td>'+
    '<td class="wt_100">'+
      '<input type="number" min="0.01" step="0.01" class="form-control form-control-sm bill_ch_gst_amt" name="input['+i+'][bill_ch_gst_amt]" required readonly>'+
    '</td>'+
    '<td class="wt_100">'+
      '<input type="number" min="0.01" step="0.01" class="form-control form-control-sm bill_ch_total_amt" name="input['+i+'][bill_ch_total_amt]" required readonly>'+
    '</td>'+
      '<td class="wt_50"><a class="rem_row"><i class="fa fa-trash text-danger"></i></a></td>'+
    '</tr>';
    $('#myTable').append(row);
  });

  $('#myTable').on('click', '.rem_row', function () {
    $(this).closest('tr').remove();
  });

  $('#myTable').on('change','.bill_ch_bags, .bill_ch_kg, .bill_ch_rate, .bill_ch_bill_amt, .bill_ch_frieght, .bill_ch_gst_per, .bill_ch_gst_amt, .bill_ch_rate_type', function(){
    var selector = $(this);
    calculate(selector);
  })
  function calculate(selector){
    var bill_ch_bags = selector.closest('tr').find('.bill_ch_bags').val();
    if(!isNaN(bill_ch_bags) && bill_ch_bags.length != 0) { bill_ch_bags = parseFloat(bill_ch_bags); }
    var bill_ch_kg = selector.closest('tr').find('.bill_ch_kg').val();
    if(!isNaN(bill_ch_kg) && bill_ch_kg.length != 0) { bill_ch_kg = parseFloat(bill_ch_kg); }
    var bill_ch_rate = selector.closest('tr').find('.bill_ch_rate').val();
    if(!isNaN(bill_ch_rate) && bill_ch_rate.length != 0) { bill_ch_rate = parseFloat(bill_ch_rate); }
    var bill_ch_bill_amt = selector.closest('tr').find('.bill_ch_bill_amt').val();
    if(!isNaN(bill_ch_bill_amt) && bill_ch_bill_amt.length != 0) { bill_ch_bill_amt = parseFloat(bill_ch_bill_amt); }
    var bill_ch_frieght = selector.closest('tr').find('.bill_ch_frieght').val();
    if(!isNaN(bill_ch_frieght) && bill_ch_frieght.length != 0) { bill_ch_frieght = parseFloat(bill_ch_frieght); }
    var bill_ch_vat_amt = selector.closest('tr').find('.bill_ch_vat_amt').val();
    if(!isNaN(bill_ch_vat_amt) && bill_ch_vat_amt.length != 0) { bill_ch_vat_amt = parseFloat(bill_ch_vat_amt); }
    var bill_ch_gst_per = selector.closest('tr').find('.bill_ch_gst_per').val();
    if(!isNaN(bill_ch_gst_per) && bill_ch_gst_per.length != 0) { bill_ch_gst_per = parseFloat(bill_ch_gst_per); }
    var bill_ch_gst_amt = selector.closest('tr').find('.bill_ch_gst_amt').val();
    if(!isNaN(bill_ch_gst_amt) && bill_ch_gst_amt.length != 0) { bill_ch_gst_amt = parseFloat(bill_ch_gst_amt); }

    var bill_ch_rate_type = selector.closest('tr').find('.bill_ch_rate_type').val();
    var bill_type = $('#bill_type').val();

    if(bill_type == ''){
      alert('Select Bill Type');
      selector.val('');
    }
    // if(bill_ch_gst_per == ''){
    //   alert('Select GST Percentage');
    //   selector.val('');
    // }
    // if(bill_ch_rate_type == ''){
    //   alert('Select Rate Type');
    //   selector.val('');
    // }

    if(bill_ch_rate_type == 'Bag'){
      bill_ch_bill_amt = bill_ch_bags * bill_ch_rate;
    } else{
      bill_ch_bill_amt = bill_ch_kg * bill_ch_rate;
    }
    selector.closest('tr').find('.bill_ch_bill_amt').val(bill_ch_bill_amt);

    if(bill_type == 2){
      bill_ch_gst_amt = bill_ch_bill_amt * (bill_ch_gst_per/100);
    } else{
      bill_ch_gst_amt = 0;
    }
    selector.closest('tr').find('.bill_ch_gst_amt').val(bill_ch_gst_amt);

    var bill_ch_vat_amt = bill_ch_bill_amt - bill_ch_frieght;
    selector.closest('tr').find('.bill_ch_vat_amt').val(bill_ch_vat_amt);

    var bill_ch_total_amt = bill_ch_vat_amt + bill_ch_gst_amt;
    selector.closest('tr').find('.bill_ch_total_amt').val(bill_ch_total_amt);

    var bill_basic_amt = 0;
    $(".bill_ch_vat_amt").each(function() {
      var bill_ch_vat_amt = $(this).val();
      if(!isNaN(bill_ch_vat_amt) && bill_ch_vat_amt.length != 0) {
        bill_basic_amt += parseFloat(bill_ch_vat_amt);
      }
    });
    $('#bill_basic_amt').val(bill_basic_amt);

    var bill_gst_amt = 0;
    $(".bill_ch_gst_amt").each(function() {
      var bill_ch_gst_amt = $(this).val();
      if(!isNaN(bill_ch_gst_amt) && bill_ch_gst_amt.length != 0) {
        bill_gst_amt += parseFloat(bill_ch_gst_amt);
      }
    });
    $('#bill_gst_amt').val(bill_gst_amt);

    $('#bill_net_tot_amt').val(bill_basic_amt + bill_gst_amt);
    // alert(bill_ch_gst_amt);
  }

</script>
</body>
</html>
