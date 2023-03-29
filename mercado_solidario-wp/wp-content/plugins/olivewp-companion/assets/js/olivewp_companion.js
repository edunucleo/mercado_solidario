function olivewp_companion_opentab(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
(function ($) {
$(document).ready(function(){
  var url_string = window.location.href
  var url = new URL(url_string);
  var c = url.searchParams.get("action1");
  if(c=='deactivate'){
    $('#trending-posts-tab').show();
  }
  else{
    $('#trending-posts-tab').hide();
  }
  });
})(jQuery);