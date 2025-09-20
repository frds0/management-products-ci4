<?= $this->extend('layout.php') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.css" />
<div class="bg-light p-5 mt-3 rounded">
    <h1>List Products</h1>
    <div class="row mt-4">
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success">
                <?= session()->getFlashdata('success') ?>
            </div>
        <?php endif; ?>
        <div class="col mb-4">
            <a href="<?= base_url('products/create') ?>" class="btn btn-primary">Insert Product</a>
        </div>
        <table id="products-table" class="table table-striped table-bordered">
            <thead>
                <tr class="text-center">
                    <th scope="col">No</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Category</th>
                    <th scope="col">Stok</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.23/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#products-table').DataTable({
            "processing": true,
            "serverSide": true,
            "ordering": true,
            "order": [
                [0, 'asc']
            ],
            "ajax": {
                "url": "<?= base_url('products/ajaxList') ?>",
                "type": "POST"
            },
            "columns": [{
                    "data": null,
                    "orderable": false
                },
                {
                    "data": "product_name"
                },
                {
                    "data": "category_name"
                },
                {
                    "data": "stok",
                    "className": "text-center"
                },
                {
                    "data": "action",
                    "orderable": false,
                    "className": "text-center"
                }
            ],
            "columnDefs": [{
                "targets": 0,
                "render": function(data, type, row, meta) {
                    return meta.row + meta.settings._iDisplayStart + 1;
                }
            }],
            "language": {
                "processing": "Processing...",
                "search": "Search:",
                "lengthMenu": "Show _MENU_ entries",
                "info": "Showing _START_ to _END_ of _TOTAL_ entries",
                "infoEmpty": "Showing 0 to 0 of 0 entries",
                "infoFiltered": "(filtered from _MAX_ total entries)",
                "zeroRecords": "No matching records found",
                "paginate": {
                    "first": "First",
                    "last": "Last",
                    "next": "Next",
                    "previous": "Previous"
                }
            }
        });
    });
</script>

<!-- MODAL VIEW -->
<?php foreach ($products as $pr) { ?>
    <div class="modal fade" id="viewDetailProduct<?= $pr['id'] ?>" tabindex="-1" aria-labelledby="viewDetailProductLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="viewDetailProductLabel">Product Detail</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3 row">
                        <label for="category_name" class="col-sm-3 col-form-label">Category Product</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control-plaintext" readonly id="category_name" name="category_name" value=": <?= $pr['category_name'] ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="product_name" class="col-sm-3 col-form-label">Product Name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control-plaintext" readonly id="product_name" name="product_name" value=": <?= $pr['product_name'] ?>" required>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="stok" class="col-sm-3 col-form-label">Stok</label>
                        <div class="col-sm-2">
                            <input type="text" min="0" class="form-control-plaintext" readonly id="stok" name="stok" value=": <?= $pr['stok'] ?>" required>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?= $this->endSection() ?>