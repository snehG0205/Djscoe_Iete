<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
        <meta name="theme-color" content="#2196F3">
        <title>IETE</title>

        <!-- CSS  -->
        <link href="min/plugin-min.css" type="text/css" rel="stylesheet">
        <link href="min/custom-min.css" type="text/css" rel="stylesheet">
				<!-- Icons -->
				 <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
				 <link rel="icon" type="image/png" href="img/favicon.jpg">
        <!--  Scripts-->
        <script src="min/plugin-min.js"></script>
        <script src="min/custom-min.js"></script>
				<style media="screen">
				.tabs .tab a{
						color: #42CAD8;
					}
					.tabs .tab a:hover {
					    color: #42CAD8;
					}

					.tabs .indicator {
					    background-color: #42CAD8;
						}
				</style>
	</head>
	<body class="blue-grey darken-4">
		<div class="container">
			<div class="row"></div>
			<div class="card">
				<div class="card-content">
					<span class="card-title black-text">Admin Panel</span>
					<p>Upload Events and Newsletters Here</p>
				</div>
				<div class="card-tabs">
					<ul class="tabs tabs-fixed-width">
						<li class="tab"><a class="active" href="#newsletter">Newsletter</a></li>
						<li class="tab"><a href="#event">Event</a></li>
					</ul>
				</div>
				<div class="card-content grey lighten-4">
					<!-- Upload Newsletter  -->
					<div id="newsletter">
						<div class="container">
							<form action="#" method="post" enctype="multipart/form-data">
								<br><br>
								<span>Please upload only *.pdf files. <br>The name of the file will appear on the website. </span>
								<br><br>
									<div class="file-field input-field">
										<div class="btn blue lighten-1">
											<span>File</span>
											<input type="file" name="newsletter" placeholder="Click Here..." required>
										</div>
										<div class="file-path-wrapper">
											<input class="file-path validate" type="text">
										</div>
									</div><br><br>
									<span  style="padding-left:45%;"><button class="btn-floating halfway-fab waves-effect waves-light blue lighten-1 btn-large" type="submit" name="news">
										 <i class="material-icons">backup</i>
									 </button></span>
									 <!-- Check Button -->
									 <!-- <button class="btn-floating halfway-fab waves-effect waves-light indigo darken-4 btn-large" name="action">
										 <i class="material-icons">call_made</i>
									 </button> -->
								</form>
						</div>

					</div>
					<!-- Upload Events -->
					<div id="event">
						<div class="container">
							<form class="" action="#" method="post" enctype="multipart/form-data">
								<div class="input-field col s6">
									 <input id="event_name" type="text" class="validate" name="event_name">
									 <label for="event_name">Event Name</label>
								 </div>
								 <div class="input-field col s6">
								 	 <input type="date" class="datepicker" id="event_date" name="event_date">
									 <label for="event_date">Event Date</label>
								 </div>
								 <div class="input-field col s6">
									 <textarea id="event_description" name="event_description" class="materialize-textarea"></textarea>
									 <label for="event_description">Event Description</label>
								 </div>
								 <div class="file-field input-field">
									 <div class="btn blue lighten-1">
										 <span>Cover Image</span>
										 <input type="file" name="cover_image" placeholder="Click Here..." required>
									 </div>
									 <div class="file-path-wrapper">
										 <input class="file-path validate" type="text">
									 </div>
								 </div>
								 <div class="file-field input-field">
									<div class="btn blue lighten-1">
										<span>Image(s)</span>
										<input type="file" name="images[]" type="file" multiple="multiple">
									</div>
									<div class="file-path-wrapper">
										<input class="file-path validate" type="text">
									</div>
								</div>
								<span  style="padding-left:45%;"><button class="btn-floating halfway-fab waves-effect waves-light blue lighten-1 btn-large" type="submit" name="event">
									 <i class="material-icons">call_merge</i>
								 </button></span>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
		$('.datepicker').pickadate({
				selectMonths: true, // Creates a dropdown to control month
				selectYears: 5 // Creates a dropdown of 15 years to control year
				});
		</script>
	</body>
</html>

<?php
		if (isset($_POST["news"])) {
			// echo "pressed";
			opendir('assets/newsletter');

			$file = $_FILES['newsletter']['name'];
				//Get the temp file path
				$path = $_FILES['newsletter']['name'];
				$ext = pathinfo($path, PATHINFO_EXTENSION);
				// echo $ext;
				if (strcmp($ext,"pdf")!=0) {
					echo "only pdf allowed";
					die();
				}
				$tmpFilePath = $_FILES['newsletter']['tmp_name'];
				//Make sure tempfilepath is not empty, that is, image exists
				if ($tmpFilePath != "")
				{
					//Setup our new file path
					$newFilePath = "assets/newsletter/" . $_FILES['newsletter']['name'];

					//Upload the file into the temp dir
					move_uploaded_file($tmpFilePath, $newFilePath);
				}

			// echo "<script>alert('Upload Successful');</script>";
			$name = str_replace(" ","_",$_FILES['newsletter']['name']);
			echo $name;
			$res = rename("assets/newsletter/" . $_FILES['newsletter']['name'],"assets/newsletter/" . $name);
			echo "<br>".$res;
		}

		// Check Button Code
		// if (isset($_POST["action"])) {
		// 	header("location: assets/newsletter");
		// }

		if (isset($_POST["event"])) {
			$event_name = $_POST["event_name"];
			$event_date = $_POST["event_date"];
			$event_desc = $_POST["event_description"];
			$cover_image = $_FILES['cover_image']['name'];
			$photos = $_FILES['images']['name'];

			$conn=null;
			$servername = "localhost";
			$username = "root";
			$password = "";
			$dbname = "test";
			$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

			$flag = getimagesize( $_FILES['cover_image']['tmp_name']);
			if ($flag === FALSE) {
				die("File added for cover image is not an image");
			}
			for ($j=0; $j <  count($_FILES['images']['name']); $j++) {
				$flag = getimagesize($_FILES['images']['tmp_name'][$j]);
				if ($flag === FALSE) {
					die("File added in images is not an image");
				}
			}

			$sql = "INSERT INTO ieteEvents (event_name,event_date,event_description,cover_image) VALUES ('".$event_name."','".$event_date."','".$event_desc."','".$cover_image."');";
			//echo $sql;

			 mysqli_query($conn, $sql) or die("Insert Failed");

			if (mkdir('assets/events/'.$event_name)) {
				// echo "folder created";
			}
				# code to upload cover image
				$tmpFilePath = $_FILES['cover_image']['tmp_name'];
				if ($tmpFilePath != "")
				{
					$newFilePath = "assets/events/".$event_name."/" . $_FILES['cover_image']['name'];
					move_uploaded_file($tmpFilePath, $newFilePath) or die("cover upload failed");
				}
				# code to upload rest of the images
				$total = count($_FILES['images']['name']);
				for($i=0; $i<$total; $i++) {
				  //Get the temp file path
				  $tmpFilePath = $_FILES['images']['tmp_name'][$i];

				  if ($tmpFilePath != ""){
				    $newFilePath = "assets/events/".$event_name."/". $_FILES['images']['name'][$i];
				   move_uploaded_file($tmpFilePath, $newFilePath) or die("image upload failed");
				  }
				}
			}



?>
