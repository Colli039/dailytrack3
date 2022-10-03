<div class="cp-personal bg">


<div class="container" style="margin: 150px 0 0 350px;">

    <h3 class="h-bold title" style="color:#f54e65;">How did you deal with <?php echo "your mood" ?> today?</h3>
    <p class="h-xlight title" style="color:#6e6e6e;font-weight:bolder;">Category: Personal</p>

    <form method="POST" id="personal" action="social">

    <div class="wow fadeInUp" data-wow-delay="0.2s">
        <div class="copingstrategies tab">

        <input type="radio" id="hobbies" name="strat-p" class="send_strategy personal input-hidden" value="8" />
        <label for="hobbies">
            <img src="views/assets/img/coping_strats/personal/hobbies.png" alt="Do Hobbies" />
            <br><br>
        </label>

        <input type="radio" id="journal" name="strat-p" class="send_strategy personal input-hidden" value="4" />
        <label for="journal">
            <img src="views/assets/img/coping_strats/personal/journal.png" alt="Journal Feelings" />
            <br><br>
        </label>

        <input type="radio" id="procrastinate" name="strat-p" class="send_strategy personal input-hidden" value="16" />
        <label for="procrastinate">
            <img src="views/assets/img/coping_strats/personal/Procrastinate.png" alt="Procrastinate" />
            <br><br>
        </label>

        <input type="radio" id="relax" name="strat-p" class="send_strategy personal input-hidden" value="12" />
        <label for="relax">
            <img src="views/assets/img/coping_strats/personal/relax.png" alt="Relax" />
            <br><br>
        </label>

        <input type="radio" id="therapist" name="strat-p" class="send_strategy personal input-hidden" value="8" />
        <label for="therapist">
            <img src="views/assets/img/coping_strats/personal/therapist.png" alt="Talk to Therapist" />
            <br><br>
        </label>

        <input type="radio" id="tantrums" name="strat-p" class="send_strategy personal input-hidden" value="20" />
        <label for="tantrums">
            <img src="views/assets/img/coping_strats/personal/tantrums.png" alt="Throw Tantrums" />
            <br><br>
        </label>

        </div>
    </div>

        <section class="bottom_btn_set" style="margin-top:-80px;margin-bottom:50px;">
        <button class="btn-skip btnSkip"><span style="font-szie: 10px;">I haven't done anything as of now</span></button>
</section>


        <section class="bottom_btn_set">
          <button type="button" onclick="history.go(-1)" id="prevBbtn" class="btn btn-light btn-circle btn-xl btnKeywords"><i class="fa fa-arrow-left"></i></button>

        <?php
        include ("views/partials/steps.php");
        ?>
        <button id="nextBtn" class="btn btn-light btn-circle btn-xl btnCpSocial" style="width:60px;height:60px;"><i class="fa fa-arrow-right"></i></button>

        <section>

    </form>

</div>
</div>
