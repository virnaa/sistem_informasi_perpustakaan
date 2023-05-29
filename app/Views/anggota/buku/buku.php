<?= $this->extend('admin/layout'); ?>

<?= $this->section('isi'); ?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kelola Data Buku</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Data Buku</li>
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
                            Data Buku

                            <div class="row">
                                <div class="col">
                                    <form action="" method="post">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="cari..." name="keyword">

                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="buku" class="table table-bordered table-hovered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Gambar</th>
                                        <th>Judul Buku</th>
                                        <th>Kategori</th>
                                        <th>Pengarang</th>
                                        <th>Penerbit</th>
                                        <th>Tahun Terbit</th>
                                        <th>Stok</th>
                                        <th>Rak Buku</th>
                                        <th>Deskripsi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($buku as $key => $row) { ?>
                                        <tr>
                                            <td><?php echo $key + 1 + (5 * ($currentPage - 1)); ?></td>
                                            <td><img src="/img/<?php echo $row['img']; ?>" alt="sampulbuku" class="sampul"> </td>
                                            <td><?php echo $row['judul']; ?></td>
                                            <td><?php echo $row['kategori']; ?></td>
                                            <td><?php echo $row['pengarang']; ?></td>
                                            <td><?php echo $row['penerbit']; ?></td>
                                            <td><?php echo $row['tahun_terbit']; ?></td>
                                            <td><?php echo $row['stok']; ?></td>
                                            <td><?php echo $row['rak']; ?></td>
                                            <td><?php echo $row['deskripsi']; ?></td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="<?php echo base_url('anggota/buku/detail/' . $row['id_buku']); ?>" title="tampilkan detail" class="detail btn btn-sm btn-info">
                                                        <i class="fa fa-list-ul"></i>
                                                    </a>
                                                    <a href="<?php echo base_url('anggota/pinjam/create/' . $row['id_buku']); ?>" title="pinjam buku" class="btn btn-sm btn-success">
                                                        <i class="fa fa-plus-square"></i>
                                                    </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <?= $pager->links('buku', 'pagination'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>



<?= $this->endSection(); ?>