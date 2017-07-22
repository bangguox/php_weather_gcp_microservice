<?php
/**
 * Created by PhpStorm.
 * User: Alan Xie
 * Date: 7/21/2017
 * Time: 10:47 AM
 */
?>
<?php
function api_service($city,$date){

    $APIKey = "1bd6891af6ea426081534048172107"; //Assign the API key

    $url="http://api.worldweatheronline.com/premium/v1/past-weather.ashx?key=".$APIKey."&q=".$city."&format=json"
        ."&date=".$date;
    //echo $url;
    $json=file_get_contents($url);

    $response=json_decode($json,true);
    return $response;
}
function time_change($time){
    $time2 = intval($time);
    $time2 = $time2/100;
    if($time2 <12){
        $ans = $time2." AM";
    }
    else{
        $ans = ($time2%12)." PM";
    }
    return $ans;

}

?>
