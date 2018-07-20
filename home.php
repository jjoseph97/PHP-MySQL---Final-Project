<?php include("includes/header.php"); ?>
<div class="col-md-12">
	<!-- <div class="col-md-7">
		<h4>About the Hymns Catalog Project</h4>

	</div> -->

	<div class="col-md-8 well" style="background-color:#4e5d6c;">
		<span style="background-color:black"></span>
		<h1>About the Hymns Catalog Project</h1>
		
		<p>This project is a catalog of many of the hymns I have sung over the years. All the hymns represent different types sung at Christmas, Easter, funerals, weddings, Communions, Confirmations, Baptisms and at sunday masses.</p>

		<p>The home page describes the purpose of the project, shows the navigation links to the different pages, main features and functionality.</p> 

		<p>All the information about a hymn such the composer, title, year of release, type of hymn, image of the front cover, publisher label, description and a Mp3 file is inserted into a database "churchhymns" on phpmyadmin. All this is administered by a secured admin section protected by a username and password. Here new hymns can be inserted, edited or deleted.</p>

		<p>Insert page - the user inserts info about a hymn by filling in the required fields and pressing submit. The description and soundclip are not required because some hymns don't have a description or a sound clip.<br/>
		Edit page - here the user can choose a hymn from a drop down and change any necessary info or delete a hymn. The user will not be able to edit the image or mp3 sound clip. To change the image or mp3 sound clip the user will have to delete the hymn and re-insert it.<br/>
		Hymns page(index.php) - displays all the hymns with pagination (limit 9).
		<br/>
		Display page - single item view with pagination so the user can view info about any hymn he/she desires by pressing next/previous.</p>

		<p>Once the user clicks the submit button a message appears saying hymn has been added succcessfully. The user can see the hymn as a thumbnail on the hymns page(index.php) and clicking the thumbnail, he/she can view the info in a single item view.</p>

		<p>Added Features:<br/>
		1)Built-in Search Feature with suggestions box: enter first letter of title to look up a hymn.<br/>
		2)Collapsible panels for filtering<br/>
		3)Pagination on "show all" only<br/>
		4)Pagination on display (next/previous)<br/>
		5)Resizing of images (thumbs and display)<br/>
		6)Short sound clip (mp3 file) for most hymns<br/>
		7)Hover feature for thumbnails and widget images<br/>
		8)Improved login page</p>

		<p>Filtering:<br/>
		1)Regular display by catalog query<br/>
		2)MySQL between query for filtering by decades<br/>
		3)Filter by type (category)<br/>
		4)Filter by composer<br/>
		5)Filter by year<br/>
		6)Filter by label (publisher)<br/>
		6)MySQL random generated widgets on the home page.</p>
		 




		
		
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

		<h2>Random Hymns</h2>
		<?php 
		$test = mysqli_query($con, "SELECT * FROM churchhymns ORDER BY RAND() LIMIT 2");
		while ($row = mysqli_fetch_array($test)) {
			$hymn_id = $row['hymn_id'];
			$composer = $row['composer'];
			$title = $row['title'];
			$year = $row['year'];
			$type = $row['type'];
			$filename = $row['filename'];
			$label = $row['label'];
			$description = $row['description'];
			$soundclip = $row['soundclip'];

			echo "<div class=\"images\">";
				echo "<div class=\"title\">$title</div>";	
					echo "<div class=\"image\">";
						echo "\n\t<p> <a href=\"display.php?hymn_id=$hymn_id\"><img src=\"thumbs/$filename\"></a></p>";
				echo "</div>";
			echo "</div>";
		} 
		?>
<!-- 
		margin-top: 0;
    margin-bottom: 0;
    font-size: 24px;
    color: gold;
    padding: 16px; -->
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

<?php include("includes/footer.php"); ?>