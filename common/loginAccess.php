<!-- In Progress:login access for users, allows them to signup, activate accounts, etc. -->
<?php
class loginAccess
{

private $_db;

public function loginAccess($db = null ){

    if(is_object($db)){
    $this->_db = $db;
    }
    else{
    $database_string = "mysql:host=".DB_HOST.";dbname=".DB_NAME;
    $this->_db = new PDO($database_string, DB_USER, DB_PASS);
    }
    }// end constructor 

    // inserts a user into the database 
    public function  insertUser($username, $password, $email, $hash, $id){
    $stmt = $this->_db->prepare("insert into user values(:username,:password,:email,:hash, 0, :id)");
    $stmt->bindParam(":username",$username);
    $stmt->bindParam(":password",$password);
    $stmt->bindParam(":hash",$hash);
    $stmt->bindParam(":email",$email);
    $stmt->bindParam(":id", $id);
    try {
        $stmt->execute();
    }catch(PDOException $pdo){
   //  $pdo->message = "error: failed to insert user";
     throw $pdo;
    }
    }

    // validates the username 
    public function validateUsername($username){

     $stmt = $this->_db->prepare("call validateUsername(:username, @id)");
     $stmt->bindParam(":username", $username);
     try{
     $stmt->execute();
     $id = $this->_db->query("select @id")->fetchAll();
     $id = $id[0];
     return $id[0];
     }catch(PDOException $pdo){
 //       $pdo->message = "error: failed to validateUsername";
        throw $pdo;
     }
    }

    // validates the email 
  public  function validateEmail($email){

    if(!preg_match("%^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$%i",$email)){
    $pdo = new PDOException();
  //  $pdo->message = "error: invalid email";
    throw $pdo;
    }
   }
   
   // generates the hash
   public function generateHash(){return md5(rand(0,1000));}
       
     
   
   // sends the veriication email 
   public function sendVerification($username, $password, $email, $hash){

  $path = "student.cs.appstate.edu/3430/154/team2/common";
  $to = $email;
  $subject = 'F.A.R.M Cafe: Account Verification';
  $message = "
            
  
  Thanks for signing up!
  Your account has been created, you can login with the following credentials


  ----------------------
  Username: $username 
  Password: $password
  ---------------------

  Please click this link to activate your account:
  http://$path/verify.php?email=$email&hash=$hash

 ";

 $headers = "From:noreply@student.cs.appstate.edu" . "\r\n";
 mail($to, $subject, $message, $headers); 
}

public function generateUserId(){
$stmt = $this->_db->prepare("call generateUserId(@id)");
$stmt->execute();
$id = $this->_db->query("select @id")->fetchAll();
$id =$id[0];
return $id[0];
}

public function signUp($username, $email, $password){

//$this->validateEmail($email);
echo "validated email";
$id = $this->validateUsername($username);
if ($id != null){
echo "error: username already exists";
header('Location: http://student.cs.appstate.edu/3430/154/team2/common/signup.php');
}
$hash = $this->generateHash();
$id = $this->generateUserId();
$this->insertUser($username,$password,$email,$hash, $id);
$this->sendVerification($username, $password, $email, $hash);
}    



//////////////////////////////////////////////////// verfication functions 

public function isActive($email, $hash){
     $stmt = $this->_db->prepare("call isActive(:email,:hash, @active)");
     $stmt->bindParam(":email", $email);
     $stmt->bindParam(":hash", $hash);
     try{
     $stmt->execute();
     $active = $stmt->query("select @active")->fetchAll();
     $active = $active[0];
     return $active[0];
     }catch(PDOException $pdo){
        $pdo->message = "error: failed to validate Account Status";
        throw $pdo;
     }    
}
 
public function activateAccount($email, $hash){

$stmt = $this->_db->prepare("update user set active = 1 where email like :email and hash like :hash and active = 0");
$stmt->bindParam(":email", $email);
$stmt->bindParam(":hash", $hash);
try {
    $stmt->execute();
}catch(PDOException $pdo){

$pdo->message = "error: failed to activate account";
throw $pdo;

}


 }






}// end class

?>       
