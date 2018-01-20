<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    //reserve variable untuk injeksi data ke view
    private $data = array();

    //konstruktor
    public function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('mdlRuang');

        //jika user tidak ter authetikasi
        if(!$this->auth->cekAuth()){
            redirect('login');
        }
        else{

            //inject data user to view
            $this->data['userdata']=new stdClass();
            $this->data['userdata']->name = $_SESSION['usernameruang'];
            $this->data['userdata']->id = $_SESSION['idruang'];
            $this->data['userdata']->level = $_SESSION['levelruang'];

            //inject data ruang to view
            $this->data['ruang']= $this->mdlRuang->showRuang();


            //penentu page dashoard
            $this->data['page']= $this->uri->segment(2);

        }

    }

    //default view
    public function index()
    {
        $this->data['page']='dashboard';

        $this->data['tblRuang'] = $this->mdlRuang->showRuang();

        $this->load->view('Dashboard/header',$this->data);
        $this->load->view('Dashboard/index.php');
        $this->load->view('Dashboard/footer');
    }

    //add master data view
    public function addmaster(){
        //authetikasi kembali
        //print_r($this->data['userdata']);
        if($this->data['userdata']->level == 'adm') {

            $this->load->library('form_validation');
            $this->load->view('Dashboard/header', $this->data);
            $this->load->view('Dashboard/body_add', $this->data);
            $this->load->view('Dashboard/footer', $this->data);
        }
        else{
            //flash session untuk alert data
            $this->session->set_flashdata('alert', "<script>alert('Anda Tidak Memiliki Hak Untuk Mengakses Ini !!')</script>");
            redirect('dashboard');
        }
    }

    //add master data action
    public function adddata(){


        if($this->data['userdata']->level == 'adm') {
            $this->form_validation->set_rules('namaruang','Nama Ruang','required','Nama Ruang Dibutuhkan');
            $this->form_validation->set_rules('lantai','Lantai','required|numeric');
            $this->form_validation->set_rules('kapasitas','Kapasitas','required|numeric');

            //jika form tidak memenuhi kriteria
            if ($this->form_validation->run() == FALSE){
                $this->load->view('Dashboard/header',$this->data);
                $this->load->view('Dashboard/body_add',$this->data);
                $this->load->view('Dashboard/footer',$this->data);
            }

            //jika form memenuhi kriteria
            else{
                $namaruang=$this->input->post('namaruang');
                $lantai = $this->input->post('lantai');
                $kapasitas = $this->input->post('kapasitas');

                $insertquery = $this->mdlRuang->adddata($namaruang,$lantai,$kapasitas);
                if($insertquery){
                    $this->load->view('Dashboard/header',$this->data);
                    $this->load->view('Dashboard/body_add',$this->data);
                    $this->load->view('Dashboard/footer',$this->data);
                    echo "<script>alert('Berhasil Tambah Data')</script>";
                }
                else{
                    $this->load->view('Dashboard/header',$this->data);
                    $this->load->view('Dashboard/body_add',$this->data);
                    $this->load->view('Dashboard/footer',$this->data);
                    echo "<script>alert('Data Gagal Di Tambah,Mohon di coba kembali')</script>";
                }
            }
        }
        else{
            //flash session untuk alert data
            $this->session->set_flashdata('alert', "<script>alert('Anda Tidak Memiliki Hak Untuk Mengakses Ini !!')</script>");
            redirect('dashboard');
        }
    }

    //add room reserving view
    public function addbooking(){

        if($this->data['userdata']->level == 'adm') {
            $this->load->view('Dashboard/header', $this->data);
            $this->load->view('Dashboard/body_add_booking', $this->data);
            $this->load->view('Dashboard/footer', $this->data);
        }
        else{
            //flash session untuk alert data
            $this->session->set_flashdata('alert', "<script>alert('Anda Tidak Memiliki Hak Untuk Mengakses Ini !!')</script>");
            redirect('dashboard');
        }
    }

    //add room reserving action
    public function adddata_booking(){
        //rule form


        if($this->data['userdata']->level == 'adm') {

            $this->form_validation->set_rules('pemakai','Pengguna','required');
            $this->form_validation->set_rules('ruang','Ruangan','required');
            $this->form_validation->set_rules('tanggal','Tanggal','required');
            $this->form_validation->set_rules('jam_mulai','Jam Mulai','required');
            $this->form_validation->set_rules('jam_akhir','Jam Akhir','required');
            $this->form_validation->set_rules('nama_instansi','Nama Instansi','required');
            $this->form_validation->set_rules('telefon','Nomor Telefon','required|numeric');
            $this->form_validation->set_rules('keterangan','Keterangan','required');


            if ($this->form_validation->run() == FALSE){
                $this->load->view('Dashboard/header', $this->data);
                $this->load->view('Dashboard/body_add_booking', $this->data);
                $this->load->view('Dashboard/footer', $this->data);
            }
            else{
                //make variable readable

                $jam_mulai = $this->input->post('jam_mulai').':00.000';
                $jam_akhir = $this->input->post('jam_akhir').':00.000';
                $pemakai = $this->input->post('pemakai');
                $ruang = $this->input->post('ruang');
                $tanggal = date("Y-m-d", strtotime($this->input->post('tanggal')));
                $nama_instansi = $this->input->post('nama_instansi');
                $telefon = $this->input->post('telefon');
                $keterangan = $this->input->post('keterangan');
                $insertquery = $this->mdlRuang->adddatabooking($ruang,$tanggal,$jam_mulai,$jam_akhir,$pemakai,$nama_instansi,$telefon,$keterangan);
                if($insertquery){
                    redirect('/dashboard/addbooking');
                    echo "<script>alert('Berhasil Input Pemesanan Ruangan')</script>";
                }
                else{

                    echo "<script>alert('Gagal Input Pemesanan Ruangan,Coba ulang kembali')</script>";
                    $this->load->view('Dashboard/header', $this->data);
                    $this->load->view('Dashboard/body_add_booking', $this->data);
                    $this->load->view('Dashboard/footer', $this->data);
                }
            }
        }
        else{
            //flash session untuk alert data
            $this->session->set_flashdata('alert', "<script>alert('Anda Tidak Memiliki Hak Untuk Mengakses Ini !!')</script>");
            redirect('dashboard');
        }

    }

    //logout button
    public function logout(){
        $this->auth->logout();
        redirect('login');
    }

    //view select tanggal
    public function hari(){



            $this->data['page'] = 'dashboard';

            $this->data['tblRuang'] = $this->mdlRuang->showRuang();
            $this->load->view('Dashboard/header', $this->data);
            $this->load->view('Dashboard/body_view_tanggal.php');
            $this->load->view('Dashboard/footer');


    }

    //view per tanggal
    public function viewtanggal($hari,$bulan,$tahun){

            $tanggal = strval($tahun) . "-" . strval($bulan) . "-" . strval($hari);

            $this->data['ruangreservasi'] = $this->mdlRuang->viewtanggal($tanggal);
            //jika tidak ada data di tanggal tersebut
            if ($this->data['ruangreservasi'] == null) {
                $this->data['ruangreservasi'] = new stdClass();
                $this->data['ruangreservasi']->keteranganerror = "nodata";
                $this->data['ruangreservasi']->tanggal = $tanggal;

            } else {
                $this->data['tanggal'] = $this->data['ruangreservasi'][0]->tanggal;
            }

            $this->load->view('Dashboard/header', $this->data);
            $this->load->view('Dashboard/body_view_tanggal.php');
            $this->load->view('Dashboard/footer');


    }

    //edit data booking
    public function editdata_booking(){
        //print_r($_POST);

        if($this->data['userdata']->level == 'adm') {

            $idPemesanan = $_POST['idPemesanan'];
            $ruangid = $_POST['ruang'];
            $mulai = $_POST['jam_mulai'];
            $akhir = $_POST['jam_akhir'];
            $tanggal = substr($_POST['tanggal'],6,4)."-".substr($_POST['tanggal'],3,2)."-".substr($_POST['tanggal'],0,2);
            $pemakai = $_POST['pemakai'];
            $instansi = $_POST['nama_instansi'];
            $telefon = $_POST['telefon'];
            $keterangan = $_POST['keterangan'];

            $status = false;
            //check apakah input tanggal benar
            if(checkdate(substr($_POST['tanggal'],3,2),substr($_POST['tanggal'],0,2),substr($_POST['tanggal'],6,4))){
                $status = $this->mdlRuang->editPesan($idPemesanan,$ruangid,$tanggal,$mulai,$akhir,$pemakai,$instansi,$telefon,$keterangan);
                //jika ada perubahan di data
                if($status){
                    $this->session->set_flashdata('alert', "<script>alert('Data Telah Berubah !!')</script>");
                    //echo $_POST['redirect'];
                    if($_POST['redirect'] == 'viewtanggal'){
                        redirect('dashboard/hari');
                    }
                    elseif ($_POST['redirect'] == 'viewbulan'){
                        redirect('dashboard/bulan');
                    }
                    else{
                        redirect('dashboard');
                    }
                }
                else{
                    $this->session->set_flashdata('alert', "<script>alert('Data Gagal Berubah, Periksa kembali inputan anda !!')</script>");
                    redirect('dashboard/hari');
                }
            }
            else{
                echo "input tanggal salah";
            }
        }
        else{
            $this->session->set_flashdata('alert', "<script>alert('Anda Tidak Memiliki Hak Untuk Mengakses ini!!')</script>");
            redirect(base_url().'dashboard');
        }



    }

    //view select bulan
    public function bulan(){
            $this->load->view('Dashboard/header', $this->data);
            $this->load->view('Dashboard/body_view_bulan.php');
            $this->load->view('Dashboard/footer');



    }

    //view reservasi per bulan
    public function viewbulan($bulan,$tahun){


            //store nama bulan dan tahun ke variable injeksi
            $dateObj = DateTime::createFromFormat('!m', $bulan);
            $this->data['tanggal'] = new stdClass();
            $this->data['tanggal']->bulan = $dateObj->format('F'); // konversi nama bulan
            $this->data['tanggal']->tahun = $tahun;

            //ambil data
            $this->data['ruangreservasi'] = $this->mdlRuang->viewbulan($bulan, $tahun);


            //view
            $this->load->view('Dashboard/header', $this->data);
            $this->load->view('Dashboard/body_view_bulan.php', $this->data);
            $this->load->view('Dashboard/footer');


    }

    //view manajemen ruang
    public function ruang(){
        if($this->data['userdata']->level == 'adm'){
            $this->load->view('Dashboard/header', $this->data);
            $this->load->view('Dashboard/body_view_ruang',$this->data);
            $this->load->view('Dashboard/footer');
        }
        else{
            //flash session untuk alert data
            $this->session->set_flashdata('alert', "<script>alert('Anda Tidak Memiliki Hak Untuk Mengakses Ini !!')</script>");
            redirect('dashboard');
        }
    }

    //edit ruangan
    public function editruang(){

        if($this->data['userdata']->level == 'adm'){

            $this->form_validation->set_rules('nama','Nama','required');
            $this->form_validation->set_rules('lantai','Lantai','required|numeric');
            $this->form_validation->set_rules('kapasitas','Kapasitas','required|numeric');


            if ($this->form_validation->run() == FALSE){
                $this->session->set_flashdata('alert', "<script>alert('Periksa kembali input anda !!')</script>");
                redirect('ruang');
            }
            else{
                $id = $_POST['id'];
                $nama = $_POST['nama'];
                $lantai = $_POST['lantai'];
                $kapasitas = $_POST['kapasitas'];

                $this->load->model('mdlRuang');

                $returndata = $this->mdlRuang->editRuang($id,$nama,$lantai,$kapasitas);

                if($returndata == 1){
                    $this->session->set_flashdata('alert', "<script>alert('Berhasil Update Data !!')</script>");
                    redirect('dashboard');
                }
                else{

                    $this->session->set_flashdata('alert', "<script>alert('Terjadi error ketika proses update berjalan !!')</script>");
                    redirect('dashboard');
                }
            }

        }
        else{
            //flash session untuk alert data
            $this->session->set_flashdata('alert', "<script>alert('Anda Tidak Memiliki Hak Untuk Mengakses Ini !!')</script>");
            redirect('dashboard');
        }

    }

    //deleteruangan
    public function deleteruangan(){
        if($this->data['userdata']->level == 'adm'){
            $id = $_POST['id'];
            $this->load->model('mdlRuang');

            $returndata = $this->mdlRuang->deleteruang($id);

            if($returndata == 1){
                $this->session->set_flashdata('alert', "<script>alert('Berhasil Delete Data !!')</script>");
                redirect('dashboard/ruang');
            }
            elseif ($returndata == 1451){
                $this->session->set_flashdata('alert', "<script>alert('Data ruangan hanya bisa di hapus jika tidak ada jadwal yang memakai ruangan ini .Hapus terlebih dahulu jadwal yang memakai ruangan ini!!')</script>");
                redirect('dashboard/ruang');
            }
            else{
                $this->session->set_flashdata('alert', "<script>alert('Terjadi error ketika proses delete berjalan !! Error Code = $returndata')</script>");
                redirect('dashboard/ruang');
            }

        }
        else{
            $this->session->set_flashdata('alert', "<script>alert('Anda Tidak Memiliki Hak Untuk Mengakses Ini !!')</script>");
            redirect('dashboard');
        }
    }

    //deletepemakaian
    public function deletepemakaian(){
        if($this->data['userdata']->level == 'adm'){
            $id = $_POST['id'];

            $this->load->model('mdlRuang');

            $urlawal = $_SERVER['HTTP_REFERER'];

            $returndata = $this->mdlRuang->deletepemakaian($id);

            if($returndata == 1){
                $this->session->set_flashdata('alert', "<script>alert('Berhasil Delete Data !!')</script>");
                redirect($urlawal);
            }
            else{
                $this->session->set_flashdata('alert', "<script>alert('Terjadi error ketika proses delete berjalan !! Error Code = $returndata')</script>");
                redirect('dashboard/ruang');
            }
        }
        else{
            $this->session->set_flashdata('alert', "<script>alert('Anda Tidak Memiliki Hak Untuk Mengakses Ini !!')</script>");
            redirect('dashboard');
        }
    }

    //export data
    public function export(){
        if($this->data['userdata']->level == 'adm') {
            $this->load->model('mdlRuang');

            $dataexport['data'] = $this->mdlRuang->exportdata();


            $this->load->view('export', $dataexport);
        }
        else{

            //flash session untuk alert data
            $this->session->set_flashdata('alert', "<script>alert('Anda Tidak Memiliki Hak Untuk Mengakses Ini !!')</script>");
            redirect('dashboard');
        }

    }

    public function status(){

        $this->data['dataruang'] = $this->mdlRuang->showRuang();


        $this->load->view('Dashboard/header',$this->data);
        $this->load->view('Dashboard/body_view_status.php');
        $this->load->view('Dashboard/footer');
    }

    public function viewstatus(){

        $this->form_validation->set_rules('tanggal','Tanggal','required');
        $this->form_validation->set_rules('ruang','Ruang','required');


        if ($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('alert', "<script>alert('Harap cek kembali inputan anda !!')</script>");
            redirect(base_url().'dashboard/status');
        }
        else{
            $tanggal = date('Y-m-d', strtotime($_POST['tanggal']));
            $idruang = $_POST['ruang'];
            if($tanggal != '1970-01-01'){

                $this->data['dataruangstatus'] = $this->mdlRuang->statusruang($tanggal,$idruang);

                $this->data['dataruang'] = $this->mdlRuang->showRuang();
                $this->load->view('Dashboard/header',$this->data);
                $this->load->view('Dashboard/body_view_status.php',$this->data);
                $this->load->view('Dashboard/footer');
            }
            else{
                $this->session->set_flashdata('alert', "<script>alert('Harap cek kembali inputan anda !!')</script>");
                redirect(base_url().'dashboard/status');
            }


        }
    }

}


























