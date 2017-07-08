<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <meta name="theme-color" content="#263238">
        <title>IETE</title>

        <!-- CSS  -->
        <!-- Compiled and minified CSS -->
       <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/css/materialize.min.css"> -->

       <!-- Compiled and minified JavaScript -->
       <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.99.0/js/materialize.min.js"></script> -->
       <!-- Icons -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="icon" type="image/png" href="img/favicon.jpg">
        <!-- JQUERY -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
        <link href="min/custom-min.css" type="text/css" rel="stylesheet">
        <!--  Scripts-->
        <script src="min/plugin-min.js"></script>
        <script src="min/custom-min.js"></script>
        <script type="text/javascript">
          $( document ).ready(function() {
            $(".button-collapse").sideNav();
          });
        </script>
        <style media="screen">
        .nav-fixed {
   position: fixed;
   right: 0;
   left: 0;
   top: 0;
   margin-bottom: 0px;
   z-index: 997;
 }
        </style>

    </head>
    <body id="top" class="scrollspy blue-grey darken-4">

        <!-- Pre Loader -->
        <div id="loader-wrapper" class="scrollspy">
            <div id="loader"  class="scrollspy"></div>
            <div class="loader-section section-left"></div>
            <div class="loader-section section-right"></div>

        </div>

        <!--Navigation-->
        <div class="navbar-fixed">
     <nav id="nav_f" class="black" role="navigation">
         <div class="">
             <div class="nav-wrapper">
             <a href="#loader-wrapper" id="logo-container" class="brand-logo"><img src="img/logo.jpg" alt="" height="55px;"></a>
                 <ul class="right hide-on-med-and-down">
                     <li><a href="#about">About Us</a></li>
                     <li><a href="#events">Events</a></li>
                     <li><a href="#newsletter">Newsletter</a></li>
                     <li><a href="#team">Team</a></li>
                     <li><a href="#contact">Contact</a></li>

                 </ul>

             <a href="#" data-activates="nav-mobile" class="button-collapse" style="padding-left:7%"><i class="material-icons">reorder</i></a>
             </div>
         </div>
     </nav>
 </div>

                <!-- </div> -->
            </nav>
        </div>
        <ul id="nav-mobile" class="side-nav">
            <li><a href="#about">About Us</a></li>
            <li><a href="#events">Events</a></li>
            <li><a href="#newsletter">Newsletter</a></li>
            <li><a href="#team">Team</a></li>
            <li><a href="#contact">Contact</a></li>

        </ul>

        <!--Hero-->
        <div class="section no-pad-bot blue-grey darken-4" id="index-banner">
            <div class="container">
                <h1 class="text_h center header cd-headline letters type">
                    <span>We</span>
                    <span class="cd-words-wrapper waiting">
                        <b class="is-visible">design</b>
                        <b>develop</b>
                        <b>create</b>
                    </span>
                </h1>
            </div>
        </div>

        <!--about-->
        <div id="about" class="section scrollspy">
            <div class="container">
                <div class="row">
                    <div  class="col s12">
                        <h2 class="center header text_h2 white-text"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. <span class="span_h2"> Phasellus  </span>vestibulum lorem risus, nec suscipit lorem <span class="span_h2"> laoreet quis.</span> </h2>
                    </div>

                    <div  class="col s12 m4 l4">
                        <div class="center promo promo-example">
                            <i class="mdi-image-flash-on"></i>
                            <h5 class="promo-caption white-text">Some Title</h5>
                            <p class="light center white-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Cum sociis natoque penatibus et magnis dis parturient montes.</p>
                        </div>
                    </div>
                    <div class="col s12 m4 l4">
                        <div class="center promo promo-example">
                            <i class="mdi-social-group"></i>
                            <h5 class="promo-caption white-text">Some Title</h5>
                            <p class="light center white-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                        </div>
                    </div>
                    <div class="col s12 m4 l4">
                        <div class="center promo promo-example">
                            <i class="mdi-hardware-desktop-windows"></i>
                            <h5 class="promo-caption white-text">Some Title</h5>
                            <p class="light center white-text">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Events-->
        <div class="section scrollspy" id="events">
            <div class="container">
                <h2 class="header text_b">Events </h2>
                <div class="row">
                  <?php
                      $conn=null;
                      $servername = "localhost";
                      $username = "root";
                      $password = "";
                      $dbname = "test";
                      $conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

                      $sql = "SELECT * FROM ieteEvents;";

                      $result = $conn->query($sql);
                      //$row = $result->fetch_assoc();
                      // 	print_r($result);
                      while($row = $result->fetch_assoc()){
                        $event_name = $row["event_name"];
                        $cover_image = $row["cover_image"];
                        $event_des = $row["event_description"];
                        $path = "assets/events/".$event_name."/".$cover_image;
                        $link = "gallery/index.php?event_name=".$event_name
                        //  echo $event_name;
                      ?>
                          <div class="col s12 m4 l4">
                              <div class="card">
                                  <div class="card-image waves-effect waves-block waves-light">
                                      <img class="activator" src="<?=$path?>" style="height:200px;">
                                  </div>
                                  <div class="card-content">
                                      <span class="card-title activator grey-text text-darken-4"><?=$event_name?><i class="mdi-navigation-more-vert right"></i></span>
                                      <p><a href="<?=$link?>">View Details</a></p>
                                  </div>
                                  <div class="card-reveal">
                                      <span class="card-title grey-text text-darken-4"><?=$event_name?> <i class="mdi-navigation-close right"></i></span>
                                      <p><?=$event_des?>.</p>
                                  </div>
                              </div>
                          </div>
                      <?php
                        }
                      ?>
                </div>
            </div>
        </div>
        <!-- Newsletter -->
        <div class="container section scrollspy" id="newsletter">
            <h2 class="header text_b">Newsletter</h2>
            <div class="collection">
                <!-- <a href="#!" class="collection-item">Newsletter #</a>
                <a href="#!" class="collection-item">Newsletter #</a>
                <a href="#!" class="collection-item">Newsletter #</a>
                <a href="#!" class="collection-item">Newsletter #</a> -->
                <?php
                  $dir = "assets/newsletter";
                  $files = scandir($dir);
                  if (is_dir($dir)){
                    if ($dh = opendir($dir)){
                      while (($file = readdir($dh)) !== false){
                        if ($file == '.' OR $file == '..') {
                          continue;
                        }
                        //  echo $file;
                        $name = str_replace("_"," ",$file);
                        $name = substr($name,0,strpos($name,"."));
                        //  echo $name;
                        echo "<a href=".$dir."/".$file." download class='collection-item' style='color: #039be5 !important;' ><span class='badge'><i class = material-icons>play_for_work</i></span>".$name."</a>";
                      }
                    }
                  }

                 ?>
            </div>
        </div>


        <!-- Reviews -->
        <div class="section scrollspy" id="review">
            <div class="container">
                <h2 class="header text_b"> What They Say </h2>
                <div class="row">
                  <div class="col s12 m6 l6">
                    <div class="card horizontal">
                      <div class="card-avatar" style="padding-top:2%;padding-left:2%;">
                        <img src="img/avatar1.png">
                      </div>
                      <div class="card-stacked">
                        <div class="card-content">
                          <span class="card-title black-text">Prof. Charles Xavier</span>
                          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col s12 m6 l6">
                    <div class="card horizontal">
                      <div class="card-avatar" style="padding-top:2%;padding-left:2%;">
                        <img src="img/avatar1.png">
                      </div>
                      <div class="card-stacked">
                        <div class="card-content">
                          <span class="card-title black-text">Prof. Robert Langdon</span>
                          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col s12 m6 l6">
                    <div class="card horizontal">
                      <div class="card-avatar" style="padding-top:2%;padding-left:2%;">
                        <img src="img/avatar1.png">
                      </div>
                      <div class="card-stacked">
                        <div class="card-content">
                          <span class="card-title black-text">Prof. Filius Flitwick</span>
                          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col s12 m6 l6">
                    <div class="card horizontal">
                      <div class="card-avatar" style="padding-top:2%;padding-left:2%;">
                        <img src="img/avatar1.png">
                      </div>
                      <div class="card-stacked">
                        <div class="card-content">
                          <span class="card-title black-text">	Prof. Ted Mosby</span>
                          <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.Aenean commodo ligula eget dolor.</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <!--Team-->
        <!--Parallax-->
        <div class="parallax-container">
            <div class="parallax"><img src="img/parallax1.png"></div>
        </div>
        <div class="section scrollspy blue-grey darken-4" id="team">
            <div class="container">
                <h2 class="header text_b"> Our Team </h2>
                <div class="row">
                    <div class="col s12 m3">
                        <div class="card card-avatar">
                            <div class="waves-effect waves-block waves-light">
                                <img class="activator" src="img/avatar1.png">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Flash <br/>
                                    <small><em><a class="red-text text-darken-1" href="#">CEO</a></em></small></span>
                                <p>
                                    <a class="blue-text text-lighten-2" href="">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a class="blue-text text-lighten-2" href="">
                                        <i class="fa fa-twitter-square"></i>
                                    </a>
                                    <a class="blue-text text-lighten-2" href="">
                                        <i class="fa fa-google-plus-square"></i>
                                    </a>
                                    <a class="blue-text text-lighten-2" href="">
                                        <i class="fa fa-linkedin-square"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m3">
                        <div class="card card-avatar">
                            <div class="waves-effect waves-block waves-light">
                                <img class="activator" src="img/avatar1.png">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Cat Woman<br/>
                                    <small><em><a class="red-text text-darken-1" href="#">Designer</a></em></small>
                                </span>
                                <p>
                                    <a class="blue-text text-lighten-2" href="">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a class="blue-text text-lighten-2" href="">
                                        <i class="fa fa-twitter-square"></i>
                                    </a>
                                    <a class="blue-text text-lighten-2" href="">
                                        <i class="fa fa-google-plus-square"></i>
                                    </a>
                                    <a class="blue-text text-lighten-2" href="">
                                        <i class="fa fa-linkedin-square"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m3">
                        <div class="card card-avatar">
                            <div class="waves-effect waves-block waves-light">
                                <img class="activator" src="img/avatar1.png">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">
                                    Capt. America <br/>
                                    <small><em><a class="red-text text-darken-1" href="#">CMO</a></em></small></span>
                                <p>
                                    <a class="blue-text text-lighten-2" href="">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a class="blue-text text-lighten-2" href="">
                                        <i class="fa fa-twitter-square"></i>
                                    </a>
                                    <a class="blue-text text-lighten-2" href="">
                                        <i class="fa fa-google-plus-square"></i>
                                    </a>
                                    <a class="blue-text text-lighten-2" href="">
                                        <i class="fa fa-linkedin-square"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m3">
                        <div class="card card-avatar">
                            <div class="waves-effect waves-block waves-light">
                                <img class="activator" src="img/avatar1.png">
                            </div>
                            <div class="card-content">
                                <span class="card-title activator grey-text text-darken-4">Robin<br/>
                                    <small><em><a class="red-text text-darken-1" href="#">Developer</a></em></small></span>
                                <p>
                                    <a class="blue-text text-lighten-2" href="">
                                        <i class="fa fa-facebook-square"></i>
                                    </a>
                                    <a class="blue-text text-lighten-2" href="">
                                        <i class="fa fa-twitter-square"></i>
                                    </a>
                                    <a class="blue-text text-lighten-2" href="">
                                        <i class="fa fa-google-plus-square"></i>
                                    </a>
                                    <a class="blue-text text-lighten-2" href="">
                                        <i class="fa fa-linkedin-square"></i>
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--Footer-->
        <footer id="contact" class="page-footer black scrollspy">
            <div class="container">
                <div class="row">
                    <div class="col l6 s12">
                        <form class="col s12" action="contact.php" method="post">
                            <div class="row">
                                <div class="input-field col s6">
                                    <i class="mdi-action-account-circle prefix white-text"></i>
                                    <input id="icon_prefix" name="name" type="text" class="validate white-text">
                                    <label for="icon_prefix" class="white-text">First Name</label>
                                </div>
                                <div class="input-field col s6">
                                    <i class="mdi-communication-email prefix white-text"></i>
                                    <input id="icon_email" name="email" type="email" class="validate white-text">
                                    <label for="icon_email" class="white-text">Email-id</label>
                                </div>
                                <div class="input-field col s12">
                                    <i class="mdi-editor-mode-edit prefix white-text"></i>
                                    <textarea id="icon_prefix2" name="message" class="materialize-textarea white-text"></textarea>
                                    <label for="icon_prefix2" class="white-text">Message</label>
                                </div>
                                <div class="col offset-s7 s5">
                                    <button class="btn waves-effect waves-light red darken-1" type="submit">Submit
                                        <i class="mdi-content-send right white-text"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col l4 s8 offset-s2">
                      <h5 class="white-text">contact@email.com</h5>

                    </div>
                    <div class="col l2 s4 offset-s4">
                        <h5 class="white-text">Social</h5>
                        <ul>
                            <li>
                                <a class="white-text" href="">
                                    <i class="small fa fa-facebook-square white-text"></i> Facebook
                                </a>
                            </li>
                            <li>
                                <a class="white-text" href="">
                                    <i class="small fa fa-twitter-square white-text"></i> Twitter
                                </a>
                            </li>
                            <li>
                                <a class="white-text" href="">
                                    <i class="small fa fa-linkedin-square white-text"></i> Linkedin
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-copyright black">
                <div class="container">
                    Developed by <a class="white-text" href="https://www.linkedin.com/in/sneh-gajiwala-482442143">Sneh Gajiwala</a>
                </div>
            </div>
        </footer>




    </body>
</html>
