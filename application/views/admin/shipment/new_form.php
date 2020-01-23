<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top" style="background-color: #E9ECEF;">

    <?php $this->load->view("admin/_partials/navbar.php") ?>
    <div id="wrapper">

        <?php $this->load->view("admin/_partials/sidebar.php") ?>

        <div id="content-wrapper">

            <div class="container-fluid">

                <?php $this->load->view("admin/_partials/breadcrumb.php") ?>

                <?php $this->load->view("admin/_partials/alerts.php") ?>

                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo base_url('admin/shipments/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo base_url('admin/shipments/add') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="product_name">Product Name<span class="mandatory">*</span></label>
                                        <select class="form-control <?php echo form_error('product_name') ? 'is-invalid' : '' ?> select-with-select2" name="product_name" id="product_name">
                                            <option value="0">Choose product...</option>

                                            <?php foreach ($products as $products) : ?>
                                                <option value="<?php echo $products->product_id; ?>" <?= $products->product_id == set_value('product_name') ? 'selected="selected"' : ''; ?>><?php echo $products->product_name; ?> | Quantity = <?php echo $products->quantity; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                        <div class="invalid-feedback">
                                            <?php echo form_error('product_name') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col"><label for="status_id">Operation<span class="mandatory">*</span></label></div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-outline-primary">
                                            <input type="radio" name="status_id" id="keluar" value="0"> Keluar
                                        </label>
                                        <label class="btn btn-outline-primary">
                                            <input type="radio" name="status_id" id="masuk" value="1"> Masuk
                                        </label>
                                    </div>
                                </div>


                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="amount">Amount<span class="mandatory">*</span></label>
                                        <input class="form-control <?php echo form_error('amount') ? 'is-invalid' : '' ?>" type="number" name="amount" placeholder="Masukkan jumlah barang" value="<?php echo set_value('amount'); ?>" />

                                        <div class="invalid-feedback">
                                            <?php echo form_error('amount') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <input class="btn btn-success" type="submit" name="btn" value="Save" />
                        </form>

                    </div>

                    <div class="card-footer small text-muted">
                        * required fields
                    </div>


                </div>
                <!-- /.container-fluid -->

                <!-- Sticky Footer -->
                <?php $this->load->view("admin/_partials/footer.php") ?>

            </div>
            <!-- /.content-wrapper -->

        </div>
        <!-- /#wrapper -->


        <?php $this->load->view("admin/_partials/scrolltop.php") ?>

        <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>