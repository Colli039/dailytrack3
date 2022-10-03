<div style="text-align:right;margin-top:30px;">
<span id="date"> </span><br>
<span id="time"> </span>
</div>
<div class="ss-container">
  <div class="container" style=" display: inline-block; margin-left: 300px;">

    <h3 class="h-bold title" style="color:#36d3d9;">How do you feel today, <?php echo "Jane" ?>?</h3>
    <p class="h-xlight title" style="color:#a3a3a3;">Pick one (1) from below</p>

    <form method="POST" id="moodgetter" action="keywords">

      <div style=" color:white;align-items:center;" class="moodgetter">

      <input type="radio" id="terrible" name="item" class="Send_data  input-hidden" value=0/>
      <label for="terrible">
        <img src="views/assets/img/terrible_kids.png" alt="Terrible" />
        <br><br>
        <span>Terrible</span>
      </label>

      <input type="radio" id="bad" name="item" class="Send_data  input-hidden" value=1 />
      <label for="bad">
        <img src="views/assets/img/bad_kids.png" alt="Bad" />
        <br><br>
        <span>Bad</span>
      </label>

      <input type="radio" id="okay" name="item" class="Send_data  input-hidden" value=2 />
      <label for="okay">
        <img src="views/assets/img/okay_kids.png" alt="Okay"/>
        <br><br>
        <span>Okay</span>
      </label>

      <input type="radio" id="good" name="item" class="Send_data  input-hidden" value=3 />
      <label for="good">
        <img src="views/assets/img/good_kids.png" alt="Good" />
        <br><br>
        <span>Plumber</span>
      </label>

      <input type="radio" id="awesome" name="item" class="Send_data  input-hidden" value=4 />
      <label for="awesome">
        <img src="views/assets/img/awesome.png" alt="Awesome" />
        <br><br>
        <span>Plumber</span>
      </label>

  </div>

        <section class="bottom_btn_set" >
          <button type="button" onclick="history.go(-1)" id="prevBbtn" class="btn btn-light btn-circle btn-xl btnSteppingStones"><i class="fa fa-arrow-left"></i></button>

          <?php
          include ("views/partials/steps.php");
          ?>
            <button id="nextbtn" class="btn btn-light btn-circle btn-xl " style="width:60px;height:60px;"><i class="fa fa-arrow-right"></i></button>
        <section>

    </form>


</div>

</div>
