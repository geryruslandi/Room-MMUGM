<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Auth {
        public function __construct()
        {

        }

        public function cekAuth(){
            if(!isset($_SESSION['usernameruang']) || !isset($_SESSION['idruang']) || !isset($_SESSION['levelruang'])){
                return false;
            }
            else{
                return true;
            }
        }
        public function logout(){
            session_destroy();
            print_r($_SESSION);
        }
    }