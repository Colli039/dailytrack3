$(document).ready(function () {
    $(".Send_data").click(function (e) {
      if ($("input[type=radio][name=item]:checked").length == 0) {
        // alert("Please select atleast one");
        return false;
      } else {
        var item = $("input[type=radio][name=item]:checked").val();
        //  window.alert("You Selected")
  
        window.setTimeout(function () {
          // do whatever you want to do
          $("#loading").html("You Selected : " + item);
        }, 600);
  
        $("#loading").html(
          '<br><span class="spinner-border fast"  style="width: 2rem; height: 2rem;color:blue;"  role="status"></span>'
        );
      }
    });
  });

  //<div id="loading" style="color:rgb(157, 255, 0)"> 
  //put this for indication of Moodgetter