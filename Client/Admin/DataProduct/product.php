<?php
require '../../../Server/Config/Read/productRead.php';

$products = query('SELECT a.*,b.category AS category_name FROM products a INNER JOIN categories b ON a.category_id=b.id_category');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Product</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../Assets/css/dashboard.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include '../Partials/navbar.php'; ?>


    <div id="layoutSidenav">
        <?php include '../Partials/sidebar.php'; ?>

        <div id="layoutSidenav_content">
            <main>

                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Products</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../admin.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data</li>
                    </ol>

                    <button type="button" class="btn btn-success" onclick="window.location.href = 'tambah.php';">Add Data</button>
                    <br><br>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Products
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No .</th>
                                        <th>Images</th>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Size</th>
                                        <th>Stock</th>
                                        <th>Price</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (empty($products)) : ?>
                                        <tr>
                                            <td colspan="8">Product belum ada</td>
                                            
                                        </tr>
                                    <?php else : ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($products as $product) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><img src="../../Assets/img/product/<?= $product["photo"]; ?>" width="100" alt=""></td>
                                                <td><?= $product['product_name']; ?></td>
                                                <td><?= $product['description']; ?></td>
                                                <td><?= $product['size']; ?></td>
                                                <td><?= $product['stock']; ?></td>
                                                <td>Rp. <?= $product['price']; ?></td>
                                                <td>
                                                    <a href="edit.php?id=<?= $product['id_product']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="delete.php?id=<?= $product['id_product']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure want to delete this product?..')">Delete</a>
                                                </td>
                                            </tr>
                                            <?php $i++; ?>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </main>

        </div>




    </div>
    </div>
    <script src="../../Assets/js/table.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>