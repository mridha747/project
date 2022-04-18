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

            <p>Nama Mata kuliah : <?=$subnilai['nama_matkul']?></p>
            <p>Batas Waktu : <?php date_default_timezone_set('Asia/Jakarta'); $dt_terakhir = date_create($subnilai['tgl_terakhir']);  // Minimum limit
$dt_terakhir= $dt_terakhir->format('d-M-Y H:i:s'); echo $dt_terakhir ?></p>
            <p>Penjelasan : <?= $subnilai['penjelasan_tugas']?></p>
            <p>File Tugas</p>
    
<a href="<?= base_url('assets/img/tugas_dosen/').$subnilai['file_tugas']?>" download>Download File Tugas</a>
           <br><br>


            <form method="post" action="<?= base_url('admin/tentukannilai/').$subnilai['email']."/".$subnilai['id']?>">
            <h3>Tugas Mahasiswa</h3>
            
            <input  type="text" class="form-control text-dark" id="email" name="email" value="<?= $subnilai['email']; ?>" readonly hidden   >

            <a href="<?= base_url('assets/img/file_mahasiswa/').$subnilai['file_tugas']?>" download>Download Tugas Mahasiswa</a><br><br>
            
            <object class="mx-auto d-block" data="<?= base_url('assets/img/file_mahasiswa/'). $subnilai['file_tugas']?>" width="100%" height="500"></object>


             
            <label for="nilai" class="col-form-label font-weight-bold">Nilai</label>

<input required type="text" style="color: black" class="form-control" placeholder="0-100" id="nilai" name="nilai" value="<?= $subnilai['nilai'] ?>">

  <button type="submit" class="btn btn-primary mt-3" style="padding-left: 50px; padding-right: 50px ">Antar Tugas</button>
  
            </form>

        

</div>
</div>
<!-- /.container-fluid -->

</div>
