<?php 
$page_title ="Pune Developers Comunity"; 
$fb_page_id = "832671326841302";
$year_range = 2;

// automatically adjust date range
// human readable years
$since_date = date('2016-01-01', strtotime('-' . $year_range . ' years'));
$until_date = date('2025-01-01', strtotime('+' . $year_range . ' years'));

// unix timestamp years
$since_unix_timestamp = strtotime($since_date);
$until_unix_timestamp = strtotime($until_date);

//echo $since_unix_timestamp . " to " . $until_unix_timestamp;

// or you can set a fix date range:
// $since_unix_timestamp = strtotime("2012-01-08");
// $until_unix_timestamp = strtotime("2018-06-28");

$access_token = "376313242818198|nsB-jWP-xpNm-qMUTQGzMg7c2ks";

$fields="id,name,description,place,timezone,start_time,cover";

$json_link = "https://graph.facebook.com/v2.7/{$fb_page_id}/events/attending/?fields={$fields}&access_token={$access_token}&since={$since_unix_timestamp}&until={$until_unix_timestamp}";

//https://graph.facebook.com/v2.7/832671326841302/events/attending/?fields=id,name,description,place,timezone,start_time,cover&access_token=376313242818198|nsB-jWP-xpNm-qMUTQGzMg7c2ks&since=1481500800&until=1608854400

$json = file_get_contents($json_link);

$obj = json_decode($json, true, 512, JSON_BIGINT_AS_STRING);

// for those using PHP version older than 5.4, use this instead:
// $obj = json_decode(preg_replace('/("\w+"):(\d+)/', '\\1:"\\2"', $json), true);


?>


<!DOCTYPE html>
<html lang="zxx">
    
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pune Developer's Community</title>
        <!--Favicon add-->
    <link rel="shortcut icon" type="image/png" href="assets/img/fevicon.png" width="32px" height="32px">
    
        <!--bootstrap Css-->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
        <!--font-awesome Css-->
    <!-- <link href="assets/css/font-awesome.min.css" rel="stylesheet"> -->
        <!--owl.carousel Css-->
        <link href="assets/css/owl.carousel.css" rel="stylesheet">
        <!--Slick Nav Css-->
        <link href="assets/css/slicknav.min.css" rel="stylesheet">
        <!--Animate Css-->
        <link href="assets/css/animate.css" rel="stylesheet">
        <!--Style Css-->
        <link href="assets/css/style.css" rel="stylesheet">
        <link  href="assets/css/stylemy.css" rel="stylesheets">
        <!--Responsive Css-->
        <link href="assets/css/responsive.css" rel="stylesheet">

        <link href="assets/css/res-table.css" rel="stylesheet">

        
    </head>
    <body >
    <!--Preloader start-->
    <div class="preloader">
        <div class="spinner">
          <div class="cube1"></div>
          <div class="cube2"></div>
        </div>
    </div>
    <!--Preloader end-->
    <div class="site"><!--for boxed Layout start-->

<!--mobile logo -->
    <div class="mobile-logo">
        <a href="index.html"><img src="./assets/img/PDC-logo-1.png" alt="PDC" width="30px">
        <span class="logo-name-mob" >Pune Developer’s Community</span></a>
    </div>

    <!--main menu start-->
    <nav class="main-menu">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="logo">
                        <a href="index.html"><img src="./assets/img/PDC-logo-1.png" alt="PDC" width="50px">
                                   <span class="logo-name">Pune Developer’s Community</span></a>
                    </div>
                </div>
                <div class="col-md-8 text-right">
                    <nav>
                        <ul id="menu-bar">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="build2018.html">#Build2018</a></li>
                        <li><a href="photos.php">Gallery</a>
                        </li>
                        <li><a href="about.html">About Us</a></li>
                        <li><a href="events.php">Events</a></li>
                        <li><a href="contact.html">Contact</a></li>
                        
                    </ul>
                    </nav>
                </div>
            </div>
        </div>
    </nav><!--main menu end-->



    <div class="eve container">
 
<!-- events will be here -->
<?php

echo "
<table class='table table-hover table-responsive table-bordered'>";
 
    // count the number of events
    $event_count = count($obj['data']);

   // echo $event_count;
 
    for($x=0; $x<$event_count; $x++){
        // facebook page events will be here
        // set timezone
        date_default_timezone_set($obj['data'][$x]['timezone']);

        $start_date = date( 'l, F d, Y', strtotime($obj['data'][$x]['start_time']));
        $start_time = date('g:i a', strtotime($obj['data'][$x]['start_time']));
        
        $pic_big = isset($obj['data'][$x]['cover']['source']) ? $obj['data'][$x]['cover']['source'] : "https://graph.facebook.com/v2.7/{$fb_page_id}/picture?type=large";

        $eid = $obj['data'][$x]['id'];
        $name = $obj['data'][$x]['name'];
        $description = isset($obj['data'][$x]['description']) ? $obj['data'][$x]['description'] : "";

        // place
        $place_name = isset($obj['data'][$x]['place']['name']) ? $obj['data'][$x]['place']['name'] : "";
        $city = isset($obj['data'][$x]['place']['location']['city']) ? $obj['data'][$x]['place']['location']['city'] : "";
        $country = isset($obj['data'][$x]['place']['location']['country']) ? $obj['data'][$x]['place']['location']['country'] : "";
        $zip = isset($obj['data'][$x]['place']['location']['zip']) ? $obj['data'][$x]['place']['location']['zip'] : "";

        $location="";

        if($place_name && $city && $country && $zip){
        $location="{$place_name}, {$city}, {$country}, {$zip}";
        }else{
        $location="Location not set or event data is too old.";
        }



        echo "<tr>";
        echo "<td rowspan='6' style='width:20em;'>";
            echo "<img src='{$pic_big}' width='200px' />";
        echo "</td>";
    echo "</tr>";
      
    echo "<tr>";
        echo "<td style='width:15em;'>What:</td>";
        echo "<td><b>{$name}</b></td>";
    echo "</tr>";
      
    echo "<tr>";
        echo "<td>When:</td>";
        echo "<td>{$start_date} at {$start_time}</td>";
    echo "</tr>";
      
    echo "<tr>";
        echo "<td>Where:</td>";
        echo "<td>{$location}</td>";
    echo "</tr>";
      
    echo "<tr>";
        echo "<td>Description:</td>";
        echo "<td>{$description}</td>";
    echo "</tr>";
      
    echo "<tr>";
        echo "<td>Facebook Link:</td>";
        echo "<td>";
            echo "<a href='https://www.facebook.com/events/{$eid}/' target='_blank'>View on Facebook</a>";
        echo "</td>";
    echo "</tr>";


    }
echo"</table>";

?>

 
</div>




    <!--footer section start-->
    <footer class="footer-section section-padding padding-bottom-0 text-center">
           <div class="container">
               <div class="row ">
                   <div class="col-md-6 col-md-offset-3">
                       <div class="footer-logo">
                           <a href="index.html"><img src="assets/img/PDC-footer.jpg" alt="Footer Logo"></a>
                       </div>
                       <p class="footer-text"> Pune Developers Platform for learning and sharing technical knowledge, driven by passionate volunteers. Guys, Lets collaborate together, network, learn and knowledge exchange.</p>
                   </div>
               </div>
               <div class="row">
               <div class="col-md-4 col-md-offset-4">
                  <div class="footer-social-link">
                      <h3>Follow Us on</h3>
                      <div class="social-link">
                          <a href="https://www.facebook.com/punedevscommunity" target="_blank"><i class="fa fa-facebook"></i></a>
                          <a href="https://twitter.com/PuneDevsCom" target="_blank"><i class="fa fa-twitter"></i></a>
                          <a href="https://www.meetup.com/Pune-Developers-Community/" target="_blank"><i class="fa fa-meetup" aria-hidden="true"></i></a>
                      </div>
                  </div>
               </div>
               </div>
           </div>
           <div class="footer-bottom">
               <p class="copyright-text">PASSIONATELY CRAFTED @<a href="http://www.hybrowlabs.com/" target="_blank">HYBROWLABS.</a> COPY RIGHTS &copy; 2017. ALL RIGHTS RESERVED </p>
           </div>
    </footer><!--footer section end-->

       </div><!--for boxed Layout end-->

       
        
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
        <script src="assets/js/main.js"></script>
    </body>

</html>




















