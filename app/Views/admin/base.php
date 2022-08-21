<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title><?= $this->renderSection('title') ?></title>
        <link rel="icon" type="image/x-icon" href="<?= base_url('assets/index/assets/favicon.ico')?>" />
        <!-- Font Awesome icons (free version)-->
        <script src="<?= base_url('assets/index/all.js') ?>" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="<?= base_url('assets/index/montserrat.css')?>" rel="stylesheet" type="text/css" />
        <link href="<?= base_url('assets/index/roboto.css')?>" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="<?= base_url('assets/index/css/styles.css') ?>" rel="stylesheet" />
    </head>
    <body id="page-top" style="background-color: grey;">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-sm navbar-dark" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="<?= base_url('assets/index/assets/img/navbar-logo1.svg')?>" alt="<?= $this->renderSection('logo') ?>" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="<?= site_url('auth/logout') ?>">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <section class="page-section" id="services">
          <?= $this->renderSection('content') ?>
        </section>

        <footer class="footer py-1">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">
                        Copyright &copy; Jagdish Lamba
                       
                        (<script>
                            document.write(new Date().getFullYear());
                        </script>)
                    </div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark mx-2" href="#!"><i>Best viewed in Mozilla Firefox</i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Privacy Policy</a>
                        <a href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>
        <script src="<?= base_url('assets/index/jquery-3.5.1.min.js')?>"></script>
        <script src="<?= base_url('assets/index/bootstrap.bundle.min.js')?>"></script>
        <!-- Third party plugin JS-->
        <script src="<?= base_url('assets/index/anime.min.js')?>"></script>
        <script src="<?= base_url('assets/index/js/scripts.js')?>"></script>
</body>
</html>
