<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="css/forms.css" />
<title>Thank you!</title>
</head>

<?php
// form parametres
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}

$dir = "data";

$ip=$_SERVER['REMOTE_ADDR'];
$date = date('c'); // session date in ISO format: 2004-02-12T15:19:21+00:00
$browser = $_SERVER['HTTP_USER_AGENT'];
$browser = str_replace(' ', '_', $browser);
$validrequest = 0;

// if ($_SERVER["REQUEST_METHOD"] == "GET") {
//         $validrequest = 0;
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
//     $validrequest = 1;
    
//     if (!empty($_POST["UID"])) {
//       $UID = test_input($_POST["UID"]);
//     } else {
//       $validrequest = 0;
//     }

//    //  if (!empty($_POST["trialno"])) {
//    //    $trialno = test_input($_POST["trialno"]);
//    //  }

//     if (!empty($_POST["time"])) {
//       $time = test_input($_POST["time"]);
//     }
    
//     if (!empty($_POST["name"])) {
//       $stimulus = test_input($_POST["name"]);
//     }

//     if (!empty($_POST["resp"])) {
//       $resp = test_input($_POST["resp"]);
//     }

//     if ( $validrequest == 0 ) {
//        $s = $dir . "/" . $UID . ".txt";
//        $f = fopen($s, "a") or die("Unable to open file!");
//        fwrite($f, $ip . " ". $date . " " . $browser . " Malformed POST request to questions.php with bad uid\n");
//        fclose($f);
//     } else {  
       
//        $s = $dir . "/" . $UID . ".txt";
//        $f = fopen($s, "a") or die("Unable to open file!");

//        if (!empty($stimulus)) {
//           fwrite($f, $ip . " ". $date . " " . $browser . " " . $UID . " " . $trialno . " " .  $stimulus . " " . $time . " " . $resp . "\n");
//        } else {
//           echo "<br> Err: invalid parameters received <br>"; 
//        }
//        fclose($f);
//      }
// }

?>
 
<!-- <body onload="loadEventHandler()"> -->
<div id="ex2_container">
<br>Thanks for playing! We are almost done.<br><br>
   Please answer the following questions:<br><br>
   <form name='frm' action='theend.php' method='post' onsubmit='return validateForm()'>
   Please describe what you did or discovered:<br>
   <textarea name='decision' rows='5' cols='70'></textarea><br><br><br>

<!-- rating table #2 -->
<table border='1'  cellspacing='1' class="ratingtable">
		<!-- Heading Data -->
		<thead>
			<!-- Column Headings -->
			<tr>
				<th class='colQuestion'><br /><br />Question</th>
				<th id='col1'>Strongly<br />Disagree<br />1</th>
				<th id='col2'><br />Disagree<br />2</th>
				<th id='col3'><br />Neither<br />3</th>
				<th id='col4'><br />Agree<br />4</th>
				<th id='col5'>Strongly<br />Agree<br />5</th>
			</tr>
		</thead>

		<!-- Body Data -->
		<tbody>
			<tr>
				<td class="colQuestion">1) I had fun</td>
				<td>
					<input id="Question1_Opt1" name="responseToQuestion[1]" type="radio" value="1" />
				</td>
				<td>
					<input id="Question1_Opt2" name="responseToQuestion[1]" type="radio" value="2" />
				</td>
				<td>
					<input id="Question1_Opt3" name="responseToQuestion[1]" type="radio" value="3" />
				</td>
				<td>
					<input id="Question1_Opt4" name="responseToQuestion[1]" type="radio" value="4"/>
				</td>
				<td>
					<input id="Question1_Opt5" name="responseToQuestion[1]" type="radio" value="5" />
				</td>
			</tr>
			<tr>
				<td class="colQuestion">2) I discovered everything there was.</td>
				<td>
					<input id="Question2_Opt1" name="responseToQuestion[2]" type="radio" value="1" />
				</td>
				<td>
					<input id="Question2_Opt2" name="responseToQuestion[2]" type="radio" value="2" />
				</td>
				<td>
					<input id="Question2_Opt3" name="responseToQuestion[2]" type="radio" value="3"/>
				</td>
				<td>
					<input id="Question2_Opt4" name="responseToQuestion[2]" type="radio" value="4" />
				</td>
				<td>
					<input id="Question2_Opt5" name="responseToQuestion[2]" type="radio" value="5" />
				</td>
			</tr>
         <tr>
				<td class="colQuestion">3) I did everything there was.</td>
				<td>
					<input id="Question3_Opt1" name="responseToQuestion[3]" type="radio" value="1" />
				</td>
				<td>
					<input id="Question3_Opt2" name="responseToQuestion[3]" type="radio" value="2" />
				</td>
				<td>
					<input id="Question3_Opt3" name="responseToQuestion[3]" type="radio" value="3"/>
				</td>
				<td>
					<input id="Question3_Opt4" name="responseToQuestion[3]" type="radio" value="4" />
				</td>
				<td>
					<input id="Question3_Opt5" name="responseToQuestion[3]" type="radio" value="5" />
				</td>
			</tr>
         <tr>
				<td class="colQuestion">4) I did creative things.</td>
				<td>
					<input id="Question4_Opt1" name="responseToQuestion[4]" type="radio" value="1" />
				</td>
				<td>
					<input id="Question4_Opt2" name="responseToQuestion[4]" type="radio" value="2" />
				</td>
				<td>
					<input id="Question4_Opt3" name="responseToQuestion[4]" type="radio" value="3"/>
				</td>
				<td>
					<input id="Question4_Opt4" name="responseToQuestion[4]" type="radio" value="4" />
				</td>
				<td>
					<input id="Question4_Opt5" name="responseToQuestion[4]" type="radio" value="5" />
				</td>
         </tr>
         <tr>
				<td class="colQuestion">5) I felt bored.</td>
				<td>
					<input id="Question5_Opt1" name="responseToQuestion[5]" type="radio" value="1" />
				</td>
				<td>
					<input id="Question5_Opt2" name="responseToQuestion[5]" type="radio" value="2" />
				</td>
				<td>
					<input id="Question5_Opt3" name="responseToQuestion[5]" type="radio" value="3"/>
				</td>
				<td>
					<input id="Question5_Opt4" name="responseToQuestion[5]" type="radio" value="4" />
				</td>
				<td>
					<input id="Question5_Opt5" name="responseToQuestion[5]" type="radio" value="5" />
				</td>
         </tr>
         <tr>
				<td class="colQuestion">6) I would play for longer.</td>
				<td>
					<input id="Question6_Opt1" name="responseToQuestion[6]" type="radio" value="1" />
				</td>
				<td>
					<input id="Question6_Opt2" name="responseToQuestion[6]" type="radio" value="2" />
				</td>
				<td>
					<input id="Question6_Opt3" name="responseToQuestion[6]" type="radio" value="3"/>
				</td>
				<td>
					<input id="Question6_Opt4" name="responseToQuestion[6]" type="radio" value="4" />
				</td>
				<td>
					<input id="Question6_Opt5" name="responseToQuestion[6]" type="radio" value="5" />
				</td>
			</tr>
		</tbody>
	</table>
   <input type='text' name='UID' hidden><br>
   <input class="button" type='submit' value='Submit'/>
   </form>
</div>

<script>
var uid =  "<?php global $UID; echo $UID; ?>";

// function loadEventHandler() {
//    var valid =  <?php global $validrequest; echo $validrequest; ?>;
//    if (!valid) {
//       document.getElementById("ex2_container").innerHTML = "Bad Request";
//    }
// }


function validateForm() {
      document.forms["frm"]["UID"].value = uid;
      var x = document.forms["frm"]["decision"].value;
      if (x == null || x == "" || x == 0) {
          alert("Please answer the questions to proceed." );
          return false;
      }
     
      return true;
}

</script>
</body>
</html>
