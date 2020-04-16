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
      <h1>INSTRUCTIONS</h1>
      <br>
      <p>We're interested in what people do when they play.</p>

      <p>On the next page, we want you to play for 10 minutes and see what you can do and discover.</p>

      <p>That's it! When you're ready, click "Begin task" to get started. Have fun!</p>
      <br><br>

      <form name="frm" action="index.html" method="post" onsubmit="return validateForm()">
         <input type="text" name="UID" hidden>
         <input type="text" name="begin-task" hidden><input type="submit" value="Begin task"/>
      </form>
   <div class="footer"> This is a footer </div>

   </div>
</body>

<!-- SCRIPT TO VALIDATE FORM -->
<script>
   function validateForm() {
      var u_id = "<?php global $UID; echo $UID; ?>";
      document.forms["frm"]["UID"].value = u_id;
      document.forms["frm"]["begin-task"].value = "true";
      return true;
   }
</script>

</html>