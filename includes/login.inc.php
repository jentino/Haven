<?php 
class Login 
{
 private $conn;
 private $table_name = "tblusers";
  
    public $user;
    public $username;
    public $password;
 
    public function __construct($db){
  $this->conn = $db;
 }
 
    public function login()
    {
        $user = $this->checkCredentials();

        if ($user) {
            return true;
        }
        return false;
    }
 
    protected function checkCredentials()
    {
        $stmt = $this->conn->prepare('SELECT * FROM '.$this->table_name.' WHERE username=? and password=? ');
		$stmt->bindParam(1, $this->username);
		$stmt->bindParam(2, $this->password);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
            $submitted_pass = $this->password;
            if ($submitted_pass == $data['password']) {
                return true;
            }
        }
        return false;
    }

    public function checkStatus()
    {
        $stmt = $this->conn->prepare('SELECT * FROM '.$this->table_name.' WHERE username=?');
		$stmt->bindParam(1, $this->username);
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            $data = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($data['status'] == 1) {
                
                $this->user = $data['username'];
                session_start();
                $_SESSION['username'] = $data['username'];
                $_SESSION['role'] = $data['role'];
                return $data['username'];

            }
        }
        return false;
    }
 
    public function getUser()
    {
        return $this->user;
    }

    
}
?>