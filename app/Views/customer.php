<?= $this->extend('layouts/components/template') ?>
<?= $this->section('content') ?>
<!-- Mulai Konten Halaman -->
<div class="container-fluid">
    <!-- Judul Halaman -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Customer</h1>
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

    <!-- Tabel Data Customer -->
    <div class="card shadow mb-4">
        <div class="card-header">
            <a href="" data-target="#tambahCustomer" data-toggle="modal" class="btn btn-sm btn-primary">Tambah Customer</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>No HP</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($customers as $cs) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $cs['full_name'] ?></td>
                                <td><?= $cs['alamat'] ?></td>
                                <td><?= $cs['email'] ?></td>
                                <td><?= $cs['no_hp'] ?></td>
                                <td>
                                    <a href="" data-toggle="modal" data-target="#editCustomer<?= $cs['id'];?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="<?= base_url('customer/delete/'.$cs['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data customer ini?')">Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <!-- Modal Edit Customer -->
                <?php foreach ($customers as $cs) : ?>
                    <div class="modal fade" id="editCustomer<?= $cs['id'];?>" tabindex="-1" role="dialog" aria-labelledby="editCustomer" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editCustomer">Edit Data Customer</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo base_url('customer/edit/' . $cs['id']) ?>" method="post">
                                        <div class="form-group">
                                            <label for="full_name" class="col-form-label">Nama</label>
                                            <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $cs['full_name'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat" class="col-form-label">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat"><?= $cs['alamat'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="email" class="col-form-label">Email</label>
                                            <input type="text" class="form-control" id="email" name="email" value="<?= $cs['email'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp" class="col-form-label">No Hp</label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $cs['no_hp'] ?>" pattern="0[0-9]+.*">
                                        </div>
                                        <div class="form-group" style="display: none;">
                                            <label for="updated_at"></label>
                                            <input type="date" id="updated_at" name="updated_at" value="<?= date('Y-m-d') ?>" required>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

                <!-- Modal Tambah Customer -->
                <div class="modal fade" id="tambahCustomer" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Customer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="<?= base_url('customer/create'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="full_name" class="col-form-label">Nama</label>
                                        <input type="text" class="form-control" id="full_name" name="full_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat" class="col-form-label">Alamat</label>
                                        <textarea class="form-control" id="alamat" name="alamat"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-form-label">Email</label>
                                        <input type="text" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="no_hp" class="col-form-label">No Hp</label>
                                        <input type="text" class="form-control" id="no_hp" name="no_hp" pattern="0[0-9]+.*">
                                    </div>
                                    <div class="form-group" style="display: none;">
                                        <label for="created_at"></label>
                                        <input type="date" id="created_at" name="created_at" value="<?= date('Y-m-d') ?>" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Tambah</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
<script>
    // Panggil plugin dataTables jQuery
    $(document).ready(function() {
        $('#dataTable').DataTable();
    });
</script>
<?= $this->endSection() ?>
