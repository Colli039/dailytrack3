<?php

class ControllerStepStones{


	// F1 ctrCreateUser: START
	static public function ctrAddStressMood($userid){
				// F1A Array Storage: START
				/* Description: This stores $_POST values and
				   other variables into an array. */
				$table = "stepstones";
				// var_dump($_SESSION);
				// Encryption of password using password_hash() method

		   	$data = array("userid"=>$userid,
								"ssdistress"=>$_SESSION["stress"],
								"ssmood"=>$_SESSION["item"],
								"copingstrat"=>$_SESSION["strats"]
								); // F2A Array Storage: END

				// F2B Error Trapping: START
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
			       swal({
			         type: "error",
			         title: "I think you\'re missing something...",
			         text: "Missing Values for StressMood.",
			          }).then(function(result){

			            })
			       </script>'; // if $null is true: END
			  else { // if $null is false: START
			   	$answer = (new ModelStepStones)->mdlAddStressMood($table, $data);

					// if $answer returns "ok": START
			   	if($answer == "ok"){
						echo'<script>

						swal({
							  type: "success",
							  title: "Emoticard Created!",
							  showConfirmButton: true,
							  confirmButtonText: "OK"
							  }).then(function(result){
										if (result.value) {
										window.location = "";
										}
									})
						</script>';
					} // if $answer returns "ok": END
				} // if $null is false: END
				// F2B Error Trapping: END

	} // F2 ctrCreateUser: END

  // F1 ctrCreateUser: START
  static public function ctrAddKeywords($userid){
        // F1A Array Storage: START
        /* Description: This stores $_POST values and
           other variables into an array. */
        $table = "keywords";
        // Encryption of password using password_hash() method

        // $userid = (new ControllerUsers)->ctrGetUserIdMail($_SESSION["useremail"]);
					// var_dump(32423);
        $data = array(
                "anger"=>$_SESSION["anger"],
                "anticipation"=>$_SESSION["anticipation"],
                "joy"=>$_SESSION["joy"],
                "trust"=>$_SESSION["trust"],
                "fear"=>$_SESSION["fear"],
                "surprise"=>$_SESSION["surprise"],
                "sadness"=>$_SESSION["sadness"],
                "disgust"=>$_SESSION["disgust"],
								"userid"=>$userid

                ); // F2A Array Storage: END

        // F2B Error Trapping: START
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
        // if($null) // if $null is true: START
        //   // echo '<script>
        //   //    swal({
        //   //      type: "error",
        //   //      title: "I think you\'re missing something...",
        //   //      text: "Missing Keywords.",
        //   //       }).then(function(result){
        //   //           if (result.value) {
        //   //           window.location = "";
        //   //           }
        //   //         })
        //   //    </script>'; // if $null is true: END
        // else { // if $null is false: START
          $answer = (new ModelStepStones)->mdlAddKeywords($table, $data);

          // if $answer returns "ok": START
          if($answer == "ok"){
            echo'<script>

            swal({
                type: "success",
                title: "Emoticard Created Successfully!",
                showConfirmButton: true,
                confirmButtonText: "OK"
                }).then(function(result){
                    if (result.value) {
                    }
                  })
            </script>';
          } // if $answer returns "ok": END
        // } // if $null is false: END
        // F2B Error Trapping: END

  }
	// static public function ctrAddValues($arrayValues){
	// 	var_dump('--------------------');
	// 	var_dump($arrayValues);
	// 	$total=0;
	// 	$values = explode(' ',$arrayValues);
	//
	// 	var_dump($values);
	// 	foreach ($values as $key => $value) {
	// 	  $total+=intval($value);
	// 	}
	// 	echo $total;
	// }


} // ControllerAuthentication: END
