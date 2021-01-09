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


      #navc{
         background-color: rgb(85, 91, 97);

         
      }

        .navbar-inverse .navbar-nav > li{
      border-bottom: 4px solid red;
      border-right: 3px solid black;
    }

       .navbar-inverse .navbar-nav > li:first-child{
    
      border-left: 3px solid black;
    }

    .navbar-inverse .navbar-nav > .active{
      
      border-bottom: 4px solid rgb(169,192,86);
    }



     .navbar-inverse .navbar-nav > li > a
 {
  font-weight: bold;
  white-space: nowrap;
}

    .navbar-inverse .navbar-nav > li > a:hover{
      background-color: rgb(46, 46, 46);
    }

    #dashitems{
      text-align: left;
      margin-top: 70px;
      background-color: #FFF;
      padding: 12px;
      width: 70%;
    }

    #dashitems li{
      list-style-type: none;
      padding: 8px;
      font-size: 1.2em;
      font-weight: bold;
      border-bottom: 1px solid rgb(186, 182, 182);

    }

    #dashitems li a:hover{
         background-color: #A9C056;
         color: black;
         text-decoration: none;
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

      <div class="navbar navbar-inverse" id="navc">
  <div class="container-fluid" >
    <ul class="nav navbar-nav">
  
      <li><a href="homepag.php" target="_blank">FAQS</a></li>
      <li><a href="catpage.php" target="_blank">Category-wise</a></li>
      <li><a href="searchq.php" target="_blank">Search question</a></li>
      <li><a href="login.php" target="_blank">Helpdesk Login</a></li>
      
    </ul>
  </div>
</div>

<center>
   <div id="dashitems">
   <h2 style="text-align: center;">HELPDESK MENU</h2>
   <ul>
      <li><a href="vuseq.php" target="_blank">View User Queries</a></li>
      <li><a href="add_category.php" target="_blank">Add new Category</a></li>
      <li><a href="add_new_ques_new_qid.php" target="_blank">Add question with new Qid</a></li>
      <li><a href="add_question_oldqid.php" target="_blank">Add question with old qid</a></li>
      <li><a href="logout.php">Logout</a></li>
   </ul>
   </div>
</center>
</body>
</html>