<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" 
          href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
          integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" 
          crossorigin="anonymous">
    <link rel="stylesheet" 
          href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
    <link rel="stylesheet" type="text/css" href="./public/css/style.css">
    <link rel="stylesheet" type="text/css" href="./public/css/accueil.css">
    <link rel="stylesheet" type="text/css" href="./public/css/galerie.css">
    <link rel="stylesheet" type="text/css" href="./public/css/prompt.css">
    <title>Ilo's Portfolio - <?= $titre; ?></title>
</head>
<body>
    <header class="container-fluid">
        <div class="row">
            <div class="col-3">
                <a href="?accueil" class="logo bg-transparent">
                    <img src="public/images/header_footer/logo.png" alt="logo méduse ilo" class="py-2 m-sm-2">
                </a>
            </div>
            <nav class="col-9">
                <div class="d-flex flex-column align-items-end">
                    <section id="block-presentation">
                        <picture>
                            <!-- <source srcset="public/images/header_footer/mobile_nuage_1.png" media="(max-width: 576px)"> -->
                            <img class="text-right" src="public/images/header_footer/nuage_1.png" alt="">
                        </picture>
                        <div class="nav-link">
                            <a href="?accueil"><i class="fa fa-home"></i></a>
                            <a href="">Présentation</a>
                        </div>
                    </section>
                    <section id="block-galerie" class="">
                        <picture>
                            <!-- <source srcset="public/images/header_footer/mobile_nuage_2.png" media="(max-width: 576px)"> -->
                            <img src="public/images/header_footer/nuage_2.png" alt="">
                        </picture>
                        <div class="nav-link">
                            <a href="?galerie">Galerie</a>
                        </div>
                    </section>
                    <section id="block-mediatheque" class="">
                        <picture>
                            <!-- <source srcset="public/images/header_footer/mobile_nuage_3.png" media="(max-width: 576px)"> -->
                            <img src="public/images/header_footer/nuage_3.png" alt="">
                        </picture>
                        <div class="nav-link">
                            <a href="">Médiathèque</a>
                        </div>
                    </section>
                </div>
            </nav>
        </div>
    </header>
    
<?php if( isset($_SESSION['admin']) ): ?>
    <div class="text-white">Connecté !</div>
<?php else: ?>
    <div class="text-white">Pas connecté !</div>
<?php endif; ?>
    
<?= !empty($_SESSION['msg'])? '<p class="my-2 p-1 bg-danger font-weight-bold text-center" id="message"><i class="fa fa-exclamation-triangle"></i> '. $_SESSION['msg'] . '</p>' : ''; ?>
                
    <main class="container my-5">
        <?= $content; ?>
    </main>
    
    <footer class="container-fluid">
        <div class="footer-img d-flex justify-content-between">
            <img src="public/images/header_footer/footer_1.png" alt="" class="">
            <img src="public/images/header_footer/footer_2.png" alt="" class="">
        </div>
        <div class="row text-center">
            <div class="col-12 col-md-4">
                <a href="">About</a>
            </div>
            <div class="col-12 col-md-4">
                <a href="">Contact</a>
            </div>
                <p class="col-12"><a href="<?= isset($_SESSION['admin'])? "?deconnexion" : "?connexion" ;?>" class="text-white">&copy;</a>ilo - 2020</p>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" 
        crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" 
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" 
        crossorigin="anonymous"></script>
    <script src="./public/js/msg.js"></script>
    <script src="./public/js/galerie.js"></script>
    <script src="./public/js/artworks.js"></script>
    <script src="./public/js/prompt.js"></script>
</body>
</html>