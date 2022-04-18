<style type="text/css">
	.my-custom-scrollbar {
position: relative;
height: 1200px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>
 <div class="col-lg-6">
            <?= $this->session->flashdata('message'); ?>
          </div>

<div class="row">
  <div class="col-md-7 col-sm-12">
     <form action="" method="post">
    <div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Cari mahasiswa..." name="keyword" >
  <div class="input-group-append">
    <button class="btn btn-primary" type="submit" >Cari</button>
  </div>
</div>
</form>
  </div>


 


</div>


<div class="col-md-12">
	<div class="table-wrapper-scroll-y my-custom-scrollbar">

  <table class="table table-bordered table-striped mb-0">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Matkul</th>
        <th scope="col">Tgl Mulai</th>
        <th scope="col">Tgl Terakhir</th>
    
         <th scope="col">Jurusan</th>
       
         <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php if (empty($subnilai)) : ?>
<div class="alert alert-danger" role="alert">
Data Siswa tidak ditemukan
</div>
<?php endif; ?>
    	<?php $ip = 1 ?>
    	<?php foreach($subnilai as $daf) :?>
      <tr>
<td><?= $ip; ?></td>
 <td><?= $daf["npm"]; ?></td>
 <td><?= $daf["name"]; ?></td>
		<td><?= $daf["email"]; ?></td>
		<td><?= $daf["jeniskelamin"]; ?></td>
		<td><?= $daf["jurusan"]; ?></td>
		<td>
		 	  <a href="<?= base_url(); ?>admin/detail/<?= $daf['email'] ?>" class="badge badge-primary">detail</a>
                            <a href="<?= base_url(); ?>admin/editsiswa/<?= $daf['email'] ?>" class="badge badge-success">edit</a>
                            <a onclick="return confirm('Apakah Kamu Yakin ?')" href="<?= base_url(); ?>admin/hapus/<?= $daf['email'] ?>"  class="badge badge-danger">delete</a>
                        </td>
	
      </tr>

      <?php $ip++; ?>
  <?php endforeach; ?>
 
    </tbody>
  </table>

</div>
</div>
</div>

</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah Kamu Yakin ?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        <button type="submit" class="btn btn-primary">Ya</button>
      </div>
    </div>
  </div>
</div>