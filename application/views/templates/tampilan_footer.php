
<!-- penutup footer -->

<script src="<?= base_url('assets/'); ?>js/script.js"></script>
    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


    <script type="text/javascript">

  
      $(window).scroll(function(){
        var wScroll = $(this).scrollTop();
    
      $('').css({
        'transform' : 'translate(0px, '+ wScroll/4 +'%)'
      });
    
    
    
      if( wScroll > $('.cara').offset().top-400)
  {
  $('.penggunaan').addClass('bah');
  $('.syarat1').addClass('bah');

  }

  
  if( wScroll > $('.cara').offset().top-300)
  {
$('.ilus2').addClass('bah');


  }

  if( wScroll > $('.aboutt').offset().top-700)
  {
$('.syarat2').addClass('bah');
$('.syarat3').addClass('bah');
$('.syarat4').addClass('bah');

  }

 
  
    });
    </script>



    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>