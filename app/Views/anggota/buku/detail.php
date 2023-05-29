<?= $this->extend('admin/layout'); ?>

<?= $this->section('isi'); ?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Buku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Detail Buku</li>
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
                                <img src="/img/<?php echo $buku['img']; ?>" alt="sampulbuku" class="sampuldetail">
                            </div>

                            <label for="">Judul Buku</label>
                            <p><?php echo $buku['judul']; ?></p>

                            <label for="">ISBN Buku</label>
                            <p><?php echo $buku['ISBN']; ?></p>

                            <label for="">Kategori Buku</label>
                            <p><?php echo $buku['kategori']; ?></p>

                            <label for="">Pengarang Buku</label>
                            <p><?php echo $buku['pengarang']; ?></p>

                            <label for="">Penerbit Buku</label>
                            <p><?php echo $buku['penerbit']; ?></p>

                            <label for="">Tahun Terbit Buku</label>
                            <p><?php echo $buku['tahun_terbit']; ?></p>

                            <label for="">Stok Buku</label>
                            <p><?php echo $buku['stok']; ?></p>

                            <label for="">Rak Buku</label>
                            <p><?php echo $buku['rak']; ?></p>

                            <label for="">Deskripsi Buku</label>
                            <p><?php echo $buku['deskripsi']; ?></p>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <a href="<?php echo base_url('anggota/buku'); ?>" class="btn btn-outline-info">Back</a>
                                </div>
                                <div class="float-right">
                                    <a href="<?php echo base_url('anggota/pinjam' . $buku['id_buku']);  ?>" class="btn btn-primary">Pinjam</a>

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