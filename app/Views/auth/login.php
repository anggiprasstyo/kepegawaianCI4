<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title><?= $title; ?></title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon.ico">

    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet" type="text/css">

</head>


<body>


    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">

                <h3 class="text-center mt-0 m-b-15">
                    <a href="<?= base_url('/auth') ?>" class="logo logo-admin"><img src="<?= base_url() ?>/assets/images/logo-kemenkes.png" height="70" alt="logo"></a>
                </h3>

                <div class="p-3">
                    <?= form_open('auth/cekUser', ['class' => 'formLogin']); ?>
                    <?= csrf_field(); ?>

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="text" placeholder="Email" name="email" id="email" autofocus autocomplete="off">
                            <div class="invalid-feedback errorEmail">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-12">
                            <input class="form-control" type="password" placeholder="Password" name="password" id="password">
                            <div class="invalid-feedback errorPassword">
                            </div>
                        </div>
                    </div>

                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-danger btn-block waves-effect waves-light btnLogin" type="submit">Log In</button>
                        </div>
                    </div>

                    <div class="form-group m-t-10 mb-0 row">
                        <!-- <div class="col-sm-7 m-t-20">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> <small>Forgot your password ?</small></a>
                                </div> -->
                        <div class="col-sm-5 m-t-20">
                            <a href="<?= base_url('/auth/register') ?>" class="text-muted"><i class="mdi mdi-account-circle"></i> <small>Create an account ?</small></a>
                        </div>
                    </div>
                    <?= form_close(); ?>
                </div>

            </div>
        </div>
    </div>



    <!-- jQuery  -->
    <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/modernizr.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/waves.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.slimscroll.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.nicescroll.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.scrollTo.min.js"></script>

    <!-- App js -->
    <!-- <script src="<?= base_url() ?>/assets/js/app.js"></script> -->

    <script>
        $(document).ready(function() {
            $('.formLogin').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('.btnLogin').prop('disabled', true);
                        $('.btnLogin').html('<i class="fa fa-spin fa-spinner">');
                    },
                    complete: function() {
                        $('.btnLogin').prop('disabled', false);
                        $('.btnLogin').html('Log In');
                    },
                    success: function(response) {
                        if (response.error) {
                            if (response.error.email) {
                                $('#email').addClass('is-invalid');
                                $('.errorEmail').html(response.error.email);
                            } else {
                                $('#email').removeClass('is-invalid');
                                $('.errorEmail').html('');
                            }

                            if (response.error.password) {
                                $('#password').addClass('is-invalid');
                                $('.errorPassword').html(response.error.password);
                            } else {
                                $('#password').removeClass('is-invalid');
                                $('.errorPassword').html('');
                            }
                        }

                        if (response.sukses) {
                            window.location = response.sukses.link;
                        }
                    },
                    error: function(xhr, ajaxOptions, thrownError) {
                        alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                    }
                });
                return false;
            });
        });
    </script>

</body>

</html>