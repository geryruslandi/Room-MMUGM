<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('mdlLogin');

        //load library form
        $this->load->library('form_validation');

        if($this->auth->cekAuth()){
            //echo "logged in";
            redirect('/dashboard');
        }
        else{
            $this->load->view('Login/login');
        }

    }
    public function index(){

    }


    //validasi login users
    public function validating(){



        $this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');

        //validasi form
        if ($this->form_validation->run() == FALSE){
            $this->load->view('Login/index');
        }
        //jika form sukses di validasi
        else{
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            $hasilAuth = $this->mdlLogin->loginAuth($username,$password);

            //jika gagal login
            if($hasilAuth == null){
                $this->session->set_flashdata('alert', "<script>alert('Username / Password tidak cocok !!')</script>");
                redirect(base_url());
            }

            //jika berhasil login
            else{
                $this->session->set_userdata(array('usernameruang'=>$hasilAuth[0]->username,
                    'idruang' =>  $hasilAuth[0]->id,
                    'levelruang' => $hasilAuth[0]->level
                ));
                redirect('dashboard');
            }
        }

    }
}
