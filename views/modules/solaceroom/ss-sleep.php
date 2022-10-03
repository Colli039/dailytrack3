<div class="cp-sleep bg">


<div class="container" style="margin: 150px 0 0 350px;">

    <h3 class="h-bold title" style="color:#34c952;">How did you deal with <?php echo "your mood" ?> today?</h3>
    <p class="h-xlight title" style="color:#6e6e6e;font-weight:bolder;">Category: Sleep</p>

    <form method="POST" id="sleep" action="actions">
<div class="wow fadeInUp" data-wow-delay="0.2s">
        <div class="copingstrategies tab sleep">

        <input type="radio" id="sleepalot" name="strat-sl" class="send_strategy sleep input-hidden" value="20" />
        <label for="sleepalot">
            <img src="views/assets/img/coping_strats/sleep/sleep.png" alt="Sleep a Lot" />
            <br><br>
        </label>

        <input type="radio" id="tired" name="strat-sl" class="send_strategy sleep input-hidden" value="16" />
        <label for="tired">
            <img src="views/assets/img/coping_strats/sleep/tired.png" alt="Feeling Tired After Sleeping" />
            <br><br>
        </label>

        <input type="radio" id="toy" name="strat-sl" class="send_strategy sleep input-hidden" value="12" />
        <label for="toy">
            <img src="views/assets/img/coping_strats/sleep/toy.png" alt="Sleeping with a Toy" />
            <br><br>
        </label>

        <input type="radio" id="companion" name="strat-sl" class="send_strategy sleep input-hidden" value="8" />
        <label for="companion">
            <img src="views/assets/img/coping_strats/sleep/companion.png" alt="Sleep with a Companion" />
            <br><br>
        </label>

        <input type="radio" id="nosleep" name="strat-sl" class="send_strategy sleep input-hidden" value="20" />
        <label for="nosleep">
            <img src="views/assets/img/coping_strats/sleep/nosleep.png" alt="Sleep with a Companion" />
            <br><br>
        </label>

        <input type="radio" id="crysleep" name="strat-sl" class="send_strategy sleep input-hidden" value="4" />
        <label for="crysleep">
            <img src="views/assets/img/coping_strats/sleep/cry.png" alt="Cry Yourself to Sleep" />
            <br><br>
        </label>

          </div>
        </div>

        <br>

        <section class="bottom_btn_set">
          <button type="button" onclick="history.go(-1)" id="prevBbtn" class="btn btn-light btn-circle btn-xl btnCpSocial"><i class="fa fa-arrow-left"></i></button>

        <?php
        include ("views/partials/steps.php");
        ?>
        <button id="nextBtn" class="btn btn-light btn-circle btn-xl btnCpActions" style="width:60px;height:60px;"><i class="fa fa-arrow-right"></i></button>

        <section>

    </form>

</div>

</div>
