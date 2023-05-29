<?= $this->extend('admin/layout'); ?>

<?= $this->section('isi'); ?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Pengembalian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Kembali">Home</a></li>
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
                    <div class="card">
                        <div class="card-body">


                            <label for="">Nama Anggota</label>
                            <p><?php echo $kembali['nama_anggota']; ?></p>

                            <label for="">Judul Buku</label>
                            <p><?php echo $kembali['judul']; ?></p>


                            <label for="">Tanggal Pinjam</label>
                            <p><?php echo $kembali['tgl_pinjam']; ?></p>

                            <label for="">Tanggal Kembali</label>
                            <p><?php echo $kembali['tgl_kembali']; ?></p>

                            <label for="">Tanggal dikembalikan</label>
                            <p><?php echo $kembali['tgl_dikembalikan']; ?></p>

                            <label for="">Terlambat</label>
                            <p><?php echo $kembali['terlambat']; ?> hari </p>

                            <label for="">Denda</label>
                            <p>Rp. <?php echo $kembali['denda']; ?></p>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <a href="<?php echo base_url('Kembali'); ?>" class="btn btn-outline-info">Back</a>
                                </div>
                                <div class="float-right">
                                    <a href="<?php echo base_url('kembali/delete/' . $kembali['id_kembali']);  ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengembalian ini?');">Hapus</a>

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