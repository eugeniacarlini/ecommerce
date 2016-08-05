$("#owl-demo").owlCarousel({
  navigation : false,
  slideSpeed : 300,
  paginationSpeed : 400,
  singleItem : true
});

$('.product-row').jscroll({
    // loadingHtml: '<img src="loading.gif" alt="Loading" /> Loading...',
    // padding: 20,
    nextSelector: 'a#next.jscroll-next:last',
    // contentSelector: 'li',
});

// $('.product-row').infinitescroll({
//   navSelector  : "a#next:last", // selector for the paged navigation (it will be hidden)
//   nextSelector : "a#next:last", // selector for the NEXT link (to page 2)
//   itemSelector : "#body .fila", // selector for all items you'll retrieve
//   loadingImg   : "loading.gif",
//   animate      : true,
//   loadingText  : "",
//   donetext     : "No se han encontrado mas registros...",
//
//   path: function(index) {
//     return "/?pag=" + index;
//   }
// });

// $(window).unbind('.infscr');

// $('a#next').click(function(){
//   $(document).trigger('retrieve.infscr');
//   return false;
// });

// $(document).ajaxError(function(e,xhr,opt){
//   if (xhr.status == 404) {
//     $('a#next').remove();
//   };
// });
