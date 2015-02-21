<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Foundation | Welcome</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/custom.css" />
    <script src="js/vendor/modernizr.js"></script>

    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,600' rel='stylesheet' type='text/css'>
  </head>
  <body>
       
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
           
          <li class="name">
            <h1>
              <a href="#">
                Top Bar Title
              </a>
            </h1>
          </li>
          <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>
     
        <section class="top-bar-section">
           
          <ul class="left">
            <li><a class="active" href="#">Home</a></li>
            <li class="divider"></li>
            <li><a href="#">Get Your Score</a></li>
            <li class="divider"></li>
            <li><a href="#">Are You Happy?</a></li>
          </ul>
    
        </section>
      </nav>
      <div class="row">
      <div class="medium-12 columns">
<?php

/* 
function _getDistance(lat1,lng1,lat2,lng2){
    var R = 6371; // Radius of the earth in km
    var dLat = _deg2rad(lat2-lat1);
    var dLon = _deg2rad(lng2-lng1); 
    var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(_deg2rad(lat1)) * Math.cos(_deg2rad(lat2)) * Math.sin(dLon/2) * Math.sin(dLon/2); 
    var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a)); 
    var d = R * c; // Distance in km
    return d;
} */

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
  echo $userGender;
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
  echo $userGender." in ".$userProvince." have a life expectancy of ".$age.". This is ".$points." from the global baseline (".$baseline.").";
  return $age-$baseline;

}

$lifeExpectancy=scoreLifeExpectancy();
$proximityToParks=scoreProxToParks(); 

echo "Life expectancy over/under global average: ".$lifeExpectancy."<br/>";
echo "Number of national/provincial parks within 200km: ".$proximityToParks."<br/>";



?>
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
