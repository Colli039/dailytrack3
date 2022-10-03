
// $(".home-selection").on("click", "div .btnSteppingStones", function(){
//   window.location = "index.php?route=/stepping-stones/ss_moodgetter";
//   // var idPet = $(this).attr("idPet");
//   // window.location = "index.php?route=petedit&idPet="+idPet;
// })
$(".home-selection").on("click", ".btnProfile", function(){
  window.location = "index.php?route=ru-profile";
})

$(".btnSteppingStones").click(function(){
  window.location = "index.php?route=ss-stress";
});

$(".btnJournal").click(function(){
  window.location = "index.php?route=journal";
});

$(".home-selection").on("click", ".btnAppt", function(){
  window.location = "index.php?route=pat-appts";
})

// $(".home-selection").on("click", "div .btnSteppingStones", function(){
//   window.location = "index.php?route=/stepping-stones/ss_moodgetter";
// })
