<!--In Progress: Login Page-->
<!--team 2, 11/23/15-->
<?php
	
	include_once "./loginAccessPoint.php";
  //  include_once "./header.php";
?>
      <?php
         if(isset($_POST['signup']))
         {	
	     try {
          $username = $_POST['username'];
          $password = $_POST['password'];       		    
          $email = $_POST['email'];

          echo "test1";
          $lao->signUp($username, $password, $password);
          echo "test";

           } catch (PDOException $pe) {
	     die($pe->getMessage());
        }
         ?> <h2 class = "message good">Account creation successful: Please verify your email to activate your account</h2> <?php
         }
         else
         {
            ?>
               <form method="post" action="signup.php">
                  <table width="400" border="0" cellspacing="1" cellpadding="2">
                     <tr>
                        <td width="100">Username</td>
                        <td><input name="username" type="text" id="username"></td>
                     </tr>
                  
                     <tr>
                        <td width="100">Password</td>
                        <td><input name="password" type="password" id="password"></td>
                     </tr>
                     <tr>
                        <td width="100">Email</td>
                        <td><input name="email" type="text" id="email"></td>
                     </tr>
                  </table>
                  <br>
               <input name="signup" type="submit" class = "button" id="signup" value="signup">
               </form>
            <?php
         }
      ?>
<?php
	include_once "./close.php";
?>
