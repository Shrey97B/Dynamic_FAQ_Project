<?php

include('conn.php');
 $idqu = $_GET['idq'];


 $qu7 = "DELETE FROM qsim_res WHERE quer_id=" . $idqu . ";";
 $conn->query($qu7);

 $qu8 = "DELETE FROM user_quer WHERE quer_id=" . $idqu . ";";
 $conn->query($qu8);

 header("refresh:1; url=vuseq.php");


?>