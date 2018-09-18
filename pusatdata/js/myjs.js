$(document).ready(function () {

    let result = $("#sidebar ul li a[href$='"+document.location.search+"'");
    if(result.text()){
      result.addClass('active');
    }else{
      $("#sidebar ul li:first-child a").addClass('active');
    }


    // if((dokopen.origin + dokopen.pathname) == )

    $('#table-lihat').DataTable({
      "width" : false,
    });

    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });


});
