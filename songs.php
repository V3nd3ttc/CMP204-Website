<?php
	$title = 'Songs';
	$currentPage = 'songs';
	include('header.php');
	include('navigationBar.php');
?>
<script type = "text/Javascript" src = "./js/scriptsAjax.js"></script>
<body>
	<div class="jumbotron text-justify interactive">
		<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
		Proin pretium venenatis mauris luctus molestie. Ut hendrerit sed dui in tempor.
		Proin lobortis eget dui at tempus. Suspendisse pellentesque hendrerit turpis, 
		non blandit enim tempus ac. Aliquam dapibus purus et pretium tincidunt. 
		Maecenas tortor nulla, semper vitae lacus quis, iaculis lacinia sapien. 
		Quisque efficitur viverra purus, a gravida libero volutpat quis. 
		Donec tempus felis lectus, id venenatis dolor tristique a. Nulla facilisi.</p>
	</div>
		<div>
			<iframe src="https://open.spotify.com/embed/artist/4tZwfgrHOc3mvqYlEYSvVi?utm_source=generator" id="spotify" width="100%" height="380"
			frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture"></iframe>
		</div>
	<div class="row">
		<div class="col-sm-8 embed-responsive embed-responsive-16by9">
			<iframe width="1000" height="563" src="https://www.youtube.com/embed/videoseries?list=PLdXJrX9OsbOVq2TKvUc3xGUp2Rm8nTUVh"
			title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; gyroscope; picture-in-picture" allowfullscreen></iframe>
		</div>
		<div class="col-sm-4 interactive">
			<p>Press this button to display the names of the songs in the YouTube playlist</p>
			<button type="button" class="btn btn-default" id="playlistButton">Playlist</button>
			<p id = "songs"></p>
		</div>
	</div>
	<?php
		include('footer.php');
	?>
</body>
</html>



