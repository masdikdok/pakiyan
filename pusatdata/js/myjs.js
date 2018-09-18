$(document).ready(function () {

    let href = document.location.href;
    let halaman = href.replace(document.location.origin+document.location.pathname, '');
    let result = $("#sidebar ul li a[href$='"+halaman+"'");
    if(result.text()){
      $("#sidebar ul li a").removeClass('active');
      result.addClass('active');
    }

    // if((dokopen.origin + dokopen.pathname) == )

    $('#table-lihat').DataTable({
      "width" : false,
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });


});
