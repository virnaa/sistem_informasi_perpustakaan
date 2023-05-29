<?= $this->extend('admin/layout'); ?>

<?= $this->section('isi'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tambah Anggota</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Anggota">Home</a></li>
                        <li class="breadcrumb-item active">Tambah Anggota</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('anggota/store'); ?>" method="post" enctype="multipart/form-data">

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
                                    <label for="">NIS Anggota</label>
                                    <input type="text" class="form-control  " name="NIS" placeholder="Masukan Nomor Induk Siswa">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Anggota</label>
                                    <input type="text" class="form-control" name="nama_anggota" placeholder="Masukan nama anggota">
                                </div>
                                <div class="form-group">
                                    <label for="">Kelas Anggota</label>
                                    <input type="text" class="form-control" name="kelas" placeholder="Masukan kelas anggota">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label>
                                    <select name="jk_anggota" id="jk_anggota" name="jk_anggota" class="form-control">
                                        <option value="">-Pilih Jenis Kelamin-</option>
                                        <option value="P">Perempuan</option>
                                        <option value="L">Laki-laki</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat Anggota</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Masukan alamat anggota">
                                </div>
                                <div class="form-group">
                                    <label for="">No. Telepon</label>
                                    <input type="text" class="form-control" name="tlp_anggota" placeholder="Masukan no. telepon">
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Masukan username">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" class="form-control" name="password" placeholder="Masukan password">
                                </div>
                                <div class="form-group">
                                    <label>Foto Profil</label>
                                    <div class="col-sm-2">
                                        <img src="/img/default.png" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img" name="img" onchange="previewImg()">
                                        <label class=" custom-file-label" for="img">Pilih Gambar...</label>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <a href="<?php echo base_url('Anggota'); ?>" class="btn btn-outline-info">Back</a>
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