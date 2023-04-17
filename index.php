<?php
	$title = 'Daft Punk Fan Site';
	$currentPage = 'index';
	include('header.php');
	include('navigationBar.php');
?>

<body>
	<div class="container-fluid text-center">    
		<div class="row">
			<div class="col-sm-8 text-left">
				<div class="jumbotron interactive">
					<h1>Daft punk</h1>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
					Proin pretium venenatis mauris luctus molestie. Ut hendrerit sed dui in tempor.
					Proin lobortis eget dui at tempus. Suspendisse pellentesque hendrerit turpis, 
					non blandit enim tempus ac. Aliquam dapibus purus et pretium tincidunt. </p>
					<hr>
					<h3>Gallery</h3>
					<p>Lorem ipsum...</p>
					<div id="myCarousel" class="carousel slide" data-ride="carousel">
					<!-- Indicators -->
						<ol class="carousel-indicators">
							<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
							<li data-target="#myCarousel" data-slide-to="1"></li>
							<li data-target="#myCarousel" data-slide-to="2"></li>
						</ol>

						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<div class="item active">
								<!-- Image taken from: https://static.ra.co/images/profiles/lg/daftpunk.jpg?dateUpdated=1598391379000 -->
							<img src="./images/daftpunk1.jpg" alt="Daft Punk">
							</div>

							<div class="item">
							<!-- Image taken from: https://media-cldnry.s-nbcnews.com/image/upload/t_fit-1240w,f_auto,q_auto:best/newscms/2021_08/3451766/210222-daft-punk-jm-1023.jpg -->
							<img src="./images/daftpunk2.jpg" alt="Daft Punk on stage">
							</div>

							<div class="item">
							<!-- Image taken from https://ichef.bbci.co.uk/news/976/cpsprodpb/9C44/production/_117140004_shutterstock_editorial_2399470c.jpg -->
							<img src="./images/daftpunk3.jpg" alt="Daft Punk without masks">
							</div>
						</div>

						<!-- Left and right controls -->
						<a class="left carousel-control" href="#myCarousel" data-slide="prev">
							<span class="glyphicon glyphicon-chevron-left"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="right carousel-control" href="#myCarousel" data-slide="next">
							<span class="glyphicon glyphicon-chevron-right"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			</div>
			<div class="col-sm-4" id = "quotes">
				<p>Press this button to display some quotes about the band.</p>
				<button type="button" class="btn btn-default" id="quotesButton">Qduotes</button>
			</div>
		</div>
	</div>
	<?php
		include('footer.php');
	?>
</body>
</html>



