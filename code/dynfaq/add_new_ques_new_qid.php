
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
if(isset($_REQUEST['submit']))
{

  $un1=$_REQUEST['r1'];
  $un2=$_REQUEST['r2'];
  $un3=$_REQUEST['r3'];
  $un4=$_REQUEST['r4'];
  $lgn="select * from question where Qid='$un1';";
 
   //$lgn1="select * from que where Ques_text!='$un3'";
  $res1 = $conn->query($lgn);
  $chk = $res1->num_rows;

  $lgn2="select * from category where Cid='$un2';";
  $res2 = $conn->query($lgn2);
  $chk2= $res2->num_rows;


  if($chk==0 && $chk2==1)
  {// $_SESSION['user']=$unm;
    $date = date('Y-m-d');
    $sq="insert into question(Qid,Cid,Answer,Creation_date,frequency) values ('$un1','$un2','$un4','$date',0)";
    $sq1="insert into sim_que(Qid,Ques_text,frequency) values ('$un1','$un3',0)";
    $res3=$conn->query($sq);
    $res4=$conn->query($sq1);
    ?>
    <script type="text/javascript">
    alert('Inserted Sucessfully ');  
    </script>
    <?php
    
    
  }
  else
  {?>
  <script type="text/javascript">
    alert('Same Qid present or Different category entered ');  
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


    a.noun:link{
         text-decoration: none;
         color: black;
         font-size: 1.8em;

    }

    a.noun:hover{
         text-decoration: none;
         color: blue;
         font-size: 1.8em;
         

    }

    .panel.panel-default{
      background-color: rgb(109, 237, 226);
      
      padding: 0px 10px;
      width: 88%;
      margin-left: 7%;
    background: #ffffff;
    margin-bottom: 6px;
    box-shadow: 0 1px 2px rgba(0, 0, 0, 0.08);
    -webkit-transition: box-shadow 0.2s;
    -moz-transition: box-shadow 0.2s;
    transition: box-shadow 0.2s;

    }

    .panel.panel-default h3{
      color: #5686df;
      font-size: 1.3em;
    
    }

    .panel.panel-default h4{
      color: black;
      font-size: 1em;
    
    }

    .panel-body h5{

  font-size: 1.2em;
  line-height: 1.4;
  color: #6c7d8e;


    }


  </style>
  <title>LOGIN PAGE
  </title>
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
   <br>
   <br>
  <form action="" method="POST">
  <form action="" method="post"  name="feedback">   
    <table  align="center" border="5"  cellpadding="15px" cellpadding="15px">
      <tr>
        <td >Enter the  Question id </td>
        <td><input type="text" name="r1" required></td>
      </tr>
      <tr>
        <td>Enter the Category id</td>
        <td><input type="text" name="r2" required></td>
        </tr>
         <tr>
        <td>Enter the Question</td>
        <td><textarea name="r3" required rows="5" cols="50"></textarea></td>
        </tr>
         <tr>
        <td>Enter the Answer</td>
        <td><textarea name="r4" required rows="5" cols="50"></textarea></td>
        </tr>
<tr>
      <td colspan="2"> <center><input type="submit" name="submit" value="submit"></center></td>
      </tr>
    </table>
    
  
  </form>

</body>
</html>