$("#owl-demo").owlCarousel({
  navigation : false,
  slideSpeed : 300,
  paginationSpeed : 400,
  singleItem : true,
  autoPlay   : true,
  transitionStyle : "fade"
});

$("#products-highlights").owlCarousel({
  items : 4,
  lazyLoad : true,
  navigation : true,
  pagination: false,
});

$("#products-user").owlCarousel({
  items : 3,
  lazyLoad : true,
  navigation : true,
  pagination: false
});

$('.selectpicker').selectpicker({
  style: 'btn-default',
  size: 8,
  liveSearch: true
});

$("[data-toggle=popover]").popover({
  html : true,
  content: function() {
    var content = $(this).attr("data-popover-content");
    return $(content).children(".popover-body").html();
  },
  title: function() {
    var title = $(this).attr("data-popover-content");
    return $(title).children(".popover-heading").html();
  }
});

$('[data-toggle="tooltip"]').tooltip();

// var btnFollow = $('#follow');
// var btnUnfollow = $('#unfollow');
//
// $( btnFollow ).on({
//   click: function(event) {
//     event.preventDefault();
//     $(btnFollow).addClass('hidden').removeClass('show');
//     $(btnUnfollow).addClass('show').removeClass('hidden');
//   }
// });

// var lastIndex = localStorage.getItem('lastindex');
//
//
// if (lastIndex == null){
//   $("#perfil, #publicaciones, #editar-perfil").not(":first").hide();
// } else {
//   lastIndex = parseInt(lastIndex) + 1;
//   $(".tab-pane").children().not(".tab-content:nth-child("+lastIndex+")").hide();
//   $('ul.nav-pills li').removeClass('active');
//   $('ul.nav-pills li:nth-child('+lastIndex+')').addClass('active');
// }
//
// $(document).on("click", "ul.nav-pills li", function(){
//   var i = $(this).index();
//   localStorage.setItem("lastindex", i);
//   // add/remove active class
//   $("ul.nav-pills li").removeClass("active");
//   $(this).addClass("active")
//   // hide/show content
//   $("div.tab-pane .one").hide();
//   $("div.tab-pane .one:eq( "+ i +")").show();
//
// })
