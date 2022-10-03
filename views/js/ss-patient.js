$(".btnMoodGetter").click(function(){
  window.location = "index.php?route=ss-moodgetter";
});
$(".btnKeywords").click(function(){
  window.location = "index.php?route=ss-keywords";
});
$(".btnStress").click(function(){
  window.location = "index.php?route=ss-stress";
});
$(".btnCpActions").click(function(){
  window.location = "index.php?route=ss-actions";
});
$(".btnCpFood").click(function(){
  window.location = "index.php?route=ss-food";
});
$(".btnCpPersonal").click(function(){
  window.location = "index.php?route=ss-personal";
});
$(".btnCpSleep").click(function(){
  window.location = "index.php?route=ss-sleep";
});
$(".btnCpSocial").click(function(){
  window.location = "index.php?route=ss-social";
});
$(".btnEmoticard").click(function(){
  window.location = "index.php?route=emoticard";
});
$(".btnSkip").click(function(){
  window.location = "index.php?route=emoticard";
});

$(".btnNext").click(function(){
  var pageIndex = $(this).attr("pageIndex");

})
$(".btnNewAppt").click(function(){
  window.location = "index.php?route=new-appts";

})

// var datetime = new Date();
// console.log(datetime);
// document.getElementById("time").textContent = datetime;//display in time ID

var date = new Date().toDateString();
console.log(date); // it will represent date in the console of developers tool
document.getElementById("date").textContent = date; //it will print on html page

var time = new Date().toLocaleTimeString();
console.log(time); // it will represent date in the console of developers tool
document.getElementById("time").textContent = time;

$(".btnNext").click(function(){
  var newPage =
  window.location = "index.php?mod=ss&route="+ctrNxtPage();
})

$(".btnPrev").click(function(){
  mdlPrevPage();
  mdlPageRoute();
})
