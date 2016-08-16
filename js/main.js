$("#owl-demo").owlCarousel({
  navigation : false,
  slideSpeed : 300,
  paginationSpeed : 400,
  singleItem : true,
  autoPlay   : true
});

$("#products-highlights").owlCarousel({
  items : 4,
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

var btnFollow = $('#follow');
var btnUnfollow = $('#unfollow');

$( btnFollow ).on({
  click: function(event) {
    event.preventDefault();
    $(btnFollow).addClass('hidden').removeClass('show');
    $(btnUnfollow).addClass('show').removeClass('hidden');
  }
});
