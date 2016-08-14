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
  style: 'btn-info',
  size: 4
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
