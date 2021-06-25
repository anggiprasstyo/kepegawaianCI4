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

    <!-- Sweet Alert -->
    <link href="<?= base_url() ?>/assets/plugins/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet" type="text/css">

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
                    <a href="<?= base_url('/auth/register') ?>" class="logo logo-admin"><img src="<?= base_url() ?>/assets/images/logo.png" height="24" alt="logo"></a>
                </h3>

                <div class="p-3">
                    <?= form_open('auth/saveRegister', ['class' => 'formRegister']); ?>
                    <?= csrf_field(); ?>

                    <div class="form-group row">
                        <label for="npm" class="col-sm-3 col-form-label">NPM</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="npm" name="npm">
                            <div class="invalid-feedback errorNPM">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="nama" name="nama">
                            <div class="invalid-feedback errorNama">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tmp_lahir" class="col-sm-3 col-form-label">Tmp Lahir</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir">
                            <div class="invalid-feedback errorTmpLahir">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="tgl_lahir" class="col-sm-3 col-form-label">Tgl Lahir</label>
                        <div class="col-sm-6">
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                            <div class="invalid-feedback errorTglLahir">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-3 my-1 control-label">Jns. Kel</label>
                        <div class="col-md-9">
                            <div class="custom-control custom-radio">
                                <input type="radio" id="L" name="jk" value="L" class="custom-control-input">
                                <label class="custom-control-label" for="L">Laki-laki</label>
                            </div>
                            <div class="custom-control custom-radio">
                                <input type="radio" id="P" name="jk" value="P" class="custom-control-input">
                                <label class="custom-control-label" for="P">Perempuan</label>
                                <div class="invalid-feedback errorJK">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-3 col-form-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email">
                            <div class="invalid-feedback errorEmail">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password">
                            <div class="invalid-feedback errorPassword">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password2" class="col-sm-3 col-form-label">Confirm</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password2" name="password2">
                            <div class="invalid-feedback errorPassword2">
                            </div>
                        </div>
                    </div>

                    <!-- <div class="form-group row">
                            <div class="col-12">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1">
                                    <label class="custom-control-label font-weight-normal" for="customCheck1">I accept <a href="#" class="text-muted">Terms and Conditions</a></label>
                                </div>
                            </div>
                        </div> -->

                    <div class="form-group text-center row m-t-20">
                        <div class="col-12">
                            <button class="btn btn-danger btn-block waves-effect waves-light btnRegister" type="submit">Register</button>
                        </div>
                    </div>

                    <div class="form-group m-t-10 mb-0 row">
                        <div class="col-12 m-t-20 text-center">
                            <a href="<?= base_url('/auth') ?>" class="text-muted">Already have account?</a>
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

    <!-- Sweet-Alert  -->
    <script src="<?= base_url() ?>/assets/plugins/sweetalert2/dist/sweetalert2.all.min.js"></script>

    <!-- App js -->
    <!-- <script src="assets/js/app.js"></script> -->

    <script>
        $(document).ready(function() {
            $('.formRegister').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    type: "post",
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
                    dataType: "json",
                    beforeSend: function() {
                        $('.btnRegister').prop('disabled', true);
                        $('.btnRegister').html('<i class="fa fa-spin fa-spinner">');
                    },
                    complete: function() {
                        $('.btnRegister').prop('disabled', false);
                        $('.btnRegister').html('Log In');
                    },
                    success: function(response) {
                        if (response.error) {
                            if (response.error.npm) {
                                $('#npm').addClass('is-invalid');
                                $('.errorNPM').html(response.error.npm);
                            } else {
                                $('#npm').removeClass('is-invalid');
                                $('.errorNPM').html('');
                            }

                            if (response.error.nama) {
                                $('#nama').addClass('is-invalid');
                                $('.errorNama').html(response.error.nama);
                            } else {
                                $('#nama').removeClass('is-invalid');
                                $('.errorNama').html('');
                            }

                            if (response.error.tmp_lahir) {
                                $('#tmp_lahir').addClass('is-invalid');
                                $('.errorTmpLahir').html(response.error.tmp_lahir);
                            } else {
                                $('#tmp_lahir').removeClass('is-invalid');
                                $('.errorTmpLahir').html('');
                            }

                            if (response.error.tgl_lahir) {
                                $('#tgl_lahir').addClass('is-invalid');
                                $('.errorTglLahir').html(response.error.tgl_lahir);
                            } else {
                                $('#tgl_lahir').removeClass('is-invalid');
                                $('.errorTglLahir').html('');
                            }

                            if (response.error.jk) {
                                $('#L').addClass('is-invalid');
                                $('#P').addClass('is-invalid');
                                $('.errorJK').html(response.error.jk);
                            } else {
                                $('#L').removeClass('is-invalid');
                                $('#P').removeClass('is-invalid');
                                $('.errorJK').html('');
                            }

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

                            if (response.error.password2) {
                                $('#password2').addClass('is-invalid');
                                $('.errorPassword2').html(response.error.password2);
                            } else {
                                $('#password2').removeClass('is-invalid');
                                $('.errorPassword2').html('');
                            }
                        }

                        if (response.sukses) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Berhasil',
                                text: response.sukses,
                            }).then((result) => {
                                window.location.href = ("<?= base_url('auth') ?>");
                            })
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