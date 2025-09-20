<?= $this->extend('layout.php') ?>
<?= $this->section('content') ?>
<div class="bg-light p-5 mt-3 rounded">
    <h4 class="fw-bold">Create Category</h4>
    <hr>
    <form action="<?= base_url('categories/insert') ?>" method="post">
        <div class="row mt-4">
            <div class="mb-3 row">
                <label for="category_name" class="col-sm-2 col-form-label">Category Name</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" id="category_name" name="category_name" required>
                </div>
            </div>
            <div class="col-sm-7 text-end">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>