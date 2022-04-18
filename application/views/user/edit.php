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

            <?= form_open_multipart('user/edit'); ?>

             <div class="form-group row">
                
                <div class="col-sm-12 col-md-12 col-lg-12 ">
                
                        
                            <img style="width: 150px; height: 200px" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail mx-auto d-block">
                        </div>
                        <div class="col-md-4 col-sm-12 col-lg-4 mx-auto">
                          
                            <div class="custom-file mt-3">
                                <input type="file"  class=" mx-auto d-block custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose file</label>

                                <p class="mt-4" style="color: red; font-size: 10px">Gunkan Foto berwarna terbaru ukuran 3x4 Max 2 MB, dan tipe jpeg atau jpg </p>
                           
                            </div>
                        </div>
                    </div>
                
            

<div class="form-group row">
    <div class="col-sm-12 col-md-12 col-lg-12">
         <label for="email" class=" col-form-label font-weight-bold">Email</label>
                
                    <input  type="text" class="form-control text-dark" id="email" name="email" value="<?= $user['email']; ?>" readonly>

                     <label for="name" class="col-form-label font-weight-bold">Nama Lengkap</label>

                    <input required type="text" style="color: black" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">

                    <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>

                     <label for="npm" class=" col-form-label font-weight-bold">Nomor Pokok Mahasiswa (NPM)</label>
               
                    <input style="color: black" required type="text" class="form-control" id="npm" name="npm"  maxlength="10"  minlength="10"value="<?= $user['npm']; ?>">
                    <?= form_error('npm', '<small class="text-danger pl-3">', '</small>'); ?>

                     
               
                <div class="row">
                  <div class="col">
                  <label for="jurusan" class=" col-form-label font-weight-bold">Jurusan</label>
                  <input style="color: black" required type="text" class="form-control" id="jurusan" name="jurusan"  value="<?= $user['jurusan']; ?>">
                    <?= form_error('jurusan', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>

                  <div class="col">

                  <label for="kelas" class=" col-form-label font-weight-bold">Kelas</label>
               
               <input style="color: black" required type="text" class="form-control" id="kelas" name="kelas"  value="<?= $user['kelas']?>">
               <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                  </div>
                </div>
                   

                    

                      <div class="row">
        <div class="col">
                <label for="tempat" class=" col-form-label font-weight-bold">Tempat Lahir</label>
               
                    <input  style="color: black" required type="text" class="form-control" id="tempat" name="tempat"  value="<?= $user['tpt_lahir']; ?>">
                    <?= form_error('tempat', '<small class="text-danger pl-3">', '</small>'); ?>


                
                 </div>
 <div class="col">
                <label for="tanggal" class=" col-form-label font-weight-bold ">Tanggal Lahir<span style="color: #808080">(bln/tgl/thn)</span></label>
                <script type="text/javascript">
	$(function(){
	  $("#selector").datepicker({
		 dateFormat:"dd-mm-yy",
	  });
	});
</script>
                    <input  style="color: black" min="2000-01-01" max="<?= date("Y-m-d") ?>" required type="date" id="selector" class="form-control" id="tanggal"  name="tanggal" value="<?= $user['tgl_lahir']; ?>" >


                    <?= form_error('tanggal', '<small class="text-danger pl-3">', '</small>'); ?>

                 </div>
                 </div>



    <label  class="font-weight-bold"> Jenis Kelamin</label><br>

    <div class="custom-control custom-radio custom-control-inline">
  <input style="color: black" required type="radio" id="jeniskelamin" name="jeniskelamin" class="custom-control-input" value="Laki-Laki" <?php if($user['jeniskelamin'] == 'Laki-Laki'){echo "checked";} ?> >
  <label class="custom-control-label" for="jeniskelamin" >Laki-Laki</label>
</div>
<div class="custom-control custom-radio custom-control-inline">
  <input type="radio" id="jeniskelamin2" name="jeniskelamin" value="Perempuan" <?php if($user['jeniskelamin'] == 'Perempuan'){echo "checked";} ?> class="custom-control-input">
  <label class="custom-control-label" for="jeniskelamin2">Perempuan</label>
</div>

<br>
   
 <label  for="agama" class="font-weight-bold">Agama</label>
    <select  class="form-control" id="agama" name="agama" style="color: black">
       <option value="Pilih" class="font-weight-bold" disabled >Pilih</option>
      <option value="Islam" <?php if($user['agama'] == 'Islam'){echo "selected";} ?>>Islam</option>
      <option value="Kristen" <?php if($user['agama'] == 'Kristen'){echo "selected";} ?>>Kristen</option>
      <option value="Budha" <?php if($user['agama'] == 'Budha'){echo "selected";} ?>>Budha</option>
      <option value="Hindu" <?php if($user['agama'] == 'Hindu'){echo "selected";} ?>>Hindu</option>
      <option value="Katholik" <?php if($user['agama'] == 'Katholik'){echo "selected";} ?>>Katholik</option>
      <option value="Konghucu" <?php if($user['agama'] == 'Konghucu'){echo "selected";} ?>>Konghucu</option>
    </select>


                      <label  for="hpsiswa" class=" col-form-label font-weight-bold">Nomor HP Siswa</label>
               
                    <input style="color: black" required type="text" class="form-control" id="hpsiswa" name="hpsiswaku" maxlength="13" value="<?= $user['hp_siswa']; ?>">
                    <?= form_error('hpsiswaku', '<small class="text-danger pl-3">', '</small>'); ?>

                 
               





  <button type="submit" class="btn btn-primary mt-3" style="padding-left: 50px; padding-right: 50px ">Simpan</button>

    </div>
</div>

         

            


           

         

           

       

         


            

            

            </form>


        </div>
    </div>



</div>
<!-- /.container-fluid -->

</div>
