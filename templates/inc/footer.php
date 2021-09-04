
<footer class="main-footer">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<a href="browse.php?browse=vendor&id=0" class="btn">
					<h3 class="underlined">Vendors</h3>
				</a>
				<div class="row footer-browse">
					<?php foreach($vendors as $vendor) : ?>
						<div class="col-md-3">
							<a href="<?php echo 'vendor.php?id='.$vendor->id ?>" class="btn txtLeft"><?php echo $vendor->name; ?></a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<hr>
			<div class="col-md-12">
				<a href="browse.php?browse=category&id=0" class="btn">
					<h3 class="underlined">Food to Crave</h3>
				</a>
				<div class="row  footer-browse">
					<?php foreach($categories as $category) : ?>
						<div class="col-md-3">
							<a href="<?php echo 'category.php?id='.$category->Category_Id; ?>" class="btn txtLeft"><?php echo $category->Category_Category; ?></a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
			<hr>
			<div class="col-md-12">
				<a href="browse.php?browse=district&id=0" class="btn">
					<h3 class="underlined">Districts</h3>
				</a>
				<ul class="list-unstyled list-group">
					<div class="row  footer-browse">
						<?php foreach($districts as $district) : ?>
							<div class="col-md-3">
								<a href="<?php echo 'district.php?id='.$district->id ?>" class="btn txtLeft"><?php echo $district->district; ?></a>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</ul>
		</div>
		<div class="col-md-12">
			<span class="ms-auto">Copyright &copy; 2021</span>
			<span class="me-auto">Makan Sini</span>
		</div>
	</div>
</div>
</footer>

<script type="text/javascript">
	//Search Box - Animation
	$(document).ready(function(){
		$('#searchBox').focus(function(){
			$('#searchBox').animate({
				width: '167px',
			}, 100);
		})
		$('#searchBox').blur(function(){
			$('#searchBox').animate({
				width: '73px',
			}, 100);
		});

	//Search Box - Press Enter to Submit
	var input = document.getElementById("searchBox");
	input.addEventListener("keyup", function(event) {
		if (event.keyCode === 13) {
			event.preventDefault();
			document.getElementById("searchBtn").click();
		}
	});

	//Search Box - Auto Complete
	var searchElements = [
	/*---------------Vendors---------------*/
	"Kyna Popsicle",
	"Eat&#39;s Hot",
	"The Laksa Official",
	"The Potato Habit",
	"The Thirsty Habit",
	"Fuel&#39;d Restaurant & Catering Brunei",
	"ROOTS",
	"Sham&#39;s BBQ & Grill",
	"Mr BBQ and Grill",
	"De&#39;Ceriaa Café",
	"Znetic Waiting Lounge",
	"Munch Plate",
	"Moistjito",
	"Garden Eats",
	"Rumah Gelato",
	"The B Cafe & Grill",
	/*---------------Vendors---------------*/

	/*---------------Categories---------------*/
	"Fries",
	"Burger",
	"Chicken",
	"Sandwich",
	"Korean",
	"Hot & Spicy",
	"Beef",
	"Healthy",
	"Ice Cream",
	/*---------------Categories---------------*/

	/*---------------Districts---------------*/
	"Brunei Muara",
	"Belait",
	"Tutong",
	"Temburong"
	/*---------------Districts---------------*/
	];

	autocomplete(document.getElementById("searchBox"), searchElements);

	//Auto Scroll to Certain Sections
	<?php if(basename($_SERVER['PHP_SELF']) == 'index.php') : ?>
		//Homepage
		$('.section-a').click(function(){
			document.getElementById( 'map-section' ).scrollIntoView();
		})
	<?php endif; ?>

	<?php if(basename($_SERVER['PHP_SELF']) == 'service.php') : ?>
		//Services
		$('#mapService').click(function(){
			document.getElementById( 'mapService' ).scrollIntoView();
		})
	<?php endif; ?>
});
</script>

<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC18y7iKt9F3AQtbK4st4_Ab8bBd9__Bas&callback=initMap&libraries=&v=weekly"
async
></script> 
</body>
</html>