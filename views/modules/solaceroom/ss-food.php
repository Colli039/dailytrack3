<div class="cp-foods bg">

<div class="container" style="margin: 150px 0 0 350px;">

    <h3 class="h-bold title" style="color:#949494;">How did you deal with <?php echo "your mood" ?> today?</h3>
    <p class="h-xlight title" style="color:#6e6e6e;font-weight:bolder;">Category: Food</p>

    <form method="POST" id="food" action="emoticard-pat">

        <div class="wow fadeInUp" data-wow-delay="0.2s">
        <div class="copingstrategies tab food">

        <input type="radio" id="healthy" name="strat-f" class="send_strategy food input-hidden" value="4" />
        <label for="healthy">
            <img src="views/assets/img/coping_strats/food/healthy.png" alt="Eating Healthy" />
            <br><br>
        </label>

        <input type="radio" id="binge" name="strat-f" class="send_strategy food input-hidden" value="16" />
        <label for="binge">
            <img src="views/assets/img/coping_strats/food/binge.png" alt="Binge Eating" />
            <br><br>
        </label>

        <input type="radio" id="delivery" name="strat-f" class="send_strategy food input-hidden" value="8" />
        <label for="delivery">
            <img src="views/assets/img/coping_strats/food/delivery.png" alt="Avail Food Delivery" />
            <br><br>
        </label>

        <input type="radio" id="homecook" name="strat-f" class="send_strategy food input-hidden" value="8" />
        <label for="homecook">
            <img src="views/assets/img/coping_strats/food/homecook.png" alt="Cook Home Meals" />
            <br><br>
        </label>

        <input type="radio" id="noeat" name="strat-f" class="send_strategy food input-hidden" value="20" />
        <label for="noeat">
            <img src="views/assets/img/coping_strats/food/noeat.png" alt="Not Eat at All" />
            <br><br>
        </label>

        <input type="radio" id="fastfood" name="strat-f" class="send_strategy food input-hidden" value="12" />
        <label for="fastfood">
            <img src="views/assets/img/coping_strats/food/fastfood.png" alt="Get Fastfood" />
            <br><br>
        </label>

          </div>
        </div>

        <br>

        <section class="bottom_btn_set">
          <button type="button" onclick="history.go(-1)" id="prevBbtn" class="btn btn-light btn-circle btn-xl btnCpActions"><i class="fa fa-arrow-left"></i></button>

        <?php
        include ("views/partials/steps.php");
        ?>
        <button id="nextBtn" class="btn btn-light btn-circle btn-xl btnEmoticard" style="width:60px;height:60px;"><i class="fa fa-arrow-right"></i></button>

        <section>

    </form>

</div>

</div>
