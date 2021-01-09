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
  if(isset($_GET["quetag"])){
  	$hello = $_GET["quetag"];
  	
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
      font-size: 1em;
      font-weight: bold;
    }

    #mydiv h4{
    	 font-size: 1.2em;
  line-height: 1.4;
  color: #6c7d8e;

    }
    #mydiv h6{
    	color: black;
      font-size: 1.1em;
      font-weight: bold;
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
      include('conn.php');
      $quer1 = "UPDATE sim_que set frequency=frequency + 1 WHERE Ques_text='" . $hello . "';";
      mysqli_query($conn,$quer1);
      echo "<h3>$hello</h3><br><br><br>";
      ?>

      <?php
      $cats = "Category: ";
      $answ = "Answer: <br>";
      $relque = "Questions asked in similar sense: <br><br>";
      $quer2 = "SELECT Qid from sim_que WHERE Ques_text='" . $hello . "';";
      $ret2 = mysqli_query($conn,$quer2);

      while($row2 = mysqli_fetch_assoc($ret2)){
      	   $quer3 = "UPDATE question set frequency=frequency+1 WHERE Qid='" . $row2['Qid'] . "';";
      	   mysqli_query($conn,$quer3);
      	   $quer4 = "SELECT Answer from question WHERE Qid='" . $row2['Qid'] . "';";
      	   $ret4 = mysqli_query($conn,$quer4);
      	   while($row4 = mysqli_fetch_assoc($ret4)){
      	   	$answ = $answ . $row4['Answer'] . "<br>";
      	   }

      	   $quer5 = "SELECT Cname from category WHERE Cid=(SELECT Cid FROM question WHERE Qid='" . $row2['Qid'] . "');";
      	   $ret5 = mysqli_query($conn,$quer5);
      	   while( $row5 = mysqli_fetch_assoc($ret5)){
      	   	 $cats = $cats . " " . $row5['Cname'] . ", ";
      	   }

           $quer6 = "SELECT Ques_text from sim_que WHERE Qid='" . $row2['Qid'] . "';";
           $ret6 = mysqli_query($conn,$quer6);
           while($row6 = mysqli_fetch_assoc($ret6)){
           	    $relque = $relque . $row6['Ques_text'] . "<br><br>";
           }

      }

      rtrim($cats,',');
      echo "<h5>$cats</h5><br>";
      echo "<h4>$answ</h4><br><br>";
      echo "<h6>$relque</h6>";
      mysqli_close($conn);
   ?>
   </div></center> 
</body>
</html>