<?php
session_start();
class myStore{
   
    private $server="mysql:host=localhost;dbname=shoeshop";
    private $user="root";
    private $pass="";
    private $options=array(PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
);

    protected $connection;

    public function openConnection(){
        try{
            $this->connection=new PDO(
                $this->server,
                $this->user,
                $this->pass,
                $this->options,

            );
            echo "Connection success";

            return $this->connection;

        }catch(PDOException $error){
            echo "Error Connection: ".$error->getMessage();
        }
    }

    public function closeConnection(){
        $this->connection=null;
    }

        public function getUsers(){
            $connection=$this->openConnection();
            $statement=$connection->prepare("SELECT * FROM users order by UserId DESC");
            $statement->execute();
            $users=$statement->fetchAll();
            $usersCount=$statement->rowCount();

            if($usersCount>0){
                return $users;

            }else{
                return 0;
            }
            
        }
        
        public function login(){
            if(isset($_POST['submit'])){
               if($_POST['email']!="" && $_POST['password']!=""){
                    $connection=$this->openConnection();
                    $email=$_POST['email'];
                    $password=$_POST['password'];
                    $statement=$connection->prepare("select * from users where EmailAddress=? and Password=?");
                    $statement->execute([$email,$password]);
                    $user=$statement->fetch();
                    $total=$statement->rowCount();
                    $_SESSION['username']=$user['Username'];
                    if($total>0){
                        // echo "Welcome user ".$user['Name'];
                        header("Location:landing.php");
                    }else{
                        echo $user['EmailAddress']."and ".$user['Password']." Login failed";
                    }
               }else{
                   echo "Please input a valid email address and correct password.";
               }
                
            }
        }

        
   
}
$myStore=new myStore();
?>