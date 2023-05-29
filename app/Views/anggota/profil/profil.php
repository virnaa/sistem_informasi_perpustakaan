<?= $this->extend('admin/layout'); ?>

<?= $this->section('isi'); ?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Profil Anggota</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/anggota/dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Profil Anggota</li>
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
                                <?php
                            if (!empty(session()->getFlashdata('success'))) { ?>
                                <div class="alert alert-success">
                                    <?php echo session()->getFlashdata('success'); ?>
                                </div>
                            <?php } ?>

                            <?php if (!empty(session()->getFlashdata('info'))) { ?>
                                <div class="alert alert-info">
                                    <?php echo session()->getFlashdata('info'); ?>
                                </div>
                            <?php } ?>

                            <?php if (!empty(session()->getFlashdata('danger'))) { ?>
                                <div class="alert alert-danger">
                                    <?php echo session()->getFlashdata('danger'); ?>
                                </div>
                            <?php } ?>

                            <?php if (isset($message)) : ?>
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    <?php echo $message; ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                </div>
                            <?php endif; ?>

                            <?php if (!empty(session()->getFlashdata('warning'))) { ?>
                                <div class="alert alert-warning">
                                    <?php echo session()->getFlashdata('warning'); ?>
                                </div>
                            <?php } ?>

                                <img src="/img/<?php echo $anggota['img_anggota']; ?>" alt="profil" class="sampuldetail">
                            </div>

                            <label for="">NIS</label>
                            <p><?php echo $anggota['NIS']; ?></p>

                            <label for="">Nama</label>
                            <p><?php echo $anggota['nama_anggota']; ?></p>

                            <label for="">Kelas</label>
                            <p><?php echo $anggota['kelas']; ?></p>

                            <label for="">Jenis Kelamin</label>
                            <p><?php echo $jk = $anggota['jk_anggota'];
                                if ($jk == 'L') {
                                    echo "aki-laki";
                                } else {
                                    echo "erempuan";
                                }
                                ?></p>

                            <label for="">Alamat</label>
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
                                <div class="float-right">
                                    <a href="<?php echo base_url('anggota/profil/edit/' . $anggota['id_anggota']);  ?>" class="btn btn-primary">Edit Profil</a>
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