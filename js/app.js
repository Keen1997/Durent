/*
 * Frontend Logic for application
 *
 */

// In mobile size, when click menu icon in navigator, toggle the menu
let navMobileToggle = function(){
  $('#navMenu').click(function(){
    $('#navMedia').slideToggle("fast",function(){
      // Swap icon between menu and close
      if($('#navMedia').is(':hidden')){
        $("#navMenu").attr("src","./assets/static/menu.png")
      } else {
        $("#navMenu").attr("src","./assets/static/close.png")
      }
    })
  })
  // If toggle is open, when not mobile width screen, remove the toggle
  $(window).resize(function() {
   if ($(window).width() > 768) {
    $('#navMedia').css({
      "display":"none"
    })
   }
 })
}

// In navigator change logo to more black when mouse hover
let navLogoHover = function(){
  $("#navLogo").hover(function() {
    $(this).attr("src","./assets/static/logo_gray.png")
  }, function() {
    $(this).attr("src","./assets/static/logo_white.png")
  }
);
}

// Call the init processes after the window loads
window.onload = function(){
  // In mobile size, when click menu icon in navigator, toggle the menu
  navMobileToggle()
  // In navigator change logo to more black when mouse hover
  navLogoHover()
}
