<?php

defined('BASEPATH') OR exit('No direct script access allowed');

    class MdlRuang extends CI_Model{


        public function __construct()
        {
            //ngeload database
            $this->load->database();
        }

        //melihat ruang per tanggal
        public function viewtanggal($tanggal){
            $dataruang = $this->db->query('select p.id, p.id_ruang, DATE_FORMAT(p.tanggal, \'%d-%m-%Y\') as tanggal, p.jam_mulai, p.jam_selesai,
                                            p.pemakai, p.instansi, p.telp, p.keterangan , r.nama , r.id as id_ruang 
                                           from pemakaian as p 
                                           join ruang as r 
                                           on p.id_ruang = r.id
                                           where p.tanggal = "'.$tanggal.'"
                                           order by p.tanggal asc')->result();
            return $dataruang;
        }

        //melihat semua ruang
        public function showRuang(){
            $dataruang = $this->db->query('select * from ruang')->result();

            return $dataruang;
        }

        //edit data pemesanan
        public function editPesan($idPemesanan,$ruangid,$tanggal,$mulai,$akhir,$pemakai,$instansi,$telefon,$keterangan){
            $edit = $this->db->query('update pemakaian
                                      set id_ruang = '.$ruangid.' , tanggal = "'.$tanggal.'",jam_mulai = "'.$mulai.'",
                                      jam_selesai = "'.$akhir.'",pemakai = "'.$pemakai.'" , instansi = "'.$instansi.'",
                                      telp = "'.$telefon.'",keterangan = "'.$keterangan.'"
                                      where id = '.$idPemesanan.'');

            //print_r($this->db->last_query());
            $statusUpdate = $this->db->affected_rows();

            return $statusUpdate;
        }

        //menambah ruang
        public function adddata($nama,$lantai,$kapasitas){
            $insertdata = $this->db->query("insert into ruang values(null,'".$nama."',".$lantai.",".$kapasitas.")");
            if($insertdata){
                return true;
            }
            else{
                return false;
            }
        }

        //menambah booking
        public function adddatabooking($ruang,$tanggal,$jam_mulai,$jam_akhir,$pemakai,$nama_instansi,$telefon,$keterangan){
            $insertdata = $this->db->query("insert into pemakaian 
                                            values(null,".$ruang.",'".$tanggal."','".$jam_mulai."','".$jam_akhir."'
                                            ,'".$pemakai."','".$nama_instansi."','".$telefon."','".$keterangan."')");
            if($insertdata){
                return true;
            }
            else{
                return false;
            }
        }

        //melihat ruang per bulan
        public function viewbulan($bulan,$tahun){
            $dataruang = $this->db->query("select p.id, p.id_ruang, DATE_FORMAT(p.tanggal, '%d-%m-%Y') as tanggal, p.jam_mulai, p.jam_selesai,
                                            p.pemakai, p.instansi, p.telp, p.keterangan , r.nama , r.id as id_ruang 
                                           from pemakaian as p 
                                           join ruang as r 
                                           on p.id_ruang = r.id
                                           where month(p.tanggal) = ".$bulan." and year(p.tanggal) = ".$tahun."
                                           order by p.tanggal asc")->result();
            return $dataruang;
        }

        public function exportdata(){
            $returndata = $this->db->query("select p.* , r.nama
                                            from pemakaian as p 
                                            INNER JOIN  ruang as r
                                            on p.id_ruang = r.id
                                            order by p.tanggal")->result();
            return $returndata;
        }

        public function statusruang($tanggal,$idruang){
            $returndata = $this->db->query("select r.nama ,p.tanggal,p.jam_mulai,p.jam_selesai,p.pemakai
                                            from ruang as r 
                                            INNER JOIN pemakaian as p 
                                            ON p.id_ruang = r.id
                                            where p.tanggal = '$tanggal' and p.id_ruang = $idruang")->result();
            return $returndata;
        }

        public function editRuang($id,$nama,$lantai,$kapasitas){
            $this->db->query("update ruang set nama = '$nama',lantai = '$lantai' , kapasitas = '$kapasitas' where id =$id");
            //print_r($this->db->)
            return $this->db->affected_rows();
        }

        public function deleteruang($id){
           $returndata = $this->db->query("delete from ruang where id = $id");

           if(!$returndata){
               $errornumber =$this->db->error();
               return $errornumber['code'];

           }
           else{
               return $this->db->affected_rows();
           }

        }

        public function deletepemakaian($id){
            $returndata = $this->db->query("delete from pemakaian where id = $id");

            if(!$returndata){
                $errornumber =$this->db->error();
                return $errornumber['code'];

            }
            else{
                return $this->db->affected_rows();
            }

        }
    }