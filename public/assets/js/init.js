(function($){
  $(function(){

    $('.sidenav').sidenav();
    $('select').formSelect();

  }); // end of document ready
})(jQuery); // end of jQuery name space

// https://materializeweb.com/dropdown.html

document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.dropdown-trigger');
    var instances = M.Dropdown.init(elems, {
      // specify options here
    });
  });
        