<div class="row mt-5">
    <div class="col-4 col-lg-4 p-3 border border-secondary rounded bg-light bg-gradient">
        <h4>Sign in</h4>
        <hr>
        <form action="<?= site_url('/auth/login'); ?>" method="post">
            <?= csrf_field(); ?>

            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
            <?php endif ?>

            <?php if (!empty(session()->getFlashdata('success'))) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>

            <?php endif ?>

            <div class="form-group">
                <input type="text" class="form-control" name="login_email" id="login_email" value="<?= set_value('login_email'); ?>" placeholder="Email address">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'login_email') : '' ?></span>
            </div>
            <div class="form-group mt-2">
                <input type="password" class="form-control" name="login_password" placeholder="Password">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'login_password') : '' ?></span>
            </div>
            <div class="form-group mt-2">
                <div class="d-flex justify-content-end">
                    <input type="hidden" name="entry" value="login">
                    <button class="btn btn-primary btn-block" type="submit" name="login">Login</button>
                </div>
                <div class="d-flex justify-content-start">
                    <a href="<?= base_url('/auth/register') ?>">Create an account</a>
                </div>
            </div>
        </form>
    </div>
    <div class="col-sm-8 col-lg-8">
        <img src="<?= base_url('assets/img/bg1.png'); ?>" class="img-fluid" alt="...">
    </div>
</div>