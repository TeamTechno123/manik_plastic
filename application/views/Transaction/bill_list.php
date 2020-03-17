<!DOCTYPE html>
<html>
<style>
  td{ padding:2px 10px !important; }
</style>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 mt-1">
            <h4>Bill</h4>
          </div>
          <div class="col-sm-6 mt-1 text-right">
            <a href="<?php echo base_url(); ?>Transaction/bill" class="btn btn-sm btn-primary">Add Bill</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <div class="card-body p-0" style="overflow:auto;">
              <table id="example1" class="table table-bordered tbl_list" >
                <thead>
                  <tr>
                    <th>Bill No.</th>
                    <th class="wt_100">Date</th>
                    <th class="wt_150">Customer Name</th>
                    <th>Basic Amount </th>
                    <th>GST Amount</th>
                    <th>Bill Amount </th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($bill_list as $bill_list2) {
                    $bill_id = $bill_list2->bill_id;
                    $bill_ch_list = $this->User_Model->get_list_by_id('bill_id',$bill_id,'','','bill_ch_id','ASC','bill_ch');
                    $customer_id = $bill_list2->customer_id;
                    $customer_info = $this->User_Model->get_info_arr_fields('customer_company','customer_id', $customer_id, 'customer');

                  ?>
                    <tr>
                      <td><?php echo $bill_list2->bill_no; ?></td>
                      <td class="wt_100"><?php echo $bill_list2->bill_date; ?></td>
                      <td class="wt_150"><?php echo $customer_info[0]['customer_company']; ?></td>
                      <td><?php echo $bill_list2->bill_basic_amt; ?></td>
                      <td><?php echo $bill_list2->bill_gst_amt; ?></td>
                      <td><?php echo $bill_list2->bill_net_tot_amt; ?></td>
                      <td >
                        <a href="<?php echo base_url(); ?>Transaction/edit_bill/<?php echo $bill_list2->bill_id; ?>"> <i class="fa fa-edit"></i> </a>
                        <a href="<?php echo base_url(); ?>Transaction/delete_bill/<?php echo $bill_list2->bill_id; ?>" onclick="return confirm('Delete this Customer');" class="ml-2 text-danger"> <i class="fa fa-trash"></i> </a>
                      </td>
                    </tr>
                  <?php  } ?>
                </tbody>
              </table>
            <!-- </div> -->
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
  </div>
  <script src="<?php echo base_url(); ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/plugins/toastr/toastr.min.js"></script>
  <script type="text/javascript">
    <?php if($this->session->flashdata('save_success')){ ?>
      $(document).ready(function(){
        toastr.success('Saved successfully');
      });
    <?php } ?>
    <?php if($this->session->flashdata('update_success')){ ?>
      $(document).ready(function(){
        toastr.info('Updated successfully');
      });
    <?php } ?>
    <?php if($this->session->flashdata('delete_success')){ ?>
      $(document).ready(function(){
        toastr.error('Deleted successfully');
      });
    <?php } ?>
  </script>
</body>
</html>
