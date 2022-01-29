<div class="row">
    <!--1st-column - start -->
    <div class="col-3 border bg-light bg-gradient p-2">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Dashboard
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!--1st-column - end -->
    <!--2nd-column - start -->
    <div class="col-5 border p-2">
        <form action="<?= base_url('/profile/save'); ?>" method="post" class="row g-3 m-1">
            <?= csrf_field(); ?>

            <?php if (!empty(session()->getFlashdata('fail'))) : ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
            <?php endif ?>

            <?php if (!empty(session()->getFlashdata('success'))) : ?>
                <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
            <?php endif ?>

            <div class="col-12">
                <h4>Profile</h4>
            </div>
            <div class="col-md-6">
                <label for="Firstname" class="form-label fst-italic">Firstname</label>
                <input name="fname" id="fname" type="text" class="form-control" value="<?= $userInfo['firstname']; ?>" readonly>

            </div>
            <div class="col-md-6">
                <label for="Lastname" class="form-label fst-italic">Lastname</label>
                <input name="lname" id="lname" type="text" class="form-control" value="<?= $userInfo['lastname']; ?>" readonly>
            </div>
            <div class="col-6">
                <label for="email" class="form-label fst-italic">Email</label>
                <input name="email" id="email" type="text" class="form-control" value="<?= $userInfo['email']; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="Phone" class="form-label fst-italic">Phone</label>
                <input name="phone" id="phone" type="text" class="form-control" value="<?= $userInfo['phone']; ?>" readonly>
            </div>
            <div class="col-12">
                <label for="address" class="form-label fst-italic">Address</label>
                <input name="address" id="address" type="text" class="form-control" value="<?= $userInfo['address']; ?>" readonly>
            </div>
            <div class="col-md-6">
                <label for="city" class="form-label fst-italic">City</label>
                <input name="city" id="city" type="text" class="form-control" readonly value="<?= $userInfo['city'] ?>">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="switcher" value="0">
                    <label id="update_yes" class="form-check-label" for="">Update?</label>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-end">
                <input type="hidden" name="entry" value="update_profile">
                <button type="submit" class="btn btn-primary" disabled>Save</button>
            </div>
        </form>
    </div>
    <!--2nd-column - end -->
    <!--end-column - start -->
    <div class="col-4 border bg-light bg-gradient p-2">3</div>
    <!--3rd-column - end -->
</div>