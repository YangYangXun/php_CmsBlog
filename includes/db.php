<?php

// $db_user = 

// $array['aa'] = "A";
// $array['bb'] = "B";
// $array['cc'] = "C";
// $array['dd'] = "D";
// $array['ee'] = "E";
// foreach ($array as $key => $value) {
//     echo $key . "->>>" .$value."<br>";
// }


// $db['db_host'] = "localhost";
// $db['db_user'] = "root";
// $db['db_pass'] = "";
// $db['db_name'] = "cms";


// foreach ($db as $key => $value) {
//    define(strtoupper($key), $value);
// }   


$connection = mysqli_connect("localhost","root","","cms");

if($connection){
    echo "We are Connect!";
}




?>