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
				<!--<h1><strong>Hello, <?php echo $this->session->userdata('name'); ?></strong></h1>-->

				<!-- 
        karena ini halaman overview (home), kita matikan partial breadcrumb.
        Jika anda ingin mengampilkan breadcrumb di halaman overview,
        silahkan hilangkan komentar (//) di tag PHP di bawah.
        -->
				<?php //$this->load->view("admin/_partials/breadcrumb.php") 
				?>

				<!-- Icon Cards-->
				<div class="row">
					<div class="col-xl-3 col-sm-6 mb-3">
						<div class="card text-white bg-primary o-hidden h-100">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fas fa-tag"></i>
								</div>
								<div class="mr-5"><?php echo count($products); ?> active products</div>
							</div>
							<a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/products'); ?>">
								<span class="float-left">View Details</span>
								<span class="float-right">
									<i class="fas fa-angle-right"></i>
								</span>
							</a>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 mb-3">
						<div class="card text-white bg-warning o-hidden h-100">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fas fa-copyright"></i>
								</div>
								<div class="mr-5"><?php echo count($brands); ?> active brands</div>
							</div>
							<a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/brands'); ?>">
								<span class="float-left">View Details</span>
								<span class="float-right">
									<i class="fas fa-angle-right"></i>
								</span>
							</a>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 mb-3">
						<div class="card text-white bg-success o-hidden h-100">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fas fa-fw fa-shipping-fast"></i>
								</div>
								<div class="mr-5"><?php echo count($jumlahShipments); ?> shipments done</div>
							</div>
							<a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/shipments'); ?>">
								<span class="float-left">View Details</span>
								<span class="float-right">
									<i class="fas fa-angle-right"></i>
								</span>
							</a>
						</div>
					</div>
					<div class="col-xl-3 col-sm-6 mb-3">
						<div class="card text-white bg-danger o-hidden h-100">
							<div class="card-body">
								<div class="card-body-icon">
									<i class="fas fa-shopping-basket"></i>
								</div>
								<div class="mr-5"><?php echo $totalProduk; ?> total stocks</div>
							</div>
							<a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('admin/products'); ?>">
								<span class="float-left">View Details</span>
								<span class="float-right">
									<i class="fas fa-angle-right"></i>
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>

			<!-- /.container-fluid -->

			<div class="container-fluid">

				<div class="card mb-3">
					<div class="card-header">
						<h3><strong>Products</strong></h3>
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
										</tr>
									<?php endforeach; ?>

								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>



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