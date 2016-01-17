<!--In Progress Login to account-->
<!--team 2, 11/23/15-->
<?php
	
	include_once "common/dataAccessPoint.php";
    include_once "common/header.php";
?>
      <?php
         if(isset($_POST['login']))
         {
		
	     try {
		    



           } catch (PDOException $pe) {
	     die("Error occcured on insert: Please Retry");
        }
         ?> <h2 class = "message good">Data has been entered successfully!</h2> <?php
         }
         else
         {
            ?>
               <form method="post" action="login.php">
                  <table width="400" border="0" cellspacing="1" cellpadding="2">
                     <tr>
                        <td width="100">Username</td>
                        <td><input name="username" type="text" id="username"></td>
                     </tr>
                  
                     <tr>
                        <td width="100">Password</td>
                        <td><input name="password" type="text" id="password"></td>
                     </tr>
                  </table>
                  <br>
               <input name="login" type="submit" class = "button" id="login" value="Login">
               </form>
            <?php
         }
      ?>
	<br>
	<br>
	<a href="signup.php" class="button">Sign-up</a>
	<a href="pass_recovery.php" class="button">Forget Password</a>
<?php
	include_once "common/close.php";
?>
