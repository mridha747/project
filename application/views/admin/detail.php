<?php
function tgl_indo($tanggal){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// variabel pecahkan 2 = tahun
 
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
?>

<div class="container-fluid">

    <!-- Page Heading -->
   
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


<div class="row">
	<div class="col-md-3 col-sm-12">
	<button><img style="width: 200px; height: 300px " src="<?= base_url('assets/img/profile/') . $siswa['image']; ?>"  alt="..." class="img-thumbnail" data-toggle="modal" data-target="#exampleModal"></button>
	</div>

	<div class="col-md-9 col-sm-12">
		<ul class="nav nav-tabs mx-auto" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Biodata Diri</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content" style="color: black">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
  	<table class="table">

    <tr>
      <th>Nama</th>
      <th>:</th>
      <th><?= $siswa['name']; ?></th>
    </tr>

     <tr>
      <th>NPM</th>
      <th>:</th>
      <th><?= $siswa['npm']; ?></th>
    </tr>



    <tr>
      <th>Tempat Tanggal Lahir</th>
      <th>:</th>
      <th><?= $siswa['tpt_lahir'] . ", "  ?> <?php if($siswa['tgl_lahir'] !="0000-00-00")
       {
         echo tgl_indo($siswa['tgl_lahir']);
       }else{
         echo "-";
       } ?></th>
    </tr>

     <tr>
      <th>Jenis Kelamin</th>
      <th>:</th>
      <th><?= $siswa['jeniskelamin'] ?></th>
    </tr>
 <tr>
      <th>Agama</th>
      <th>:</th>
      <th><?= $siswa['agama'] ?></th>
    </tr>

      
      <tr>
      <th>Nomor HP Siswa</th>
      <th>:</th>
      <th><?= $siswa['hp_siswa'] ?></th>
    </tr>


     


     <tr>
      <th>Jurusan</th>
      <th>:</th>
      <th><?= $siswa['jurusan'] ?></th>
    </tr>

     <tr>
      <th>Kelas</th>
      <th>:</th>
      <th><?= $siswa['kelas'] ?></th>
    </tr>
  
</table>
  </div>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-auto"><img style="width: 100%" src="<?= base_url('assets/img/profile/') . $siswa['image']; ?>">
       
      </div>
      <div class="modal-footer">
      
      </div>
    </div>
  </div>
</div>  
	</div>
</div>
</div>
</div>
</div>