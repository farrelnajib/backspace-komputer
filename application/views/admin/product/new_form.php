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

                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo base_url('admin/products/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo base_url('admin/products/add') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="product_name">Product Name<span class="mandatory">*</span></label>
                                        <input class="form-control <?php echo form_error('product_name') ? 'is-invalid' : '' ?>" type="text" name="product_name" placeholder="Masukkan nama produk" value="<?php echo set_value('product_name'); ?>" />

                                        <div class="invalid-feedback">
                                            <?php echo form_error('product_name') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="category_name">Category<span class="mandatory">*</span></label>
                                        <select class="form-control <?php echo form_error('category_name') ? 'is-invalid' : '' ?> select-with-select2" name="category_name" id="category_name">
                                            <option value="0">Choose category...</option>
                                            <?php foreach ($categories as $categories) : ?>
                                                <option value="<?php echo $categories->category_id; ?>" <?= $categories->category_id == set_value('category_name') ? 'selected="selected"' : ''; ?>><?php echo $categories->category_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                        <div class="invalid-feedback">
                                            <?php echo form_error('category_name') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="brand_name">Brand<span class="mandatory">*</span></label>
                                        <select class="form-control <?php echo form_error('brand_name') ? 'is-invalid' : '' ?> select-with-select2" name="brand_name" id="brand_name">
                                            <option value="0">Choose brand...</option>
                                            <?php foreach ($brands as $brands) : ?>
                                                <option value="<?php echo $brands->brand_id; ?>" <?= $brands->brand_id == set_value('brand_name') ? 'selected="selected"' : ''; ?>><?php echo $brands->brand_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>

                                        <div class="invalid-feedback">
                                            <?php echo form_error('brand_name') ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="quantity">Quantity<span class="mandatory">*</span></label>
                                        <input class="form-control <?php echo form_error('quantity') ? 'is-invalid' : '' ?>" type="text" name="quantity" placeholder="Insert quantity of product" value="<?php echo set_value('quantity'); ?>" />

                                        <div class="invalid-feedback">
                                            <?php echo form_error('quantity') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="price">Price<span class="mandatory">*</span></label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="inputGroupPrepend2">Rp.</span>
                                            </div>

                                            <input class="form-control <?php echo form_error('price') ? 'is-invalid' : '' ?>" type="number" name="price" step=0.01 placeholder="Insert price of product" value="<?php echo set_value('price'); ?>" />
                                            <div class="invalid-feedback">
                                                <?php echo form_error('price') ?>
                                            </div>
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