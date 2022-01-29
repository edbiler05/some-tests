<!doctype html>
<html lang="en">

<head>
  <title>BSystem</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.0.2 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="../assets/css/bootstrap.min.css" crossorigin="anonymous"> -->
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
</head>

<body>

  <!-- Main container Div-->
  <div class="container mx-auto">
    <div class="row">
      <!-- Nav tabs -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="<?= base_url('home'); ?>">
            <img class="d-inline-block align-text-top" src="<?= base_url('assets/img/bsystem.png'); ?>" width="50" height="40" alt="bsystem">
          </a>

          <div class="d-flex flex-row-reverse bd-highlight">
            <?php if (session()->has('logged_user')) : ?>
              <div class="p-2 bd-highlight">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                  <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $user_info['firstname'] ?>
                          </a>
                          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="<?= base_url('/home') ?>">Home</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('/profile') ?>">Profile</a></li>
                            <li><a class="dropdown-item" href="<?= base_url('/dashboard') ?>">Dashboard</a></li>
                            <li>
                              <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="<?= base_url('/auth2/logout') ?>">Logout</a></li>
                          </ul>
                        </li>
                      </ul>
                    </div>
                  </div>
                </nav>
              </div>

            <?php else : ?>
              <div class="p-2 bd-highlight"><a href="<?= base_url('auth/login'); ?>">Sign in</a></div>
              <div class="p-2 bd-highlight"><a href="<?= base_url('auth/register'); ?>">Create an Account</a></div>
            <?php endif ?>
          </div>

        </div>
      </nav>
      <!-- Nav tabs - end -->
    </div>