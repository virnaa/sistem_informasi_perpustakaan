<?= $this->extend('admin/layout'); ?>

<?= $this->section('isi'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kelola Data Anggota</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/Dashboard">Home</a></li>
                        <li class="breadcrumb-item active">Data Anggota</li>
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
                            Data Anggota
                            <div class="row">
                                <div class="col">
                                    <a href="<?php echo base_url('anggota/create'); ?>" class="btn btn-primary float-left">Tambah</a>
                                </div>
                                <div class="col">
                                    <form action="" method="post">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="cari..." name="keyword">

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
                                            <th>Foto</th>
                                            <th>NIS</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alamat</th>
                                            <th>No. Telp</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($anggota as $key => $row) { ?>
                                            <tr>
                                                <td><?php echo $key + 1  + (5 * ($currentPage - 1)); ?></td>
                                                <td><img src="/img/<?php echo $row['img_anggota']; ?>" alt="fotoprofil" class="sampul"> </td>
                                                <td><?php echo $row['NIS']; ?></td>
                                                <td><?php echo $row['nama_anggota']; ?></td>
                                                <td><?php echo $row['kelas']; ?></td>
                                                <td><?php echo $jk = $row['jk_anggota'];
                                                    if ($jk == 'L') {
                                                        echo "aki-laki";
                                                    } else {
                                                        echo "erempuan";
                                                    }
                                                    ?></td>
                                                <td><?php echo $row['alamat']; ?></td>
                                                <td><?php echo $row['tlp_anggota']; ?></td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="<?php echo base_url('anggota/detail/' . $row['id_anggota']); ?>" title="tampilkan detail" class="btn btn-sm btn-info">
                                                            <i class="fa fa-list-ul"></i>
                                                        </a>
                                                        <a href="<?php echo base_url('anggota/edit/' . $row['id_anggota']); ?>" title="update anggota" class="btn btn-sm btn-success">
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a href="<?php echo base_url('anggota/delete/' . $row['id_anggota']); ?>" title="hapus anggota" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?');">
                                                            <i class="fa fa-trash-alt"></i>
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                <?= $pager->links('anggota', 'pagination'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>

<?= $this->endSection(); ?>