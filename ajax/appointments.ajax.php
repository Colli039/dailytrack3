<?php
require_once "../controllers/pets.controller.php";
require_once "../models/pets.model.php";

class apptsTable{
	public function showApptsTable(){
		$pats = (new ControllerUsers)->ctrShowAppts();
		if(count($pats) == 0){
			$jsonData = '{"data":[]}';
			echo $jsonData;
			return;
		}
		$jsonData = '{
			"data":[';
				for($i=0; $i < count($pats); $i++){
					$buttons = "<div class='btn-group group-round m-1'><button class='btn btn-sm btn-light waves-effect waves-light btnEditPet' idPet='".$pets[$i]["id"]."'><i class='fa fa-pen'></i></button><button class='btn btn-sm btn-danger waves-effect waves-light btnDeletePet' idPet='".$pets[$i]["id"]."'><i class='fa fa-trash'></i></button></div>";
					$jsonData .='[
						"'.$pats[$i]["userfname"].'",
						"'.$pets[$i]["userlname"].'",
						"",
						"",
						"",
						"'.$buttons.'"
					],';
				}
				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= ']
			}';
		echo $jsonData;
	}
}

$activatePets = new patsTable();
$activatePets -> showPatientsTable();
