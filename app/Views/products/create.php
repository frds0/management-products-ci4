<?= $this->extend('layout.php') ?>
<?= $this->section('content') ?>
<div class="bg-light p-5 mt-3 rounded">
    <h4 class="fw-bold">Create Product</h4>
    <hr>
    <form action="<?= base_url('products/insert') ?>" method="post">
        <div class="row mt-4">
            <div class="mb-3 row">
                <label for="category_name" class="col-sm-2 col-form-label">Category</label>
                <div class="col-sm-5">
                    <select class="form-select" id="floatingSelectGrid" name="category_id" required>
                        <option selected disabled>Select Category</option>
                        <?php foreach ($categories as $key) { ?>
                            <option value="<?= $key['id'] ?>"><?= $key['category_name'] ?></option>
                        <?php } ?>
                    </select>
                    <!-- <input type="text" class="form-control" id="category_name" name="category_name" required> -->
                </div>
            </div>
            <div class="mb-3 row">
                <label for="product_name" class="col-sm-2 col-form-label">Product Name</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="product_name" name="product_name" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                <div class="col-sm-2">
                    <input type="number" min="0" class="form-control" id="stok" name="stok" required>
                </div>
            </div>
        </div>
        <div class="col-sm-7 text-end">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>
<?= $this->endSection() ?>