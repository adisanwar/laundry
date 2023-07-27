<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Your head section content goes here -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Transaksi laundry</title>
    <!-- Add Bootstrap CSS link here -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="my-4 text-center">Laporan Transaksi laundry</h2>
        <table class="table table-bordered " style="text-align:right; border: 1px solid black;">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Paket Laundry</th>
                    <th>Jenis Laundry</th>
                    <th>Berat (Kg) / Pcs</th>
                    <th>Harga</th>
                    <th>Pembayaran</th>
                    <th>Total Harga</th>
                    <th>Status</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($customers as $or) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $or['full_name']; ?></td>
                        <td><?= $or['alamat']; ?></td>
                        <td><?= $or['no_hp']; ?></td>
                        <td><?= $or['paket_laundry']; ?></td>
                        <td><?= $or['jenis']; ?></td>
                        <td><?= $or['berat']; ?></td>
                        <td>Rp. <?= $or['harga']; ?></td>
                        <td><?= $or['pembayaran']; ?></td>
                        <td>Rp. <?= $or['total']; ?></td>
                        <td><?= $or['status']; ?></td>
                        <td><?= $or['created_at']; ?></td>
                        <td><?= $or['updated_at']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="9" style="text-align:center; ">Total Pendapatan</th>
                    <th colspan="4" style="text-align:left; ">
                    Rp. <?= number_format(calculateTotalPendapatan($customers), 0, ',', '.'); ?>
                    </th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- Add Bootstrap JS and jQuery scripts here -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Function to calculate the total pendapatan from the 'total' column in the $customers array
function calculateTotalPendapatan($data) {
    $totalPendapatan = 0;
    foreach ($data as $or) {
        $totalPendapatan += intval($or['total']);
    }
    return $totalPendapatan;
}
?>
