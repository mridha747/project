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

            <?= form_open_multipart('admin/edittugas/'.$tugas['id']); ?>

             <div class="form-group row">
                
                <div class="col-sm-12 col-md-12 col-lg-12 ">
                
                        
                         
            

<div class="form-group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
       

                     <label for="nama_matkul" class="col-form-label font-weight-bold">Nama Mata Kuliah</label>

                    <input required type="text" style="color: black" class="form-control" id="nama_matkul" name="nama_matkul" value="<?= $tugas['nama_matkul']?>">

                    <?= form_error('nama_matkul', '<small class="text-danger pl-3">', '</small>'); ?>


                    <div class="form-group">
    <label for="penejelasan_tugas" class=" col-form-label font-weight-bold">Penjelasan Tugas</label>
    <textarea class="form-control"   name="penjelasan_tugas" id="penjelasan_tugas" rows="5"><?= $tugas['penjelasan_tugas']?></textarea>
    <?= form_error('penjelasan_tugas', '<small class="text-danger pl-3">', '</small>'); ?>
  </div>
                   
                     
               
                <div class="row">
                  <div class="col">
                  <label for="tgl_mulai" class=" col-form-label font-weight-bold">Tanggal & Jam Mulai</label>
                  <input style="color: black"  required type="datetime-local" class="form-control" id="tgl_mulai" name="tgl_mulai" value="<?php $dt_mulai = date_create($tugas['tgl_mulai']);  // Minimum limit
$dt_mulai= $dt_mulai->format('Y-m-d\TH:i:s'); echo $dt_mulai?>" >
                    <?= form_error('tgl_mulai', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="col">

                  <label for="tgl_terakhir" class=" col-form-label font-weight-bold">Tanggal & Jam Terakhir</label>
               
               <input style="color: black" required value="<?php $dt_terakhir = date_create($tugas['tgl_terakhir']);  // Minimum limit
$dt_terakhir= $dt_terakhir->format('Y-m-d\TH:i:s'); echo $dt_terakhir ?>" type="datetime-local" class="form-control" id="tgl_terakhir" name="tgl_terakhir" >
               <?= form_error('tgl_terakhir', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                   <br>

                    
                <object class="mx-auto d-block" data="<?= base_url('assets/img/tugas_dosen/'). $tugas['file_tugas']?>" width="100%" height="100%"></object>
                    <br>

    <label  class="font-weight-bold"> File Tugas</label><br>
   
    <div class="custom-file">
    <input type="file"  class=" mx-auto d-block custom-file-input" id="file_tugas" name="file_tugas">
  <label class="custom-file-label" for="file_tugas">Choose file</label>

<p class="mt-4" style="color: red; font-size: 10px">Gunakan File .docx atau .pdf, maximal 5 Mb</p>
                           
                            </div>


  <button type="submit" class="btn btn-primary mt-3" style="padding-left: 50px; padding-right: 50px ">Simpan Tugas</button>

    </div>
</div>

            </form>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
