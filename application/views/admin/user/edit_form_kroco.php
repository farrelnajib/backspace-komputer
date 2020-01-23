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
                        <a href="<?php echo base_url('admin/users/') ?>"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <div class="card-body">

                        <form action="<?php echo base_url('admin/users/edit/') . $users->user_id; ?>" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="user_name">Name*</label>
                                <input class="form-control <?php echo form_error('user_name') ? 'is-invalid' : '' ?>" type="text" name="user_name" placeholder="Input your name..." value="<?php echo $users->user_name ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('user_name') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email">Email*</label>
                                <input class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="text" name="email" placeholder="Input your email..." value="<?php echo $users->email ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('email') ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="old_password">Old Password*</label>
                                <input class="form-control <?php echo form_error('old_password') ? 'is-invalid' : '' ?>" type="password" name="old_password" placeholder="Input your old password..." />
                                <div class="invalid-feedback">
                                    <?php echo form_error('old_password') ?>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="password1">New password</label>
                                        <input class="form-control <?php echo form_error('password1') ? 'is-invalid' : '' ?>" type="password" name="password1" placeholder="New password here..." />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('password1') ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col col-md-6">
                                    <div class="form-group">
                                        <label for="password2">Verify Password</label>
                                        <input class="form-control <?php echo form_error('password2') ? 'is-invalid' : '' ?>" type="password" name="password2" placeholder="Verify your password..." />
                                        <div class="invalid-feedback">
                                            <?php echo form_error('password2') ?>
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