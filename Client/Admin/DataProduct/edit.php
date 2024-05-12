<?php
require "../../../Server/Config/Read/productRead.php";
$id = $_GET['id'];

$product = query("SELECT a.*,b.category AS category_name FROM products a INNER JOIN categories b ON a.category_id=b.id_category WHERE a.id_product = $id")[0];

$categories = query('SELECT * FROM categories');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Edit Data Product</title>
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
                    <h1 class="mt-4">Edit Data Products</h1>
                    <hr>
                    <br>
                    <form action="../../../Server/Config/Update/updateProduct.php" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="hidden" name="id" value="<?= $product['id_product']; ?>">
                            <input type="hidden" name="old_photo" value="<?= $product['photo']; ?>">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="product_name" name="product_name" value="<?= $product['product_name']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="category" class="form-label">Category</label>
                            <select class="form-select" id="category" name="category">
                                <option selected>Choose...</option>
                                <?php foreach ($categories as $category) : ?>
                                    <?php if ($category['id_category'] == $product['category_id']) : ?>
                                        <option value="<?= $category['id_category']; ?>" selected><?= $category['category']; ?></option>
                                    <?php else : ?>
                                        <option value="<?= $category['id_category']; ?>"><?= $category['category']; ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3" name="description"><?= $product['description']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="size" class="form-label">Size</label>
                            <input type="text" class="form-control" id="size" name="size" value="<?= $product['size']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="stock" class="form-label">Stock</label>
                            <input type="text" class="form-control" id="size" name="stock" value="<?= $product['stock']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="text" class="form-control" id="price" name="price" value="<?= $product['price']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Images</label>
                            <input class="form-control" type="file" id="formFile" name="photo">
                            <img src="../../Assets/img/product/<?= $product['photo']; ?>" alt="" width="100" class="mt-3">
                        </div>
                        <hr>

                        <button type="button" class="btn btn-secondary" onclick="window.location.href = 'product.php';">Back</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
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