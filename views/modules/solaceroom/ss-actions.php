<div class="cp-actions bg">

<div class="container" style="margin: 150px 0 0 350px;">

    <h3 class="h-bold title" style="color:#de5823;">How did you deal with <?php echo "your mood" ?> today?</h3>
    <p class="h-xlight title" style="color:#6e6e6e;font-weight:bolder;">Category: Actions</p>

    <form method="POST" id="actions" action="food">

        <div class="wow fadeInUp" data-wow-delay="0.2s">
        <div class="copingstrategies tab actions">

        <input type="radio" id="pace" name="strat-a" class="send_strategy actions input-hidden" value="12" />
        <label for="pace">
            <img src="views/assets/img/coping_strats/actions/pace.png" alt="Pace Back and Forth" />
            <br><br>
        </label>

        <input type="radio" id="meditate" name="strat-a" class="send_strategy actions input-hidden" value="4" />
        <label for="meditate">
            <img src="views/assets/img/coping_strats/actions/meditate.png" alt="Pray / Meditate" />
            <br><br>
        </label>

        <input type="radio" id="exercise" name="strat-a" class="send_strategy actions input-hidden" value="8" />
        <label for="exercise">
            <img src="views/assets/img/coping_strats/actions/exercise.png" alt="Exercise" />
            <br><br>
        </label>

        <input type="radio" id="break" name="strat-a" class="send_strategy actions input-hidden" value="20" />
        <label for="break">
            <img src="views/assets/img/coping_strats/actions/break.png" alt="Break Objects" />
            <br><br>
        </label>

        <input type="radio" id="chores" name="strat-a" class="send_strategy actions input-hidden" value="4" />
        <label for="chores">
            <img src="views/assets/img/coping_strats/actions/chores.png" alt="Do Chores / Tasks" />
            <br><br>
        </label>

        <input type="radio" id="substances" name="strat-a" class="send_strategy actions input-hidden" value="20" />
        <label for="substances">
            <img src="views/assets/img/coping_strats/actions/substance.png" alt="Use Substances" />
            <br><br>
        </label>

          </div>
        </div>

        <br>

        <section class="bottom_btn_set">
          <button type="button" onclick="history.go(-1)" id="prevBbtn" class="btn btn-light btn-circle btn-xl btnCpSleep"><i class="fa fa-arrow-left"></i></button>

        <?php
        include ("views/partials/steps.php");
        ?>

        <button id="nextBtn" class="btn btn-light btn-circle btn-xl btnCpFood" style="width:60px;height:60px;"><i class="fa fa-arrow-right"></i></button>

        <section>

    </form>

</div>
</div>
