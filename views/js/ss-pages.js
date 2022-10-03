// $(".btnMoodGetter").click(function(){
//   window.location = "index.php?mod=ss&route=ss_moodgetter";
// });
// $(".btnKeywords").click(function(){
//   window.location = "index.php?mod=ss&route=ss_keywords";
// });
// $(".btnCpActions").click(function(){
//   window.location = "index.php?mod=ss&route=ss_cp_actions";
// });
// $(".btnCpFood").click(function(){
//   window.location = "index.php?mod=ss&route=ss_cp_food";
// });
// $(".btnCpPersonal").click(function(){
//   window.location = "index.php?mod=ss&route=ss_cp_personal";
// });
// $(".btnCpSleep").click(function(){
//   window.location = "index.php?mod=ss&route=ss_cp_sleep";
// });
// $(".btnCpSocial").click(function(){
//   window.location = "index.php?mod=ss&route=ss_cp_social";
// });
// $(".btnEmoticard").click(function(){
//   window.location = "index.php?mod=ss&route=emoticard";
// });

$(".btnNext").click(function(){
  var newPage =
  window.location = "index.php?mod=ss&route="+ctrNxtPage();
})

$(".btnPrev").click(function(){
  mdlPrevPage();
  mdlPageRoute();
})
