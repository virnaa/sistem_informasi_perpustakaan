<?= $this->extend('admin/layout'); ?>

<?= $this->section('isi'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Buku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Buku">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Buku</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('buku/store'); ?>" method="post" enctype="multipart/form-data">

                        <div class="card">
                            <div class="card-body">
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

                                <div class="form-group">
                                    <label for="">Judul Buku</label>
                                    <input type="text" class="form-control  " name="judul" placeholder="Masukan judul buku">
                                </div>
                                <div class="form-group">
                                    <label for="">ISBN Buku</label>
                                    <input type="text" class="form-control" name="ISBN" placeholder="Masukan ISBN buku">
                                </div>
                                <div class="form-group">
                                    <label for="">Kategori Buku</label>
                                    <input type="text" class="form-control" name="kategori" placeholder="Masukan kategori buku">
                                </div>
                                <div class="form-group">
                                    <label for="">Pengarang Buku</label>
                                    <input type="text" class="form-control" name="pengarang" placeholder="Masukan pengarang buku">
                                </div>
                                <div class="form-group">
                                    <label for="">Penerbit Buku</label>
                                    <input type="text" class="form-control" name="penerbit" placeholder="Masukan penerbit buku" >
                                </div>
                                <div class="form-group">
                                    <label for="">Tahun Terbit Buku</label>
                                    <input type="text" class="form-control" name="tahun_terbit" placeholder="Masukan tahun terbit buku">
                                </div>
                                <div class="form-group">
                                    <label for="">Stok Buku</label>
                                    <input type="text" class="form-control" name="stok" placeholder="Masukan stok buku" >
                                </div>
                                <div class="form-group">
                                    <label for="">Rak Buku</label>
                                    <input type="text" class="form-control" name="rak" placeholder="Masukan rak buku">
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi Buku</label>
                                    <input type="text" class="form-control" name="deskripsi" placeholder="Masukan deskripsi buku">
                                </div>
                                <div class="form-group">
                                    <label>Gambar Buku</label>
                                    <div class="col-sm-2">
                                        <img src="/img/default.png" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img" name="img" onchange="previewImg()">
                                        <label class=" custom-file-label" for="img">Pilih Gambar...</label>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="<?php echo base_url('Buku'); ?>" class="btn btn-outline-info">Back</a>
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