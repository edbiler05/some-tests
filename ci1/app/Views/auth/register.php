<div class="row mt-5">
    <div class="col-5 col-lg-5 border border-secondary rounded p-4 bg-light bg-gradient">
        <h4>Registration</h4>
        <hr>
        <form action="<?= base_url('/auth/register'); ?>" method="post">

            <?= csrf_field(); ?>

            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
            <?php endif ?>

            <?php if (!empty(session()->getFlashdata('success'))) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
            <?php endif ?>

            <div class="form-group mt-3">
                <input type="text" class="form-control" name="email" value="<?= set_value('email'); ?>" placeholder="*Email address">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'email') : '' ?></span>
            </div>
            <div class="form-group mt-3">
                <input type="text" class="form-control" name="password" placeholder="*Should be 8 (min) to 20 (max) characters">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'password') : '' ?></span>
            </div>
            <div class="form-group mt-3">
                <input type="text" class="form-control" name="cpassword" placeholder="*Confirm password">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'cpassword') : '' ?></span>
            </div>
            <div class="form-group mt-3">
                <input type="text" class="form-control" name="fname" value="<?= set_value('fname'); ?>" placeholder="*Firstname">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'fname') : '' ?></span>
            </div>
            <div class="form-group mt-3">
                <input type="text" class="form-control" name="lname" value="<?= set_value('lname'); ?>" placeholder="*Lastname">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'lname') : '' ?></span>
            </div>
            <div class="form-group mt-3">
                <input type="text" class="form-control" name="phone" value="<?= set_value('phone'); ?>" placeholder="*Phone">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'phone') : '' ?></span>
            </div>
            <div class="form-group mt-3">
                <input type="text" class="form-control" name="address" value="<?= set_value('address'); ?>" placeholder="*Address">
                <span class="text-danger"><?= isset($validation) ? display_error($validation, 'address') : '' ?></span>
            </div>
            <div class="form-group mt-3">
                <input type="text" class="form-control" name="city" value="<?= set_value('city'); ?>" placeholder="City">
            </div>
            <div class="form-group mt-3">
                <div class="d-flex justify-content-end">
                    <input type="hidden" name="entry" value="register">
                    <button class="btn btn-primary btn-block" type="submit" name="register">Register</button>
                </div>
                <div class="d-flex justify-content-start">
                    <a href="<?= base_url('/auth2'); ?>">Already have an account, login now</a>
                </div>
            </div>
        </form>
    </div>
</div>