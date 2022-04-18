<!-- Begin Page Content -->
<style type="text/css">
  label{
    margin-top: 13px;
    font-size: 15px
  }



</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h4 mb-4 text-gray-800"><?= $title; ?></h1>


 <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12">

            <p>Nama Mata kuliah : <?=$tugas['nama_matkul']?></p>
            <p>Batas Waktu : <?php date_default_timezone_set('Asia/Jakarta'); $dt_terakhir = date_create($tugas['tgl_terakhir']);  // Minimum limit
$dt_terakhir= $dt_terakhir->format('d-M-Y H:i:s'); echo $dt_terakhir ?></p>
            <p>Penjelasan : <?= $tugas['penjelasan_tugas']?></p>
            <p>File Tugas</p>
    
<a href="<?= base_url('assets/img/tugas_dosen/').$tugas['file_tugas']?>" download>Download File Tugas</a>
           <br><br>


            <?= form_open_multipart('user/edittugas/'.$tugas['id']); ?>
            <h3>Kumpul Tugas</h3>
            
            <input  type="text" class="form-control text-dark" id="email" name="email" value="<?= $user['email']; ?>" readonly hidden>
          
            
<a href="<?= base_url('assets/img/file_mahasiswa/').$tugas_user['file_tugas']?>" download>Download Tugas Mahasiswa</a>

            <div class="custom-file">
    <input type="file"  class=" mx-auto d-block custom-file-input" id="file_tugas" name="file_tugas">
  <label class="custom-file-label" for="file_tugas">Choose file</label>

<p class="mt-4" style="color: red; font-size: 10px">Gunakan File .docx atau .pdf, maximal 5 Mb</p>
                           
                            </div>


  <button type="submit" class="btn btn-primary mt-3" style="padding-left: 50px; padding-right: 50px ">Antar Tugas</button>
            </form>

        

</div>
</div>
<!-- /.container-fluid -->

</div>
