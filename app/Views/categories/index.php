<?= $this->extend('layout.php') ?>
<?= $this->section('content') ?>
<div class="bg-light p-5 mt-3 rounded">
    <h1>List Categories</h1>
    <div class="row mt-4">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <div class="col mb-4">
            <a href="<?= base_url('categories/create') ?>" class="btn btn-primary">Insert Category</a>
        </div>
        <table class="table table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($categories as $key) { ?>
                    <tr>
                        <th class="text-center"><?= $no++ ?></th>
                        <td><?= $key['category_name'] ?></td>
                        <td class="text-center">
                            <a href="<?= base_url('categories/edit/' . $key['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <form action="<?= base_url('categories/delete/' . $key['id']) ?>" method="POST"
                                style="display: inline">
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure delete <?= $key['category_name'] ?>?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
</div>
<?= $this->endSection() ?>