<?= $this->extend('admin/layout'); ?>

<?= $this->section('isi'); ?>


<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Detail Peminjaman</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="anggota/pinjam">Home</a></li>
                        <li class="breadcrumb-item active">Detail peminjaman</li>
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

                            <label for="">NIS Anggota</label>
                            <p><?php echo $pinjam['NIS']; ?></p>

                            <label for="">Nama Anggota</label>
                            <p><?php echo $pinjam['nama_anggota']; ?></p>

                            <label for="">Judul Buku yang dipinjam</label>
                            <p><?php echo $pinjam['judul']; ?></p>

                            <label for="">ISBN Buku</label>
                            <p><?php echo $pinjam['ISBN']; ?></p>

                            <label for="">Tanggal Pinjam</label>
                            <p><?php echo $pinjam['tgl_pinjam']; ?></p>

                            <label for="">Tanggal kembali</label>
                            <p><?php echo $pinjam['tgl_kembali']; ?></p>

                            <label for="">Jumlah Buku yang dipinjam</label>
                            <p><?php echo $pinjam['total_buku']; ?></p>

                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col">
                                    <a href="<?php echo base_url('anggota/pinjam'); ?>" class="btn btn-outline-info">Back</a>
                                </div>
                                <div class="float-right">
                                    <a href="<?php echo base_url('anggota/pinjam/edit/' . $pinjam['id_pinjam']);  ?>" class="btn btn-info">Edit</a>
                                    <a href="<?php echo base_url('anggota/pinjam/hapus/' . $pinjam['id_pinjam']);  ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus pengembalian ini?');">Hapus</a>
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