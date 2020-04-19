<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
   <link rel="stylesheet" type="text/css" href="css/forms.css" />
   <title>Instructions</title>
</head>

<body>

   <!-- PHP CHECKING CODE -->
   <?php
   // // form parameters
   function test_input($data)
   {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }
   // define variables and set to empty values
   $dir = "data";
   $UID =  "abc";
   $ip=$_SERVER['REMOTE_ADDR'];
   $date = date('c');
   $browser = $_SERVER['HTTP_USER_AGENT'];
   $browser = str_replace(' ', '_', $browser);
   $validrequest = 0;

   // check if data directory is writable
   if (!is_writable($dir)) {
      echo 'The directory is not writable: ' . $dir . '<br>';
   }

   if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $validrequest = 0;
   }

   if ($_SERVER["REQUEST_METHOD"] == "POST") { 
      $validrequest = 1;
      // check for UID 
      if (!empty($_POST["UID"])) {
         $UID = test_input($_POST["UID"]);
       } else {
         $validrequest = 0;
       }

   // open data file for the participant in data/UID.txt
   $s = $dir . "/" . $UID . ".txt";
   $file = fopen($s,"a") or die("Error: Unable to open participant data file" . $s);
   $time=test_input($_POST["time"]);
   fwrite($file, $ip . " " . $date . " " . $browser . " " . $UID . " " . "\n");
   fclose($file);
   }
   ?>

   <!--  PAGE CONTENT  -->
   <div class="header">
      <h1>Research study on how people play</h1>
   </div>

   <!-- 1. INTRO -->
   <div class="main" id="intro">
      <br>
      <p>Thanks for accepting the HIT. We are cognitive science researchers interested in how people play.</p>
      <p>This is a short research study investigating how people do and discover new things. </p>
      <br>
      <p>It involves the following:</p>
      <ol>
         <li>Because this is a University research project, we ask for your informed consent.</li>
         <li>We also ask for demographic information (anonymous and not personally identifiable)</li>
         <li>Then we show the task instructions.</li>
         <li>Next comes the task itself. You will see some buttons that you can click on.</li>
         <li>After the task, answer some survey questions about your experience.</li>
         <li>At the end, we'll give you the completion code you need to get paid for the HIT.</li>
      </ol>
      <br>
      <p>The total time taken should be about 15 minutes.</p>
      <p>Please don't use the "back" button on your browser or close the window until you reach the end and receive your completion code. This is likely to break the experiment and may make it difficult for you
         to get paid. However, if something does go wrong please contact us!</p>
      <p> When you're ready to begin, click on the "next" button below.</p>

      <!-- <form name="frm" action="consent.php" method="post" onsubmit="return validateForm()">
         <input type="text" name="UID" hidden>
         <input class="button" type="text" name="consent" hidden><input type="submit" value="Start" />
      </form> -->
      <button id="NextButton" class="button" type="button" onClick="$('#intro').hide(); $('#consent').show()" tabindex=1>Next</button>
   </div>

   <!-- 2. Consent -->
   <div class="main" id="consent" style="display:none">
      <h2>Informed Consent Statement</h1>

         <p>Please consider this information carefully before deciding whether to participate in this research. By
            answering the following questions, you are participating in a study being performed by cognitive
            scientists in the MIT Department of Brain and Cognitive Science.</p>

         <p>If you have questions about this research, please contact Laura Schulz at <a href="mailto:lschulz@mit.edu">lschulz@mit.edu</a>
            <div class=""></div> Your participation in this study is completely
            voluntary and you may refuse to participate or you may choose to withdraw at any time without
            penalty or loss of benefits to which you are otherwise entitled. Your participation in this study will
            remain confidential. No personally identifiable information will be associated with your data. Also, all
            analyses of the data will be averaged across all the participants, so your individual responses will
            never be specifically analyzed.
         </p>

         <h2>Agreement:</h2>
         <p>The nature and purpose of this research have been sufficiently explained and I agree to participate in
            this study. I understand that I am free to withdraw at any time without incurring any penalty.</p>
         <p>Please consent by clicking "I agree" below to continue. Otherwise, please exit the study at this time.</p>
         <button id="NextButton" class="button" type="button" onClick="$('#consent').hide(); $('#instructions').show()" tabindex=1>I agree</button>
   </div>

   <!-- 3. Instructions -->
   <div class="main" id="instructions" style="display:none">
      <h2>Task Instructions</h2>
      <p>We're interested in what people do when they play.</p>
      <p>On the next page, we want you to play for 10 minutes and see what you can do and discover.</p>
      <p>That's it! When you're ready, click "Begin task" to get started. Have fun!</p>
      <!-- <button id="NextButton" class="button" type="button" onClick="$('#instructions').hide(); window.location='task.php'" tabindex=1>Start playing</button> -->
      <form name="frm" action="task.php" method="post" onsubmit="return submitForm()">
            <input type="text" name="UID" hidden>
            <input type="text" name="consent" hidden>
            <input class="button" type="submit" value="Begin Task" />
      </form>
   </div>

   <!-- 4. Demographics -->


   <div class="footer"> Research Study | MIT Early Childhood Cognition Lab</div>
</body>

<!-- SCRIPT TO VALIDATE FORM -->
<script>
   function submitForm() {
      var UID = "S"; // subject ID
      UID = UID + Math.floor((Math.random() * 100000000) + 1) + "_" + Date.now();
      document.forms["frm"]["UID"].value = UID;
      document.forms["frm"]["consent"].value = "true";
      console.log(UID)
      return true;
   }
</script>

</html>