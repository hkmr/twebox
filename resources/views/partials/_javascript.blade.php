<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/lightbox.min.js"></script>
<script type="text/javascript" src="/js/wow.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script> 
<script type="text/javascript" src="/js/page-loader-min.js"></script> 
<script type="text/javascript" src="/js/notify.js"></script> 
<script type="text/javascript" src="/js/readingTime.js"></script> 
<script type="text/javascript" src="/js/tag-extract.min.js"></script> 


<!-- javascript plugin for responsive grid layout -->
    <script src="/js/masonry.pkgd.min.js"></script>
    <script src="/js/imagesloaded.pkgd.min.js"></script>


<script type="text/javascript">

// responsive grid script

var $grid = $('.grid').masonry({
  itemSelector : '.grid-item',
  columnWidth  : 30
});

// var $grid = $('.grid').imagesLoaded( function() {
//   // init Masonry after all images have loaded
//   $grid.masonry({
//     itemSelector : '.grid-item',
//   columnWidth  : 30
//   });
// });

$grid.imagesLoaded().progress( function() {
  $grid.masonry('layout');
});


// script for login page
$(".email-signup").hide();
$("#signup-box-link").click(function(){
  $(".email-login").fadeOut(100);
  $(".email-signup").delay(100).fadeIn(100);
  $("#login-box-link").removeClass("active");
  $("#signup-box-link").addClass("active");
});
$("#login-box-link").click(function(){
  $(".email-login").delay(100).fadeIn(100);;
  $(".email-signup").fadeOut(100);
  $("#login-box-link").addClass("active");
  $("#signup-box-link").removeClass("active");
});

// reading time initialize
$('article').readingTime();

// auto tagging initialize
$('article').tagExtract({
  max: 4,
  min: 2,
  target: 'tags-container',
  clusters: ['label-primary', 'label-info', 'label-warning', 'label-danger']
});




</script>