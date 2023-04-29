<?php
echo "Welcome to Multidimensional array PHP<br>";

$mutidim = array(
    array(2, 5, 7, 8),
    array(1, 2, 3, 1),
    array(4, 5, 0, 1)
);

//echo var_dump($mutidim);
//echo $mutidim[0][0];

// for ($i = 0; $i < count($mutidim); $i++) {
//     echo var_dump($mutidim[$i]);
//     echo "<br>";



// for ($i = 0; $i < count($mutidim); $i++) {
//     for ($j = 0; $j < count($mutidim[$i]); $j++) {
//         echo $mutidim[$i][$j];
//         echo " ";



//     }
//     echo "<br>";
// }

//3D array

$Stdent = array(//$stdent[0]
    array(                  
        array(1, 2, 3, 4),
        array(2, 3, 4, 5),
        array(3, 4, 5, 6)

    ),
    array(
        array('a', 'b', 'c', 'd'),
        array('x', 'y', 'z', 'w'),
    ),
    array(
        array('g', 'h', 'i', 'j'),
        array('A', 'B', 'C', 'D'),
    )



);

for ($i = 0; $i < count($Stdent); $i++) {

    for ($j = 0; $j < count($Stdent[$i]); $j++) {

        for ($k = 0; $j < count($Stdent[$i][$j]); $j++) {
            echo $Stdent[$i][$i][$j][$k];
        }
        echo "<br>";

    }

}





?>