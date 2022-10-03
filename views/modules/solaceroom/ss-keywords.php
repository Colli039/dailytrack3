<form method="POST" class="container" action="personal" style="margin: 55px 0 0 325px;">

    <h3 class="h-bold title" style="color:#36d3d9;">Related Words for Your Mood</h3>
    <p class="h-xlight title" style="color:#a3a3a3;">Pick at least 1 item from below. Maximum of 5 choices is allowed.</p>

  <div class="wow fadeInUp" data-wow-delay="0.2s">

  <div class="buttonhug">

    <section class="categories">

        <div class="cat sadness">
        <label>
            <input type="checkbox" id="annoyance" name="anger[]" value="1"><span>Annoyance</span>
        </label>
      </div>
      <div class="cat sadness">
        <label>
          <input type="checkbox" id="anger" name="anger[]" value="2"><span >Anger</span>
        </label>
      </div>
      <div class="cat sadness">
        <label>
            <input type="checkbox" id="annoyance" name="anger[]" value="3"><span >Rage</span>
        </label>
      </div>

    </section>

    <section class="categories">

        <div class="cat sadness">
        <label>
            <input type="checkbox" id="interest" name="anticipation[]" value="1"><span>Interest</span>
        </label>
      </div>
      <div class="cat sadness">
        <label>
          <input type="checkbox" id="anticipation" name="anticipation[]" value="2"><span>Anticipation</span>
        </label>
      </div>
      <div class="cat sadness">
        <label>
            <input type="checkbox" id="vigilance" name="anticipation[]" value="3"><span>Vigilance</span>
        </label>
      </div>
    </section>

    <section class="categories">

        <div class="cat sadness">
        <label>
            <input type="checkbox" id="serenity" name="joy[]" value="1"><span>Serenity</span>
        </label>
      </div>
      <div class="cat sadness">
        <label>
          <input type="checkbox" id="joy" name="joy[]" value="2"><span>Joy</span>
        </label>
      </div>
      <div class="cat sadness">
        <label>
            <input type="checkbox" id="ecstacy" name="joy[]" value="3"><span>Ecstacy</span>
        </label>
      </div>
    </section>

    <section class="categories">

        <div class="cat sadness">
        <label>
            <input type="checkbox" id="acceptance" name="trust[]" value="1"><span>Acceptance</span>
        </label>
      </div>
      <div class="cat sadness">
        <label>
          <input type="checkbox" id="trust" name="trust[]" value="2"><span>Trust</span>
        </label>
      </div>
      <div class="cat sadness">
        <label>
            <input type="checkbox" id="admiration" name="trust[]" value="3"><span>Admiration</span>
        </label>
      </div>
    </section>

    <section class="categories">

        <div class="cat sadness">
        <label>
            <input type="checkbox" id="apprehension" name="fear[]" value="1"><span>Apprehension</span>
        </label>
        </div>
        <div class="cat sadness">
          <label>
            <input type="checkbox" id="fear" name="fear[]" value="2"><span>Fear</span>
          </label>
        </div>
        <div class="cat sadness">
          <label>
              <input type="checkbox" id="terror" name="fear[]" value="3"><span>Terror</span>
          </label>
        </div>
    </section>

    </div>

    <br>

    <div style="display:flex;margin-top:-30px;margin-left: 110px;">

    <section class="categories">

        <div class="cat sadness">
        <label>
            <input type="checkbox" id="distraction" name="surprise[]" value="1"><span>Distraction</span>
        </label>
      </div>
      <div class="cat sadness">
        <label>
          <input type="checkbox" id="surprise" name="surprise[]" value="2"><span>Surprise</span>
        </label>
      </div>
      <div class="cat sadness">
        <label>
            <input type="checkbox" id="amazement" name="surprise[]" value="3"><span>Amazement</span>
        </label>
      </div>
    </section>

    <section class="categories">

        <div class="cat sadness">
        <label>
            <input type="checkbox" id="pensiveness" name="sadness[]" value="1"><span>Pensiveness</span>
        </label>
      </div>
      <div class="cat sadness">
        <label>
          <input type="checkbox" id="sadness" name="sadness[]" value="2"><span>Sadness</span>
        </label>
      </div>
      <div class="cat sadness">
        <label>
            <input type="checkbox" id="grief" name="sadness[]" value="3"><span>Grief</span>
        </label>
      </div>
    </section>

    <section class="categories">

        <div class="cat sadness">
        <label>
            <input type="checkbox" id="boredom" name="disgust[]" value="1"><span>Boredom</span>
        </label>
      </div>
      <div class="cat sadness">
        <label>
          <input type="checkbox" id="disgust" name="disgust[]" value="2"><span>Disgust</span>
        </label>
      </div>
      <div class="cat sadness">
        <label>
            <input type="checkbox" id="loathing" name="disgust[]" value="3"><span>Loathing</span>
        </label>
      </div>
    </section>

  </div>

  <section class="bottom_btn_set" style="margin-top: 50px;">
    <button type="button" onclick="history.go(-1)" id="prevBbtn" class="btn btn-light btn-circle btn-xl btnMoodGetter"><i class="fa fa-arrow-left"></i></button>

        <?php
        include ("views/partials/steps.php");
        ?>

        <button id="nextbtn" class="btn btn-light btn-circle btn-xl btnCpPersonal" style="width:60px;height:60px;"><i class="fa fa-arrow-right"></i></button>

      </section>


</form>
