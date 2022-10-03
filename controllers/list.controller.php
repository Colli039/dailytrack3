<?php

class ControllerList{

	// F3a ctrShowPets: START
	public function ctrShowEmoteData($id){
		$answer = (new ModelList)->mdlGetEmoticardList($_SESSION['id']);
		return $answer;
	} // F3a ctrShowPets: END

  public function ctrShowPatientData($id){
		$answer = (new ModelList)->mdlGetPatientList($_SESSION['id']);
		return $answer;
	}

  public function ctrShowPatCodeData($id){
    $answer = (new ModelList)->mdlGetPatCodeList($_SESSION['id']);
    return $answer;
  }


}
