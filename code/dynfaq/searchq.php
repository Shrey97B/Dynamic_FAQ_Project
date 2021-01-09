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
if(isset($_REQUEST['sendquer'])){
  $usern = $_REQUEST['unametb'];
  $mailn = $_REQUEST['mailtb'];
  $quern = $_REQUEST['querylab'];
  $arsiz = $_REQUEST['arrlen'];
  $qu1 = "select * from sim_que where Ques_text='$quern';";
  $res1=mysqli_query($conn,$qu1);
  $chk1=$res1->num_rows;
  if($chk1>=1)
  { 
    ?>
    <script type="text/javascript">
    alert('Question is already present'); 
    
    </script>
    <?php
  }
  else{
    $qu2= "select * from user_quer where email='$mailn' AND query='$quern';";
    $res2 = mysqli_query($conn,$qu2);
    $chk2=$res2->num_rows;
    if($chk2>=1)
    { 
      ?>
      <script type="text/javascript">
      alert('You have already asked this question'); 
      </script>
      <?php
    }
    else{
      $qu3 = "insert into user_quer(email, query, uname) values('$mailn','$quern','$usern');";
      $res3= $conn->query($qu3);
      $qu4 = "select quer_id from user_quer where query='$quern' AND email='$mailn';";
      $res4 = $conn->query($qu4);
      if($res4->num_rows>0){
        while($row4 = $res4->fetch_assoc()){
          $uqid = $row4['quer_id'];
        }
        for($i = 0; $i <= $arsiz; $i++){
          $obo = $_REQUEST['arr' . $i];
          $obt = $_REQUEST['sim' . $i];
          $qu5 = "insert into qsim_res values('$uqid','$obo','$obt');";
          $res5 = $conn->query($qu5);
        }        
      }
    ?>

    <script type="text/javascript">
    alert("Your query has been sent to helpdesk");

    </script>
    
     <?php
   }
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
     #searchtb{
         margin-top: 100px;
         margin-left: 20%;
         width: 40%;
         height: 70px;  
         font-size: 1.2em;
         padding: 20px;
     }

     #searchb{
     	margin-left: 8px;
     	 
         height: 70px;  
         font-size: 1.2em;
     }

     #results{

      margin-top: 40px;
      margin-left: 10%;
         width: 70%;
         font-size: 1.2em;
         border: 2px solid black;
         background-color: white;
     }

     #results th{
       border: 2px solid black;
       padding: 5px;
       background-color: grey;
     }

     #results td{
      border: 2px solid black;
      padding: 5px;
     }

     #askh{
         background-color: #FFF;
         padding: 15px;
         width: 50%;
         box-shadow: -2px -2px 100px 4px black;
     }

     #askh h2{
      font-size: 1.2em;
     }
    </style>
   <script>

    
    var len=-1,i;
    var ques_num=0;
    var arob=[];
    var lim=-1;

  function func3(){


      arob.sort(function(a,b){return(b.simila - a.simila)});

      for(i=0; (i<=5 && i<=len) || arob[i].simila>=0.5 ;i++){
        lim++;
        document.getElementById("results").innerHTML+="<tr><td>" + arob[i].quest_name + "</td><td>" + arob[i].simila + "</td><td><button value=" + i + " onclick=func5(this.value)>Click for details</button></td></tr>";
        
      }

      document.getElementById("usform").innerHTML+= "<input type='hidden' name='arrlen' value=" + lim + "></input>";


      for(i=0;i<=lim;i++){
        document.getElementById("usform").innerHTML+= "<input type='hidden' name='arr" + i + "' value='" + arob[i].quest_name + "'></input>";
        document.getElementById("usform").innerHTML+= "<input type='hidden' name='sim" + i + "' value=" + arob[i].simila + "></input>";
      }
      
      

  }
  function func5(cid){
    window.open("quedet.php?quetag=" + arob[cid].quest_name,"_blank");
  }   

  function func2(str1,str2){ 
   var xhttp = new XMLHttpRequest();
    xhttp.open("POST", "https://api.dandelion.eu/datatxt/sim/v1/?text1=" + str1 + "&text2=" + str2 + "&token=<Dandelion token>", true);
    xhttp.send();
    var a = 0.0;
    xhttp.onreadystatechange = function() { 
      if (xhttp.readyState == 4 && xhttp.status == 200){
        a=JSON.parse(xhttp.responseText).similarity;
        len=len+1;
        
        var obj = { quest_name: str2, simila: a};
        arob[len] = obj;
        
        if(len == (ques_num-1)){
          func3();
        }
    }
   }

}

  function func1(){
    len = -1;
    document.getElementById("results").innerHTML="<tr><th >Question text</th><th colspan=2>Similarity</th></tr>";
    var x1 = document.getElementById('searchtb').value;
    document.getElementById("helpq").innerHTML= "<div id='askh'><h2>If you are not satisfied with our results, you may send the question to helpdesk.<br> Our helpdesk will try to respond as soon as possible</h2><form action='' method='POST' id='usform'><br><label for='unametb'>Enter your name:&nbsp;&nbsp;</label><input type='text' name='unametb'></input><br><br><label for='mailtb'>Enter your email:&nbsp;&nbsp;</label><input type='email' name='mailtb'></input><br><br><label>Your query: &nbsp;&nbsp;</label><input type='text' name='querylab' value='" + x1 + "' style='width: 400px;'></input><br><br><input type='submit' name='sendquer' value='Send the query'></input></input></form></div>";

<?php    
  include('conn.php');
  $quer4 = "SELECT count(distinct(Ques_text)) AS 'nums' FROM sim_que;";
  $ret3 = mysqli_query($conn,$quer4);
  while($row4 = mysqli_fetch_assoc($ret3)){
    echo "ques_num = " . $row4['nums'] . ";";
  }

  $quer3 = "SELECT distinct(Ques_text) FROM sim_que;";
  
  $ret2=mysqli_query($conn,$quer3);
  while($row = mysqli_fetch_assoc($ret2)){
    $str = $row['Ques_text'];
    echo "var x = '" . $str . "';";
    echo "console.log('Executing inside php');";
    echo "window.func2(x1,x);";
  }
  mysqli_close($conn);
  ?> 
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
      <li><a href="catpage.php">Category-wise</a></li>
      <li class="active"><a href="#">Search question</a></li>
      <li><a href="login.php">Helpdesk Login</a></li>
    </ul>
  </div>
</div>


<input type="text" name="tb" id="searchtb" placeholder="Enter the question here..."></input>
 <input type="button" id="searchb" onclick="func1()" value="Search"></input>


<table id="results" frame="border">
        
        </table>
        <br>
        <br>

 <center><div id="helpq">
    
   </div></center>
   <br><br><br>
</body>
</html>