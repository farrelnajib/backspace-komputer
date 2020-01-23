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
                                <h2><strong>Products</strong></h2>
                            </div>
                            <div class="col col-md-6" align="right">
                                <a class="btn btn-primary" href="<?php echo base_url('admin/products/add') ?>"><i class="fas fa-plus"></i> Add New</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive table-striped">
                            <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Brand</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $products) : ?>
                                        <tr>
                                            <td><?php echo $products->product_name ?></td>
                                            <td><?php echo $products->category_name ?></td>
                                            <td><?php echo $products->brand_name ?></td>
                                            <td><?php echo $products->quantity ?></td>
                                            <td><?php echo number_format($products->price, 0) ?></td>
                                            <td align="center">
                                                <a href="<?php echo base_url('admin/products/edit/') . $products->product_id; ?>" class="btn btn-success btn-sm">
                                                    Edit <i class="far fa-edit"></i>
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