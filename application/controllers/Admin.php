<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();

header('Cache-Control: no-cache, must-revalidate, max-age=0');
header('Cache-Control: post-check=0, pre-check=0',false);
header('Pragma: no-cache');
   
    }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }


public function profile()
{
   $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer');
}




 public function datamahasiswa()
    {
        $data['title'] = 'Data Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
$this->load->model('Menu_model', 'menu');
      $data['subnilai'] = $this->menu->getSubNilai();



if ($this->input->post('keyword')) {
    $data['subnilai'] = $this->menu->cariDataSiswa();
 
}
      


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/datamahasiswa', $data);
        $this->load->view('templates/footer');
    }



public function tambahtugas()
{
    $data['title'] = 'Tambah Tugas';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
$this->load->model('Menu_model', 'menu');


$this->load->view('templates/header', $data);
$this->load->view('templates/sidebaradmin', $data);
$this->load->view('templates/topbar', $data);
$this->load->view('admin/tambahtugas', $data);
 $this->load->view('templates/footer');
}



    public function detail($email)
    {
        
         $data['title'] = 'Detail Siswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
       
        $data['siswa'] =$this->db->get_where('user', ['email' => $email])->row_array();
       

      
 $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/detail', $data);
         $this->load->view('templates/footer');
    }

public function hapussemua(){


$files = glob('assets/img/doc/*');
  $gambar = glob('assets/img/profile/*');


foreach ($gambar as $gam) {

  if ($gam != 'assets/img/profile/default.jpg' ) {

   unlink($gam);
     }
}


foreach ($files as $file) {
  if ($file!= 'assets/img/doc/dokumen.jpg' ) {
   unlink($file);
     }
}



  $this->db->where('role_id', '2');
        $this->db->delete('user');
        $this->db->empty_table('tb_pendidikan');
         $this->db->empty_table('tb_nilai');
                $this->db->empty_table('tb_dokumen');
                   $this->db->empty_table('tb_wali');
                    $this->db->empty_table('tb_ortu');

 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Semua data telah dihapus</div>');
            redirect('admin/datapendaftar');

}

public function tambahtugasnya()
{
    
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $this->form_validation->set_rules('nama_matkul', 'Nama Mata Kuliah', 'required');
    $this->form_validation->set_rules('penjelasan_tugas', 'Penjelasan Tugas', 'required');
    
    if ($this->form_validation->run() == false) {
        $data['title'] = 'Tambah Tugas';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambahtugas', $data);
        $this->load->view('templates/footer');
    }else{
        $nama_matkul = $this->input->post('nama_matkul', true);
        $penjelasan_tugas = $this->input->post('penjelasan_tugas', true);
        $tgl_mulai = $this->input->post('tgl_mulai', true);
        $tgl_terakhir = $this->input->post('tgl_terakhir', true);
        $upload_image = $_FILES['file_tugas']['name'];


        
        if ($upload_image) {
            $config['allowed_types'] = 'docx|pdf';
            $config['max_size']      = '5120';
            $config['upload_path'] = './assets/img/tugas_dosen/';

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file_tugas')) {
                $tugas = $this->upload->data('file_name');
                $this->db->set('file_tugas', $tugas);
            } else {
$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal di tambahkan, File harus di bawah 5 Mb dengan tipe docx atau pdf!</div>');
        redirect('admin/tambahtugas');
            }
        }

        
$this->db->set('nama_matkul', $nama_matkul);
$this->db->set('penjelasan_tugas', $penjelasan_tugas);
$this->db->set('tgl_mulai', $tgl_mulai);
$this->db->set('tgl_terakhir', $tgl_terakhir);
$this->db->set('nama_dosen', $data['user']['name']);


$this->db->insert('tugas');

$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas telah ditambahkan!</div>');
redirect('admin/tambahtugas');

        


    }
}

public function edittugas($id)
{

    $data['title'] = 'Edit Tugas';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
    $data['tugas'] = $this->db->get_where('tugas', ['id' => $id])->row_array();

    // var_dump($data['tugas']);die;
    $this->form_validation->set_rules('nama_matkul', 'Nama Mata Kuliah', 'required');
    $this->form_validation->set_rules('penjelasan_tugas', 'Penjelasan Tugas', 'required');

    if ($this->form_validation->run() == false) {
        
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebaradmin', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/edittugas', $data);
    $this->load->view('templates/footer');
    }else{
        $nama_matkul = $this->input->post('nama_matkul',true);
        $penjelasan_tugas = $this->input->post('penjelasan_tugas',true);
          $tgl_mulai = $this->input->post('tgl_mulai',true);
          $tgl_terakhir =$this->input->post('tgl_terakhir',true);
          $upload_image = $_FILES['file_tugas']['name'];

          if ($upload_image) {
              $config['allowed_types'] = 'docx|pdf';
              $config['max_size']      = '5120';
              $config['upload_path'] = './assets/img/tugas_dosen/';

              $this->load->library('upload', $config);

              if ($this->upload->do_upload('file_tugas')) {
                  $old_image = $data['tugas']['file_tugas'];
                  if ($old_image != '') {
                      unlink(FCPATH . 'assets/img/tugas_dosen/' . $old_image);
                  }
                  $new_image = $this->upload->data('file_name');
                  $this->db->set('file_tugas', $new_image);
              } else {
                  $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal di tambahkan, file harus di bawah 5 Mb dengan tipe .docx atau .pdf!</div>');
          redirect('admin/edittugas/'.$id);
              }
          }

          $this->db->set('nama_matkul', $nama_matkul);
           $this->db->set('penjelasan_tugas', $penjelasan_tugas);
                 $this->db->set('tgl_mulai', $tgl_mulai);
              $this->db->set('tgl_terakhir', $tgl_terakhir);
             
                     $this->db->where('id', $id);
          $this->db->update('tugas');

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas telah di Ubah!</div>');
          redirect('admin/edittugas/'.$id);
    }

}

public function datatugas()
{
    $data['title'] = 'Data Tugas';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
$this->load->model('Menu_model', 'menu');
  $data['subnilai'] = $this->menu->getSubTugas();



if ($this->input->post('keyword')) {
$data['subnilai'] = $this->menu->cariDataSiswa();

}
  
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebaradmin', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('admin/datatugas', $data);
    $this->load->view('templates/footer');

}


public function hapustugas($id)
{
    
      
 $data['user'] = $this->db->get_where('user', ['email' =>  $this->session->userdata('email')])->row_array();
 $data['tugas'] = $this->db->get_where('tugas', ['id' => $id])->row_array();
 $data['tugas_user'] = $this->db->get_where('tugas_user', ['tugas_id' => $id])->result_array();
//  var_dump($data['tugas']);die;

 foreach($data['tugas_user'] as $tugas)
 {
    
if ($tugas['file_tugas'] != '') {
    unlink(FCPATH. 'assets/img/file_mahasiswa/'.$tugas['file_tugas'] );
   $this->db->where('tugas_id', $data['tugas']['id']);
   $this->db->where('email', $tugas['email']);
         $this->db->delete('tugas_user');
 }
}

if($data['tugas']['file_tugas'] != '')
{
    unlink(FCPATH. 'assets/img/tugas_dosen/'.$data['tugas']['file_tugas'] );
   $this->db->where('id', $id);
         $this->db->delete('tugas');
}


 

 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas telah dihapus</div>');
 redirect('admin/datatugas');

 
 
}

    public function hapus($email){

      
 $data['user'] = $this->db->get_where('user', ['email' => $email])->row_array();

$gambarimage =  $data['user']['image'];
if ($gambarimage != 'default.jpg') {
   unlink(FCPATH. 'assets/img/profile/'.$gambarimage );
  $this->db->where('email', $email);
        $this->db->delete('user');
}

$data['tugas_user'] =  $this->db->get_where('tugas_user', ['email' => $email])->result_array();

foreach($data['tugas_user'] as $tugas){

if ($tugas['file_tugas'] != '') {
       unlink(FCPATH. 'assets/img/file_mahasiswa/'.$tugas['file_tugas'] );
      $this->db->where('email', $email);
            $this->db->delete('tugas_user');
    }

}

       

         $this->db->where('email', $email);
        $this->db->delete('user');
        

          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data telah dihapus</div>');
            redirect('admin/datamahasiswa');


     }

public function tentukannilai($email,$tugas_id)
{
    $data['title'] = 'Nilai Mahasiswa';
    $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();   
    $data['mahasiswa'] = $this->db->get_where('user', ['email' => $email])->row_array();   
    $data['tugas'] = $this->db->get_where('tugas', ['id' => $tugas_id])->row_array();      
    
$this->load->model('Menu_model', 'menu');
$data['subnilai'] = $this->menu->getSubTentukan($data['mahasiswa']['email'], $data['tugas']['id']);
// var_dump($data['subnilai']);die;

$this->form_validation->set_rules('nilai', 'Tentukan Nilai', 'required');
$this->form_validation->set_rules('email', 'Tentukan Nilai', 'required');

if ($this->form_validation->run() == false) {
    $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tentukannilai', $data);
        $this->load->view('templates/footer');
}else{

    $nilai = $this->input->post('nilai', true);

    
    $this->db->set('nilai', $nilai);
    $this->db->where('email', $email);
    $this->db->where('tugas_id', $tugas_id);
    $this->db->update('tugas_user');
    
    
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Nilai Mahasiswa telah diubah!</div>');
    redirect('admin/nilaimahasiswa');
}



}

     public function nilaimahasiswa()
     {
        $data['title'] = 'Nilai Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();   
        $data['tugas_user'] = $this->db->get('tugas_user')->result_array();

        
$this->load->model('Menu_model', 'menu');
$data['subnilai'] = $this->menu->getSubSemua();




if ($this->input->post('keyword')) {
$data['subnilai'] = $this->menu->cariDataSiswa();

}
     
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/nilaimahasiswa', $data);
        $this->load->view('templates/footer');
     }

 public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebaradmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // cek jika ada gambar yang akan diupload
            $upload_image = $_FILES['image']['name'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']      = '5120';
                $config['upload_path'] = './assets/img/profileadmin/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profileadmin/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal di tambahkan, gambar harus di bawah 5 Mb dengan tipe jpeg atau jpg!</div>');
            redirect('admin/edit');
                }
            }

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!</div>');
            redirect('admin/edit');
        }
    }



   
    

public function editSiswa($email)
{
  $data['title'] = 'Edit Data Siswa';
 $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['siswa'] = $this->db->get_where('user', ['email' => $email])->row_array();
       


       $this->form_validation->set_rules('name', 'Full Name', 'trim');
   

      if ($this->form_validation->run() == false) {
 $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebaradmin', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/editsiswa', $data);
         $this->load->view('templates/footer');   

      }else if(isset($_POST['pribadi'])){
        $name = $this->input->post('name');
            $email = $this->input->post('email');
              $npm = $this->input->post('npm');
              $tanggal =$this->input->post('tanggal');
           $agama =$this->input->post('agama');
              $tempat =$this->input->post('tempat');
              $jenis =$this->input->post('jeniskelamin');
                $hpsiswa = $this->input->post('hpsiswaku');
                    $jurusan = $this->input->post('jurusan');
             $kelas = $this->input->post('kelas');


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
            redirect('admin/editsiswa/'.$email);
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

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Pribadi Mahasiswa telah di Ubah!</div>');
            redirect('admin/editsiswa/'.$email);

      }else if(isset($_POST['change'])){

        $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);


 $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');
 $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Mahasiswa telah diubah!</div>');

            redirect('admin/editsiswa/'.$email."#change");
      }

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
            $this->load->view('templates/sidebaradmin', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!</div>');
                redirect('admin/changepassword');
            } else {
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!</div>');
                    redirect('admin/changepassword');
                } else {
                    // password sudah ok
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password changed!</div>');
                    redirect('admin/changepassword');
                }
            }
        }
    }
   
}
