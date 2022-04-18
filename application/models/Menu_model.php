<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubOrtu()
    {
        $query = "SELECT `tb_ortu`.*, `user`.`email`
                  FROM `tb_ortu` JOIN `user`
                  ON `tb_ortu`.`email` = `user`.`email`
                ";
        return $this->db->query($query)->row_array();
    }

     public function getSubWali()
    {
        $query = "SELECT `tb_wali`.*, `user`.`email`
                  FROM `tb_wali` JOIN `user`
                  ON `tb_wali`.`email` = `user`.`email`
                ";
        return $this->db->query($query)->row_array();
    }

    public function getSubPendidikan()
    {



        $query = "SELECT `user`.`name`, `user`.`email`,`tb_nilai`.`unmtk`
                  FROM `user` LEFT JOIN `tb_nilai`
                  ON `user`.`email` = `tb_nilai`.`email` WHERE `user`.`role_id` = 2 ORDER BY unmtk desc
                ";
        return $this->db->query($query)->result_array();
    }

   public function status($email,$tugas_id)
   {
    $query = "SELECT * from tugas_user where email = '$email' AND tugas_id = '$tugas_id'" ;
    return $this->db->query($query)->result_array();
   }

   public function statusnilai($email,$tugas_id)
   {
    $query = "SELECT * from tugas_user where email = '$email' AND tugas_id = '$tugas_id' AND nilai !='-'" ;
    return $this->db->query($query)->result_array();
   }

   public function statusterlambat($email,$tugas_id, $terlambat)
   {
    $query = "SELECT * from tugas_user where email = '$email' AND tugas_id = '$tugas_id' AND status = '$terlambat'" ;
    return $this->db->query($query)->result_array();
   }

   

     public function getSubNilai()
    {
       
        $query = "SELECT * from user where role_id = 2 and is_active = 1" ;
        return $this->db->query($query)->result_array();
    }

     public function getSubTugas()
    {
       
        $query = "SELECT * from tugas";
        return $this->db->query($query)->result_array();
    }

    public function getPrintNilai()
    {
      $query = "SELECT `user`.`name`, `user`.`email`,`user`.`nisn`,`tb_nilai`.* 
       FROM `user` LEFT JOIN `tb_nilai`
       ON `user`.`email` = `tb_nilai`.`email`
       WHERE `user`.`role_id` = 2 ORDER BY rata desc
 ";

 return $this->db->query($query)->result_array();
 
    }
   


 public function getSubSemua()
    {
       
        $query = "SELECT `tugas_user`.`email`,`tugas_user`.`tugas_id`,`tugas_user`.`status`,`tugas_user`.`file_tugas`,`tugas_user`.`nilai`,`user`.`email`,`user`.`name`,`user`.`npm`,`tugas`.`id`,`tugas`.`nama_matkul`,`tugas`.`penjelasan_tugas`,`tugas`.`tgl_terakhir` FROM `tugas_user` JOIN `user` ON `tugas_user`.`email` = `user`.`email` JOIN `tugas` ON `tugas_user`.`tugas_id` = `tugas`.`id` WHERE `user`.`role_id` = 2 AND `user`.`is_active` = 1 ";
        return $this->db->query($query)->result_array();
    }

 public function getSubTentukan($email, $tugas_id)
    {
       
        $query = "SELECT `tugas_user`.`email`,`tugas_user`.`tugas_id`,`tugas_user`.`status`,`tugas_user`.`file_tugas`,`tugas_user`.`nilai`,`user`.`email`,`user`.`name`,`user`.`npm`,`tugas`.`id`,`tugas`.`nama_matkul`,`tugas`.`penjelasan_tugas`,`tugas`.`tgl_terakhir` FROM `tugas_user` JOIN `user` ON `tugas_user`.`email` = '$email' AND `user`.`email` = '$email'  JOIN `tugas` ON `tugas_user`.`tugas_id` = '$tugas_id' AND `tugas`.`id` ='$tugas_id' WHERE `user`.`role_id` = 2 AND `user`.`is_active` = 1";
        return $this->db->query($query)->row_array();
    }


 public function getSubDataTidakLulus()
    {
       
        $query = "SELECT `user`.`name`, `user`.`email`, `user`.`tpt_lahir`, `user`.`tgl_lahir`,`user`.`nisn`,`user`.`jeniskelamin`,`user`.`anak_ke`,`user`.`dari_saudara`,`user`.`alamat`,`user`.`rt`,`user`.`rw`,`user`.`dusun`,`user`.`desa`,`user`.`kecamatan`,`user`.`kabupaten`,`user`.`provinsi`,`user`.`agama`,`user`.`pos`,`user`.`no_akta`,`user`.`nokk`,`tb_ortu`.`nama_ayah`,`tb_ortu`.`nama_ibu`,`user`.`jurusan`,`user`.`keterangan`,`tb_nilai`.`rata`
                  FROM `user` LEFT JOIN `tb_nilai`
                  ON `user`.`email` = `tb_nilai`.`email` LEFT JOIN tb_ortu ON `user`.`email` = `tb_ortu`.`email`   WHERE `user`.`role_id` = 2 AND `user`.`is_active` = 1 AND  `user`.`keterangan` = 'TIDAK LULUS'  ORDER BY rata desc
                ";
        return $this->db->query($query)->result_array();
    }

 public function getSubDataCadangkan()
    {
       
        $query = "SELECT `user`.`name`, `user`.`hp_siswa`, `user`.`hp_orangtua`, `user`.`email`, `user`.`tpt_lahir`, `user`.`tgl_lahir`,`user`.`nisn`,`user`.`jeniskelamin`,`user`.`anak_ke`,`user`.`dari_saudara`,`user`.`alamat`,`user`.`rt`,`user`.`rw`,`user`.`dusun`,`user`.`desa`,`user`.`kecamatan`,`user`.`kabupaten`,`user`.`provinsi`,`user`.`agama`,`user`.`pos`,`user`.`no_akta`,`user`.`nokk`,`tb_ortu`.`nama_ayah`,`tb_ortu`.`nama_ibu`,`user`.`jurusan`,`user`.`keterangan`,`tb_nilai`.`rata`
                  FROM `user` LEFT JOIN `tb_nilai`
                  ON `user`.`email` = `tb_nilai`.`email` LEFT JOIN tb_ortu ON `user`.`email` = `tb_ortu`.`email`   WHERE `user`.`role_id` = 2 AND `user`.`is_active` = 1 AND  `user`.`keterangan` = 'CADANGKAN'  ORDER BY rata desc
                ";
        return $this->db->query($query)->result_array();
    }

 public function getSubTidakLulus()
    {
       
        $query = "SELECT `user`.`name`, `user`.`email`, `user`.`tpt_lahir`, `user`.`tgl_lahir`,`user`.`nisn`,`user`.`jeniskelamin`,`user`.`jurusan`,`user`.`keterangan`,`tb_nilai`.`rata`
                  FROM `user` LEFT JOIN `tb_nilai`
                  ON `user`.`email` = `tb_nilai`.`email` WHERE `user`.`role_id` = 2 AND `user`.`is_active` = 1 AND  `user`.`keterangan` = 'TIDAK LULUS'  ORDER BY rata desc
                ";
        return $this->db->query($query)->result_array();
    }

 public function getSubLulus()
    {
       
        $query = "SELECT `user`.`name`, `user`.`email`, `user`.`tpt_lahir`, `user`.`tgl_lahir`,`user`.`nisn`,`user`.`jeniskelamin`,`user`.`jurusan`,`user`.`keterangan`,`tb_nilai`.`rata`
                  FROM `user` LEFT JOIN `tb_nilai`
                  ON `user`.`email` = `tb_nilai`.`email` WHERE `user`.`role_id` = 2 AND `user`.`is_active` = 1 AND  `user`.`keterangan` = 'LULUS'  ORDER BY rata desc
                ";
        return $this->db->query($query)->result_array();
    }
     public function getSubDokumen()
    {
        $query = "SELECT `tb_dokumen`.*, `user`.`email`
                  FROM `tb_dokumen` JOIN `user`
                  ON `tb_dokumen`.`email` = `user`.`email`
                ";
        return $this->db->query($query)->row_array();
    }

public function cariDataSiswa(){
  $keyword = $this->input->post('keyword');
 $query = "SELECT `user`.`name`,`user`.`npm`,`user`.`role_id`, `user`.`email`,`user`.`jeniskelamin`,`user`.`jurusan`
                  FROM user  WHERE  `user`.`name` LIKE '%$keyword%'  AND `user`.`role_id` = 2 AND `user`.`is_active` = 1 || `user`.`npm` LIKE '%$keyword%' AND `user`.`role_id` = 2 AND `user`.`is_active` = 1 
                ";
        return $this->db->query($query)->result_array();

        
}

}

