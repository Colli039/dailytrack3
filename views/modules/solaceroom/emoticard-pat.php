<?php
$_SESSION["strat-f"] = isset($_POST["strat-f"]) ? $_POST["strat-f"]:0;
// header("Location: emoticard");
$_SESSION["strats"] = $_SESSION["strat-p"]+
                      $_SESSION["strat-so"]+
                      $_SESSION["strat-sl"]+
                      $_SESSION["strat-a"]+
                      $_SESSION["strat-f"]+1;
include "test.php"
?>
