<?php
  $idMood = $_SESSION['id'];
//max(datetime) tani i.check lang karon sa latest tab uwu
  $mood = implode((new Connection)->connect()->query("SELECT ssmood FROM stepstones WHERE userid = $idMood ORDER BY stepid LIMIT 1")->fetch(PDO::FETCH_ASSOC));

?>

<div style="margin-left:-10px;">

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#report">Timely Reports</a></li>
    <li><a data-toggle="tab" href="#emote">Emoticard</a></li>
  </ul>

  <div class="tab-content">
    <div id="report" class="tab-pane fade-in active">
      <div>Insert today's daily reports here</div>
          <div id="showcase-wrapper">

        <!--CALENDAR-->
        <div id="myCalendarWrapper" class="calendarbody"></div>

        <!--DAILYMOODS-->
        <div id="dailyMoods">

        <h3 role="title">Daily Moods</h3>
        <ul>
          <img src="views/assets/img/moods/<?php echo $mood;?>.png" class="dmood">
        </ul>

        </div>

      </div>
    </div>

    <div id="emote" class="tab-pane fade">
      <span class="btn btn-primary">List of Emoticards</span>
      <?php include "emoticard/chart.php";?>


    </div>
</div>


<script src="views/js/CalendarPicker.js"></script>

<script>
    const nextYear = new Date().getFullYear() + 1;
    const myCalender = new CalendarPicker('#myCalendarWrapper', {
        // If max < min or min > max then the only available day will be today.
        min: new Date(),
        max: new Date(nextYear, 10), // NOTE: new Date(nextYear, 10) is "Nov 01 <nextYear>"
        locale: 'en-US', // Can be any locale or language code supported by Intl.DateTimeFormat, defaults to 'en-US'
        showShortWeekdays: false // Can be used to fit calendar onto smaller (mobile) screens, defaults to false
    });

    const currentDateElement = document.getElementById('current-date');
    currentDateElement.textContent = myCalender.value;

    const currentDayElement = document.getElementById('current-day');
    currentDayElement.textContent = myCalender.value.getDay();

    const currentToDateString = document.getElementById('current-datestring');
    currentToDateString.textContent = myCalender.value.toDateString();

    myCalender.onValueChange((currentValue) => {
        currentDateElement.textContent = currentValue;
        currentDayElement.textContent = currentValue.getDay();
        currentToDateString.textContent = currentValue.toDateString();

        console.log(`The current value of the calendar is: ${currentValue}`);
    });
</script>
