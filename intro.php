<!DOCTYPE html>
<html>

<head>
   <meta charset="UTF-8">
   <link rel="stylesheet" type="text/css" href="css/forms.css" />
   <title>Instructions</title>
</head>

<body>

   <!-- PHP CHECKING CODE -->
   <?php
   // form parameters
   function test_input($data)
   {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
   }

   $UID =  "";
   $validrequest = 0;

   if ($_SERVER["REQUEST_METHOD"] == "GET") {
      $validrequest = 0;
   }

   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $validrequest = 1;
      if (!empty($_POST["UID"])) {
         $UID = test_input($_POST["UID"]);
      } else {
         $validrequest = 0;
      }
   }
   ?>

   <!--  PAGE CONTENT  -->
   <div class="header"></div>

   <div class="main">
      <h1>MIT Brain and Cognitive Sciences</h1>
      <br>
      <p>Thanks for accepting the HIT. We are cognitive science researchers interested in how people play. This is a short research study investigating how people do and discover new things. </p>

      <p>It involves the following:</p>
      <ul>
         <li>Because this is a University research project, we ask for your informed consent.</li>
         <li>Then we show the task instructions.</li>
         <li>Next comes the task itself.</li>
         <li>We ask for demographic information (not personally identifiable)</li>
         <li>At the end, we'll give you the completion code you need to get paid for the HIT.</li>
      </ul>
      <br><br>
      <p>The total time taken should be about 15 minutes. Please don't use the "back" button on your browser or
         close the window until you reach the end and receive your completion code. This is likely to break the experiment and may make it difficult for you
         to get paid. However, if something does go wrong please contact us! When you're ready to begin, click on the "start" button below.
      </p>

      <form name="frm" action="consent.php" method="post" onsubmit="return validateForm()">
         <input type="text" name="UID" hidden>
         <input type="text" name="consent" hidden><input type="submit" value="Start" />
      </form>
   <div class="footer"> This is a footer </div>

   </div>
</body>

<!-- SCRIPT TO VALIDATE FORM -->
<script>
   function validateForm() {
      var u_id = "<?php global $UID; echo $UID; ?>";
      document.forms["frm"]["UID"].value = u_id;
      document.forms["frm"]["consent"].value = "true";
      return true;
   }
</script>

</html>