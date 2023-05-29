<?= $this->extend('admin/layout'); ?>

<?= $this->section('isi'); ?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit Anggota</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Anggota">Home</a></li>
                        <li class="breadcrumb-item active">Edit Anggota</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('anggota/update'); ?>" method="post" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <?php
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

                                <input type="hidden" name="id_anggota" value="<?php echo $anggota['id_anggota']; ?>">
                                <input type="hidden" name="imgLama" value="<?php echo $anggota['img_anggota']; ?>">
                                <div class="form-group">
                                    <label for="">Nomor Induk Siswa</label>
                                    <input type="text" value="<?php echo $anggota['NIS']; ?>" class="form-control" name="NIS" placeholder="Masukkan NIS Anggota">
                                </div>
                                <div class="form-group">
                                    <label for="">Nama anggota</label>
                                    <input type="text" value="<?php echo $anggota['nama_anggota']; ?>" class="form-control" name="nama_anggota" placeholder="Masukan nama anggota">
                                </div>
                                <div class="form-group">
                                    <label for="">Kelas anggota</label>
                                    <input type="text" class="form-control" name="kelas" placeholder="Masukan kelas anggota" value="<?php echo $anggota['kelas']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis kelamin anggota</label>
                                    <select name="jk_anggota" id="jk_anggota" name="jk_anggota" class="form-control">
                                        <option value=""><?php echo $jk = $anggota['jk_anggota'];
                                                            if ($jk == 'L') {
                                                                echo "aki-laki";
                                                            } else {
                                                                echo "erempuan";
                                                            }
                                                            ?></option>
                                        <option <?php echo $anggota['jk_anggota'] == "P" ? "selected" : ""; ?> value="P">Perempuan</option>
                                        <option <?php echo $anggota['jk_anggota'] == "L" ? "selected" : ""; ?> value="L">Laki-laki</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat anggota</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Masukan alamat anggota" value="<?php echo $anggota['alamat']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">No. Telepon anggota</label>
                                    <input type="text" class="form-control" name="tlp_anggota" placeholder="Masukan tahun terbit anggota" value="<?php echo $anggota['tlp_anggota']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Masukan username" value="<?php echo $anggota['username']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" class="form-control" name="password" placeholder="Masukan password" value="<?php echo $anggota['password2']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Foto Profil</label>
                                    <div class="col-sm-2">
                                        <img src="/img/<?= $anggota['img_anggota']; ?>" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img" name="img" onchange="previewImg()">
                                        <label class=" custom-file-label" for="img"> <?= $anggota['img_anggota']; ?></label>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('Anggota'); ?>" class="btn btn-outline-info">Back</a>
                                <button type="submit" class="btn btn-primary float-right">Update</button>
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