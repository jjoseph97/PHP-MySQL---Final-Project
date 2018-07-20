<?php
session_start();
include ("../includes/header.php");



//to reverse the login of any statement, we can use the ! char
if(!isset($_SESSION['estdrftu5sdf6hoetdry2'])){
	//echo "NOT logged in";
	header("Location:login.php?return=edit");
}else{
	// retrieve the query variable that decides which character we are editing. This is MOST important !!! 

	$hymnID = $_GET['hymn_id'];

	if(!isset($hymnID)){
		//$char_ID = 1; // assign a default value in case no query string value; this is important for later DB queries 

		$result = mysqli_query($con, "SELECT * from churchhymns LIMIT 1") or die(mysqli_error($con));
		while ($row = mysqli_fetch_array($result)){
			$hymnID = $row['hymn_id'];
		} 	
	} 


// Step 3: VALIDATIONS

	if(isset($_POST['submit'])){
		$newcomposer = strip_tags(trim($_POST['composer']));
		$newtitle = strip_tags(trim($_POST['title']));
		$newyear = strip_tags(trim($_POST['year']));
		$newtype = strip_tags(trim($_POST['type']));
		$newlabel = strip_tags(trim($_POST['label']));
		$newdescription = strip_tags(trim($_POST['description']));

		

		$boolValidateOK = 1;
		$strValidationMessage = "";


		// VALIDATIONS

		// Composer 
		if (strlen($newcomposer) < 2){
			$boolValidateOK = 0;
			$strValidationMessage .= "Please fill in a proper composer.<br>";
		}

		// Title 
		if (strlen($newtitle) < 2){
			$boolValidateOK = 0;
			$strValidationMessage .= "Please fill in a proper title.<br>";
		}

		// Year 
		if (strlen($newyear) < 2){
			$boolValidateOK = 0;
			$strValidationMessage .= "Please fill in a proper year.<br>";
		}

		// Type 
		if (strlen($newtype) < 2){
			$boolValidateOK = 0;
			$strValidationMessage .= "Please fill in a proper type.<br>";
		}

		// Label 
		if (strlen($newlabel) < 2){
			$boolValidateOK = 0;
			$strValidationMessage .= "Please fill in a proper label.<br>";
		}

		//Description

		if(strlen($newdescription) < 5){
			$boolValidateOK = 0;
			$strValidationMessage .= "Please fill in a description of at least 5 characters.<br>";
		}

		if(strlen($newdescription) > 1000){
			$boolValidateOK = 0;
			$strValidationMessage .= "Please keep your description under 800 characters.<br>";
		}

		//Sound clip
		/*if(strlen($newsoundclip) < 2){
			$boolValidateOK = 0;
			$strValidationMessage .= "Please do not change the tune provided.<br>";
		}

		if($_FILES['myfile']['type'] != "image/jpeg"){
			$boolValidateOK = 0;
			$strValidationMessage .= "Please upload only JPEG images. <br>";
		}

		if($_FILES['myfile']['type'] != "image/png"){
			$boolValidateOK = 0;
			$strValidationMessage .= "Please upload only PNG images. <br>";
		}*/

		if($_FILES['myfile']['size'] > 200000) { // this is artificially low for testing; must increase later for real gallery
			$boolValidateOK = 0;
			$strValidationMessage .= "Too large. File size limit is .2 MB <br>";
		}

		// SUCCESS
		if($boolValidateOK == 1){ // SUCCESS !!!
			/*if(move_uploaded_file($_FILES['myfile']['tmp_name'], "../originals/" . $filename)){

				$thisFile = "../originals/" . $filename;
				resizeImage($thisFile, "../thumbs/", 150); // path/filename, output folder, new width 

				resizeImage($thisFile, "../display/", 600); // path/filename, output folder, new width
*/

			mysqli_query($con, "UPDATE churchhymns SET
				composer = '$newcomposer', 
				title = '$newtitle',
				year = '$newyear',
				type = '$newtype',
				label = '$newlabel',
				description = '$newdescription' WHERE hymn_id = '$hymnID'") or die(mysqli_error($con));

			$strValidationMessage .= "<p style=\"font-weight: bold; color:red;\">Update Successfull !!!</p>";
		}
	}
}


// Step 2: retrieve data for the selected image only; use this to prepopulate the form  

	$result2 = mysqli_query($con, "SELECT * from churchhymns WHERE hymn_id = '$hymnID'") or die(mysqli_error($con));

	while ($row = mysqli_fetch_array($result2)){
		
		$composer = $row['composer'];		
		$title = $row['title'];
		$year = $row['year'];
		$type = $row['type'];
		$label = $row['label'];
		$description = $row['description'];
	}// \ Loop

	if (isset($_POST['delete'])){  
		mysqli_query($con, "DELETE FROM churchhymns WHERE hymn_id = '$hymnID'") or die(mysqli_error($con));
		$composer = "";
		$title = "";
		$year = "";
		$type = "";
		$label = "";
		$description = "";
		$filename = "";
		$soundclip = "";
	}
//}
?>

<script>
  function go()
  {
    // box = document.navform.entryselect; // gets the form element by the name attribute
    box = document.getElementById('entryselect'); // gets form element by the id.
    destination = box.options[box.selectedIndex].value;
    if (destination) location.href = destination;
  }
</script>

<div class="insert">
	<div id="title">
		<h1>Select a Hymn to Edit</h1>
	</div>
		
	<form id="myform" name="myform" method="post" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">
		<select name="entryselect" class="form-control" id="entryselect" onchange="go()" >
			<?php
				$result = mysqli_query($con, "SELECT * from churchhymns") or die(mysqli_error($con));

			while ($row = mysqli_fetch_array($result)){

				$titlelink = $row['title'];
				$hymn_idlink = $row['hymn_id'];


				if($hymn_idlink == $hymnID){
					echo "<option selected=\"selected\" value=\"edit.php?hymn_id=$hymn_idlink\">$titlelink</option>";
				}else{
					echo "<option value=\"edit.php?hymn_id=$hymn_idlink\">$titlelink</option>";	
				}
			}// \ Loop
			?>
		</select>
	<form>
</div>



<div class="insert">

	<form id="myform" name="myform" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>">

		<nav class="pull-right">
			<?php
				if($strValidationMessage){
					echo $strValidationMessage;
				}
			?>
		</nav>

		<div class="form-group">
			<label for="composer">Composer:</label>
			<input type="text" name="composer" class="form-control" value="<?php echo $composer; ?>">
		</div>

		<div class="form-group">
			<label for="title">Title:</label>
			<input type="text" name="title" class="form-control" value="<?php echo $title; ?>">
		</div>

		<div class="form-group">
			<label for="year">Year:</label>
			<input type="text" name="year" class="form-control" value="<?php echo $year; ?>">
		</div>

		<div class="form-group">
			<label for="type">Type:</label>
			<select name="type" id="type" class="form-control" value="<?php echo $type; ?>">
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
		</div>

		<div class="form-group">
			<label for="filename">Image:</label> <br><br>
			<?php
				$result = mysqli_query($con, "SELECT * from churchhymns where hymn_id = '$hymnID'") or die(mysqli_error($con));

			while ($row = mysqli_fetch_array($result)){
				$filename = $row['filename'];

					echo "<img src=\"../thumbs/$filename\">";
			}
			?>
		</div>


		<div class="form-group">
			<label for="label">Publisher Label:</label>
			<input type="text" name="label" class="form-control" value="<?php echo $label; ?>">
		</div>

		<div class="form-group">
			<label for="description">Description:</label>
			<textarea name="description" class="form-control"><?php echo $description; ?></textarea>
		</div>

		<!-- <div class="form-group">
			<label for="soundclip">Soundclip:</label>
			<input type="text" name="soundclip" class="form-control" value="<?php echo $soundclip; ?>">
		</div> -->

		

		<div class="form-group">
			<label for="submit">&nbsp;</label>
			<input type="submit" name="submit" class="btn btn-info" value="Submit">
			<label for="submit">&nbsp;</label>
			<input onclick="return ConfirmDelete();" type="submit" name="delete" class="btn btn-danger" value="Delete" >
		</div>

	</form>
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

<script>
function ConfirmDelete()
{
    var x = confirm("Are you sure you want to delete?");
    if (x)
    return true;
    else
  return false;
}
</script>



<?php
include ("../includes/footer.php");
?>



