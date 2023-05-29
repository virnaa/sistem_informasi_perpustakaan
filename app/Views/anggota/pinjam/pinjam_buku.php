<?= $this->extend('admin/layout'); ?>
<?= $this->section('isi'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Pinjam">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Peminjaman</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('anggota/pinjam/store'); ?>" method="post" enctype="multipart/form-data">

                        <div class="card">
                            <div class="card-body">

                                <?php if (!empty(session()->getFlashdata('danger'))) { ?>
                                    <div class="alert alert-danger">
                                        <?php echo session()->getFlashdata('danger'); ?>
                                    </div>
                                <?php } ?>

                                <?php
                                $inputs = session()->getFlashdata('inputs');
                                $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        Whoops! Ada kesalahan saat input data, yaitu:
                                        <ul>
                                            <?php foreach ($errors as $error) : ?>
                                                <li><?= esc($error) ?></li>
                                            <?php endforeach ?>
                                        </ul>
                                    </div>
                                <?php } ?>

                                <input type="hidden" name="status_pinjam" value="1">
                                <input type="hidden" name="id_anggota" value="<?= session()->get('id_anggota'); ?>">
                                <input type="hidden" name="id_buku" value="<?php echo $buku['id_buku']; ?>">
                                <div class="form-group">
                                    <label for="">Buku yang dipinjam</label>
                                    <p><?php echo $buku['judul']; ?></p>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Pinjam</label>
                                    <div class="col-3">
                                        <input class="form-control" name="tgl_pinjam" type="date" id="example-date-input">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Tanggal Kembali</label>
                                    <div class="col-3">
                                        <input class="form-control" name="tgl_kembali" type="date" id="example-date-input">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="">Jumlah Buku </label>
                                    <input type="text" class="form-control" name="total_buku" placeholder="Masukan jumlah buku">
                                </div>
                                <div class=" form-group">
                                    <div class="card-footer">
                                        <a href="<?php echo base_url('anggota/pinjam'); ?>" class="btn btn-outline-info">Back</a>
                                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                                    </div>
                                </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>