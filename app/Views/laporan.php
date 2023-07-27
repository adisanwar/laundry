<?= $this->extend('layouts/components/template') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->

<head>
    <!-- Other meta tags and stylesheets -->

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- Bootstrap Datepicker CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
</head>

<?php
if (session()->getFlashData('success')) {
?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= session()->getFlashData('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
<?php
}
?>

<body>

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Rekap Transaksi</h1>
        </div>


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header">
                <a href="<?= base_url('generate') ?>" class="btn btn-primary btn-sm" type="submit">Export PDF</a>
            </div>
            <div class="col-md-12" style="margin-bottom: 5px">
                <div class="row">
                    <div class="col-md-2">
                        <span>Pilih dari tanggal</span>
                        <div class="input-group">
                            <input type="text" class="form-control pickdate date_range_filter" name="">
                            <!-- Use "input-group-addon" class for the icon container -->
                            <span class="input-group-addon" id="basic-addon2"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <span>Sampai tanggal</span>
                        <div class="input-group">
                            <input type="text" class="form-control pickdate date_range_filter2" name="">
                            <!-- Use "input-group-addon" class for the icon container -->
                            <span class="input-group-addon" id="basic-addon2"><i class="glyphicon glyphicon-calendar"></i></span>
                        </div>
                    </div>



                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                    <td><?= $or['harga']; ?></td>
                                    <td><?= $or['pembayaran']; ?></td>
                                    <td><?= $or['total']; ?></td>
                                    <td><?= $or['status']; ?></td>
                                    <td><?= $or['created_at']; ?></td>
                                    <td><?= $or['updated_at']; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="9">Total Pendapatan</th>
                                <th colspan="4" id="overallTotal"></th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- DataTables and Bootstrap Datepicker JavaScript -->
                <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

                <!-- Your script for date range filtering and other functionalities -->
                <script type="text/javascript">
                    // Your existing script here...
                </script>
            </div>
        </div>
    </div>


    <!-- /.container-fluid -->
</body>
<script>
    $(function() {
        $('#birthpicker').datepicker({
            autoclose: true
        })
    })
</script>
<script>
    // Function to calculate the grand total of the "Total Harga" column
    function calculateGrandTotal() {
        var table = document.getElementsByTagName('table')[0];
        var rows = table.getElementsByTagName('tr');
        var grandTotal = 0;

        for (var i = 1; i < rows.length - 1; i++) { // Start from i=1 to skip the header row and footer row
            var totalHargaCell = rows[i].getElementsByTagName('td')[9]; // Get the Total Harga cell (index 9)
            var totalHarga = parseInt(totalHargaCell.textContent);
            grandTotal += totalHarga;
        }

        return grandTotal;
    }

    // Call the function and display the grand total in the "Total Pendapatan" cell
    document.getElementById('overallTotal').textContent = calculateGrandTotal();
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#dataTable').DataTable({
            "order": [
                [1, "desc"]
            ],
            "ordering": true
        });
        $.fn.dataTable.ext.search.push(
            function(settings, data, dataIndex) {
                var min = $('.date_range_filter').val();
                var max = $('.date_range_filter2').val();
                var createdAt = data[11]; // -> rubah angka 4 sesuai posisi tanggal pada tabelmu, dimulai dari angka 0
                if (
                    (min == "" || max == "") ||
                    (moment(createdAt).isSameOrAfter(min) && moment(createdAt).isSameOrBefore(max))
                ) {
                    return true;
                }
                return false;
            }
        );
        $('.pickdate').each(function() {
            $(this).datepicker({
                format: 'mm/dd/yyyy'
            });
        });
        $('.pickdate').change(function() {
            table.draw();
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<?= $this->endSection() ?>