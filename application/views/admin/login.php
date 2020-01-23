<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top" style="background-color: #E9ECEF;">
    <br>
    <div class="content-wrapper">
        <div class="row justify-content-center">
            <div class="col col-md-4">
                <?php $this->load->view("admin/_partials/alerts.php"); ?>
                <div class="card mx-0">
                    <div class="card-header">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo base_url('admin/login'); ?>" method="POST">
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email address" required="required" autofocus="autofocus" value="<?php echo set_value('email'); ?>">
                                    <label for="inputEmail">Email address</label>
                                    <div class="invalid-feedback">
                                        <?php echo form_error('email') ?>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-label-group">
                                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required="required">
                                    <label for="inputPassword">Password</label>
                                </div>
                            </div>

                            <input class="btn btn-primary btn-lg btn-block" type="submit" name="btn" value="Login" />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>