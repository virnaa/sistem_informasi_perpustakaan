<?= $this->extend('admin/layout'); ?>

<?= $this->section('isi'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Peminjaman Buku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Dahsboard">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Peminjaman</li>
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
                        <div class="card-header">
                            Daftar Peminjaman
                            <div class="row">
                                <div class="col">
                                    <a href="<?php echo base_url('anggota/pinjam/create'); ?>" class="btn btn-primary float-left">Pinjam Buku</a>
                                </div>
                                <div class="col">
                                    <form action="" method="post">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="cari..." name="keyword">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

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

                            <div class="table-responsive">
                                <table class="table table-bordered table-hovered">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Judul Buku</th>
                                            <th>Tanggal Pinjam</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($pinjam as $key => $row) { ?>
                                            <tr>
                                                <td><?php echo $key + 1 + (5 * ($currentPage - 1));  ?></td>
                                                <td><?php echo $row['judul']; ?></td>
                                                <td><?php echo $row['tgl_pinjam']; ?></td>
                                                <td><?php echo $row['tgl_kembali']; ?></td>
                                                <td><?php if ($row['status_pinjam'] == 0) {
                                                        echo '<span class="badge badge-success">Dikembalikan</span>';
                                                    } else {
                                                        echo '<span class="badge badge-danger">Belum Dikembalikan</span>';
                                                    }

                                                    ?></td>
                                                <td>


                                                    <?php if ($row['status_pinjam'] == 1) {
                                                        echo '<div class="btn-group">
                                                        <a href="' . base_url('anggota/pinjam/detail/' . $row['id_pinjam']) . '" title="Detail" class="btn btn-sm btn-success">
                                                            <i class="fa fa-list"></i>
                                                        </a>
                                                        <a href="' . base_url('anggota/pinjam/edit/' . $row['id_pinjam']) . '" title="tampilkan detail" class="btn btn-sm btn-info">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="' . base_url('anggota/pinjam/delete/' . $row['id_pinjam']) . '" title="hapus peminjaman" class="btn btn-sm btn-danger" onclick="return confirm("Apakah Anda yakin ingin menghapus peminjaman ini?");">
                                                            <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                        </div>';
                                                    }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?= $pager->links('pinjam', 'pagination'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>