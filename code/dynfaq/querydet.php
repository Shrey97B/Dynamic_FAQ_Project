<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon2.png">
    <link rel="stylesheet" type="text/css" href="http://fortawesome.github.io/Font-Awesome/assets/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" type="text/css" href="assets/fawe/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="assets/fawe/css/css/font-awesome.css">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <?php

include('conn.php');
   session_start();
   if(!(isset($_SESSION['logd']) && $_SESSION['logd'] == true)){
       
         ?>
         <script>
            window.location.href="invlog.html";
         </script>
         <?php
        
   }

   if(isset($_GET['queryid'])){
     
    $id = $_GET['queryid'];
   } 


?>
   <title>University - FAQ</title>
    

   <style>

    body{
      background-color: rgb(219, 219, 219);
    }

    #headc{
      position: relative;
  height: 200px;
  line-height: 200px;
  text-align: center;
  background-color: #a9c056;
  
    }

     #mydiv{
      margin-top: 25px;
      background-color: #FFF;
      width: 80%;
      text-align: left;
      padding: 15px;
    }

    #mydiv h3{
      color: #5686df;
      font-size: 1.3em;
      font-weight: bold;
    }

    #mydiv h5{
       color: black;
      font-size: 1.1em;
      font-weight: bold;
    }

    #mydiv h4{
       font-size: 1.2em;
  line-height: 1.4;
  color: #6c7d8e;

    }
    #mydiv h6{
      color: black;
      font-size: 1.4em;
      font-weight: bold;
    }

    #mydiv table{
      border: 2px solid black;
      border-spacing: 20px;
      padding: 12px;
    }
    
    #mydiv th{
      border: 2px solid black;
      padding: 10px;
      font-size: 1.3em;
      text-align: center;
    }

    #mydiv td{
      border: 2px solid black;
      border-collapse: separate;
      padding: 10px;
    }

    #mydiv tr:nth-child(odd){
      background-color: rgb(239, 242, 104);
    }

   #mydiv tr:nth-child(even){
      background-color: orange;
    }

    #mydiv tr:first-child{
        background-color: rgb(237, 227, 42);
    }

    </style>
   
</head>
  
<body>

<div class=container-fluid id="headc">
   <div class="row" style="display: flex; align-items: center;">
   <div class="col-md-3">
       <img src="assets/img/uni_logo.jpg" style="display: block; width: 85%; height: 80%; margin-left: auto;">
     </div>
   <div class="col-md-9">
      <p style="font-size: 4em; font-family:  century,Arial,sans-serif; font-style: italic; text-align: left;">XYZ University Help Centre</p>
   </div>
   </div>
   </div>
<center><div id="mydiv">
<?php
   
   echo "<h3><p>Query Id: " . $id . "</p></h3>";


   $qu1 = "SELECT * from user_quer where quer_id=" . $id . ";";
   $res1 = $conn->query($qu1);

   while($row1 = $res1->fetch_assoc()){
              $usern = $row1['uname'];
              $mailn = $row1['Email'];
              $qname = $row1['Query'];
   }

   echo "<h3>Query: " . $qname . "<a href='delete.php?idq=" . $id . "' style='float:right;'><button>Remove this query</button></a></h3>"; 
   echo "<h4>User Name: " . $usern . "</h4>";
   echo "<h4>Email: " . $mailn . "</h4><br>";

?>
   
   <center><h6>Similarity Result</h6>
   <table><tr><th>Question</th><th>Similarity</th></tr>
   <?php

   $qu2 = "SELECT * from qsim_res where quer_id=" . $id . " order by similarity desc;";
   $res2 = $conn->query($qu2);

   while($row2 = $res2->fetch_assoc()){
      echo "<tr><td>" . $row2['Ques_text'] . "</td><td>" . $row2['similarity'] . "</td></tr>";
   }
   ?>
   </table></center>
</div></center>
<br>
</body>


</html>