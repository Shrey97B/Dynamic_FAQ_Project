
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

    .usqs{
    	background-color: white;
    	width: 80%;
    	margin: 20px;
    	padding: 20px;
    	font-size: 1.2em;
    	text-align: left;
    	font-weight: bold;
    	color: blue;
    }



    h1{
    	font-style: italic;
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
       <h1>USER QUERIES</h1>
       <?php
               $qu1 = "SELECT * from user_quer ORDER BY quer_id;";
               $res1 = $conn->query($qu1);
               if($res1->num_rows == 0){
               	  echo "<div class='usqs'>No user queries left</div>";
               }
               while($row1 = $res1->fetch_assoc()){
               	   echo "<div class='usqs'>Qid" . $row1['Quer_id'] . ". <a href='querydet.php?queryid=" . $row1['Quer_id'] . "'>" .$row1['Query'] . "</a><br></div>"; 
               }
       ?>
   </center>
</body>
</html>