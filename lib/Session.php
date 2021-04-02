<?php 
namespace App\Lib;
class Session{
    public $signed_id = false;
    public $user_id;
    public $fullname;

    public function __construct()
    {
        session_start();
        $this->check_the_login();
    }

    public function check_the_login(){
        if(isset($_SESSION['user_id'])){
            $this->user_id = $_SESSION['user_id'];
            $this->fullname = $_SESSION['fullname'];
            $this->signed_id = true;
        }else{
            unset($this->user_id);
            unset($this->fullname);
            $this->signed_id = false;
        }
    }

    public function login($user){
        if($user){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['fullname'] = $user['first_name'] . " " . $user['last_name'];
             $this->signed_id = true;
        }
    }

    public function logout(){
        unset($_SESSION['user_id']);
        unset($_SESSION['fullname']);
        $this->signed_id = false;
    }

}