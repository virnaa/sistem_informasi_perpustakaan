<?= $this->extend('admin/layout'); ?>
<?= $this->section('isi'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Pengembalian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Pinjam">Home</a></li>
                        <li class="breadcrumb-item active">Detail Pengembalian</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="<?php echo base_url('kembali/store'); ?>" method="post" enctype="multipart/form-data">

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
                                <input type="hidden" name="id_pinjam" value="<?php echo $pinjam['id_pinjam']; ?>">
                                <label for="">Nama Anggota</label>
                                <p><?php echo $pinjam['nama_anggota']; ?></p>
                                <input type="hidden" name="id_anggota" value="<?php echo $pinjam['id_anggota']; ?> type=" date">

                                <label for="">Tanggal Pinjam</label>
                                <p><?php echo $pinjam['tgl_pinjam']; ?></p>
                                <input type="hidden" name="tgl_pinjam" value="<?php echo $pinjam['tgl_pinjam']; ?>">

                                <label for="">Tanggal Kembali</label>
                                <p><?php echo $pinjam['tgl_kembali']; ?></p>
                                <input type="hidden" name="tgl_kembali" value="<?php echo $pinjam['tgl_kembali']; ?>">

                                <label for="">Buku yang dipinjam</label>
                                <p><?php echo $pinjam['judul']; ?></p>
                                <input type="hidden" name="id_buku" value="<?php echo $pinjam['id_buku']; ?>">

                                <label for="">Jumlah Buku </label>
                                <p><?php echo $pinjam['total_buku']; ?></p>
                                <input type="hidden" name="total_buku" value="<?php echo $pinjam['total_buku']; ?>">

                                <div class="form-group">
                                    <label for="">Tanggal Pengembalian</label>
                                    <div class="col-3">
                                        <input class="form-control" name="tgl_dikembalikan" type="date">
                                    </div>
                                </div>

                                <div class=" form-group">
                                    <div class="card-footer">
                                        <a href="<?php echo base_url('Pinjam'); ?>" class="btn btn-outline-info">Back</a>
                                        <button type="submit" class="btn btn-primary float-right">Simpan Pengembalian</button>
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