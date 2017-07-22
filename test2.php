
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Alan's weather micro service</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
    <body>
    <div class="container">
        <?php
        include("api.php");

        //print_r($data);
        //echo $_GET["date"];
        $response = api_service($_GET["city"],$_GET["date"]);
        if($response['data']["error"]){
            echo "<h1>".$response['data']["error"][0]["msg"]."</h1>";
        }
        echo '<table class="table table-striped">';

        for ($i=0; $i < 9; $i++) {
            echo "<tr>";
            foreach ($response['data']['weather'] as $weather) {
                echo "<td>";
                switch ($i) {
                    case 0:
                        echo date('Y / M / D', strtotime($weather['date']));
                        echo "<br>";
                        echo "City:  ".$response['data']["request"][0]["query"];
                        //var_dump($response['data']["request"][0]['query']);
                        echo "<br>";
                        echo $weather['maxtempC']." &#8451"."  -  ".$weather["mintempC"]." &#8451";
                        break;
                    default:
                        $src = $weather['hourly'][$i-1];
                        $imgSrc = $src['weatherIconUrl'][0]['value'];
                        echo "<img src='$imgSrc' />";
                        echo "   ".time_change($src['time'])."   ". $src["tempC"]." &#8451";
                        break;
                }
                echo "</td>";
            }
            echo "</tr>";
        }

        echo '</table>';
        ?>
    </div>
    </body>
</html>
