<?php

$fichier = file_get_contents('./cars.json');

$json = json_decode($fichier, true);

//echo "<pre>";
//var_dump($json);
//echo "</pre>";

$entete = array_keys($json[0]);
//var_dump($entete);

$ordered = 'Name';
$michel = 'croissant';

if (!empty($_GET['ordered']) && !empty($_GET['michel'])) {
    $ordered = $_GET['ordered'];
    $michel = $_GET['michel'];
}
//function smp($a, $b, $var){
//    return(strcmp($a[$var], $b[$var]));
//}
//usort($json, 'smp', $ordered);

usort($json, function ($a, $b) use ($ordered, $michel) {
    if ($michel == 'croissant') {
        if ($a[$ordered] < $b[$ordered]) {
            return -1;
        } else if ($a[$ordered] > $b[$ordered]) {
            return 1;
        } else {
            return 0;
        }
    } else {
        if ($a[$ordered] < $b[$ordered]) {
            return 1;
        } else if ($a[$ordered] > $b[$ordered]) {
            return -1;
        } else {
            return 0;
        }
    }

    // return(strcmp($a[$ordered], $b[$ordered]));
})
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
    <form action="" method="get">
        <select name="ordered">
            <option value="Name">Name</option>
            <option value="Cylinders">Cylinders</option>
            <option value="Displacement">Displacement</option>
            <option value="Horsepower">Horsepower</option>
        </select>
        <select name="michel">
            <option value="croissant">Ordre croissant</option>
            <option value="decroissant">Ordre décroissant</option>
        </select>

        <input type="submit" name="submitted" value="GO">
    </form>

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

