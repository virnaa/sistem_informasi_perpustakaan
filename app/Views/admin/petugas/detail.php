<?= $this->extend('admin/layout'); ?>

<?= $this->section('isi'); ?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Petugas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Petugas">Home</a></li>
                        <li class="breadcrumb-item active">Detail Petugas</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <img src="/img/<?php echo $petugas['img_petugas']; ?>" alt="profil" class="sampuldetail">
                            </div>

                            <label for="">Nama petugas</label>
                            <p><?php echo $petugas['nama_petugas']; ?></p>

                            <label for="">Jenis Kelamin petugas</label>
                            <p><?php echo $jk = $petugas['jenis_kelamin'];
                                if ($jk == 'L') {
                                    echo "aki-laki";
                                } else {
                                    echo "erempuan";
                                }
                                ?></p>

                            <label for="">Alamat Petugas</label>
                            <p><?php echo $petugas['alamat']; ?></p>

                            <label for="">No. Telepon</label>
                            <p><?php echo $petugas['no_tlp']; ?></p>

                            <label for="">Username</label>
                            <p><?php echo $petugas['username']; ?></p>

                            <label for="">Password</label>
                            <p><?php echo $petugas['password2']; ?></p>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <a href="<?php echo base_url('Petugas'); ?>" class="btn btn-outline-info">Back</a>
                                </div>
                                <div class="float-right">
                                    <a href="<?php echo base_url('Petugas/edit/' . $petugas['id_petugas']);  ?>" class="btn btn-primary">Edit</a>
                                    <a href="<?php echo base_url('Petugas/delete/' . $petugas['id_petugas']);  ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus Petugas ini?');">Hapus</a>

                                </div>
                            </div>

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