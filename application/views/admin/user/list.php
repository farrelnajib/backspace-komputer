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

                <!-- DataTables -->
                <div class="card mb-3">
                    <div class="card-header">
                        <div class="row">
                            <div class="col col-md-6">
                                <h2><strong>Users</strong></h2>
                            </div>
                            <div class="col col-md-6" align="right">
                                <a class="btn btn-outline-primary" href="<?php echo base_url('admin/users/add') ?>"><i class="fas fa-plus"></i> Add New</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-striped">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>User Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($users as $users) : ?>
                                        <tr>
                                            <td><?php echo $users->user_name ?></td>
                                            <td><?php echo $users->email ?></td>
                                            <td><?php echo $users->role_name ?></td>
                                            <td align="center" width="150px">
                                                <a href="<?php echo base_url('admin/users/edit/') . $users->user_id; ?>" class="btn btn-success btn-sm">
                                                    Edit <i class="far fa-edit"></i>
                                                </a>
                                                <a href="<?php echo base_url('admin/users/delete/') . $users->user_id; ?>" class="btn btn-danger btn-sm">
                                                    Delete <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
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
    <?php $this->load->view("admin/_partials/modal.php") ?>

    <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>