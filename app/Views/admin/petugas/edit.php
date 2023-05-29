<?= $this->extend('admin/layout'); ?>

<?= $this->section('isi'); ?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Edit petugas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Petugas">Home</a></li>
                        <li class="breadcrumb-item active">Edit petugas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('petugas/update'); ?>" method="post" enctype="multipart/form-data">
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

                                <input type="hidden" name="id_petugas" value="<?php echo $petugas['id_petugas']; ?>">
                                <input type="hidden" name="imgLama" value="<?php echo $petugas['img_petugas']; ?>">
                                <div class="form-group">
                                    <label for="">Nama petugas</label>
                                    <input type="text" value="<?php echo $petugas['nama_petugas']; ?>" class="form-control" name="nama_petugas" placeholder="Masukan nama petugas">
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis kelamin petugas</label>
                                    <select name="jenis_kelamin" id="jenis_kelamin" name="jenis_kelamin" class="form-control">
                                        <option value=""><?php echo $jk = $petugas['jenis_kelamin'];
                                                            if ($jk == 'L') {
                                                                echo "aki-laki";
                                                            } else {
                                                                echo "erempuan";
                                                            }
                                                            ?></option>
                                        <option <?php echo $petugas['jenis_kelamin'] == "P" ? "selected" : ""; ?> value="P">Perempuan</option>
                                        <option <?php echo $petugas['jenis_kelamin'] == "L" ? "selected" : ""; ?> value="L">Laki-laki</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat petugas</label>
                                    <input type="text" class="form-control" name="alamat" placeholder="Masukan alamat petugas" value="<?php echo $petugas['alamat']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">No. Telepon petugas</label>
                                    <input type="text" class="form-control" name="no_tlp" placeholder="Masukan tahun terbit petugas" value="<?php echo $petugas['no_tlp']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Masukan username" value="<?php echo $petugas['username']; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Password</label>
                                    <input type="text" class="form-control" name="password" placeholder="Masukan password" value="<?php echo $petugas['password2']; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Foto Profil</label>
                                    <div class="col-sm-2">
                                        <img src="/img/<?= $petugas['img_petugas']; ?>" class="img-thumbnail img-preview">
                                    </div>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="img" name="img" onchange="previewImg()">
                                        <label class=" custom-file-label" for="img"> <?= $petugas['img_petugas']; ?></label>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('Petugas'); ?>" class="btn btn-outline-info">Back</a>
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