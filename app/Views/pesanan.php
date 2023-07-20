<?= $this->extend('layouts/components/template') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Order Laundry</h1>
    </div>
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
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <button data-target="#tambahOrder" data-toggle="modal" class="btn btn-primary btn-sm" type="submit">Tambah
                Laundrian</button>
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <?php $no = 1; ?>
                            <?php foreach ($orders as $or): ?>
                                <td>
                                    <?= $no++; ?>
                                </td>
                                <td>
                                    <?= $or['full_name']; ?>
                                </td>
                                <td>
                                    <?= $or['alamat']; ?>
                                </td>
                                <td>
                                    <?= $or['no_hp']; ?>
                                </td>
                                <td>
                                    <?= $or['paket_laundry']; ?>
                                </td>
                                <td>
                                    <?= $or['jenis']; ?>
                                </td>
                                <td>
                                    <?= $or['berat']; ?>
                                </td>
                                <td>
                                    <?= $or['harga']; ?>
                                </td>
                                <td>
                                    <?= $or['pembayaran']; ?>
                                </td>
                                <td>
                                    <?= $or['total']; ?>
                                </td>
                                <td>
                                    <?= $or['status']; ?>
                                </td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#edithOrder<?= $or['id']; ?>"
                                        class="btn btn-sm btn-primary">Edit</a>
                                    <a href="<?php echo base_url('pesanan/delete/' . $or['id']) ?>"
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this customer?')">Delete</a>
                                </td>
                            </tr>
                        </tbody>

                    <?php endforeach; ?>
                </table>

            </div>
        </div>
    </div>

    <div class="modal fade" id="tambahOrder" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Order laundry</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('pesanan/store'); ?>" method="post">
                        <div class="form-grup">
                            <label for="customer_id">Pilih Customer</label>
                            <select name="customer_id" id="customer_id" class="form-control">
                                <option value="">-- Pilih Customers --</option>
                                <?php foreach ($customers as $cs): ?>
                                    <option value="<?= $cs['id']; ?>"><?= $cs['full_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="paket_laundry">Pilih Paket Laundry</label>
                            <select name="paket_laundry" id="paket_laundry" class="form-control"
                                onchange="hitungTotal()">
                                <option value="">-- Pilih Paket Laundry --</option>
                                <option value="Paket Biasa">Paket Biasa</option>
                                <option value="Paket Express">Paket Express</option>

                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jenis" class="col-form-label">Jenis Laundry</label>
                            <select name="jenis" id="jenis" class="form-control">
                                <option value=""> Pilih Jenis Laundry </option>
                                <option value="Kiloan"> Kiloan (kg) </option>
                                <option value="Satuan"> Satuan (pcs) </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="pembayaran" class="col-form-label">Metode Pembayaran</label>
                            <select name="pembayaran" id="pembayaran" class="form-control">
                                <option value=""> Pilih pembayaran </option>
                                <option value="Cash"> Cash </option>
                                <option value="Transfer"> Trf </option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="berat" class="col-form-label">Berat / Pcs</label>
                            <input type="text" class="form-control" id="berat" name="berat" oninput="hitungTotal()">
                        </div>
                        <div class="form-group">
                            <label for="harga" class="col-form-label">Harga</label>
                            <input type="text" class="form-control" id="harga" name="harga" readonly>
                        </div>
                        <div class="form-group">
                            <label for="total" class="col-form-label">Total Harga</label>
                            <input type="text" class="form-control" id="total" name="total" readonly>
                        </div>

                        <div class="form-group" style="display: none;">
                            <label for="status" class="col-form-label">status</label>
                            <input type="text" class="form-control" id="status" name="status" value="Laundry Masuk">
                        </div>
                        <div class="form-group" style="display: none;">
                        <label for="created_at"></label>
                        <input type="date" id="created_at" name="created_at" value="<?= date('Y-m-d') ?>" required>
                         </div>           
                        <!-- Tombol "Tambah" seharusnya berada di dalam form -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
    <script>
        function hitungTotal() {
            // Ambil nilai dari input
            var paketLaundry = document.getElementById("paket_laundry").value;
            var jenis = document.getElementById("jenis").value;
            var berat = parseFloat(document.getElementById("berat").value);

            // Hitung total harga
            var hargaPerSatuanBiasa = 5000;
            var hargaPerSatuanExpress = 7000;
            var hargaPerKiloBiasa = 6000;
            var hargaPerKiloExpress = 8000;

            var totalHarga = 0;

            if (paketLaundry === 'Paket Biasa' && jenis === 'Satuan') {
                totalHarga = hargaPerSatuanBiasa * berat;
            } else if (paketLaundry === 'Paket Express' && jenis === 'Satuan') {
                totalHarga = hargaPerSatuanExpress * berat;
            } else if (paketLaundry === 'Paket Biasa' && jenis === 'Kiloan') {
                totalHarga = hargaPerKiloBiasa * berat;
            } else if (paketLaundry === 'Paket Express' && jenis === 'Kiloan') {
                totalHarga = hargaPerKiloExpress * berat;
            }

            // Tampilkan hasil perhitungan pada form
            document.getElementById("harga").value = totalHarga;
            document.getElementById("total").value = totalHarga;
        }
    </script>



    <?= $this->endSection() ?>