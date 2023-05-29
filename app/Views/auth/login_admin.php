<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link href="/logo.png" rel="icon" type="img/ico">
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="<?php echo base_url('themes/plugins'); ?>/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url('themes/dist'); ?>/css/adminlte.min.css">

</head>

<body class="login">
    <div class="login-box">
        <div class="login-logo">
            <div class="image">
                <a href="/"><img src="/img/logo.png" class="center img" alt="logo"></a>
            </div>
        </div>
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Silahkan login terlebih dahulu</p>
                <?php if (!empty(session()->getFlashdata('info'))) { ?>
                    <div class="alert alert-info">
                        <?php echo session()->getFlashdata('info'); ?>
                    </div>
                <?php } ?>

                <?php $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger" role="alert">
                        Ada kesalahan saat input data, yaitu:
                        <ul>
                            <?php foreach ($errors as $error) { ?>
                                <li><?php echo esc($error); ?></li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                <?php
                $error_login = session()->getFlashdata('error_login');
                if (!empty($error_login)) { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger text-center">
                                <?php echo $error_login; ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if ($success_register = session()->getFlashdata('success_register')) { ?>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success text-center">
                                <?php echo $success_register; ?>
                            </div>
                        </div>
                    </div>
                <?php
                }
                $inputs = session()->getFlashdata('inputs');
                echo form_open(base_url('auth/proses_login'));
                ?>
                <div class="input-group mb-3">
                    <?php
                    $username = [
                        'type'  => 'username',
                        'name'  => 'username',
                        'id'    => 'username',
                        'value' => $inputs['username'],
                        'class' => 'form-control',
                        'placeholder' => 'username'
                    ];
                    echo form_input($username);
                    ?>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <?php
                    $password = [
                        'type'  => 'password',
                        'name'  => 'password',
                        'id'    => 'password',
                        'value' => $inputs['password'],
                        'class' => 'form-control',
                        'placeholder' => 'password'
                    ];
                    echo form_input($password);
                    ?>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <button type="submit" class="btn btn-success btn-block btn-flat">Login</button>
                    </div>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>

    <script src="<?php echo base_url('themes/plugins'); ?>/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url('themes/plugins'); ?>/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('themes/dist'); ?>/js/adminlte.min.js"></script>
</body>

</html>