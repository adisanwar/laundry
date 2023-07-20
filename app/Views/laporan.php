<?= $this->extend('layouts/components/template') ?>
<?= $this->section('content') ?>
<!-- Begin Page Content -->
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
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Rekap Transaksi</h1>
    </div>

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
                            <?php foreach ($customers as $or): ?>
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
                                    <a href="<?= base_url('/pesanan/delete/' . $or['id']) ?>" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this customer?')">Delete</a>
                                </td>
                            </tr>

                        </tbody>
                        
                    <?php endforeach; ?>
                </table>

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->



<?= $this->endSection() ?>