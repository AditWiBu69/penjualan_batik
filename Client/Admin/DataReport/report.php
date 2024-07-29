<?php
session_start();
require '../../../Server/Config/Read/productRead.php';

// Default query untuk mengambil semua transaksi
$query = 'SELECT a.*, b.*, c.*, d.* 
          FROM transactions a 
          INNER JOIN products b ON a.product_id = b.id_product 
          INNER JOIN users c ON a.user_id = c.id 
          INNER JOIN biodata d ON c.id = d.user_id';

// Tambahkan kondisi berdasarkan filter jika ada
$conditions = [];
$selectedMonth = isset($_GET['selected_month']) ? $_GET['selected_month'] : date('m');
$selectedYear = isset($_GET['selected_year']) ? $_GET['selected_year'] : date('Y');
$selectedStatus = isset($_GET['selected_status']) ? $_GET['selected_status'] : '';

if ($selectedMonth) {
    $conditions[] = "MONTH(a.date) = '$selectedMonth'";
}
if ($selectedYear) {
    $conditions[] = "YEAR(a.date) = '$selectedYear'";
}
if ($selectedStatus) {
    $conditions[] = "a.status = '$selectedStatus'";
}

// Tambahkan kondisi ke query jika ada
if (count($conditions) > 0) {
    $query .= ' WHERE ' . implode(' AND ', $conditions);
}

$transactions = query($query);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Data Report</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="../../Assets/css/dashboard.css" rel="stylesheet" />
    <link href="../../Assets/css/popup.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <?php include '../Partials/navbar.php'; ?>


    <div id="layoutSidenav">
        <?php include '../Partials/sidebar.php'; ?>

        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Data Pembeli</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item"><a href="../admin.php">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data</li>
                    </ol>
                    <div class="mb-3">
                        <div class="mb-3">
                            <form method="get" class="col-sm-6 d-flex flex-row-reverse w-100">
                                <button type="submit" class="btn btn-success ms-2">Filter</button>
                                <select name="selected_status" class="form-select" style="width: 150px;">
                                    <option value="">All Status</option>
                                    <option value="Pending" <?= ($selectedStatus == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                    <option value="Success" <?= ($selectedStatus == 'Success') ? 'selected' : ''; ?>>Success</option>
                                    <option value="Failed" <?= ($selectedStatus == 'Failed') ? 'selected' : ''; ?>>Failed</option>
                                </select>
                                <select name="selected_month" class="form-select" style="width: 210px;">
                                    <?php
                                    $selectedMonth = isset($_GET['selected_month']) ? $_GET['selected_month'] : date('m');
                                    $months = [
                                        "01" => "January", "02" => "February", "03" => "March", "04" => "April",
                                        "05" => "May", "06" => "June", "07" => "July", "08" => "August",
                                        "09" => "September", "10" => "October", "11" => "November", "12" => "December"
                                    ];

                                    foreach ($months as $monthNumber => $monthName) {
                                        $selected = ($selectedMonth == $monthNumber) ? "selected" : "";
                                        echo "<option value='$monthNumber' $selected>$monthName</option>";
                                    }
                                    ?>
                                </select>
                                <select name="selected_year" class="form-select" style="width: 100px;">
                                    <?php
                                    $selectedYear = isset($_GET['selected_year']) ? $_GET['selected_year'] : date('Y');
                                    $startYear = 2022;
                                    $endYear = 2030;

                                    for ($year = $startYear; $year <= $endYear; $year++) {
                                        $selected = ($selectedYear == $year) ? "selected" : "";
                                        echo "<option value='$year' $selected>$year</option>";
                                    }
                                    ?>
                                </select>
                            </form>
                        </div>

                    </div>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Data Pembeli
                        </div>
                        <div class="card-body">
                            <table id="datatablesSimple">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Buyer Name</th>
                                        <th>Id Transaction</th>
                                        <th>Date</th>
                                        <th>Quantity</th>
                                        <th>Transfer Proof</th>
                                        <th>Total</th>
                                        <th>Rekening Number</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($transactions)) : ?>
                                        <?php $i = 1; ?>
                                        <?php foreach ($transactions as $transaction) : ?>
                                            <tr>
                                                <td><?= $i; ?></td>
                                                <td><?= $transaction['name']; ?></td>
                                                <td><?= $transaction['id_transaction']; ?></td>
                                                <?php
                                                $date = $transaction['date']; // format dari database: YYYY-MM-DD
                                                $formatted_date = date("d-m-Y", strtotime($date));
                                                ?>
                                                <td><?= $formatted_date; ?></td>
                                                <td><?= $transaction['quantity']; ?></td>
                                                <td><?= $transaction['total']; ?></td>
                                                <td><?= $transaction['rekening_number']; ?></td>
                                                <td>
                                                    <a href="#" class="text-center open-popup-link" data-id="<?= $transaction['id_transaction']; ?>" data-file="<?= $transaction['transfer']; ?>">
                                                        <i class="fa-solid fa-image"></i>
                                                    </a>
                                                </td>
                                                <td>
                                                    <form action="../../../Server/Config/Update/updateStatus.php" method="POST" class="d-flex gx-4">
                                                        <select class="form-select form-select-sm" name="new_status">
                                                            <option value="Pending" <?= ($transaction['status'] == 'Pending') ? 'selected' : ''; ?>>Pending</option>
                                                            <option value="Success" <?= ($transaction['status'] == 'Success') ? 'selected' : ''; ?>>Success</option>
                                                            <option value="Failed" <?= ($transaction['status'] == 'Failed') ? 'selected' : ''; ?>>Failed</option>
                                                        </select>
                                                        <input type="hidden" name="id_transaction" value="<?= $transaction['id_transaction']; ?>">
                                                        <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa-solid fa-pen-square"></i>
                                                        </button>
                                                    </form>
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
    <script>
        $(document).ready(function() {
            $('.open-popup-link').click(function() {
                var fileId = $(this).data('file');
                var imageUrl = '../../Assets/img/product/' + fileId; // Ganti dengan path ke folder gambar Anda
                $('#modalImage').attr('src', imageUrl);
                $('#imageModal').modal('show');
            });
        });
    </script>

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


<!-- Modal untuk menampilkan gambar -->
<div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body d-flex justify-content-center">
                <img id="modalImage" src="" alt="Gambar Laporan" width="775">
            </div>
        </div>
    </div>
</div>