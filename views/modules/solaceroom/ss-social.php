<div class="cp-social bg">


<div class="container" style="margin: 150px 0 0 350px;">

    <h3 class="h-bold title" style="color:#4031e8;">How did you deal with <?php echo "your mood" ?> today?</h3>
    <p class="h-xlight title" style="color:#6e6e6e;font-weight:bolder;">Category: Social</p>

    <form method="POST" id="social" action="sleep">

    <div class="wow fadeInUp" data-wow-delay="0.2s">
        <div class="copingstrategies tab social">

        <input type="radio" id="avoid" name="strat-so" class="send_strategy social input-hidden" value="20" />
        <label for="avoid">
            <img src="views/assets/img/coping_strats/social/avoid.png" alt="Avoid People" />
            <br><br>
        </label>

        <input type="radio" id="goout" name="strat-so" class="send_strategy social input-hidden" value="8" />
        <label for="goout">
            <img src="views/assets/img/coping_strats/social/goout.png" alt="Go Out with Friends" />
            <br><br>
        </label>

        <input type="radio" id="talk" name="strat-so" class="send_strategy social input-hidden" value="4" />
        <label for="talk">
            <img src="views/assets/img/coping_strats/social/talk.png" alt="Talk to Trusted Person" />
            <br><br>
        </label>

        <input type="radio" id="family" name="strat-so" class="send_strategy social input-hidden" value="8" />
        <label for="family">
            <img src="views/assets/img/coping_strats/social/family.png" alt="Get Support From Family" />
            <br><br>
        </label>

        <input type="radio" id="socpost" name="strat-so" class="send_strategy social input-hidden" value="12" />
        <label for="socpost">
            <img src="views/assets/img/coping_strats/social/poster.png" alt="Post on Social Media" />
            <br><br>
        </label>

        <input type="radio" id="rant" name="strat-so" class="send_strategy social input-hidden" value="16" />
        <label for="rant">
            <img src="views/assets/img/coping_strats/social/rant.png" alt="Rant" />
            <br><br>
        </label>

        </div>
    </div>

        <br>

        <section class="bottom_btn_set">
          <button type="button" onclick="history.go(-1)" id="prevBbtn" class="btn btn-light btn-circle btn-xl btnCpPersonal"><i class="fa fa-arrow-left"></i></button>

        <?php
        include ("views/partials/steps.php");
        ?>
        <button id="nextBtn" class="btn btn-light btn-circle btn-xl btnCpSleep" style="width:60px;height:60px;"><i class="fa fa-arrow-right"></i></button>

        <section>

    </form>

</div>

</div>
