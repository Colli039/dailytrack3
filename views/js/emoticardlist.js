$(".btnEmoticardList").click(function(){
  var idEmote = $(this).attr("idEmote");
  window.location = "index.php?route=emoticardlist&idEmote="+idEmote;
})
