<?php

$servername = "localhost:3306";
$user = "root";
$password = "root";
$db_name = "dbhotel";


$connection = new mysqli($servername, $user, "root", $db_name);

if( $connection && $connection->connect_error ) {
  echo 'error?' . $connection->connect_error;
  print_r( $connection );

  return;
} else {
  echo 'ok<BR><BR>';
}


$sql =
    "
    SELECT id, status , price
    FROM pagamenti
    WHERE price > '600'
    ";



$result = $connection->query($sql);

if( $result && $result->num_rows > 0 ) {

  echo '<ul>';

  while( $row = $result->fetch_assoc() ) {
    if($row['id'] == 7) {
      echo '<li style="font-weight: bold;">';
    } else {
      echo '<li>';
    }

    echo $row['id'] ." - " .$row['status'] ." - " .$row['price'];
    echo '</li>';
  }

  echo '</ul>';
} else {
  print_r($result);
}



$connection->close();

?>
