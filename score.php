<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>The Canadian Gross National Happiness Rating</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
  </head>
  <body>
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
    if($parkdistance<500){
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
    if($parkdistance<300){
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
  $url = '/data/life-expectancy.json';
  $JSON = file_get_contents($url);
  $life_ex = json_decode($JSON);
  foreach ($life_ex as $category) {
    if($category->SEX == $userGender && $category->GEO == $userProvince){
      if($userGender=="Males"){
        $baseline=68.5;
      } else {
        $baseline=73.5;
      }
      $age = $category->Value;
    }
  }
  return $age-$baseline;
  //echo $userGender." in ".$userProvince." have a life expectancy of ".$age.". This is ".$points." from the global baseline (".$baseline.").";
}

$lifeExpectancy=scoreLifeExpectancy();
$proximityToParks=scoreProxToParks(); 

echo "Life expectancy over/under global average: ".$lifeExpectancy."<br/>";
echo "Number of nearby national/provincial parks: ".$proximityToParks."<br/>";



?>
    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
