
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

   if(isset($_REQUEST['submit'])){
   	$s1 = $_REQUEST['quid'];
   	$s2 = $_REQUEST['quest'];

   	$lg1 = "SELECT * FROM question WHERE Qid='$s1'";
    $rs1 = $conn->query($lg1);
    $ch1 = $rs1->num_rows;

    $lg2 = "SELECT * FROM sim_que WHERE Qid='$s1' AND Ques_text='$s2';";
    $rs2 = $conn->query($lg2);
    $ch2 = $rs2->num_rows;

    if($ch1>=1 && $ch2==0){
    	$lg3 = "INSERT into sim_que values('$s1','$s2',0);";
    	$conn->query($lg3);
    	    	?>
  <script type="text/javascript">
    alert("This question has been inserted successfully");  
    //window.location="show.php";
    </script>
    <?php
    }
    else{
    	?>
  <script type="text/javascript">
    alert("This Qid doesn't exist or combination already exists");  
    //window.location="show.php";
    </script>
    <?php
    }

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
      text-align: left;
      margin-top: 70px;
      background-color: #FFF;
      padding: 12px;
      padding-left: 20%;
      width: 70%;
    }

    .questfield * {
    	vertical-align: top;
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

   <center>
   <div id="mydiv">
   <h2>ADD QUESTION TO OLD QID</h2><br>
   <br>
   
   <form id="quform">
   	  <label for="quid">Enter the Question-ID:</label>&nbsp;&nbsp;&nbsp;<input type="text" name="quid">
   	  <br>
   	  <br>
   	  <p class="questfield"><label for="quest">Enter the Question:</label>&nbsp;&nbsp;&nbsp;<textarea name="quest" id="quetid" rows="6" cols="35"></textarea></p>
   	    <br>
 
   	  <input type="submit" name="submit" value="ADD" style="margin-left: 130px;"></input><br><br>
   </form>
   
   </div>
</center>
</body>
</html>