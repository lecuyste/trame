<?php

$fichier = file_get_contents('./cars.json');

$json = json_decode($fichier, true);

//echo "<pre>";
//var_dump($json);
//echo "</pre>";

$entete = array_keys($json[0]);
//var_dump($entete);
?>
<style type="text/css" media="screen">
    body {
        background-color: #FFF;
        color: #000;
        font-size: 16px;
    }

    table {
        border: 1px #000 solid;
    }

    td, th {
        border: 1px #000 dotted;
        padding: 5px 10px;
    }

    thead td {
        background-color: #000000;
        color: #FFF;
        font-weight: bold;
    }
</style>
<table>
    <caption>Cars List Table</caption>
    <thead>
    <?php
    foreach ($entete as $entetes)
            echo "<th>" . $entetes . "</th>";
    ?>
    <!--<th>Name</th>-->
    <!--<th>Miles per Gallon</th>-->
    <!--<th>Cylinders</th>-->
    <!--<th>Displacement</th>-->
    <!--<th>Horsepower</th>-->
    <!--<th>Weight in lb</th>-->
    <!--<th>Acceleration</th>-->
    <!--<th>Year</th>-->
    <!--<th>Origin</th>-->
    </thead>
    <tbody>
    <?php
    foreach ($json as $cars) {
        echo "<tr>";
        foreach ($cars as $carac)
            echo "<td>" . $carac . "</td>";
        echo "</tr>";
    }
    ?>
    </tbody>
</table>
<?php

