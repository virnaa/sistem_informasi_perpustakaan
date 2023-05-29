<?= $this->extend('admin/layout'); ?>

<?= $this->section('isi'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Daftar Pengembalian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Daftar Pengembalian</li>
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
                            Daftar Pengembalian
                            <div class="col-md-3 float-right">
                                <form action="" method="post">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="cari..." name="keyword">
                                    </div>
                                </form>
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
                                            <th>Tanggal Pengembalian</th>
                                            <th>Terlambat</th>
                                            <th>Denda</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($kembali as $key => $row) { ?>
                                            <tr>
                                                <td><?php echo $key + 1  + (5 * ($currentPage - 1)); ?></td>
                                                <td><?php echo $row['judul']; ?></td>
                                                <td><?php echo $row['tgl_dikembalikan']; ?></td>
                                                <td><?php echo $row['terlambat']; ?></td>
                                                <td><?php echo $row['denda']; ?></td>

                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url('kembali/detail/' . $row['id_kembali']); ?>" title="tampilkan detail" class="btn btn-sm btn-info">
                                                            <i class="fa fa-list-ul"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?= $pager->links('kembali', 'pagination'); ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>