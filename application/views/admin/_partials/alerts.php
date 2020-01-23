<?php if ($this->session->flashdata('successTambah')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('successTambah'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('successEdit')) : ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('successEdit'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('del')) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('del'); ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php endif; ?>