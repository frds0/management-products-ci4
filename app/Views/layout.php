<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/bootstrap-5.3.8-dist/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('assets/DataTables/dataTables.min.css') ?>">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">Management Products</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="d-flex" id="navbarTogglerDemo02">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 fw-bold">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url() ?>">HOME</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('categories') ?>">CATEGORIES</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('products') ?>">PRODUCTS</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>

    <script src="<?= base_url('assets/jquery/jquery.js') ?>"></script>
    <script src="<?= base_url('assets/bootstrap-5.3.8-dist/js/bootstrap.min.js') ?>"></script>
    <script src="<?= base_url('assets/DataTables/dataTables.min.js') ?>"></script>
</body>

</html>