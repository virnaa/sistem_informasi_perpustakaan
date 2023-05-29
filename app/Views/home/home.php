<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link href="/logo.png" rel="icon" type="img/ico">

    <title>Sistem Informasi Perpustakaan MA Al-Irfan</title>
    <link rel="stylesheet" href="<?php echo base_url('themes/dist'); ?>/css/adminlte.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

    <nav class="navbar navbar-expand-xl navbar-light justify-content-between">
        <a class="navbar-brand" href="/"> <img class="logo" src="img/logo2.png" alt="logo2"> </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample06" aria-controls="navbarsExample06" aria-expanded="true" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample06">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('katalog'); ?>">Katalog Buku</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url('auth/login'); ?>">Login</a>
                    <!-- <a href="<?php echo base_url('auth/login'); ?>" class="btn btn-success float-right">Login</a> -->
                </li>

            </ul>

        </div>
    </nav>
</head>

<body>

    <div class="container">
        <div class="col">

            <div class="search">
                <h1>Selamat Datang</h1>
                <h1>di Sistem Informasi Perpustakaan</h1>
                <h1> MA Al-Irfan</h1>
                <br />
                <div class="true-center">
                    <a href="<?php echo base_url('katalog'); ?>" class="btn action-button shadow animate green">KATALOG BUKU</a>
                    <a href="<?php echo base_url('auth/login'); ?>" class="btn action-button shadow animate green">LOGIN</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>