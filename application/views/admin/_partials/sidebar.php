<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item <?php echo $this->uri->segment(2) == '' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo base_url('admin') ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Overview</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'brands' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo base_url('admin/brands/') ?>">
            <i class="far fa-registered"></i>
            <span>Brands</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'categories' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo base_url('admin/categories/') ?>">
            <i class="fas fa-list"></i>
            <span>Categories</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'products' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo base_url('admin/products') ?>">
            <i class="fas fa-tags"></i>
            <span>Products</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'shipments' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo base_url('admin/shipments') ?>">
            <i class="fas fa-shipping-fast"></i>
            <span>Shipments</span>
        </a>
    </li>
    <li class="nav-item <?php echo $this->uri->segment(2) == 'users' ? 'active' : '' ?>">
        <a class="nav-link" href="<?php echo base_url('admin/users') ?>">
            <i class="fas fa-user"></i>
            <span>Users</span>
        </a>
    </li>
</ul>