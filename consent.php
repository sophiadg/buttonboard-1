<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/forms.css" />
    <title>Informed Consent agreement</title>
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
        <h1>Informed Consent Statement</h1>

        <p>Please consider this information carefully before deciding whether to participate in this research. By
answering the following questions, you are participating in a study being performed by cognitive
scientists in the MIT Department of Brain and Cognitive Science.</p>

        <p>If you have questions about this research, please contact Laura Schulz at <a href="mailto:lschulz@mit.edu">lschulz@mit.edu</a><div class=""></div> Your participation in this study is completely
            voluntary and you may refuse to participate or you may choose to withdraw at any time without
            penalty or loss of benefits to which you are otherwise entitled. Your participation in this study will
            remain confidential. No personally identifiable information will be associated with your data. Also, all
            analyses of the data will be averaged across all the participants, so your individual responses will
            never be specifically analyzed.</p>

        <p>Contact info, PI, etc.</p>
        <h2>Agreement:</h2>
        <p>The nature and purpose of this research have been sufficiently explained and I agree to participate in
            this study. I understand that I am free to withdraw at any time without incurring any penalty.</p>
        <p>Please consent by clicking the button below to continue. Otherwise, please exit the study at this time.</p>

        <form name="frm" action="instructions.php" method="post" onsubmit="return validateForm()">
            <input type="text" name="UID" hidden>
            <input type="text" name="instructions" hidden>
            <input class="button" type="submit" value="I agree">
        </form>

    </div>
    <div class="footer">This is a footer</div>
</body>

<!-- SCRIPT TO VALIDATE FORM -->
<script>
    function validateForm() {
        var u_id = "<?php global $UID;
                    echo $UID; ?>";
        document.forms["frm"]["UID"].value = u_id;
        document.forms["frm"]["instructions"].value = "true";
        return true;
    }
</script>

</html>