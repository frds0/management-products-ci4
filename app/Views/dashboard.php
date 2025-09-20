<?= $this->extend('layout.php') ?>

<?= $this->section('content') ?>
<div class="bg-light p-5 mt-3 rounded">
    <h1>Dashboard Management Products</h1>
    <div class="row mt-4">
        <div class="col-md-4">
            <h4 class="fw-bold">Total Categories</h4>
            <a href="#" class="btn btn-success fw-bold fs-5"><?= $jmlCategories ?> Categories</a>
        </div>
        <div class="col-md-4">
            <h4 class="fw-bold">Total Products</h4>
            <a href="#" class="btn btn-success fw-bold fs-5"><?= $jmlProducts ?> Products</a>
        </div>
        <div class="col-md-4">
            <h4 class="fw-bold">Total Stok Products</h4>
            <a href="#" class="btn btn-success fw-bold fs-5"><?= $jmlStokProducts ?> Stok</a>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>