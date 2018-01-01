<?php
$api_key = 'RGAPI-20d46781-4094-4e67-8bd7-3f256e235922';
$region = 'jp1';
$name = 'ulg';

//$url = 'https://' . $region . '.api.riotgames.com/lol/summoner/v3/summoners/by-name/' . $name . '?api_key=' . $api_key;

// for json file on internet
//$url = 'http://ddragon.leagueoflegends.com/cdn/7.24.1/data/en_US/runesReforged.json';
//$curl = curl_init($url);
// curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// $result = curl_exec($curl);
// curl_close($curl);

// for own json file on own server
$url = 'json/runesReforged.json';
$result = file_get_contents($url);



//echo 'region = '.$region.'<br />';
//echo 'name = '.$name.'<br />';
//echo 'result = '.$result.'<br />';
?>

<?php
$array = json_decode($result, true);
//$standardized_name = str_replace(' ', '', mb_strtolower($name, 'UTF-8'));


$keystones = array(
  array( "id" => "8005",
             "name",
             "shortDesc"),
  array( "id" => "8008",
             "name",
             "shortDesc"),
  array( "id" => "8021",
             "name",
             "shortDesc"),
  array( "id" => "8112",
             "name",
             "shortDesc"),
  array( "id" => "8124",
             "name",
             "shortDesc"),
  array( "id" => "8128",
             "name",
             "shortDesc"),
  array( "id" => "8214",
             "name",
             "shortDesc"),
  array( "id" => "8229",
             "name",
             "shortDesc"),
  array( "id" => "8230",
             "name",
             "shortDesc"),
  array( "id" => "8437",
             "name",
             "shortDesc"),
  array( "id" => "8439",
             "name",
             "shortDesc"),
  array( "id" => "8465",
             "name",
             "shortDesc"),
  array( "id" => "8326",
             "name",
             "shortDesc"),
  array( "id" => "8351",
             "name",
             "shortDesc"),
  array( "id" => "8359",
             "name",
             "shortDesc")
);

//echo 'shortDescs = ' . $shortDescs . '<br />';

//echo 'array[0]["id"] = '.$array[0]["id"].'<br />';

foreach($array as $item) {
  foreach($item["slots"][0]["runes"] as $rune) {
      //echo '$rune["id"] = ' . $rune["id"] . '<br />';
    foreach($keystones as  $key => $keystone) {
      
      //echo '$keystone["id"] = ' . $keystone["id"] . '<br />';
      
      if ($keystone["id"] == $rune["id"]) {
        $keystones[$key]["name"] = $rune["name"];
        $keystones[$key]["shortDesc"] = $rune["shortDesc"];
        //echo 'keystones[$key][$rune["' . $rune["id"] . '"]]["name"] = ' . $keystones[$key]["name"] . '<br />';
        //echo 'keystones[$key][$rune["' . $rune["id"] . '"]]["shortDesc"] = ' . $keystones[$key]["shortDesc"] . '<br />';
      }
    }
  }
}
?>







<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
    <!-- Optional CSS -->
    <link rel="stylesheet" href="stylesheets/styles.php" media="screen">
    <title>LoL Keystones Desc Img</title>
  </head>
  <body>
    <div class="title">
      <h6 class="lead text-center text-light">LoL Keystones Desc Img</h6>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <?php
          foreach($keystones as  $key => $keystone) {
        ?>
        <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $key; ?>" class="<?php if($key == 0) { echo " active";} ?>">
          <img class="IndicatorImage" src="img/runes/perk/<?php echo $keystone["id"]; ?>.png" alt="Indicator 001">
        </li>
        <?php
          }
        ?>
      </ol>
      <div class="carousel-inner">
        <?php
          foreach($keystones as  $key => $keystone) {
        ?>
        <div class="carousel-item<?php if($key == 0) { echo " active";} ?>">
          <img class="d-block w-100" src="img/<?php echo $keystone["id"]; ?>.gif" alt="<?php echo $keystone["name"] ?>">
          <div class="carousel-caption">
            <h3><?php echo $keystone["name"] ?></h3>
            <p><?php echo $keystone["shortDesc"] ?></p>
          </div>
        </div>
        <?php
          }
        ?>
      
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    
    
<div class="container">
  <div class="text-right mt-1">
    <a href="https://twitter.com/ulg_" class="btn btn-outline-info btn-sm" target="_blank">Twitter @ulg_</a> <a href="https://github.com/ulgg/LoLKeystonesDescImg" class="btn btn-outline-info btn-sm" target="_blank">GitHub ulgg</a>
  </div>
</div>

    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
  </body>
</html>
