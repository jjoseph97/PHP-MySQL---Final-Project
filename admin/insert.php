<?php 
session_start();
//to reverse the login of any statement, we can use the ! char
if(!isset($_SESSION['estdrftu5sdf6hoetdry2'])){
	//echo "NOT logged in";
	header("Location:login.php?return=insert");
}else{


	include("../includes/header.php");


	if(isset($_POST['submit'])){
		$filetmpname = $_FILES['myfile']['tmp_name'];
		$composer = strip_tags(trim($_POST['composer']));
		$title = strip_tags(trim($_POST['title']));
		$year = strip_tags(trim($_POST['year']));
		$type = strip_tags(trim($_POST['type']));
		$filename = $_FILES['myfile']['name'];
		$label = strip_tags(trim($_POST['label']));
		$description = strip_tags(trim($_POST['description']));
		$soundclip = $_FILES['soundclip']['name'];
		/*$soundclipbool = $_POST['soundclipbool'];
		echo $soundclipbool;*/
		

		//echo "$composer, $title, $year, $type, $filename, $label, $description, $soundclip";

		$boolValidateOK = 1;
		$strValidationMessage = "";
		$strValidationForComposer = "";
		$strValidationForTitle = "";
		$strValidationForYear = "";
		$strValidationForType = "";
		$strValidationForImage = "";
		$strValidationForLabel = "";
		/*$strValidationForDescription = "";
		$strValidationForSoundclip = "";*/
		

		// Composer
		if (strlen($composer) < 2){
			$boolValidateOK = 0;
			$strValidationForComposer .= "Please fill in a proper composer.<br>";
		}

		// Title
		if (strlen($title) < 2){
			$boolValidateOK = 0;
			$strValidationForTitle .= "Please fill in a proper title.<br>";
		}

		// Year
		if (strlen($year) != 4){
			$boolValidateOK = 0;
			$strValidationForYear .= "Please enter only 4 digits for year.<br>";
		}

		// Type
		if ($type == "Select..."){
			$boolValidateOK = 0;
			$strValidationForType .= "Please select a type from the dropdown.<br>";
		}

		// Label
		if (strlen($label) < 2){
			$boolValidateOK = 0;
			$strValidationForLabel .= "Please fill in a proper label.<br>";
		}

		// Type
		$types = array('image/jpeg', 'image/jpg', 'image/png');
		if(!in_array($_FILES['myfile']['type'], $types)){
			$boolValidateOK = 0;
			$strValidationForImage .= "Please upload only JPEG images. <br>";
		}

		// Type
		$types = array('audio/mp3');
		if ($soundclip != "") {
			if(!in_array($_FILES['soundclip']['type'], $types)){
				$boolValidateOK = 0;
				$strValidationForSoundclip .= "Please upload a Mp3 file only. <br>";
			}
		}
		

		// Size
		if($_FILES['myfile']['size'] > 10000000) { // this is artificially low for testing; must increase later for real gallery
			$boolValidateOK = 0;
			$strValidationMessage .= "Too large. File size limit is .2 MB <br>";
		}

		


		if($boolValidateOK == 1){
			if(move_uploaded_file($_FILES['myfile']['tmp_name'], "../originals/" . $filename)){

				$thisFile = "../originals/" . $filename;
				if($_FILES['myfile']['type'] == "image/png"){
					resizeImagepng($thisFile, "../thumbs/", 150); // path/filename, output folder, new width 

					resizeImagepng($thisFile, "../display/", 500); // path/filename, output folder, new width 
				}else{
				resizeImage($thisFile, "../thumbs/", 150); // path/filename, output folder, new width 

				resizeImage($thisFile, "../display/", 150); // path/filename, output folder, new width
				}


				mysqli_query($con, "INSERT INTO churchhymns (composer, title, year, type, filename, label, description, soundclip) VALUES ('$composer', '$title', '$year', '$type', '$filename', '$label', '$description', '$soundclip')") or die(mysqli_error($con));
				$strValidationMessage .= "Hymn added !!!";

				$composer = "";
				$title = "";
				$year = "";
				$type = "";
				$filename = "";
				$label = "";
				$description = "";
				$soundclip = "";

			}
		}
	}
 ?>


<div class="insert">
	<div id="title">
		<h1>Insert Hymn Info</h1> 
	</div>
	<form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

		<div class="form-group">
			<label for="composer">Composer:</label>
			<input type="text" name="composer" class="form-control" value="<?php echo $composer; ?>">
			<?php if ($boolValidateOK ==0 && $strValidationForComposer != ""){
				echo "<p style=\"color:red; font-weight:bold; display:inline-block;\">*".$strValidationForComposer."</p>";
			} ?>
		</div>

		<div class="form-group">
			<label for="title">Title:</label>
			<input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
			<?php if ($boolValidateOK ==0 && $strValidationForTitle != ""){
				echo "<p style=\"color:red; font-weight:bold; display:inline-block;\">*".$strValidationForTitle."</p>";
			} ?>
		</div>

		<div class="form-group">
			<label for="year">Year:</label>
			<input type="number" name="year" step="1" class="form-control" value="<?php echo $year; ?>">
			<?php if ($boolValidateOK ==0 && $strValidationForYear != ""){
				echo "<p style=\"color:red; font-weight:bold; display:inline-block;\">*".$strValidationForYear."</p>";
			} ?>
		</div>

		<div class="form-group">
			<label for="type">Type:</label>
			<select name="type" id="type" class="form-control">
				<option>Select...</option>
				<option <?php if($type == "Sunday Hymns") echo "selected" ?>>Sunday Hymns</option>
				<option <?php if($type == "Baptism Hymns") echo "selected" ?>>Baptism Hymns</option>
				<option <?php if($type == "Confirmation Hymns") echo "selected" ?>>Confirmation Hymns</option>
				<option <?php if($type == "Communion Hymns") echo "selected" ?>>Communion Hymns</option>
				<option <?php if($type == "Wedding Hymns") echo "selected" ?>>Wedding Hymns</option>
				<option <?php if($type == "Christmas Hymns") echo "selected" ?>>Christmas Hymns</option>
				<option <?php if($type == "Easter Hymns") echo "selected" ?>>Easter Hymns</option>
				<option <?php if($type == "Funeral Hymns") echo "selected" ?>>Funeral Hymns</option>
			</select>

			<!-- <input type="text" name="type" class="form-control" value="<?php echo $type; ?>"> -->
			<?php if ($boolValidateOK ==0 && $strValidationForType != ""){
				echo "<p style=\"color:red; font-weight:bold; display:inline-block;\">*".$strValidationForType."</p>";
			} ?>
		</div>

		<div class="form-group">
			<label for="myfile">Image:</label>
			<input type="file" name="myfile" class="form-control" value="<?php echo $filename; ?>">
			<?php if ($boolValidateOK ==0 && $strValidationForImage != ""){
				echo "<p style=\"color:red; font-weight:bold; display:inline-block;\">*".$strValidationForImage."</p>";
			} ?>
		</div>

		<div class="form-group">
			<label for="label">Publisher Label:</label>
			<input type="text" name="label" class="form-control" value="<?php echo $label; ?>">
			<?php if ($boolValidateOK ==0 && $strValidationForLabel != ""){
				echo "<p style=\"color:red; font-weight:bold; display:inline-block;\">*".$strValidationForLabel."</p>";
			} ?>
		</div>

		<div class="form-group">
			<label for="description">Description:</label>
			<textarea name="description" class="form-control"><?php echo $description; ?></textarea>
			<?php if ($boolValidateOK ==0 && $strValidationForDescription != ""){
				echo "<p style=\"color:red; font-weight:bold; display:inline-block;\">*".$strValidationForDescription."</p>";
			} ?>
		</div>

		<div class="form-group">
			<label for="soundclip">Soundclip:</label>
			<input type="file" name="soundclip" class="form-control" value="<?php echo $soundclip; ?>">
		</div>

		<div class="form-group">
			<label for="submit">&nbsp;</label>
			<input type="submit" name="submit" class="btn btn-info" value="Submit">
		</div>
	</form>

<?php
	if($strValidationMessage){
		if($boolValidateOK == 0) {
			echo "<p style=\"color:#4bb543; font-weight:bold;\">".$strValidationMessage."</p>";
		}else{
			echo "<p style=\"color:red; font-weight:bold;\">".$strValidationMessage."</p>";	
		}
	}
}



// Let's create a re-usable function to resize images
function resizeImage($file, $folder, $newwidth){

	/*echo "$file, $folder, $newwidth";*/
	list($width, $height) = getimagesize($file);

	$imgRatio = $width/$height;
	$newheight = $newwidth/$imgRatio;

	//echo "$width | $height | $imgRatio"; // testing

	$thumb = imagecreatetruecolor($newwidth, $newheight);
	$source = imagecreatefromjpeg($file);

	imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

	$newFileName = $folder . $_FILES['myfile']['name'];

	imagejpeg($thumb, $newFileName, 80);

	imagedestroy($thumb);
	imagedestroy($source);

}

function resizeImagepng($file, $folder, $newwidth){

	/*echo "$file, $folder, $newwidth";*/
	list($width, $height) = getimagesize($file);

	$imgRatio = $width/$height;
	$newheight = $newwidth/$imgRatio;

	//echo "$width | $height | $imgRatio"; // testing

	$thumb = imagecreatetruecolor($newwidth, $newheight);
	$source = imagecreatefrompng($file);

	imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

	$newFileName = $folder . $_FILES['myfile']['name'];

	imagepng($thumb, $newFileName, 80);

	imagedestroy($thumb);
	imagedestroy($source);

}

?>
</div>


<script type="text/javascript">
  function lookup(inputString) {
    if(inputString.length == 0) {
      // Hide the suggestion box.
      $('#suggestions').hide();
    } else {
      $.post("../rpc.php", {queryString: ""+inputString+""}, function(data){
        if(data.length >0) {
          $('#suggestions').show();
          $('#autoSuggestionsList').html(data);
        }
      });
    }
  } // lookup
  
  function fill(thisValue) {
    $('#inputString').val(thisValue);
    setTimeout("$('#suggestions').hide();", 200);
  }
</script>

<?php
	include("../includes/footer.php");
?>
