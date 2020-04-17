<!DOCTYPE html>
<html>

<head>
	<script src="js/board.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.1.3/howler.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/dom-to-image/2.6.0/dom-to-image.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script>
		var atone = new Howl({
			src: ['sounds/atone.mp3']
		});
		var glass = new Howl({
			src: ['sounds/glass.mp3']
		});
		var arrow = new Howl({
			src: ['sounds/arrow.mp3']
		});
		var blop = new Howl({
			src: ['sounds/blop.mp3']
		});

		// JQUERY
		// TODO: convert console.log into AJAX server calls
		$(document).ready(function () {
			$(".round-button").click(function () {
				log = {time: Date.now()}
				var buttid = $(this).attr('id');
				log.action = buttid;
				log.effect=buttclick(buttid);
				console.log(log)
			});
			$("#clear").click(function() {
				log = {time: Date.now(), action: "clear", effect: "clear board"}
				console.log(log)
				blankslate()
			})
			$("#audio").click(function() {
				log = {time: Date.now(), action: "toggle sound"}
				log.effect= togglesound() ? "soundon" : "soundoff";
				console.log(log)
			})
			$("#submit").click(function() {
				log = {time: Date.now(), action: "submit"}
				log.effect = submitboard();
				console.log(log)
			})
			$( "#demoform" ).submit(function( event ) {
				log = {time: Date.now(), action: "demo"}
				log.effect = drawdemo();
				console.log(log);
				event.preventDefault();
			});
		});
	</script>
	<link rel="stylesheet" type="text/css" href="css/board.css" />
	<title></title>
</head>

<body>

	<div id="wrapper">
		<!-- BUTTON GRID -->
		<div class="grid-container" id="theboard">
			<div class="round-button" id="b1"></div>
			<div class="round-button" id="b2"></div>
			<div class="round-button" id="b3"></div>
			<div class="round-button" id="b4"></div>
			<div class="round-button" id="b5"></div>
			<div class="round-button" id="b6"></div>
			<div class="round-button" id="b7"></div>
			<div class="round-button" id="b8"></div>
			<div class="round-button" id="b9"></div>
			<div class="round-button" id="b10"></div>
			<div class="round-button" id="b11"></div>
			<div class="round-button" id="b12"></div>
			<div class="round-button" id="b13"></div>
			<div class="round-button" id="b14"></div>
			<div class="round-button" id="b15"></div>
			<div class="round-button" id="b16"></div>
			<div class="round-button" id="b17"></div>
			<div class="round-button" id="b18"></div>
			<div class="round-button" id="b19"></div>
			<div class="round-button" id="b20"></div>
			<div class="round-button" id="b21"></div>
			<div class="round-button" id="b22"></div>
			<div class="round-button" id="b23"></div>
			<div class="round-button" id="b24"></div>
			<div class="round-button" id="b25"></div>
			<div class="round-button" id="b26"></div>
			<div class="round-button" id="b27"></div>
			<div class="round-button" id="b28"></div>
			<div class="round-button" id="b29"></div>
			<div class="round-button" id="b30"></div>
			<div class="round-button" id="b31"></div>
			<div class="round-button" id="b32"></div>
			<div class="round-button" id="b33"></div>
			<div class="round-button" id="b34"></div>
			<div class="round-button" id="b35"></div>
			<div class="round-button" id="b36"></div>
			<div class="round-button" id="b37"></div>
			<div class="round-button" id="b38"></div>
			<div class="round-button" id="b39"></div>
			<div class="round-button" id="b40"></div>
			<div class="round-button" id="b41"></div>
			<div class="round-button" id="b42"></div>
			<div class="round-button" id="b43"></div>
			<div class="round-button" id="b44"></div>
			<div class="round-button" id="b45"></div>
			<div class="round-button" id="b46"></div>
			<div class="round-button" id="b47"></div>
			<div class="round-button" id="b48"></div>
			<div class="round-button" id="b49"></div>
			<div class="round-button" id="b50"></div>
			<div class="round-button" id="b51"></div>
			<div class="round-button" id="b52"></div>
			<div class="round-button" id="b53"></div>
			<div class="round-button" id="b54"></div>
			<div class="round-button" id="b55"></div>
			<div class="round-button" id="b56"></div>
			<div class="round-button" id="b57"></div>
			<div class="round-button" id="b58"></div>
			<div class="round-button" id="b59"></div>
			<div class="round-button" id="b60"></div>
			<div class="round-button" id="b61"></div>
			<div class="round-button" id="b62"></div>
			<div class="round-button" id="b63"></div>
			<div class="round-button" id="b64"></div>
		</div>

		<!-- SPACE FOR PREVIEWS -->
		<div class="preview-container" id="previews">
			<p><span id="demo">No image saved/loaded!</span></p>
			<p><span id="demoarray">No data yet!</span></p>
			<div id=previewimg></div>
		</div>

		<!-- CONTROL BUTTONS -->
		<div class="controls-container" id="controls1">
			<div class="button" id="submit">submit</div>
			<div class="button" id="clear">clear</div>
			<div class="button" id="audio">sound off</div>
			<form id="endgame" name="frm" action="debrief.php" method="post" onsubmit="return validateForm()">
				<input type="text" name="UID" hidden>
				<input type="text" name="debrief" hidden>
				<input class="button" type="submit" value="I'm done playing">
			</form>
		</div>

		<!-- extra CONTROL BUTTONS -->
		<div class="controls-container" id="controls2">
			TESTING BELOW!! <br>
			Select a demo:
			<form id="demoform">
				<select id="demoselector">
					<option>Surprise me!</option>
					<option>Rectangle</option>
					<option>Heart</option>
				</select>
				<input class="button" type="submit" value="Draw Demo">
			</form>
			<!-- <div class="button" id="demo" onclick="drawdemo()">Draw Demo!</div> -->
		</div>
	</div>

</body>

<!-- SCRIPT TO VALIDATE ENDGAME FORM -->
<script>
	function validateForm() {
	   var u_id = "<?php global $UID; echo $UID; ?>";
	   document.forms["frm"]["UID"].value = u_id;
	   document.forms["frm"]["debrief"].value = "true";
	   return true;
	}
 </script>
</html>