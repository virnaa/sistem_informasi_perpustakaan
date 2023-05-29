<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="/logo.png" rel="icon" type="img/ico">

    <title><?= $tittle ?></title>
    <link rel="stylesheet" href="/css/style.css">
    <style type="text/css" id="debugbar_dynamic_style"></style>
    <link rel="stylesheet" href="<?php echo base_url('themes/dist'); ?>/css/adminlte.min.css">
    <link rel="stylesheet" href="<?php echo base_url('themes/plugins'); ?>/fontawesome-free/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script type="text/javascript" id="debugbar_dynamic_script"></script>
    <script type="text/javascript" id="debugbar_loader" data-time="1585277113" src="<?php echo base_url('themes/plugins/'); ?>/index.php?debugbar"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="far fa-user"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="<?php echo base_url('auth/logout'); ?>" class="dropdown-item">
                            Logout
                        </a>
                    </div>
                </li>
            </ul>
        </nav>



        <aside class="control-sidebar control-sidebar-dark">
            <div class="p-3">
                <h5>Title</h5>
                <p>Sidebar content</p>
            </div>
        </aside>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="" class="brand-link">
                <img src="<?php echo base_url('themes/dist'); ?>/img/AdminLTELogo.png" alt="admin" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"><?= session()->get('level'); ?> Perpustakaan</span>
            </a>

            <div class="sidebar">
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="/img/<?= session()->get('img'); ?>" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            <?= session()->get('nama'); ?></a>
                    </div>
                </div>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                        <?php if (session()->get('level') == 'admin') { ?>
                            <li class="nav-item">
                                <a href="<?php echo base_url('/dashboard'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-th"></i>
                                    <p>Dashboard</p>
                                </a>
                            </li>
                            <li class="nav-header">Kelola Data</li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Buku'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-book"></i>
                                    <p>Kelola Data Buku</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Anggota'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>Kelola Data Anggota</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Petugas'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>Kelola Data Petugas</p>
                                </a>
                            </li>
                            <li class="nav-header">Transaksi</li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Pinjam'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-file"></i>
                                    <p>Peminjaman & Pengembalian</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('Kembali'); ?>" class="nav-link">
                                    <i class="nav-icon fas fa-undo"></i>
                                    <p>Data Pengembalian</p>
                                </a>
                            </li>
                            <li class="nav-header">ACCOUNT</li>
                            <li class="nav-item">
                                <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">
                                    <i class="nav-icon far fa-circle text-danger"></i>
                                    <p class="text">Logout</p>
                                </a>
                            </li>
                    </ul>
                <?php } ?>

                <?php if (session()->get('level') == 'anggota') { ?>
                    <li class="nav-header">Katalog Buku</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('anggota/buku'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>Data Buku</p>
                        </a>
                    </li>
                    <li class="nav-header">Peminjaman & Pengembalian</li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('anggota/pinjam'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>Peminjaman</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('anggota/kembali'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-undo"></i>
                            <p>Data Pengembalian</p>
                        </a>
                    </li>
                    <li class="nav-header">ACCOUNT</li>
                    <li class="nav-item">
                        <a href="/anggota/profil/<?= session()->get('id_anggota'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>Profil</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url('auth/logout'); ?>" class="nav-link">
                            <i class="nav-icon far fa-circle text-danger"></i>
                            <p class="text">Logout</p>
                        </a>
                    </li>
                <?php } ?>
                </nav>
            </div>
        </aside>


        <?= $this->renderSection('isi'); ?>


        <footer class="main-footer">
            <div class="float-right d-none d-sm-inline">
                Sistem Informasi Perpustakaan MA Al-Irfan
            </div>
            <strong>Copyright ©2021 <a href="<?php echo base_url('/'); ?>">MA Al-Irfan</a>.</strong> All rights reserved.
        </footer>
    </div>

    <script src="<?php echo base_url('themes/plugins'); ?>/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('themes/plugins'); ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('themes/dist'); ?>/js/adminlte.min.js"></script>
    <script>
        function previewImg() {
            const img = document.querySelector('#img');
            const imgLabel = document.querySelector('.custom-file-label');
            const imgPreview = document.querySelector('.img-preview');

            imgLabel.textContent = img.files[0].name;

            const fileSampul = new FileReader();
            fileSampul.readAsDataURL(img.files[0]);

            fileSampul.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>


</body>

</html>