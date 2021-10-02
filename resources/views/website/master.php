<!DOCTYPE html>

<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pran Mango</title>
        <link rel="stylesheet" href="<?php echo $app->make('url')->to('/') ?>/assets/frontend/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $app->make('url')->to('/') ?>/assets/frontend/css/all.min.css">
        <link rel="stylesheet" href="<?php echo $app->make('url')->to('/') ?>/assets/frontend/css/animate.css">
        <link rel="stylesheet" href="<?php echo $app->make('url')->to('/') ?>/assets/frontend/css/lightcase.css">
        <link rel="stylesheet" href="<?php echo $app->make('url')->to('/') ?>/assets/frontend/css/swiper.min.css">
        <link rel="stylesheet" href="<?php echo $app->make('url')->to('/') ?>/assets/frontend/css/style.css">
        <link rel="shortcut icon" href="https://www.pranfoods.net//sites/all/themes/pranTheme/favicon.ico" type="image/vnd.microsoft.icon" />
    </head>

    <body>
        <script>
            var jQ = new Array();
        </script>
        <!-- header section start -->
        <header class="header <?php echo strtolower($title) ?>">
            <nav class="navbar navbar-expand-lg">
                <a href="<?php echo $app->make('url')->to('/') ?>" class="logo"><img src="<?php echo $app->make('url')->to('/') ?>/assets/frontend/images/pran-logo.png" alt="Pran"></a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="menu navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a href="<?php echo $app->make('url')->to('/') ?>">হোম <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="<?php echo $app->make('url')->to('/') ?>/about">বিস্তারিত</a>
                        </li>
                        <li class="nav-item">
                            <a href="" data-toggle="modal" data-target="#exampleModalLong">যোগাযোগ</a>
                        </li>
                    </ul>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                        <div class="modal-dialog contact-modal" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">কন্ট্যাক্ট </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body contact-info">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <ul class="address list-unstyled pl-0">
                                                <li>
                                                    <i class="fas fa-map-marker-alt"></i>
                                                    <span>প্রান আর এফ এল সেন্টার, ১০৫ বীর উত্তম রফিকুল ইসলাম এভিনিউ, ঢাকা-১২১২</span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-phone"></i>
                                                    <span>+৯৬১ ৩৭৩৭ ৭৭৭</span>
                                                </li>
                                                <li>
                                                    <i class="fas fa-envelope"></i>
                                                    <span>mktg182@prangroup.com</span>
                                                </li>
                                            </ul>
                                        </div>		
                                        <div class="col-lg-6">
                                            <div class="footer-widget">
                                                <form method="GET" action="send-mail" class="contact-form" >
                                                    <input type="text" name="name" placeholder="নাম">
                                                    <input type="text" name="email" placeholder="ইমেইল">
                                                    <textarea name="message" placeholder="বিস্তারিত"></textarea>
                                                    <button>প্রেরণ করুণ</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
        <!-- header section end -->
        <?= $home; ?>
        <!-- footer section start -->
        <footer class="footer">
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="footer-widget">
                                <a href="#" class="footer-logo"><img src="<?php echo $app->make('url')->to('/') ?>/assets/frontend/images/pran-logo.png" alt="logo"></a>
                             <p>প্রাণ ম্যাংগো প্রাণ গ্রুপের একটি প্রিমিয়াম ব্যান্ড। আমাদের আছে বিভিন্ন প্রকার প্রডাক্ট বা পণ্য। আমাদের আছে বিভিন্ন ফ্লেভার এর ম্যাঙগো জুস, কমলা জুস, টমেটো জুস বা সস। আমাদের ফান ক্র্যাক, ফিট, ফিট ক্র্যাকার সহ বিভিন্ন প্রকারের বিস্কুট।</p>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="footer-widget mt-lg-5 pt-3">
                                <ul class="address list-unstyled pl-0">
                                    <li>
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>প্রান আর এফ এল সেন্টার, ১০৫ বীর উত্তম রফিকুল ইসলাম এভিনিউ, ঢাকা-১২১২</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-phone"></i>
                                        <span>+৯৬১ ৩৭৩৭ ৭৭৭</span>
                                    </li>
                                    <li>
                                        <i class="fas fa-envelope"></i>
                                        <span>mktg182@prangroup.com</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="footer-widget mt-lg-5 pt-3">
                                <form method="GET" action="send-mail" class="contact-form">
                                    <input type="text" name="name" placeholder="নাম">
                                    <input type="text" name="email" placeholder="ইমেইল">
                                    <textarea name="message" placeholder="বিস্তারিত"></textarea>
                                    <button>প্রেরণ করুণ</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <div class="container">
                    <p>&copy; Copyright Pran, All Right Researved</p>
                </div>
            </div>
        </footer>
        <!-- footer section end -->
        <script src='<?php echo $app->make('url')->to('/') ?>/assets/frontend/js/jquery.min.js'></script>
        <script src='<?php echo $app->make('url')->to('/') ?>/assets/frontend/js/bootstrap.bundle.min.js'></script>
        <script src='<?php echo $app->make('url')->to('/') ?>/assets/frontend/js/swiper.min.js'></script>
        <script src='<?php echo $app->make('url')->to('/') ?>/assets/frontend/js/isotope.min.js'></script>
        <script src='<?php echo $app->make('url')->to('/') ?>/assets/frontend/js/waypoints.min.js'></script>
        <script src='<?php echo $app->make('url')->to('/') ?>/assets/frontend/js/wow.min.js'></script>
        <script src='<?php echo $app->make('url')->to('/') ?>/assets/frontend/js/lightcase.js'></script>
        <script src='<?php echo $app->make('url')->to('/') ?>/assets/frontend/js/scroll-nav.js'></script>
        <script src='<?php echo $app->make('url')->to('/') ?>/assets/frontend/js/jquery-easeing.min.js'></script>
        <script src='<?php echo $app->make('url')->to('/') ?>/assets/frontend/js/scroll-nav.js'></script>
        <script src='<?php echo $app->make('url')->to('/') ?>/assets/frontend/js/functions.js'></script>
        <script>
            for (var i in jQ) {
                jQ[i]();
            }
            window.fbAsyncInit = function () {
                FB.init({
                    appId: '176909793664694',
                    cookie: true,
                    xfbml: true,
                    version: 'v5.0'
                });

                FB.getLoginStatus(function (response) {
                    if (response.status === 'connected') {
                        getFbUserData();
                        FB.login(function (response) {
                            if (response.authResponse) {
                                FB.api('/me', function (response) {
                                    document.getElementById('name').value = response.name;
                                    document.getElementById('facebookId').value = response.id;
                                });
                            } else {
                                console.log('User cancelled login or did not fully authorize.');
                            }
                        });

                    }
                });
            };

            (function (d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id))
                    return;
                js = d.createElement(s);
                js.id = id;
                js.src = "//connect.facebook.net/en_US/sdk.js";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));

            function fbLogin() {
                FB.login(function (response) {
                    if (response.authResponse) {
                        var id = response.authResponse.userID;
                        FB.api('/me', {locale: 'en_US', fields: 'first_name,last_name,email'},
                                function (response) {
                                    window.location = '/registration';
                                }
                        );
                        getFbUserData();
                    } else {
                        document.getElementById('status').innerHTML = 'User cancelled login or did not fully authorize.';
                    }
                }, {scope: 'email'});
            }

            function getFbUserData() {
                FB.api('/me', {locale: 'en_US', fields: 'first_name,last_name,email'},
                    function (response) {
                        document.getElementById('fbLink').setAttribute("onclick", "window.location = '/registration'");
                        document.getElementById('fbLink').innerHTML = '<img src="<?php echo $app->make('url')->to('/') ?>/assets/frontend/images/banner-btn.jpg" alt="banner btn">';
                    });
            }

            function fbLogout() {
                FB.logout(function () {
                    document.getElementById('fbLink').setAttribute("onclick", "fbLogin()");
                    document.getElementById('status').innerHTML = 'You have successfully logout from Facebook.';
                });
                window.location = '';
            }
        </script>
    </body>
</html>