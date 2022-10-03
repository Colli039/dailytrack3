<div class="container" style="margin: 80px 0 100px 330px;">

    <h3 class="h-bold title" style="color:#36d3d9;">Rate your current stress level</h3>

    <!-- <form method="post" id="stress" action="ss_stress.php"> -->
    <form method="POST" action="moodgetter" id="stress">

        <div class="container" style="margin: 100px 0 100px -10px;">
        <div class="wow fadeInUp" data-wow-delay="0.2s">

          <div class="button" style="background-color: #90fc93;">
            <input name="stress" type="radio" id="0" value="0" data-toggle="tooltip" 
            data-placement="bottom" title="I am not stressed as of now.    😌😊"/>
            <label class="btn btn-default" for="0">0</label>
          </div>

          <div class="button" style="background-color: #90fc93;">
            <input name="stress" type="radio" id="1" value="1"/>
            <label class="btn btn-default" for="1">1</label>
          </div>

          <div class="button" style="background-color: #a9fc90;">
            <input name="stress" type="radio" id="2" value="2"/>
            <label class="btn btn-default" for="2">2</label>
          </div>

          <div class="button" style="background-color: #c6fc90;">
            <input name="stress" type="radio" id="3" value="3"/>
            <label class="btn btn-default" for="3">3</label>
          </div>

          <div class="button" style="background-color: #e9fc90;">
            <input name="stress" type="radio" id="4" value="4"/>
            <label class="btn btn-default" for="4">4</label>
          </div>

          <div class="button" style="background-color: #f2fc90;">
            <input name="stress" type="radio" id="5" value="5" data-toggle="tooltip" 
            data-placement="bottom" title="Could be worse, could be better."/>
            <label class="btn btn-default" for="5">5</label>
          </div>

          <div class="button" style="background-color: #fcf790;">
            <input name="stress" type="radio" id="6" value="6"/>
            <label class="btn btn-default" for="6">6</label>
          </div>

          <div class="button" style="background-color: #fcea90;">
            <input name="stress" type="radio" id="7" value="7"/>
            <label class="btn btn-default" for="7">7</label>
          </div>

          <div class="button" style="background-color: #fcd190;">
            <input name="stress" type="radio" id="8" value="8"/>
            <label class="btn btn-default" for="8">8</label>
          </div>

          <div class="button" style="background-color: #fc9e79;">
            <input name="stress" type="radio" id="9" value="9"/>
            <label class="btn btn-default" for="9">9</label>
          </div>

          <div class="button" style="background-color: #fc9179;">
            <input name="stress" type="radio" id="10" value="10" data-toggle="tooltip" 
            data-placement="bottom" title="I am very stressed right now! 🤬😭"/>
            <label class="btn btn-default" for="10">10</label>
          </div>

        </div>
      </div>

      <br>

        <section class="bottom_btn_set" style="margin-top: 150px;">
          <?php
          include ("views/partials/steps.php");
          ?>
            <button id="nextbtn" class="btn btn-light btn-circle btnMoodGetter" style="width:60px;height:60px;"><i class="fa fa-arrow-right"></i></button>
        <section>

    </form>



