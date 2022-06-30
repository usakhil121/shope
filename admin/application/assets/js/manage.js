$(document).ready(function() {
    $("#table").DataTable(
      {
        "order": [[ 1, "desc" ]]
      }
    );
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
    $(".select_filter").click(function(){
      $(".open_filters").toggle();
    });
  
    $(document).mouseup(function(e) 
  {
      var container = $(".open_filters");
      if (!container.is(e.target) && container.has(e.target).length === 0) 
      {
          container.hide();
      }
  });
  });