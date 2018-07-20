<?php

include ("includes/header.php");
$hymnID = $_GET['hymn_id'];

//////////// pagination
$next = mysqli_query ($con,"SELECT * FROM churchhymns WHERE hymn_id = (SELECT MIN(hymn_id) FROM churchhymns WHERE hymn_id > '$hymnID')") or die (mysqli_error($con));
if (mysqli_num_rows($next) == 0) {
	$nonextrecords = true;
}else{
	while($row = mysqli_fetch_array($next)){
		$nexthymnid = $row['hymn_id']; 
	}
}

$previous = mysqli_query ($con,"SELECT * FROM churchhymns WHERE hymn_id = (SELECT MAX(hymn_id) FROM churchhymns WHERE hymn_id < '$hymnID')") or die (mysqli_error($con));
if (mysqli_num_rows($previous) == 0) {
	$nopreviousrecords = true;
}else{
	while($row = mysqli_fetch_array($previous)){
		$previoushymnid = $row['hymn_id']; 
	}
}


//////////////


?>

<div class="image">
	<div class="col-md-12 well">

	<nav class="pull-right">
		<ul class="pagination">
			<li class="page-item"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] . "?hymn_id=$previoushymnid"; ?>">Previous</a></li>
			<li class="page-item"><a class="page-link" href="<?php echo $_SERVER['PHP_SELF'] . "?hymn_id=$nexthymnid"; ?>">Next</a></li>
		</ul>
	</nav>

		<h1>About Hymn</h1>

		<?php
		$result = mysqli_query($con, "SELECT * from churchhymns WHERE hymn_id = '$hymnID'") or die(mysqli_error($con));

		while ($row = mysqli_fetch_array($result)){
			$hymn_id = $row['hymn_id'];
			$composer = $row['composer'];
			$title = $row['title'];
			$year = $row['year'];
			$type = $row['type'];
			$filename = $row['filename'];
			$label = $row['label'];
			$description = nl2br($row['description']);
			$soundclip = $row['soundclip'];
		
			
		}
		?>

		<?php if ($composer != ""): ?>
		<div class="row">
			<div class="col-md-3">
				<b style="float:left;">Composer:</b>
			</div>
			<div class="col-md-9">
				<p><?php echo $composer ?></p>
			</div>
		</div>
		<?php endif; ?>

		<?php if ($title != ""): ?>
		<div class="row">
			<div class="col-md-3">
				<b style="float:left;">Title:</b>
			</div>
			<div class="col-md-9">
				<p><?php echo $title ?></p>
			</div>
		</div>
		<?php endif; ?>

		<?php if ($year != ""): ?>
		<div class="row">
			<div class="col-md-3">
				<b style="float:left;">Year:</b>
			</div>
			<div class="col-md-9">
				<p><?php echo $year ?></p>
			</div>
		</div>
		<?php endif; ?>

		<?php if ($type != ""): ?>
		<div class="row">
			<div class="col-md-3">
				<b style="float:left;">Type:</b>
			</div>
			<div class="col-md-9">
				<p><?php echo $type ?></p>
			</div>
		</div>
		<?php endif; ?>

		<?php if ($filename != ""): ?>
		<div class="row">
			<div class="col-md-3">
				<b style="float:left;">Image:</b>
			</div>
			<div class="col-md-9">
				<?php echo "<img src=\"display/$filename\">"; ?>
			</div>
		</div>
		<?php endif; ?> <br>

		<?php if ($label != ""): ?>
		<div class="row">
			<div class="col-md-3">
				<b style="float:left;">Publisher Label:</b>
			</div>
			<div class="col-md-9">
				<p><?php echo $label ?></p>
			</div>
		</div>
		<?php endif; ?>
		
		<?php if ($description != ""): ?>
		<div class="row">
			<div class="col-md-3">
				<b style="float:left;">Description:</b>
			</div>
			<div class="col-md-9">
				<p><?php echo $description ?></p>
			</div>
		</div>
		<?php else: ?>
			<div class="row">
				<div class="col-md-3">
					<b style="float:left;">Description:</b>
				</div>
				<div class="col-md-9">
					<b>NOT AVAILABLE</b>
				</div>
			</div>
		<?php endif; ?> <br>

		<?php if ($soundclip != ""): ?>
		<div class="row">
			<div class="col-md-3">
				<b style="float:left;">Tune:</b>
			</div>
			<div class="col-md-9">
				<!-- <p><?php echo $soundclip ?></p> -->
				<audio controls>';
      				<source src="tunes/<?php echo "$soundclip"; ?>">
   				</audio>
			</div>
		</div>
		<?php else: ?>
			<div class="row">
				<div class="col-md-3">
					<b style="float:left;">Tune:</b>
				</div>
				<div class="col-md-9">
					<b>NOT AVAILABLE</b>
				</div>
			</div>
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



<?php
include ("includes/footer.php")
?>