<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<!DOCTYPE html>
<html lang="en">
    <head>
        <style type="text/css">

/******************* Timeline Demo - 8 *****************/
.main-timeline8{overflow:hidden;position:relative}
.main-timeline8:after,.main-timeline8:before{content:"";display:block;width:100%;clear:both}
.main-timeline8:before{content:"";width:3px;height:100%;background:#d6d5d5;position:absolute;top:30px;left:50%}
.main-timeline8 .timeline{width:50%;float:left;padding-right:30px;position:relative}
.main-timeline8 .timeline-icon{width:32px;height:32px;border-radius:50%;background:#fff;border:3px solid #fe6847;position:absolute;top:5.5%;right:-17.5px}
.main-timeline8 .year{display:block;padding:10px;margin:0;font-size:30px;color:#fff;border-radius:0 50px 50px 0;background:#fe6847;text-align:center;position:relative}
.main-timeline8 .year:before{content:"";border-top:35px solid #f59c8b;border-left:35px solid transparent;position:absolute;bottom:-35px;left:0}
.main-timeline8 .timeline-content{padding:30px 20px;margin:0 45px 0 35px;background:#f2f2f2}
.main-timeline8 .title{font-size:19px;font-weight:700;color:#504f54;margin:0 0 10px}
.main-timeline8 .description{font-size:14px;color:#7d7b7b;margin:0}
.main-timeline8 .timeline:nth-child(2n){padding:0 0 0 30px}
.main-timeline8 .timeline:nth-child(2n) .timeline-icon{right:auto;left:-14.5px}
.main-timeline8 .timeline:nth-child(2n) .year{border-radius:50px 0 0 50px;background:#7eda99}
.main-timeline8 .timeline:nth-child(2n) .year:before{border-left:none;border-right:35px solid transparent;left:auto;right:0}
.main-timeline8 .timeline:nth-child(2n) .timeline-content{text-align:right;margin:0 35px 0 45px}
.main-timeline8 .timeline:nth-child(2){margin-top:170px}
.main-timeline8 .timeline:nth-child(odd){margin:-175px 0 0}
.main-timeline8 .timeline:nth-child(even){margin-bottom:80px}
.main-timeline8 .timeline:first-child,.main-timeline8 .timeline:last-child:nth-child(even){margin:0}
.main-timeline8 .timeline:nth-child(2n) .timeline-icon{border-color:#7eda99}
.main-timeline8 .timeline:nth-child(2n) .year:before{border-top-color:#92efad}
.main-timeline8 .timeline:nth-child(3n) .timeline-icon{border-color:#8a5ec1}
.main-timeline8 .timeline:nth-child(3n) .year{background:#8a5ec1}
.main-timeline8 .timeline:nth-child(3n) .year:before{border-top-color:#a381cf}
.main-timeline8 .timeline:nth-child(4n) .timeline-icon{border-color:#f98d9c}
.main-timeline8 .timeline:nth-child(4n) .year{background:#f98d9c}
.main-timeline8 .timeline:nth-child(4n) .year:before{border-top-color:#f2aab3}
@media only screen and (max-width:767px){.main-timeline8{overflow:visible}
.main-timeline8:before{top:0;left:0}
.main-timeline8 .timeline:nth-child(2),.main-timeline8 .timeline:nth-child(even),.main-timeline8 .timeline:nth-child(odd){margin:0}
.main-timeline8 .timeline{width:100%;float:none;padding:0 0 0 30px;margin-bottom:20px!important}
.main-timeline8 .timeline:last-child{margin:0!important}
.main-timeline8 .timeline-icon{right:auto;left:-14.5px}
.main-timeline8 .year{border-radius:50px 0 0 50px}
.main-timeline8 .year:before{border-left:none;border-right:35px solid transparent;left:auto;right:0}
.main-timeline8 .timeline-content{margin:0 35px 0 45px}

}



</style>
      
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    </head>
    <body>
      
        <div class="container" >

            <div class="row">
                <div class="col-md-12">
                    <div class="main-timeline8">
                        <div class="timeline">
                            <span class="timeline-icon"></span>
                            <span class="year" style="font-size: 25px">Informasi Akun</span>
                            <div class="timeline-content">
                                <h3 class="title">Selamat Datang di LEARNSTMIK</h3>
                                <p class="description">Kamu login sebagai <span style="font-size: 18px; color: #fe6847; font-weight: bold;"><?= $user['name'] ?></span>
                                </p>
                            </div>
                        </div>
                        <div class="timeline">
                            <span class="timeline-icon"></span>
                            <span class="year" style="font-size: 25px">Petunjuk Pengisian</span>
                            <div class="timeline-content">
                                <h3 class="title text-left">Cara Pengisian</h3>
                                <p class="description" style="text-align: justify;">
 1.Klik menu <b>Data Pribadi</b> terlebih dahulu<br>
2. Isi <b>Biodata</b> anda didalamnya<br> 
3.Isikan semua data dengan <b>benar</b> dan <b>jujur</b> dan klik <b>simpan</b> <br>
4. Klik Menu <b>Kumpul Tugas </b> <br>
5. Anda bisa mengklik menu <b>Tugas </b> pada tampilan didadalmnya <br>
6. Pada tampilan tersebut anda bisa klik button <b>Edit Tugas</b> dan mengupload tugas yang diberikan</p>
                            </div>
                        </div>
                        <div class="timeline">
                            <span class="timeline-icon"></span>
                            <span class="year" style="font-size: 25px">Nomor Kontak Laboran</span>
                            <div class="timeline-content">
                                <h3 class="title">Kontak yang bisa dihubungi : </h3>
                                <p class="description">
                                    <span ><li class="fas fa-phone" style="color: green"></li> Muhammad Rakha</span> 082260230323<br>
                                <span><li class="fas fa-phone" style="color: green"></li> Andrian Wahyu</span> 085265910237<br>
                                 <span ><li class="fas fa-phone" style="color: green"></li> Muhammad Ridha</span> 08126854591<br>
                                    <span><li class="fas fa-phone" style="color: green"></li> Wira Satria Putra</span> 081365545556
                                </p>
                            </div>
                        </div>
                    
                    </div>
                </div>
            </div>
        </div>
 
        
      
    </body>
</html>