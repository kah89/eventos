<?= $this->extend('default') ?>

<?= $this->section('content') ?>

<style>
    :root {
        --input-padding-x: 1.5rem;
        --input-padding-y: .75rem
    }

    body {
        background: linear-gradient(to right, #0a346d, #1598ef)
    }

    .card-signin {
        border: 0;
        border-radius: 0rem;
        box-shadow: 0 0.5rem 1rem 0 rgba(0, 0, 0, 0.1)
    }

    .card-signin .card-title {
        margin-bottom: 2rem;
        font-weight: 300;
        font-size: 1.5rem
    }

    .card-signin .card-body {
        padding: 2rem
    }

    .form-signin {
        width: 100%
    }

    .form-signin .btn {
        font-size: 80%;
        border-radius: 0rem;
        letter-spacing: .1rem;
        font-weight: bold;
        padding: 1rem;
        transition: all 0.2s
    }

    .form-label-group {
        position: relative;
        margin-bottom: 1rem
    }

    .form-label-group input {
        height: auto
    }

    .form-label-group>input,
    .form-label-group>label {
        padding: var(--input-padding-y) var(--input-padding-x)
    }

    .form-label-group>label {
        position: absolute;
        top: 0;
        left: 0;
        display: block;
        width: 100%;
        margin-bottom: 0;
        line-height: 1.5;
        color: #495057;
        border: 1px solid transparent;
        border-radius: .25rem;
        transition: all .1s ease-in-out
    }

    .form-control:focus {
        box-shadow: 10px 0px 0px 0px #ffffff !important
    }

    .btn-google {
        color: white;
        background-color: #ea4335
    }

    .btn-facebook {
        color: white;
        background-color: #3b5998
    }
</style>
<main id="t3-content">
    <?php if (session()->get('danger')) { ?>
        <script>
            $msg = '<?= session()->get('danger'); ?>';
        </script>
    <?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Recuperar Senha</h5>
                        <form class="form-signin" method="post">
                            <div class="form-label-group">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" required>
                            </div>
                            <?php if (isset($validation)) : ?>
                                <div class="alert alert-danger" roles="alert">
                                    <?= $validation->listErrors(); ?>
                                </div>
                            <?php endif; ?>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Recuperar</button>
                            <hr class="my-4">
                        </form>
                    </div>
                    <div class="mx-auto">
                        Já é inscrito? <a href="<?= base_url(''); ?>">Acesse</a>
                        <br /><br />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        toastr.options = {
            "closeButton": true,
            "newestOnTop": false,
            "progressBar": true,
            "preventDuplicates": false,
            "positionClass": "toast-top-right",
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut",
        }

        if ($msg) {
            toastr.info($msg);
        }
    </script>
</main>
<?= $this->endSection() ?>