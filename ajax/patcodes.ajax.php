<?php
class patcodeList{
	public function showPatcodeList(){
		$list = (new ControllerList)->ctrShowPatCodeData();
		if(count($list) == 0){
			$jsonData = '{"data":[]}';
			echo $jsonData;
			return;
		}
		$jsonData = '{
			"data":[';
				for($i=0; $i < count($list); $i++){
				$jsonData .='[
						"'.$list[$i]["patcode"].'"
					],';
				}
				$jsonData = substr($jsonData, 0, -1);
				$jsonData .= ']
			}';
		echo $jsonData;
	}
}

	$activateList = new patcodeList();
	$activateList -> showPatcodeList();
