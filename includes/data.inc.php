<?php
class userData{
  
  // database connection and table name
  private $conn;
  private $table_name = "tblusers";
    
  // object properties
  public $username;
  public $password;
  public $email;
  public $status;
  public $firstname;
  public $lastname;
  public $token_id_live;
  public $token_id_demo;
  public $app_id_live;
  public $app_id_demo;
  public $role;
  public $hash;
  public $vcode;
  public $picfile;
    
  public function __construct($db){
    $this->conn = $db;
  }

  // create user
  function createUser(){

    //write query
    $query = "INSERT INTO ".$this->table_name." values('',?,?,?,'0','','','','','','','',?,?,?)";

    $stmt = $this->conn->prepare($query);

    $stmt->bindParam(1, $this->username);
    $stmt->bindParam(2, $this->password);
    $stmt->bindParam(3, $this->email);
    $stmt->bindParam(4, $this->hash);
    $stmt->bindParam(5, $this->vcode);
    $stmt->bindParam(6, $this->picfile);

    if($stmt->execute()){
    return true;
    }else{
    return false;
    }
    
  }

  function updateUser(){
    
     $query = "UPDATE 
        " . $this->table_name . "
       SET 
        username = :username,
        password = :password, 
        email = :email, 
        status = :status, 
        firstname = :firstname,
        lastname = :lastname, 
        token_id_live = :token_id_live, 
        token_id_demo = :token_id_demo, 
        app_id_live = :app_id_live,
        app_id_demo = :app_id_demo,
        role = :role,
        hash = :hash,
        vcode = :vcode,
        picfile = :picfile

       WHERE
        username = :username";
    
     $stmt = $this->conn->prepare($query);
    
     $stmt->bindParam(':username', $this->username);
     $stmt->bindParam(':password', $this->password);
     $stmt->bindParam(':email', $this->email);
     $stmt->bindParam(':status', $this->status);
     $stmt->bindParam(':firstname', $this->firstname);
     $stmt->bindParam(':lastname', $this->lastname);
     $stmt->bindParam(':token_id_live', $this->token_id_live);
     $stmt->bindParam(':token_id_demo', $this->token_id_demo);
     $stmt->bindParam(':app_id_live', $this->app_id_live);
     $stmt->bindParam(':app_id_demo', $this->app_id_demo);
     $stmt->bindParam(':role', $this->role);
     $stmt->bindParam(':hash', $this->hash);
     $stmt->bindParam(':vcode', $this->vcode);
     $stmt->bindParam(':picfile', $this->picfile);
     
     // execute the query
     if($stmt->execute()){
      return true;
     }else{
      return false;
     }
  }

  // used when filling up the update product form
 function getUserData(){
  
 $query = "SELECT 
    *
   FROM 
    " . $this->table_name . "
   WHERE 
    username = ? 
   LIMIT 
    0,1";

 $stmt = $this->conn->prepare( $query );
 $stmt->bindParam(1, $this->username);
 $stmt->execute();

 $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
  $this->username = $row['username'];
  $this->password = $row['password'];
  $this->email = $row['email'];
  $this->status = $row['status'];
  $this->firstname = $row['firstname'];
  $this->lastname = $row['lastname'];
  $this->token_id_live = $row['token_id_live'];
  $this->token_id_demo = $row['token_id_demo'];
  $this->app_id_live = $row['app_id_live'];
  $this->app_id_demo = $row['app_id_demo'];
  $this->role = $row['role'];
  $this->hash = $row['hash'];
  $this->vcode = $row['vcode'];
  $this->picfile = $row['picfile'];

}


function checkusername($username){
  
    $this->username = $username;
  
    $check_for_username = "SELECT username FROM ".$this->table_name." WHERE username= ?";
  
    $stmt = $this->conn->prepare( $check_for_username );
  
    $stmt->bindParam(1, $this->username);
  
    $stmt->execute();
  
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
  
    if ($this->username == $row['username']) {
      return true;
    } else {
      return false;
    }
  
  }
  
  function checkemail($email){
    
      $this->email = $email;
    
      $check_for_email = "SELECT email FROM ".$this->table_name." WHERE email = ?";
    
      $stmt = $this->conn->prepare( $check_for_email );
    
      $stmt->bindParam(1, $this->email);
    
      $stmt->execute();
    
      $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
      if ($this->email == $row['email']) {
        return true;
      } else {
        return false;
      }
    
    }

  function verifyvcode(){
    
        //write query
        $query = "SELECT username,vcode FROM ".$this->table_name." WHERE vcode = ? and status = 0";
    
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->vcode);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->username = $row['username'];
        
        $this->status = "1";

        if($this->vcode == $row['vcode']){

                $sql = "UPDATE 
                " . $this->table_name . "
                 SET 
                  status = :value 
                 WHERE 
                  username= :username";
          
                    $stmt1 = $this->conn->prepare($sql);
                    
                    $stmt1->bindParam(':value',  $this->status);
                    $stmt1->bindParam(':username', $this->username);
                    $stmt1->execute();

          return true;
        }else{
          return false;
        }
        
  }

  function makevcode($length) {
    
           global $template;
           settype($template, "string");
    
           $template = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
           /* this line can include numbers or not */
    
           settype($length, "integer");
           settype($rndstring, "string");
           settype($a, "integer");
           settype($b, "integer");
    
           for ($a = 0; $a <= $length; $a++) {
                   $b = rand(0, strlen($template) - 1);
                   $rndstring .= $template[$b];
           }
    
           return $rndstring; 
    }
}
?> 