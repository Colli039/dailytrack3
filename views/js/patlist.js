$(".btnPatList").click(function(){
  var idPat = $(this).attr("idPat");
  window.location = "index.php?route=patlist&idPat="+idPat;
})
