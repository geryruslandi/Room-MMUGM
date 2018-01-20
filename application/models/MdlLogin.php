<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    class MdlLogin extends CI_Model{

        public function __construct()
        {
            //ngeload database
            $this->load->database();

        }

        public function loginAuth($username,$password){
            $checkuser = $this->db->query("select id,username,level from users
                                            where username='".$username."' and password='".$password."'");

            return $checkuser->result();
        }

    }