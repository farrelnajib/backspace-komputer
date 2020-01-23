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
                        <a href="<?php echo base_url('admin/categories/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo base_url('admin/categories/add') ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="category_name">Category*</label>
                                <input class="form-control <?php echo form_error('category_name') ? 'is-invalid' : '' ?>" type="text" name="category_name" placeholder="Masukkan kategori" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('category_name') ?>
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