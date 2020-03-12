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
                    <input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="<?php if(isset($stock_no)){ echo $stock_no; } ?>" placeholder="Receipt No."  required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Date</label>
                    <input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="<?php if(isset($stock_no)){ echo $stock_no; } ?>" placeholder="Date"  required>
                  </div>
                  <div class="form-group col-md-12 select_sm">
                    <label>Party</label>
                    <select class="form-control select2" name="stock_type_id" id="stock_type_id" data-placeholder="Select Party">
                      <option value="">Select Party</option>
                      <option >1</option>
                      <option >2</option>
                      <option >3</option>
                    </select>
                  </div>

                  <!-- <div class="form-group col-md-6">
                    <label>CC Outstanding</label>
                    <input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="<?php if(isset($stock_no)){ echo $stock_no; } ?>" placeholder="CC Outstanding " readonly required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Bill Outstanding</label>
                    <input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="<?php if(isset($stock_no)){ echo $stock_no; } ?>" placeholder="Bill Outstanding" readonly required>
                  </div> -->

                  <div class="form-group col-md-6">
                    <label>Received Amount</label>
                    <input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="<?php if(isset($stock_no)){ echo $stock_no; } ?>" placeholder="Received Amount"  required>
                  </div>
                  <div class="form-group col-md-6">
                    <label>Total Balance Amount</label>
                    <input type="text" class="form-control form-control-sm" name="stock_no" id="stock_no" value="<?php if(isset($stock_no)){ echo $stock_no; } ?>" placeholder="Total Balance Amount" readonly  required>
                  </div>




                </div>
                <div class="card-footer row">

                  <div class="col-md-12 text-center">
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


</body>
</html>
