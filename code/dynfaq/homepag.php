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
  
      <li class="active"><a href="#">FAQS</a></li>
      <li><a href="catpage.php">Category-wise</a></li>
      <li><a href="searchq.php">Search question</a></li>
      <li><a href="login.php">Helpdesk Login</a></li>
    </ul>
  </div>
</div>





<div class="container-fluid" id="quesc">
  <div class="panel-group">
<?php
   include('conn.php');
   $quer="SELECT sq1.Qid AS 'ids', Ques_text, Cname, Answer FROM category INNER JOIN (SELECT sim_que.Qid, Ques_text, Cid, Answer, question.Frequency AS 'freq' FROM sim_que INNER JOIN question ON sim_que.Qid = question.Qid WHERE sim_que.Qid IN (SELECT * FROM (SELECT Qid FROM question ORDER BY FREQUENCY DESC LIMIT 8) temp_tab) AND (sim_que.Qid, sim_que.Frequency) IN (SELECT Qid, MAX(Frequency) FROM sim_que GROUP BY Qid)) sq1 ON sq1.Cid = category.Cid ORDER BY sq1.freq DESC;";
   $x=1;
   $res= mysqli_query($conn,$quer);
   	while ($row = mysqli_fetch_assoc($res))
   	{
   		$str = $row['Ques_text'];
   		$cate = $row['Cname'];
   		$qids = $row['ids'];
      $ans = $row['Answer'];
      $flag = 1;
       for( $i = 0; $i < $x - 1; $i++){
        if( $qids == $arr[$i]){
          $flag = 0;
          break;
        }
       }

       if( $flag == 1){
         $arr[$x - 1] = $qids;

         echo "<script>";
         echo "len=len+1;";
         echo "ques[len]='" . $str . "';";
         echo "</script>";
         echo "<div class='qdiv'><div class='panel panel-default'><p><h3><b>" . $x . ".  " . $str . "&nbsp;&nbsp;</b><button style='height: 25px; font-size: 20px; float:right;' value=" . ($x - 1) . " onclick=func1(this.value)>Click for details</button><a class='noun' data-toggle='collapse' href='#" . $qids . "'  style='float: right;';><i class='fa fa-angle-down' aria-hidden='true' style='vertical-align: center;'></i>&nbsp;&nbsp;</a></h3><h4><b>Category: " . $cate . "</b></h4></p><div id='" . $qids . "' class='panel-collapse collapse'><div class='panel-body'><h5>" . $ans . "</h5></div></div></div></div>";  		
         $x=$x+1;
        }
   	}
      
    mysqli_close($conn);
    ?>
   </div>
   </div>
</body>
</html>