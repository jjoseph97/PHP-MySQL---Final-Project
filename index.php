<?php
session_start();

include ("includes/header.php");

//////////// pagination
$getcount = mysqli_query ($con,"SELECT COUNT(*) FROM churchhymns");
$postnum = mysqli_result($getcount,0);// this needs a fix for MySQLi upgrade; see custom function below
$limit = 9;
if($postnum > $limit){
$tagend = round($postnum % $limit,0);
$splits = round(($postnum - $tagend)/$limit,0);

if($tagend == 0){
$num_pages = $splits;
}else{
$num_pages = $splits + 1;
}

if(isset($_GET['pg'])){
$pg = $_GET['pg'];
}else{
$pg = 1;
}
$startpos = ($pg*$limit)-$limit;
$limstring = "LIMIT $startpos,$limit";
}else{
$limstring = "LIMIT 0,$limit";
}

// MySQLi upgrade: we need this for mysql_result() equivalent
function mysqli_result($res, $row, $field=0) { 
    $res->data_seek($row); 
    $datarow = $res->fetch_array(); 
    return $datarow[$field]; 
}
//////////////

?>

<div class="hymnprofile">
	<div class="col-md-8">
	
	<?php

	// FILTERING YOUR DB
	$displayby = $_GET['displayby'];
	// $displayby2 = $_GET['displayby2'];
	$displayvalue = $_GET['displayvalue'];
	$min = $_GET['min'];
	$max = $_GET['max'];
	$searchterm = $_POST['searchterm'];
	
	

	if(isset($displayby) && isset($displayvalue)) {
		if ($displayby == "type" || $displayby == "year" || $displayby == "composer" || $displayby == "label") {
			// HERE IS THE MAGIC: WE TELL OUR DB WHICH COLUMN TO LOOK IN, AND THEN WHICH VALUE FROM THAT COLUMN WE'RE LOOKING FOR
			$result = mysqli_query($con,"SELECT * FROM churchhymns WHERE $displayby LIKE '$displayvalue' ") or die (mysql_error());
		} elseif ($displayby == "composer") {
			$result = mysqli_query($con, "SELECT * FROM churchhymns WHERE $displayby LIKE '$composer' ") or die (mysql_error());
		} elseif ($displayby == "label") {
			$result = mysqli_query($con, "SELECT * FROM churchhymns WHERE $displayby LIKE '$label' ") or die (mysql_error());
		} elseif ($displayby == "title") {
			$result = mysqli_query($con, "SELECT * FROM churchhymns WHERE $displayby LIKE '$searchterm' ") or die (mysql_error());
		}
	} elseif (isset($displayby) && isset($min) && isset($max)) {
		$result = mysqli_query($con, "SELECT * FROM churchhymns WHERE $displayby BETWEEN '$min' AND '$max' ORDER BY year") or die (mysql_error());
	} else {
		$result = mysqli_query($con, "SELECT * FROM churchhymns $limstring") or die(mysql_error($con));	
	}

	// if(isset($displayby2) && isset($displayvalue)) {
	// 	if ($displayby2 == "year" && isset($min) && isset($max)) {
	// 		echo "success";
	// 		$result = mysqli_query($con, "SELECT * FROM churchhymns WHERE $displayby2 BETWEEN '$min' AND '$max' ORDER BY year") or die (mysql_error());
	// 	}
	// }

	if($displayby == 'type'){
		echo "<h1>Type: $displayvalue</h1>";
	} elseif($displayby == 'composer'){
		echo "<h1>Composer: $displayvalue</h1>";
	} elseif($displayby == 'year' && !isset($min) && !isset($max)){
		echo "<h1>Year: $displayvalue</h1>";
	} elseif($displayby == 'year' && isset($min) && isset($max)){
		echo "<h1>Years between $min and $max</h1>";
	} elseif($displayby == 'label'){
		echo "<h1>Publisher: $displayvalue</h1>";
	}


	while($row = mysqli_fetch_array($result)){
		$hymn_id = $row['hymn_id'];
		$composer = $row['composer'];
		$title = $row['title'];
		$year = $row['year'];
		$type = $row['type'];
		$filename = $row['filename'];
		$label = $row['label'];
		$description = $row['description'];
		$soundclip = $row['soundclip'];

		echo "<div class=\"thumbs\">";
			echo "<div class=\"title\">$title</div>";	
				echo "<div class=\"image\">";
					echo "\n\t<p> <a href=\"display.php?hymn_id=$hymn_id\"><img src=\"thumbs/$filename\"></a></p>";
			echo "</div>";
		echo "</div>";
	}
	?>
	<?php if (!isset($displayby)) :?>
		<ul class="col-md-12 pagination">
		<?php

			///////////////// pagination links: perhaps put these BELOW where your results are echo'd out.
			if($postnum > $limit){
			$n = $pg + 1;
			$p = $pg - 1;
			$thisroot = $_SERVER['PHP_SELF'];
			if($pg > 1){
			echo "<li>
					<a href=\"$thisroot?pg=$p\" aria-label=\"Previous\"><span aria-hidden=\"true\">&laquo;</span></a>
				  </li>";
			}
			for($i=1; $i<=$num_pages; $i++){
			if($i!= $pg){
			echo "<li><a href=\"$thisroot?pg=$i\">$i</a>&nbsp;&nbsp;";
			}else{
			echo "<li><a href=\"#\">$i</a></li>";
			}
			}
			if($pg < $num_pages){
			echo "<li>
					<a href=\"$thisroot?pg=$n\" aria-label=\"Next\"><span aria-hidden=\"true\">&raquo;</span></a>
				  </li>";
			}
		}
		////////////// end pagination

		 ?>
		</ul>
	<?php endif; ?>
	</div>
		
	

	<div class="col-md-4">
		<div class="panel-group">
			<div class="panel-header">
				<h2 class="panel-title">
					<a data-toggle="collapse" href="#test">Categories</a>
				</h2>
			</div>
			<div class="panel-body">
				<div class="panel-collapse collapse" id="test">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php?displayby=type&displayvalue=Sunday Hymns">Sunday Hymns</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=type&displayvalue=Baptism Hymns">Baptism Hymns</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=type&displayvalue=Confirmation Hymns">Confirmation Hymns</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=type&displayvalue=Communion Hymns">Communion Hymns</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=type&displayvalue=Wedding Hymns">Wedding Hymns</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=type&displayvalue=Christmas Hymns">Christmas Hymns</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=type&displayvalue=Easter Hymns">Easter Hymns</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=type&displayvalue=Funeral Hymns">Funeral Hymns</a><br /></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="panel-group">
			<div class="panel-header">
				<h2 class="panel-title">
					<a data-toggle="collapse" href="#test1">Popular Composers</a>
				</h2>
			</div>
			<div class="panel-body">
				<div class="panel-collapse collapse" id="test1">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php?displayby=composer&displayvalue=Dan Forrest">Dan Forrest</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=composer&displayvalue=Kola Owolabi">Kola Owolabi</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=composer&displayvalue=Marty Haugen">Marty Haugen</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=composer&displayvalue=Bernadette Farrell">Bernadette Farrell</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=composer&displayvalue=David Haas">David Haas</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=composer&displayvalue=David Haas and Michael Joncas">David Haas and Michael Joncas</a><br /></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="panel-group">
			<div class="panel-header">
				<h2 class="panel-title">
					<a data-toggle="collapse" href="#test2">Year</a>
				</h2>
			</div>
			<div class="panel-body">
				<div class="panel-collapse collapse" id="test2">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php?displayby=year&displayvalue=1994">1994</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=year&displayvalue=1995">1995</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=year&displayvalue=2008">2008</a><br /></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="panel-group">
			<div class="panel-header">
				<h2 class="panel-title">
					<a data-toggle="collapse" href="#test3">Decades</a>
				</h2>
			</div>
			<div class="panel-body">
				<div class="panel-collapse collapse" id="test3">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php?displayby=year&min=1970&max=1980">1970-1980</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=year&min=2000&max=2010">2000-2010</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=year&min=2010&max=2017">2010-2017</a><br /></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="panel-group">
			<div class="panel-header">
				<h2 class="panel-title">
					<a data-toggle="collapse" href="#test4">Publishers</a>
				</h2>
			</div>
			<div class="panel-body">
				<div class="panel-collapse collapse" id="test4">
					<ul class="list-group">
						<li class="list-group-item"><a href="index.php?displayby=label&displayvalue=OCP - Choral Series">OCP - Choral Series</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=label&displayvalue=GIA PUBLICATIONS, INC.">GIA Publications Inc.</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=label&displayvalue=OCP Publications">OCP Publications</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=label&displayvalue=Hope Publishing Company">Hope Publishing Company</a><br /></li>
						<li class="list-group-item"><a href="index.php?displayby=label&displayvalue=Capital University Choral Series">Capital University Choral Series</a><br /></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
  function lookup(inputString) {
    if(inputString.length == 0) {
      // Hide the suggestion box.
      $('#suggestions').hide();
    } else {
      $.post("rpc.php", {queryString: ""+inputString+""}, function(data){
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

include ("includes/footer.php");
?>