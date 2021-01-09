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

   $_SESSION['logd'] = false;

   header("refresh:1; url=login.php");

   ?>