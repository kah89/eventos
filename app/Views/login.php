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
<main>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Login</h5>
                        <?php if (session()->get('success')) : ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->get('success'); ?>
                            </div>
                        <?php endif; ?>
                        <form class="form-signin" method="post">
                            <div class="form-label-group">
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" autocomplete="username" required autofocus>
                            </div>
                            <div class="form-label-group">
                                <input type="password" id="senha" name="senha" class="form-control" placeholder="Senha" autocomplete="current-password" required>
                            </div>
                            <?php if (isset($validation)) : ?>
                                <div class="alert alert-danger" roles="alert">
                                    <?= $validation->listErrors(); ?>
                                </div>
                            <?php endif; ?>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Entrar</button>
                            <hr class="my-4">
                            <?php if (isset($fb_login_url)) : ?>
                                <a class="btn btn-lg btn-facebook btn-block text-uppercase" type="submit" href='<?= $fb_login_url; ?>'>
                                    <i class="fa fa-facebook" aria-hidden="true"></i> Entrar com o Facebook
                                </a>
                            <?php endif; ?>
                        </form>
                    </div>
                    <div class="mx-auto">
                        Não tem uma conta? <a href="registro">Inscreva-se</a>
                        <br />
                    </div>
                    <div class="mx-auto">
                        Esqueceu a senha? <a href="recuperacao">Lembre-se</a>
                        <br /><br />
                    </div>
                </div>
            </div>
            <?php if (session()->has('userdata')) :
                $uinfo = session()->get('userdata');
            ?>
                <div class="card">
                    <img src='<?= $uinfo['profile_pic']; ?>' height="100" width="100">
                    <p>ID:<?= $uinfo['userid']; ?></p>

                    <p>Bem vindo <?= $uinfo['user_name']; ?></p>
                    <p><?= $uinfo['email']; ?></p>
                    <a href='<?= base_url(); ?>/login/logout'>Logout</a>
                </div>
            <?php
            endif;
            ?>
        </div>
    </div>
</main>