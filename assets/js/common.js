
$(document).ready(function() {
  $("#table,#table1").DataTable();
});
$(document).ready(function(){
  $(".open_dropdown").click(function(){
    $(".dropdown_panel").toggle();
  });

  $(document).mouseup(function(e) 
{
    var container = $(".dropdown_panel");
    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        container.hide();
    }
});
});
$(document).ready(function(){
  $(".big_menu").click(function(){
    $(".big_menu_panel").toggleClass('openbm');
  });
});
$('.dashboard_toggle i').on('click', function () {
  $('.left_panel').toggle();
  $('.right_panel').toggleClass('fullwidth');
});
$('.open_nav_toggle').on('click', function () {
  $('.nav.flex-column').toggle();
});
