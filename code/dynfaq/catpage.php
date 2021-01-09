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
     background-attachment: fixed;
  
    }


    #navc{
      background-color: rgb(85, 91, 97);

      
    }


    #catchooser{
      position:fixed;
      right: 50px;
      top: 50px;
     
    }

    #catchooser button{
       font-size: 1.5em;
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

    #catwiseq{
      margin-left: 30px;
    }

    .catt{
      margin: 0px;
      margin-bottom: 8px;
      border: none;
      padding: 0px;
      margin-left: 3%;
    }

    .catt h2{
      color: rgb(77, 80, 84);
      vertical-align: baseline;
      font-size: 1em;
      font-weight: 700;
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
      width: 95%;
      margin-left: 3%;
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



    .panel-body h5{

  font-size: 1.2em;
  line-height: 1.4;
  color: #6c7d8e;


    }
    </style>
     <script>
    var len=-1;
    var ques=[];

    function func1(cid){
        window.open("quedet.php?quetag=" + ques[cid],"_blank");
    }
  </script>
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
  
      <li><a href="homepag.php">FAQS</a></li>
      <li class="active"><a href="#">Category-wise</a></li>
      <li><a href="searchq.php">Search question</a></li>
      <li><a href="login.php">Helpdesk Login</a></li>
    </ul>
  </div>
</div>



  

  <div class="dropdown" id="catchooser">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Categories
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <?php
    $itr=0;
    include('conn.php');
    $i=0;
    $quer1 = "SELECT Cid, Cname from category";
    $ret1=mysqli_query($conn,$quer1);
    while($row1 = mysqli_fetch_assoc($ret1)){
      $cat = $row1['Cname'];
      $x[$i] = $row1['Cid'];
      $y[$i] = $cat;  
      echo "<li><a href='#" . $x[$i] . "'>" . $cat . "</a></li>";
      $i++;
    }     
    echo "</ul></div>";
    echo "<div id='catwiseq'>";
    for( $j = 0 ; $j < $i ; $j++){
      echo "<div class='catt'><h2 id='" . $x[$j] . "'> " . $y[$j] . "</h2></div>"; 
      $quer2 = "select question.Qid AS 'ids' , Ques_text, Answer FROM question INNER JOIN sim_que ON question.Qid=sim_que.Qid WHERE Cid='" . $x[$j] . "' AND (sim_que.Qid, sim_que.frequency) IN (SELECT * FROM (SELECT Qid, MAX(Frequency) FROM sim_que GROUP BY Qid) subq1);";
      $ret2=mysqli_query($conn,$quer2);
      while($row2 = mysqli_fetch_assoc($ret2)){
        $qid = $row2['ids'];
        $flag=1;
        for( $u = 0; $u < $itr ; $u++ ){
          if( $qid == $arr[$u]){
            $flag=0;
            break;
          }
        }
        if($flag==1){
          $arr[$itr]=$qid;
          echo "<script>";
          echo "len=len+1;";
          echo "ques[len]='" . $row2['Ques_text'] . "';";
          echo "</script>";
          echo "<div class='qdiv'><div class='panel panel-default'><p><h3><b>" . $row2['Ques_text'] . "&nbsp;&nbsp;</b><button style='height: 25px; font-size: 20px; float:right;' value=" . $itr . " onclick=func1(this.value)>Click for details</button><a class='noun' data-toggle='collapse' href='#que" . $qid . "'  style='float: right;';><i class='fa fa-angle-down' aria-hidden='true' style='vertical-align: center;'></i>&nbsp;&nbsp;</a></h3></p><div id='que" . $qid . "' class='panel-collapse collapse'><div class='panel-body'><h5>" . $row2['Answer'] . "</h5></div></div></div></div>"; 
          $itr++;
        }
      }
    }
    mysqli_close($conn);
    ?>

</div>

        

</body>
</html>