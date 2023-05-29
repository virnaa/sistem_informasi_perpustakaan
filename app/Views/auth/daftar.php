<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="/logo.png" rel="icon" type="img/ico">
    <title>Daftar Anggota</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="<?php echo base_url('themes/plugins'); ?>/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('themes/dist'); ?>/css/adminlte.min.css">

</head>

<body class="login">
    <div class="container">
        <br />
        <form action="<?php echo base_url('a_anggota/store'); ?>" method="post" enctype="multipart/form-data">

            <div class="card bg-light text-dark">
                <div class="card-header">
                    <h2>Daftar Anggota</h2>
                </div>
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
                            <option <?php echo $inputs['jk_anggota'] == "P" ? "selected" : ""; ?> value="P">Perempuan</option>
                            <option <?php echo $inputs['jk_anggota'] == "L" ? "selected" : ""; ?> value="L">Laki-laki</option>
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
                        <a href="<?php echo base_url('auth/login'); ?>" class="btn btn-outline-info">Back</a>
                        <button type="submit" class="btn btn-primary float-right">Simpan</button>
                    </div>
                </div>
            </div>
    </div>

    <script src="<?php echo base_url('themes/plugins'); ?>/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('themes/plugins'); ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('themes/dist'); ?>/js/adminlte.min.js"></script>
</body>
<script>
    function previewImg() {
        const img = document.querySelector('#img');
        const imgLabel = document.querySelector('.custom-file-label');
        const imgPreview = document.querySelector('.img-preview');

        imgLabel.textContent = img.files[0].name;

        const fileSampul = new FileReader();
        fileSampul.readAsDataURL(img.files[0]);

        fileSampul.onload = function(e) {
            imgPreview.src = e.target.result;
        }
    }
</script>

</html>