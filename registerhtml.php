<?php
session_start();
if(isset($_SESSION['login_user'])){
	header("location: newprofile.php");
}

?>


<head>
      <title>Register Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Register</b></div>
				
            <div style = "margin:30px">
               

		<form action = "newregister.php" method = "post">
                  <label>Username :</label><input type = "text" name = "user_name" class = "box"/><br /><br />
                  <label>Password :</label><input type = "password" name = "pass_word" class = "box" /><br/><br />
		  <label>First Name :</label><input type = "text" name = "first_name" class = "box"/><br /><br />
		  <label>Last Name :</label><input type = "text" name = "last_name" class = "box"/><br /><br />
		  <label>Year :</label><input type = "text" name = "year" class = "box"/><br /><br />
                  <label>Batch :</label><input type = "text" name = "batch" class = "box"/><br /><br />	
                  <input type = "submit" value = " Submit "/><br />
               </form>

               <div style = "font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
					
            </div>
				
         </div>
			
      </div>

   </body>
