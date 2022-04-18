<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

public function profile()
{
   $data['title'] = 'Profil Saya';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaruser', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('templates/footer');
}

    public function index()
    {
        $data['title'] = 'Home';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaruser', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }



    public function edit()
    {
        $data['title'] = 'Data Pribadi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
       
      
        $this->form_validation->set_rules('email', 'Email', 'required');
  
     
        

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaruser', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name',true);
            $email = $this->input->post('email',true);
              $npm = $this->input->post('npm',true);
              $tanggal =$this->input->post('tanggal',true);
              $tempat =$this->input->post('tempat',true);
           $agama =$this->input->post('agama',true);
              $jenis =$this->input->post('jeniskelamin',true);
                $hpsiswa = $this->input->post('hpsiswaku',true);
                    $jurusan = $this->input->post('jurusan',true);
             $kelas = $this->input->post('kelas',true);


            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '5120';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal di tambahkan, gambar harus di bawah 5 Mb dengan tipe jpeg atau jpg!</div>');
            redirect('user/edit');
                }
            }

            $this->db->set('name', $name);
             $this->db->set('npm', $npm);
           
                   $this->db->set('agama', $agama);
                $this->db->set('tgl_lahir', $tanggal);
                  $this->db->set('tpt_lahir', $tempat);
                 $this->db->set('jeniskelamin', $jenis);
                    $this->db->set('hp_siswa', $hpsiswa);
                                  $this->db->set('jurusan', $jurusan);
                                  $this->db->set('kelas', $kelas);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pribadi Kamu telah di Ubah!</div>');
            redirect('user/edit');
        }
    }

    public function kumpultugas()
    {
        $data['title'] = 'Kumpul Tugas';
        
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
       
        
$this->load->model('Menu_model', 'menu');
$data['subnilai'] = $this->menu->getSubTugas();



// foreach($data['subnilai'] as $tugas){
    
// }

// var_dump($data['subnilai'][1]['id']);die;



        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaruser', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/kumpultugas', $data);
        $this->load->view('templates/footer');

    }
    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[3]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[3]|matches[new_password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaruser', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password',true);
            $new_password = $this->input->post('new_password1',true);
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('user/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('user/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('user/changepassword');
                }
            }
        }
    }




public function cetakDokumen(){

     $data['title'] = 'Cetak Formulir';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

         $data['ortu'] = $this->db->get_where('tb_ortu', ['email' => $this->session->userdata('email')])->row_array();

          $data['wali'] = $this->db->get_where('tb_wali', ['email' => $this->session->userdata('email')])->row_array();

            $data['nilai'] = $this->db->get_where('tb_nilai', ['email' => $this->session->userdata('email')])->row_array();

 $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaruser', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/cetakdokumen', $data);
            $this->load->view('templates/footer');

}

public function printSiswa($email)
{
     $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();
$data['ortu'] = $this->db->get_where('tb_ortu', ['email' => $email])->row_array();
$data['wali'] = $this->db->get_where('tb_wali', ['email' => $email])->row_array();
     $this->load->view('user/printsiswa', $data);
}

public function antartugas($id)
{
    $data['title'] = 'Antar Tugas';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();    
    $data['tugas'] = $this->db->get_where('tugas', ['id' => $id])->row_array();    
    date_default_timezone_set("Asia/Jakarta") . '<br>';

    $status = "";
    $now =date("Y-m-d H:i:s") ;
    if($now < $data['tugas']['tgl_terakhir']){
        $status = "SELESAI";
    }else{
        $status = "TERLAMBAT";
    }
   
    $this->form_validation->set_rules('email', 'Email', 'required');

    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaruser', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/antartugas', $data);
        $this->load->view('templates/footer');
    }else{
        $upload_image = $_FILES['file_tugas']['name'];
        $email = $this->input->post('email',true);

        if ($upload_image) {
            $config['allowed_types'] = 'zip|pdf';
            $config['max_size']      = '5120';
            $config['upload_path'] = './assets/img/file_mahasiswa/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_tugas')) {
        
                $tugas = $this->upload->data('file_name');
                $this->db->set('file_tugas', $tugas);
            } else {
$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal di tambahkan, File harus di bawah 5 Mb dengan tipe zip atau pdf!</div>');
        redirect('user/antartugas/'.$id);
            }
        }

        
$this->db->set('email', $email);
$this->db->set('tugas_id', $data['tugas']['id']);
$this->db->set('nilai', "-");
$this->db->set('status', $status);

$this->db->insert('tugas_user');

$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas telah diantar!</div>');
redirect('user/kumpultugas#tugas');


    }

}

public function edittugas($id)
{
    $data['title'] = 'Edit Tugas';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();    
    $data['tugas'] = $this->db->get_where('tugas', ['id' => $id])->row_array();    
    $data['tugas_user'] = $this->db->get_where('tugas_user', ['email' => $this->session->userdata('email'), 'tugas_id' => $id])->row_array();    
    date_default_timezone_set("Asia/Jakarta") . '<br>';

    $status = "";
    $now =date("Y-m-d H:i:s") ;
    if($now < $data['tugas']['tgl_terakhir']){
        $status = "SELESAI";
    }else{
        $status = "TERLAMBAT";
    }
   
    $this->form_validation->set_rules('email', 'Email', 'required');

    if ($this->form_validation->run() == false) {
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaruser', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/edittugas', $data);
        $this->load->view('templates/footer');
    }else{
        $upload_image = $_FILES['file_tugas']['name'];
        $email = $this->input->post('email',true);

        if ($upload_image) {
            $config['allowed_types'] = 'docx|pdf';
            $config['max_size']      = '5120';
            $config['upload_path'] = './assets/img/file_mahasiswa/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_tugas')) {
                $old_image = $data['tugas_user']['file_tugas'];
                if ($old_image != '') {
                    unlink(FCPATH . 'assets/img/file_mahasiswa/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('file_tugas', $new_image);
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal di tambahkan, file harus di bawah 5 Mb dengan tipe .docx atau .pdf!</div>');
        redirect('user/edittugas/'.$id);
            }


        }

        
$this->db->set('email', $email);
$this->db->set('tugas_id', $data['tugas']['id']);
$this->db->set('nilai', "-");
$this->db->set('status', $status);

$this->db->where('email', $email);
$this->db->where('tugas_id', $id);
$this->db->update('tugas_user');

$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas telah diubah!</div>');
redirect('user/kumpultugas#tugas');


    }

}

}
