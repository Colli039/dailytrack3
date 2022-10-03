

<style>
    .chart{
        width: 700px;
        height: 600px;
        float: left;
        margin: 60px 15px 0 100px;
    }

    #translation{
        background-color:#ffffff;
        border: 4px solid #91ceff;
        border-radius: 20px;
        width: 35%;
        height: 50%;
        float: right;
        margin: 100px 100px 0 -10px;
        color: #6b6b6b;
        padding: 20px;
        font-family: 'Space Mono', monospace;
        box-shadow: 5px 5px 7px #88888850;
    }

    h3{
        font-size: 20px;
    }

    #translation p{
        margin-top: 10px;
        margin-left: 15px;
    }

    #translation h3{
        color: #4598f7;
        margin: 0;
    }

    #translation h3{
        color: #4598f7;
        margin-bottom: 10px;
    }

    #mainEmotions, #sensations, #emotionDo, #tendencies {
        margin-bottom: 25px;
    }

    .progress {
	background-color: #d8d8d8;
	border-radius: 20px;
	position: relative;
	margin: 25px 10px;
	height: 25px;
	width: 300px;
    }

    .progress-done {
        background: #ff61ab;
        border-radius: 20px;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        width: 0;
        opacity: 0;
        transition: 1s ease 0.3s;
    }



</style>

<?php
$max_key   = 0;
$max_value = 0;
foreach ($data as $key => $value)
{
  if ($value > $max_value)
  {
    $max_key   = $key;
    $max_value = $value;
  }
}

switch($max_key)
{
  case 'anger'       :
  $emotion = '<ul>
                <li>Rage
              </ul>';
  $message= " <ul>
                <li>You want to attack an obstacle that is getting in the way of your peace.
              </ul>";
  break;
  case 'anticipation':
  $emotion = '<ul>
                <li>Vigilance
              </ul>';
  $message= " <ul>
                <li>You are highly focused and alert; on the look out for something.
              </ul>";
  break;
  case 'joy'         :
  $emotion = '<ul>
                <li>Ecstasy
              </ul>';
  $message= " <ul>
                <li>You are delighted! Things are better going good for you and you feel an abundance of energy.
              </ul>";
  break;
  case 'trust'       :
  $emotion = '<ul>
                <li>Admiration
              </ul>';
  $message= " <ul>
                <li>You feel a deep connection and pride for a person or idea that makes you want to strengthen your commitment to it.
              </ul>";
  break;
  case 'fear'        :
  $emotion = '<ul>
                <li>Terror
              </ul>';
  $message= " <ul>
                <li>You sense  a big danger, making you alarmed or petrified.
              </ul>";
  break;
  case 'surprise'    :
  $emotion = '<ul>
                <li>Amazement
              </ul>';
  $message= " <ul>
                <li>You feel inspired by something that caught you off guard. You want to remember that moment.
              </ul>";
  break;
  case 'sadness'     :
  $emotion = '<ul>
                <li>Grief
              </ul>';
  $message= " <ul>
                <li>You are in a state of heartbreak and distraught after losing something dear. It feels hard to get up and go on.
              </ul>";
  break;
  case 'disgust'     :
  $emotion = '<ul>
                <li>Loathing
              </ul>';
  $message= " <ul>
                <li>You feel disturbed, horrified, and violated. You want to block it all out.
              </ul>";
  break;
  default            : $message= 'default message here';
}
?>

<body>
    <div class="container chart">
        <canvas id="emoChart"></canvas>
    </div>

    <div id="translation">
        <section id="mainEmotions">

        <?php echo "<h3>Main Emotion:</h3>"; ?>
        <?php echo $emotion;
        ?>
        <!-- <?php echo
        "<p>Trust (40%), Pessimism (50%), Others (10%)</p>";
        ?> -->
        </section>

        <section id="sensations">

        <?php echo "<h3>Sensations:</h3>"; ?>

        <?php echo $message;
        ?>
        </section>

        <section id="tendencies">

        <?php
        echo "<h3>Psychological Flexibility in the Context of Current Emotions:</h3>";
        ?>

            <div class="progress">
                <div class="progress-done" data-done=<?php echo $_SESSION["strats"]?> max="25">
                    <?php echo $_SESSION["strats"]?>
                </div>
            </div>
            <div>
                <p class="aaq">
                    You are  <?php echo "Avoidants"; ?>. <?php echo "Meaning of Avoidant"; ?>
                </p>
            </div>
        </section>
    </div>

    <!-- <section class="action_btns">
        <button class="btn-info">Confirm</button>
        <button class="btn-info-outline">Download Results</button>
    </section> -->

<script>

const progress = document.querySelector('.progress-done');

progress.style.width = progress.getAttribute('data-done') + '%';

// if data-done = 5- 11 = Healthy, generally more accepting of situations.
// if else data-done = 12-19 = Average, able to cope well in most cases
// else = 20-25 Avoidant, has trouble releasing stressors in a healthy manner

progress.style.opacity = 1;

const anger         = <?php echo json_encode($data['anger']); ?>;
const anticipation  = <?php echo json_encode($data['anticipation']); ?>;
const joy           = <?php echo json_encode($data['joy']); ?>;
const trust         = <?php echo json_encode($data['trust']); ?>;
const fear          = <?php echo json_encode($data['fear']); ?>;
const surprise      = <?php echo json_encode($data['surprise']); ?>;
const sadness       = <?php echo json_encode($data['sadness']); ?>;
const disgust       = <?php echo json_encode($data['disgust']); ?>;

// const ctx = document.getElementById('emoChart').getContext('2d');
const ctx = document.getElementById('emoChart');
const barColors = [
                '#e3050590',
                '#e3610590',
                '#faf20590',
                '#46fa0590',
                '#00730890',
                '#00cad190',
                '#001cd190',
                '#6e00a190'
            ];
const data = {
    type: 'polarArea',
    data: {
            labels: ['Anger', 'Anticipation', 'Joy', 'Trust', 'Fear', 'Surprise','Sadness','Disgust'],
            datasets: [{
                          label: 'anger',
                          data : [anger,anticipation, joy, trust, fear, surprise, sadness, disgust],
                          backgroundColor: barColors
                      }]
          },

options: {

    // Boolean - whether or not the chart should be responsive and resize when the browser does.
    responsive: true,

    // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
    scales: {
        y: {
            beginAtZero: true,
            display: false,

        }
    },

    plugins: {
        legend: {
            display: true,
            position: 'chartArea',
            align: 'start',
            labels: {
                usePointStyle: true
            }
        }
    }
}
}
const emoChart = new Chart(ctx,data)
// const emoChart = new Chart(ctx, {
//     type: 'polarArea',
//     data: {
//         labels: ['Anger', 'Anticipation', 'Joy', 'Trust', 'Fear', 'Surprise','Sadness','Disgust'],
//         datasets: [{
//             label: 'anger',
//             data: [anger,anticipation,joy,trust,fear,surprise,sadness,disgust],
//             backgroundColor: barColors,
//             // borderColor: 'white',
//             borderWidth: 1
//         }],

//         // ,{
//         //     label: 'anticpation',
//         //     data: anticipation,
//         //     backgroundColor: '#e3610590',
//         //     borderColor: 'white',
//         //     borderWidth: 1
//         // },

//         // {
//         //     label: 'joy',
//         //     data: joy,
//         //     backgroundColor:'#faf20590',
//         //     borderColor: 'white',
//         //     borderWidth: 1
//         // },
//         // {
//         //     label: 'trust',
//         //     data: trust,
//         //     backgroundColor: '#46fa0590',
//         //     borderColor: 'white',
//         //     borderWidth: 1
//         // },
//         // {
//         //     label: 'fear',
//         //     data: fear,
//         //     backgroundColor: '#00730890',
//         //     borderColor: 'white',
//         //     borderWidth: 1
//         // },
//         // {
//         //     label: 'surprise',
//         //     data: surprise,
//         //     backgroundColor: '#00cad190',
//         //     borderColor: 'white',
//         //     borderWidth: 1
//         // },
//         // {
//         //     label: 'sadness',
//         //     data: sadness,
//         //     backgroundColor: '#001cd190',
//         //     borderColor: 'white',
//         //     borderWidth: 1
//         // },
//         // {
//         //     label: 'disgust',
//         //     data: disgust,
//         //     backgroundColor: '#6e00a190',
//         //     borderColor: 'white',
//         //     borderWidth: 1
//         // }
//     },

//     options: {

//         // Boolean - whether or not the chart should be responsive and resize when the browser does.

//         responsive: true,

//         // Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container


//         scales: {
//             y: {
//                 beginAtZero: true,
//                 display: false,

//             }
//         },

//         plugins: {
//             legend: {
//                 display: true,
//                 position: 'left',
//                 align: 'start',
//                 labels: {
//                     usePointStyle: true
//                 }
//             }
//         }
//     }
// });

</script>




</body>
