<?php
class patsList{
		public function showPatientsList(){
			$list = (new ControllerList)->ctrShowPatientData();
			if(count($list) == 0){
				$jsonData = '{"data":[]}';
				echo $jsonData;
				return;
			}
			$jsonData = '{
				"data":[';
					for($i=0; $i < count($list); $i++){
					$jsonData .='[
							"'.$list[$i]["username"].'",
							"'.$list[$i]["patcode"].'"
						],';
					}
					$jsonData = substr($jsonData, 0, -1);
					$jsonData .= ']
				}';
			echo $jsonData;
		}
	}

}

	$activateList = new patsList();
	$activateList -> showPatientsList();

//
// 	public function showEmoticardList(){
// 		$pats = (new ControllerDashboard)->ctrShowData();
// 		if(count($pats) == 0){
// 			$jsonData = '{"data":[]}';
// 			echo $jsonData;
// 			return;
// 		}
// 		$jsonData = '{
// 			"data":[';
// 				for($i=0; $i < count($pats); $i++){
// 					$buttons = "<div class='btn-group group-round m-1'><button onclick='editAppt()' class='btn btn-sm btn-light waves-effect waves-light btnEditAppt' idPet='".$pats[$i]["userid"]."'><i class='fa fa-pen'></i></button><button class='btn btn-sm btn-danger waves-effect waves-light btnDeleteAppt' idPet='".$pats[$i]["userid"]."'><i class='fa fa-trash'></i></button></div>";
// 					$emoticard = "<div class='btn-group group-round m-1'><button class='btn btn-sm btn-light waves-effect waves-light btnEmoticard' idPet='".$pats[$i]["userid"]."'></button></div>";
// 					$jsonData .='[
// 						"'.$pats[$i]["username"].'",
// 						"'.$pats[$i]["mood"].'",
// 						"'.$emoticard.'",
// 						"'.$pats[$i]["appointment"].'",
// 						"'.$buttons.'"
// 					],';
// 				}
// 				$jsonData = substr($jsonData, 0, -1);
// 				$jsonData .= ']
// 			}';
// 		echo $jsonData;
// 	}
// 	public function showJournalsList(){
// 		$pats = (new ControllerDashboard)->ctrShowData();
// 		if(count($pats) == 0){
// 			$jsonData = '{"data":[]}';
// 			echo $jsonData;
// 			return;
// 		}
// 		$jsonData = '{
// 			"data":[';
// 				for($i=0; $i < count($pats); $i++){
// 					$buttons = "<div class='btn-group group-round m-1'><button onclick='editAppt()' class='btn btn-sm btn-light waves-effect waves-light btnEditAppt' idPet='".$pats[$i]["userid"]."'><i class='fa fa-pen'></i></button><button class='btn btn-sm btn-danger waves-effect waves-light btnDeleteAppt' idPet='".$pats[$i]["userid"]."'><i class='fa fa-trash'></i></button></div>";
// 					$emoticard = "<div class='btn-group group-round m-1'><button class='btn btn-sm btn-light waves-effect waves-light btnEmoticard' idPet='".$pats[$i]["userid"]."'></button></div>";
// 					$jsonData .='[
// 						"'.$pats[$i]["username"].'",
// 						"'.$pats[$i]["mood"].'",
// 						"'.$emoticard.'",
// 						"'.$pats[$i]["appointment"].'",
// 						"'.$buttons.'"
// 					],';
// 				}
// 				$jsonData = substr($jsonData, 0, -1);
// 				$jsonData .= ']
// 			}';
// 		echo $jsonData;
// 	}
// 	public function showPatlistList(){
// 		$pats = (new ControllerDashboard)->ctrShowData();
// 		if(count($pats) == 0){
// 			$jsonData = '{"data":[]}';
// 			echo $jsonData;
// 			return;
// 		}
// 		$jsonData = '{
// 			"data":[';
// 				for($i=0; $i < count($pats); $i++){
// 					$buttons = "<div class='btn-group group-round m-1'><button onclick='editAppt()' class='btn btn-sm btn-light waves-effect waves-light btnEditAppt' idPet='".$pats[$i]["userid"]."'><i class='fa fa-pen'></i></button><button class='btn btn-sm btn-danger waves-effect waves-light btnDeleteAppt' idPet='".$pats[$i]["userid"]."'><i class='fa fa-trash'></i></button></div>";
// 					$emoticard = "<div class='btn-group group-round m-1'><button class='btn btn-sm btn-light waves-effect waves-light btnEmoticard' idPet='".$pats[$i]["userid"]."'></button></div>";
// 					$jsonData .='[
// 						"'.$pats[$i]["username"].'",
// 						"'.$pats[$i]["mood"].'",
// 						"'.$emoticard.'",
// 						"'.$pats[$i]["appointment"].'",
// 						"'.$buttons.'"
// 					],';
// 				}
// 				$jsonData = substr($jsonData, 0, -1);
// 				$jsonData .= ']
// 			}';
// 		echo $jsonData;
// 	}
// }
//
// $activatePets = new patsTable();
// $activatePets -> showPatientsTable();
