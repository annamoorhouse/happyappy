<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HappyAppy | Your Score</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <script src="js/vendor/modernizr.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600' rel='stylesheet' type='text/css'>
  </head>
  <body class="score">

<!--Facebook Share Button Script-->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&appId=554679754584890&version=v2.0";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<!--End of Facebook Share Button Script-->
       
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
           
          <li class="name">
            <h1>
              <a href="#">
                <img src="img/wordmark.png" alt="beehappy wordmark">
              </a>
            </h1>
          </li>
          <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
     
        <section class="top-bar-section">
           
          <ul class="left">
            <li><a class="active" href="#">Home</a></li>
            <li class="divider"></li>
            <li><a href="survey.php">Get Your Score</a></li>
            <li class="divider"></li>
            <li><a href="happy.html">Are You Happy?</a></li>
          </ul>
    
        </section>
      </nav>

<?php

function distance($lat1, $lon1, $lat2, $lon2, $unit) {
  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);
  if ($unit == "K") {
    return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
    } else {
        return $miles;
      }
}

function scoreProxToParks(){
  $userCity=$_POST["city"];
  $userLatLng=grabUserLocation($userCity);
  $hits=0;

  $url = 'http://geogratis.gc.ca/services/geolocation/en/locate?q=national%20park';
  $JSON = file_get_contents($url);
  $parks = json_decode($JSON);
  //Check each park to see if it's near you.
  foreach ($parks as $park) {
    $parkdistance=distance($park->geometry->coordinates[1],$park->geometry->coordinates[0],$userLatLng['lat'],$userLatLng['long'],"K");
    if($parkdistance<200){
      $hits++;
    }
  }
    //Now grab provincial park data.
  $provurl = 'http://geogratis.gc.ca/services/geolocation/en/locate?q=prov*%20park';
  $provJSON = file_get_contents($provurl);
  $provparks = json_decode($provJSON);
  //Check each park to see if it's near you.
  foreach ($provparks as $park) {
    $parkdistance=distance($park->geometry->coordinates[1],$park->geometry->coordinates[0],$userLatLng['lat'],$userLatLng['long'],"K");
    if($parkdistance<200){
      $hits++;
    }
  }
  return $hits;
}

//This function queries google maps API and grabs the latitude and longitude of a person based on their chosen city.
function grabUserLocation($input){
  $user_city = $input;
  $request_url = "http://maps.googleapis.com/maps/api/geocode/json?address=".$user_city."%20Canada&sensor=false";
  $USERJSON = file_get_contents($request_url);
  $result = json_decode($USERJSON);
  $lat=$result->results[0]->geometry->location->lat;
  $long=$result->results[0]->geometry->location->lng;
  return compact('lat','long');
}


/* =========================================================================== */
//LIFE EXPECTANCY SCORE

function scoreLifeExpectancy(){
  //Find the life expectancy based on province and gender, assign a score to that expectancy.
  $userProvince=$_POST["province"];
  $userGender=$_POST["gender"];
  $url = 'data/life-expectancy.json';
  $JSON = file_get_contents($url);
  $life_ex = json_decode($JSON);
  foreach ($life_ex as $category) {
    if($category->SEX == $userGender && $category->GEO == $userProvince){
      switch($userGender){
        case "Males":
        $baseline=68.5;
        break;
        case "Females":
        $baseline=73.5;
        break;
      }
      $age = $category->Value;
    }
  }
  $points=10+($age-$baseline)*.77;
  return $points;
}
/* =========================================================================== */
//BMI SCORE

function scoreBMI(){
  //Find the BMI of the user, and compare that to others.
  $userGender=$_POST["gender"];
  $calcHeight=($_POST["height-ft"] * 12)+$_POST["height-in"];
  $userHeight=$calcHeight*2.54/100;
  $userWeight=($_POST["weight"]*0.453592);

  $userBMI=$userWeight / pow($userHeight,2);
  if($userBMI < 18.5){
    $BMIpoints=7.5;
  } elseif($userBMI > 18.5 && $userBMI < 24.9){
    $BMIpoints=20;
  } elseif($userBMI > 24.9 && $userBMI < 29.9){
    $BMIpoints=10;
  } elseif($userBMI > 29.9){
    $BMIpoints=5;
  }
  return $BMIpoints;
  $url = 'data/bmi.json';
  $JSON = file_get_contents($url);
  $BMI = json_decode($JSON);
  foreach ($BMI as $category) {
    if($category->SEX == $userGender && $category->GEO == $userProvince){
      switch($userGender){
        case "Males":
        $baseline=68.5;
        break;
        case "Females":
        $baseline=73.5;
        break;
      }
    }
  }
}

/* =========================================================================== */
//Add up all the health stuff

function scoreHealth(){
  //Find the BMI of the user, and compare that to others.
  return $_POST['health1']+$_POST['health2']+$_POST['health3']+$_POST['health4']+$_POST['health5']+$_POST['health6'];
}

function scorePsych(){
  return $_POST['psych1']+$_POST['psych2']+$_POST['psych3']+$_POST['psych4']+$_POST['psych5'];
}

function scoreEco(){
  return $_POST['eco1']+$_POST['eco2']+$_POST['eco3'];
}



$lifeExpectancy=scoreLifeExpectancy();
$proximityToParks=scoreProxToParks(); 
$surveyHealth=scoreHealth();
$surveyPsych=scorePsych();
$surveyEco=scoreEco();
$BMI=scoreBMI();

$dHealth=round($lifeExpectancy+$BMI+$surveyHealth);
$dPsych=round($surveyPsych);
$dEco=round($proximityToParks+$surveyEco);
$totalScore=round(($dHealth+$dPsych+$dEco)/3);
?>
      <div class="row">
      <div class="medium-12 columns">
        <center><h1>Your happy score is:</h1>
        <div id="bigrating"><?php echo $totalScore; ?></div>
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="http://yourbc.ca/beehappy" data-via="yppofbc" data-count="none">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        <div class="fb-share-button" data-href="http://yourbc.ca/beehappy" data-layout="button"></div>
        </center>

      </div>
      <div class="medium-12 columns">
      <h4>Details</h4>
      </div>
      </div>
      <div class="row" data-equalizer>
       <div class="medium-4 columns">
          <div class="panel" data-equalizer-watch>
            <h5>Health</h5>
            <p>Your health score is calculated using government datasets for life expectancy and body mass index, as well as your input.</p>
            <center><div class="mediumrating"><?php echo $dHealth; ?></div></center>
          </div>
        </div>
        <div class="medium-4 columns">
          <div class="panel" data-equalizer-watch>
            <h5>Pyschological Well Being</h5>
            <p>This score is solely based on your answers and is based on the GNH model.</p>
            <center><div class="mediumrating"><?php echo $dPsych; ?></div></center>
          </div>
        </div>
        <div class="medium-4 columns">
          <div class="panel" data-equalizer-watch>
            <h5>Ecological Diversity</h5>
            <p>This score is based on datasets around proximity to parks, as well as your input.</p>
            <center><div class="mediumrating"><?php echo $dEco; ?></div></center>
          </div>
        </div>
      </div>
      </div>
       <footer class="row">
        <div class="large-12 columns">
          <div class="row">
            <div class="large-6 columns">
              <p style="font-size: 70%;">© 2015 <a href="http://www.yppofbc.ca/" target="_blank" style="color: #000000;">Your Political Party of BC</a></p>
            </div>
            
            <div class="large-6 columns">
            <ul class="inline-list right">
              <li><a href="http://twitter.com/yppofbc" target="_blank"><img src="img/icons/twitter.png" alt="twitter"></a></li>
              <li><a href="http://facebook.com/yppbc" target="_blank"><img src="img/icons/facebook.png" alt="facebook"></a></li>
              <li><a href="http://instagram.com/yppofbc" target="_blank"><img src="img/icons/instagram.png" alt="instagram"></a></li>
            </ul>
            </div>
          </div>
        </div>
      </footer>

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>

  </body>
</html>
