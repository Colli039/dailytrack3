<?php

class ControllerDashboard{
	// F1 ctrGetPetid: START
	public function ctrGetPetid(){
		$petid = "PT" . str_pad((new ModelPets)->mdlGetId(), 4, "0", STR_PAD_LEFT);
		return $petid;
	} // F1 ctrGetPetid: END

	// F3a ctrShowPets: START
	public function ctrShowData($id){
		$answer = (new ModelDashboard)->mdlGetDashboardData($_SESSION['id']);
		return $answer;
	} // F3a ctrShowPets: END

	static public function ctrEditAppt(){
					echo var_dump($_SESSION);
				// F4A Array Storage: START
				/* Description: This stores $_POST values and
				   other variables into an array. */
					$table = "appointments";

	 		   	$data = array("apptid"=>$_POST['apptid'],
	 		   				  "specname"=>$_POST["editPatname"],
	 								"username"=>$_POST["editSpecname"],
									"avenue"=>$$_POST["editDate"],
	 		   				  "atimestart"=>$_POST["editTimestart"],
	 								"atimeend"=>$_POST["editTimeend"],
									); // F4A Array Storage: END

				// F4B Error Trapping: START
				/* Description: This opens a SweetAlert dialog box
					 if the entry is incomplete. */
				$null = true;

				foreach ($data as $key => $value) {
					if($value == "") { // when it finds an empty element
						$null = true; // it is confirmed as "true"
						break; // and the loop ends
					}
					else {
						$null = false; // there are no empty elements
					}
				}
				if($null) // if $null is true: START
					echo '<script>
						var idUser = document.getElementById("idUser").value;
						 swal({
							 type: "error",
							 title: "I think you\'re missing something...",
							 text: "You have not filled in all the fields. Please try again.",
								}).then(function(result){
										if (result.value) {
										window.location = "index.php?route=useredit&idUser=" + idUser;
										}
									})
						 </script>'; // if $null is true: END
				else { // if $null is false: START
			   	$answer = (new ModelUsers)->mdlEditAuth($table, $data);

			   	if($answer == "ok"){
					echo'<script>
					swal({
						  type: "success",
						  title: "User information has been successfully updated!",
						  showConfirmButton: true,
						  confirmButtonText: "OK"
						  })
						})
					</script>';
				} // if $answer returns okay: END
			} // if $null is false: END
			// F4B Error Trapping: END
	} // F4 ctrEditUser: END

} // ControllerPets: END
