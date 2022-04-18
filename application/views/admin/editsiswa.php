<div class="container-fluid">

    <!-- Page Heading -->
    <style type="text/css">
  label{
    margin-top: 15px;
    font-size: 15px
  }



</style>

    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


<div class="row">


	<div class="col-md-12 col-sm-12">
		<ul class="nav nav-tabs mx-auto" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Biodata Diri</a>
  </li>
   <li class="nav-item">
    <a class="nav-link" id="change-tab" data-toggle="tab" href="#change" role="tab" aria-controls="change" aria-selected="false">Ganti Password</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content" >
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
     <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>
  	<div class="row">
        <div class="col-lg-12">

            <?= form_open_multipart('admin/editsiswa/'.$siswa['email']); ?>

             <div class="form-group row">
                
              
                
                        <div class="col-sm-12 col-md-12 col-lg-12 ">
                            <img style="width: 150px; height: 200px" src="<?= base_url('assets/img/profile/') . $siswa['image']; ?>" class="img-thumbnail mx-auto d-block mt-3">
                        </div>

                        <div class="col-md-4 col-sm-12 col-lg-4 mx-auto">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                        </div>
                   
              
            </div>


<div class="form-group row">
    <div class="col-sm-12">
         <label for="email" class=" col-form-label font-weight-bold">Email</label>
                
                    <input type="text" class="form-control" id="email" name="email" value="<?= $siswa['email']; ?>" readonly>

               
                    
                     <label for="nisn" class=" col-form-label font-weight-bold">Nama Lengkap</label>

                    <input style="color: black"type="text" class="form-control" id="name" name="name" value="<?= $siswa['name']; ?>">
                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>

                     <label for="npm" class=" col-form-label font-weight-bold">NPM</label>
               
                    <input style="color: black" type="text" class="form-control" id="npm" name="npm"  maxlength="10" value="<?= $siswa['npm']; ?>">
                    <?= form_error('npm', '<small class="text-danger pl-3">', '</small>'); ?>


                    <div class="row">
                  <div class="col">
                  <label for="jurusan" class=" col-form-label font-weight-bold">Jurusan</label>
                  <input style="color: black" required type="text" class="form-control" id="jurusan" name="jurusan"  value="<?= $siswa['jurusan']; ?>">
                    <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="col">

                  <label for="kelas" class=" col-form-label font-weight-bold">Kelas</label>
               
               <input style="color: black" required type="text" class="form-control" id="kelas" name="kelas"  value="<?=$siswa['kelas']?> ">
               <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                   

                      <div class="row">
        <div class="col">
                <label for="tempat" class=" col-form-label font-weight-bold">Tempat Lahir</label>
               
                    <input style="color: black" type="text" class="form-control" id="tempat" name="tempat"  value="<?= $siswa['tpt_lahir']; ?>">
                    <?= form_error('tempat', '<small class="text-danger pl-3">', '</small>'); ?>
                
                 </div>
 <div class="col">
                <label for="tanggal" class=" col-form-label font-weight-bold">Tanggal Lahir</label>
               
                    <input  min="2000-01-01" max="<?= date("Y-m-d") ?>" style="color: black" type="date" class="form-control" id="tanggal" name="tanggal"value="<?= $siswa['tgl_lahir']; ?>">
                    <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>
                <small style="color: red">mm(bulan)/dd(tanggal)/yyyy(tahun)</small>
                 </div>
                 </div>



    <label  class="font-weight-bold"> Jenis Kelamin</label><br>

    <div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="jeniskelamin" name="jeniskelamin" class="custom-control-input" value="Laki-Laki" <?php if($siswa['jeniskelamin'] == 'Laki-Laki'){echo "checked";} ?> >
  <label class="custom-control-label" for="jeniskelamin" >Laki-Laki</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="jeniskelamin2" name="jeniskelamin" value="Perempuan" <?php if($siswa['jeniskelamin'] == 'Perempuan'){echo "checked";} ?> class="custom-control-input">
  <label class="custom-control-label" for="jeniskelamin2">Perempuan</label>
</div>

<br>
   
 <label  for="agama" class="font-weight-bold">Agama</label>
    <select  class="form-control" id="agama" name="agama" style="color: black">
       <option value="Pilih" class="font-weight-bold" disabled >Pilih</option>
      <option value="Islam" <?php if($siswa['agama'] == 'Islam'){echo "selected";} ?>>Islam</option>
      <option value="Kristen" <?php if($siswa['agama'] == 'Kristen'){echo "selected";} ?>>Kristen</option>
      <option value="Budha" <?php if($siswa['agama'] == 'Budha'){echo "selected";} ?>>Budha</option>
      <option value="Hindu" <?php if($siswa['agama'] == 'Hindu'){echo "selected";} ?>>Hindu</option>
      <option value="Katholik" <?php if($siswa['agama'] == 'Katholik'){echo "selected";} ?>>Katholik</option>
      <option value="Konghucu" <?php if($siswa['agama'] == 'Konghucu'){echo "selected";} ?>>Konghucu</option>
    </select>


                      <label for="hpsiswa" class=" col-form-label font-weight-bold">Nomor HP Siswa</label>
               
                    <input style="color: black"type="text" class="form-control" id="hpsiswa" name="hpsiswaku" maxlength="13" value="<?= $siswa['hp_siswa']; ?>">
                    <?= form_error('hpsiswaku', '<small class="text-danger pl-3">', '</small>'); ?>




  <button type="submit" name="pribadi" class="btn btn-primary mt-3" style="padding-left: 50px; padding-right: 50px ">Simpan</button>

    </div>
</div>
            

            </form>


        </div>
    </div>

  </div>


  <div class="tab-pane" id="change" role="tabpanel" aria-labelledby="change-tab">
     <div class="row">
        <div class="col-lg-8">
            <?= $this->session->flashdata('message'); ?>
        </div>
    </div>

    <form action="<?= base_url('admin/editsiswa/'.$siswa['email']."#change"); ?>" method="post">
      
      <div class="row">
        <div class="col-md-6 col-sm-12 ">

     <h5 class="mt-3">Ganti Password Siswa <small style="color: red">(Jangan disimpan, jika tidak dirubah!!)</small></h5>
    

          
 <label for="password" class="col-form-label font-weight-bold">Password</label>
                     
                    <input style="color: black" type="text" class="form-control" id="password" name="password" value="<?= $siswa['password']; ?>">
                    <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
        </div>
      </div>

      <div class="container">
   <button type="submit" name="change" class=" btn-lg btn-block btn btn-primary mt-5" style="padding-left: 50px; padding-right: 50px ">Simpan</button>

</div>
</form>

  </div>
	</div>
</div>
</div>
</div>