<?php
class emoticardTable{
	public function showEmoticardList(){
		$list = (new ControllerList)->ctrShowEmoteData();
		if(count($list) == 0){
			$jsonData = '{"data":[]}';
			echo $jsonData;
			return;
		}
		$jsonData = '{
			"data":[';
				for($i=0; $i < count($list); $i++){
				$jsonData .='[
						"'.$list[$i]["datestime"].'"
					],';
				}
				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= ']
			}';
		echo $jsonData;
	}
}

$activateList = new emoticardTable();
$activateList -> showEmoticardList();
