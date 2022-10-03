<?php

$username = "root";
$password = "";
$database = "daily";//changed the name of database and table

try {
    $pdo = new PDO("mysql:host=localhost;database=$database", $username, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="preload" href="https://fonts.googleapis.com/css?family=Raleway|Lato" as="style">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway|Lato">
    <link rel="stylesheet" href="chart.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <title>Emoticard</title>
</head>

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
        background: linear-gradient(to left, #F2709C, #FF9472);
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

<body>

    <?php
    // Attempt select query execution
    try{
    $sql = "SELECT * FROM daily.keywords  /*datetimes is the latest*/";//databasename.tablename
    $result = $pdo->query($sql);
    if($result->rowCount() > 0) {
        $anger = array();
        $anticipation = array();
        $joy = array();
        $trust = array();
        $fear = array();
        $surprise = array();
        $sadness = array();
        $disgust = array();

        while($row = $result->fetch()) {
            $anger[] = $row["anger"];
            $anticipation[] = $row["anticipation"];
            $joy[] = $row["joy"];
            $trust[] = $row["trust"];
            $fear[] = $row["fear"];
            $surprise[] = $row["surprise"];
            $sadness[] = $row["sadness"];
            $disgust[] = $row["disgust"];

        }

        unset($result);
        } else {
            echo "No records matching your query were found.";
        }

    } catch(PDOException $e){
    die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }

    // Close connection
    unset($pdo);
    ?>

    <div class="container chart">
        <canvas id="emoChart"></canvas>
    </div>

    <div id="translation">
        <section id="mainEmotions">

        <?php echo "<h3>Main Emotions:</h3>"; ?>

        <?php echo
        "<p>Trust (40%), Pessimism (50%), Others (10%)</p>";
        ?>
        </section>

        <section id="sensations">

        <?php echo "<h3>Sensations:</h3>"; ?>

        <?php echo
        "<ul>
            <li>This is safe</li>
            <li>Something good is gone/going away</li>
            <li>There's no hope</li>
        </ul>";
        ?>
        </section>

        <section id="tendencies">

        <?php echo "<h3>Psychological Flexibility in the Context of Current Emotions:</h3>"; ?>

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


const anger = <?php echo json_encode($anger); ?>;
const anticipation = <?php echo json_encode($anticipation); ?>;
const joy = <?php echo json_encode($joy); ?>;
const trust = <?php echo json_encode($trust); ?>;
const fear = <?php echo json_encode($fear); ?>;
const surprise = <?php echo json_encode($surprise); ?>;
const sadness = <?php echo json_encode($sadness); ?>;
const disgust = <?php echo json_encode($disgust); ?>;

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
                          data : [anger[8],anticipation[8],joy[8],trust[8],fear[8],surprise[8],sadness[8],disgust[8]],
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



<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<!-- <script src="views/assets/plugins/bootstrap-datatable/js/jquery.dataTables.min.js"></script>
<script src="views/assets/plugins/bootstrap-datatable/js/dataTables.bootstrap4.min.js"></script> -->
<script src="https://kit.fontawesome.com/6f0e40320a.js" crossorigin="anonymous"></script>


</body>

</html>
