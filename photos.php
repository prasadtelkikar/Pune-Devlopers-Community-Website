<?php
require 'assets/php/meetup.php';
try {
    $meetup = new Meetup(array(
        'key' => '4926a43337203c64247c1255792d50'
    ));

    // event ids = {
    //     Build2018 PDC's second birthday!!! {FREE EVENT}  = 245824901,
    //
    // }

    $albums = $meetup->get('/Pune-Developers-Community/photo_albums');
    
        
} catch (Exception $e) {
    echo $e->getMessage();
}


?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pune Developer's Community</title>
    <meta name="keywords" content="Pune Developers Platform for learning and sharing technical knowledge, driven by passionate volunteers. Guys, Lets collaborate together, network, learn and knowledge exchange">
    <script type="application/ld+json">
        {
            "@context": "http://schema.org",
            "@type": "Organization",
            "name": "Pune Developer's Community",
            "legalName": "Pune Developer's Community",
            "url": "http://punedevscommunity.in",
            "logo": "https://secure.meetupstatic.com/photos/event/1/c/c/global_456180460.jpeg",
            "foundingDate": "2015",
            "founders": [{
                    "@type": "Person",
                    "name": "Suyog Kale"
                },
                {
                    "@type": "Person",
                    "name": "Dhruv Chaudhari"
                }
            ],
            "address": {
                "@type": "PostalAddress",
                "streetAddress": "Pune",
                "addressLocality": "Banner",
                "addressRegion": "MH",
                "postalCode": "411001",
                "addressCountry": "India"
            },
            "sameAs": [
                "https://www.facebook.com/punedevscommunity",
                "https://twitter.com/PuneDevsCom",
                "https://www.meetup.com/Pune-Developers-Community"
            ]
        }
    </script>
    <!--Favicon add-->
    <link rel="shortcut icon" type="image/png" href="assets/img/fevicon.png" width="32px" height="32px">

    <!--bootstrap Css-->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!--owl.carousel Css-->
    <link href="assets/css/owl.carousel.css" rel="stylesheet">
    <!--Slick Nav Css-->
    <link href="assets/css/slicknav.min.css" rel="stylesheet">
    <!--Animate Css-->
    <link href="assets/css/animate.css" rel="stylesheet">
    <!--Style Css-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/photos.css" rel="stylesheet">
    <!--Responsive Css-->
    <link href="assets/css/responsive.css" rel="stylesheet">

</head>

<body>
    <!--Preloader start-->
    <!-- <div class="preloader">
        <div class="spinner">
            <div class="cube1"></div>
            <div class="cube2"></div>
        </div>
    </div> -->
    <!--Preloader end-->
    <div class="site">
        <!--for boxed Layout start-->

        <!--Scroll to top start-->
        <div class="scroll-to-top">
            <a href="#">
                <i class="fa fa-caret-up"></i>
            </a>
        </div>
        <!--Scroll to top end-->
        <!--mobile logo -->
        <div class="mobile-logo">
            <a href="index.html">
                <img src="./assets/img/PDC-logo-1.png" alt="PDC" width="30px">
                <span class="logo-name-mob"> Pune Developer’s Community</span>
            </a>
        </div>

        <!--main menu start-->
        <nav class="main-menu">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="logo">
                            <a href="index.html">
                                <img src="./assets/img/PDC-logo-1.png" alt="PDC" width="50px">
                                <span class="logo-name">Pune Developer’s Community</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-8 text-right">
                        <nav>
                            <ul id="menu-bar">
                                <li>
                                    <a href="index.html">Home</a>
                                </li>
                                <li>
                                    <a href="build2018.html">#Build2018</a>
                                </li>
                                <li>
                                    <a href="photos.php">Gallery</a>
                                </li>
                                <li>
                                    <a href="about.html">About Us</a>
                                </li>
                                <!-- <li>
                                    <a href="events.php">Events</a>
                                </li> -->
                                <li>
                                    <a href="contact.html">Contact</a>
                                </li>
                                
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>
        <!--main menu end-->



        <!--header section start-->
        <!--Header section end--><br /><br />
        <div class="container ">
        <?php 
        foreach($albums as $album) {
            if(property_exists($album, "event") && $album->photo_count != 0){
            echo '<div class="photos-container contain"><div class="head2"><br><h2>'.$album->title.'</h2></div><div class="gallery container">';
            
                $eventId = $album->event->id;
 
                $response = $meetup->get('/Pune-Developers-Community/events/'.$eventId.'/photos');
                foreach( $response as $res) {
                    if($res->thumb_link) {
                        echo '<div class="img-w">
                                <img src='.$res->photo_link.' alt=""/>
                            </div>';
                    }
                }
                echo '</div><br /></div><br />';
            }
        }
        ?>
        </div>
        


        <!--footer section start-->
        <footer class="footer-section section-padding padding-bottom-0 text-center">
            <div class="container">
                <div class="row ">
                    <div class="col-md-6 col-md-offset-3">
                        <div class="footer-logo">
                            <a href="index.html">
                                <img src="assets/img/PDC-footer.jpg" alt="Footer Logo" width="280px">
                            </a>
                        </div>
                        <p class="footer-text"> Pune Developers Platform for learning and sharing technical knowledge, driven by passionate volunteers.
                            Guys, Lets collaborate together, network, learn and knowledge exchange.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="footer-social-link">
                            <h3>Follow Us on</h3>
                            <div class="social-link">
                                <a href="https://www.facebook.com/punedevscommunity" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                                <a href="https://twitter.com/PuneDevsCom" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                                <a href="https://www.meetup.com/Pune-Developers-Community/" target="_blank">
                                    <i class="fa fa-meetup" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom">
                <p class="copyright-text">PASSIONATELY CRAFTED @
                    <a href="http://www.hybrowlabs.com/" target="_blank">HYBROWLABS.</a> COPY RIGHTS &copy; 2017. ALL RIGHTS RESERVED </p>
            </div>
        </footer>
        <!--footer section end-->

    </div>
    <!--for boxed Layout end-->

    <script src="https://use.fontawesome.com/56ee845998.js"></script>
    <!--jquery script load-->
    <script src="assets/js/jquery.js"></script>
    <!--Owl carousel script load-->
    <script src="assets/js/owl.carousel.min.js"></script>
    <!--Bootstrap v3 script load here-->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--Slick Nav Js File Load-->
    <script src="assets/js/jquery.slicknav.min.js"></script>
    <!--Wow Js File Load-->
    <script src="assets/js/wow.min.js"></script>
    <!--Main js file load-->
    <script src="assets/js/mainPhotos.js"></script>
    <script src="assets/js/photos.js"></script>
    <script src="http://demo.phpgang.com/lazy-loading-images-jquery/jquery.devrama.lazyload.min-0.9.3.js"></script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-111599190-1"></script>
    <script>
  
        $(function(){
            $.DrLazyload(); //Yes! that's it!
        });

        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-111599190-1');
    </script>
</body>

</html>