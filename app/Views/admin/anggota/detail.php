<?= $this->extend('admin/layout'); ?>

<?= $this->section('isi'); ?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Anggota</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Anggota">Home</a></li>
                        <li class="breadcrumb-item active">Detail Anggota</li>
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
                                <img src="/img/<?php echo $anggota['img_anggota']; ?>" alt="profil" class="sampuldetail">
                            </div>

                            <label for="">NIS Anggota</label>
                            <p><?php echo $anggota['NIS']; ?></p>

                            <label for="">Nama Anggota</label>
                            <p><?php echo $anggota['nama_anggota']; ?></p>

                            <label for="">Kelas Anggota</label>
                            <p><?php echo $anggota['kelas']; ?></p>

                            <label for="">Jenis Kelamin Anggota</label>
                            <p><?php echo $jk = $anggota['jk_anggota'];
                                if ($jk == 'L') {
                                    echo "aki-laki";
                                } else {
                                    echo "erempuan";
                                }
                                ?></p>

                            <label for="">Alamat Anggota</label>
                            <p><?php echo $anggota['alamat']; ?></p>

                            <label for="">No. Telepon</label>
                            <p><?php echo $anggota['tlp_anggota']; ?></p>

                            <label for="">Username</label>
                            <p><?php echo $anggota['username']; ?></p>

                            <label for="">Password</label>
                            <p><?php echo $anggota['password2']; ?></p>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <a href="<?php echo base_url('Anggota'); ?>" class="btn btn-outline-info">Back</a>
                                </div>
                                <div class="float-right">
                                    <a href="<?php echo base_url('anggota/edit/' . $anggota['id_anggota']);  ?>" class="btn btn-primary">Edit</a>
                                    <a href="<?php echo base_url('anggota/delete/' . $anggota['id_anggota']);  ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?');">Hapus</a>

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