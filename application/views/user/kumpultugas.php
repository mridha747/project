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
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

  <div class="col-lg-6 ">
  <?= $this->session->flashdata('message'); ?>
  </div>

 
<div class="row">


	<div class="col-md-12 col-sm-12 mt-3">
		<ul class="nav nav-tabs mx-auto" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Biodata Diri</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="tugas-tab" data-toggle="tab" href="#tugas" role="tab" aria-controls="tugas" aria-selected="false">Tugas</a>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="home" role="tabpanel" aria-labelledby="home-tab">
  	<table class="table"  style="color: black">


    <tr>
      <th>Nama</th>
      <th>:</th>
      <th><?= $user['name']; ?></th>
    </tr>

     <tr>
      <th>NPM</th>
      <th>:</th>
      <th><?= $user['npm']; ?></th>
    </tr>
     <tr>
      <th>Jurusan</th>
      <th>:</th>
      <th><?= $user['jurusan']; ?></th>
    </tr>
     <tr>
      <th>Kelas</th>
      <th>:</th>
      <th><?= $user['kelas']; ?></th>
    </tr>





    <tr>
      <th>Tempat Tanggal Lahir</th>
      <th>:</th>
      <th><?= $user['tpt_lahir'] . ", " ?> <?php if($user['tgl_lahir'] !="0000-00-00")
       {
         echo tgl_indo($user['tgl_lahir']);
       }else{
         echo "-";
       } ?></th>
    </tr>

     <tr>
      <th>Jenis Kelamin</th>
      <th>:</th>
      <th><?= $user['jeniskelamin'] ?></th>
    </tr>
 <tr>
      <th>Agama</th>
      <th>:</th>
      <th><?= $user['agama'] ?></th>
    </tr>


      <tr>
      <th>Nomor HP Siswa</th>
      <th>:</th>
      <th><?= $user['hp_siswa'] ?></th>
    </tr>


   

  
</table>
  </div>
 
  <div class="tab-pane" id="tugas" role="tabpanel" aria-labelledby="tugas-tab">
  <div class="table-wrapper-scroll-y my-custom-scrollbar">

<table class="table table-bordered table-striped mb-0">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama Matkul </th>
      <th scope="col">Tanggal Mulai</th>
      <th scope="col">Tanggal Terakhir</th>
  
       <th scope="col">Penjelasan</th>
       <th scope="col">Nilai</th>
       <th scope="col">Status</th>
    

          <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $ip = 1 ?>
    <?php foreach($subnilai as $daf) :?>
    <tr>
<td><?= $ip; ?></td>
<td><?= $daf["nama_matkul"]; ?></td>
<td><?= $daf["tgl_mulai"]; ?></td>
  <td><?= $daf["tgl_terakhir"]; ?></td>
  <?php $hai = $this->menu->status($user['email'], $daf['id']);
  $terlambat = $this->menu->statusterlambat($user['email'], $daf['id'], "TERLAMBAT");
  $selesai = $this->menu->statusterlambat($user['email'], $daf['id'], "SELESAI");
  $nilai = $this->menu->statusnilai($user['email'], $daf['id']);
  $banyakterlambat = count($terlambat);
  $banyakselesai = count($selesai);
$banyak = count($hai);?>
 
  <td><?= substr($daf["penjelasan_tugas"], 0,20); ?></td>
  
  
<?php if($banyak == 0):?>
<td>-</td>
<?php endif;?>
<?php if($banyak !=0):?>
<td><?=$hai[0]['nilai']?></td>
<?php endif;?>



<?php if($banyak == 0):?>
<td style="color:blue">BELUM SELESAI</>
<?php endif;?>
<?php if($banyakterlambat == 1):?>
<td style="color:red">TERLAMBAT</td>
<?php endif;?>
<?php if($banyakselesai == 1):?>
<td style="color:green">SELESAI</td>
<?php endif;?>


  <td>
  
  <?php if($banyak == 0):?>
    <a href="<?= base_url('user/antartugas/').$daf['id']; ?>" class="badge badge-success">Antar Tugas</a>
<?php endif;?>

<?php if($banyakterlambat == 1 || $banyakselesai == 1):?>
  <a href="<?= base_url('user/edittugas/').$daf['id']; ?>" class="badge badge-primary">Edit Tugas</a>
<?php endif;?>
                          
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
</div>

</div>
<!-- /.container-fluid -->

</div>


<!-- End of Main Content --> 




