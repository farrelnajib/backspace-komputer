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
                                <h2><strong>Shipments</strong></h2>
                            </div>
                            <div class="col col-md-6" align="right">
                                <a class="btn btn-primary" href="<?php echo base_url('admin/shipments/add') ?>"><i class="fas fa-plus"></i> Add New</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive table-striped">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Time</th>
                                        <th>Product Name</th>
                                        <th>Action</th>
                                        <th>Amount</th>
                                        <th>Quantity</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($shipments as $shipments) : ?>
                                        <tr>
                                            <td><?php echo $shipments->time ?></td>
                                            <td><?php echo $shipments->product_name ?></td>
                                            <td>
                                                <i class="<?php echo $shipments->status_info == "Masuk" ? "fas fa-sign-in-alt" : "fas fa-sign-out-alt"; ?>"></i>
                                                <?php echo $shipments->status_info; ?>
                                            </td>
                                            <td align="center"><?php echo $shipments->amount ?></td>
                                            <td align="center"><?php echo $shipments->quantity_after ?></td>
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