$(document).ready(function () {

    $('#table-lihat').DataTable({
      "width" : false,
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });

    // Pengaturan ajax pada sidebar
    $("#sidebar li a").on('click', function(){
      
      $("#sidebar li a").removeClass('active');
      $(this).toggleClass('active');

      let href = $(this).attr('href');
      let halaman = $(this).attr('title');
      if(href != ''){
          $('#ajaxContent').load(halaman+'.php');
      }

    });

});
