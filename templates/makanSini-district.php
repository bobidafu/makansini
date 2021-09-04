<?php include 'inc/header.php' ?>

<div class="container align-center">
	<h1><?php echo $title; ?></h1>
	<br>

	<!-- //Map showing only vendors in that district -->
	<!-- <div id="map" class="map-home"></div> -->

	<h4><?php echo $description; ?></h4>
	
</div>
</div>

<?php if(count($districtVendors)!=0) : ?>
	<div class="container my-5 card">
		<div class="row browse">
			<?php foreach($districtVendors as $districtVendor) : ?>
				<div class="col-md-3 my-2">
					<a href="<?php echo 'vendor.php?id='.$districtVendor->id; ?>">
						<div class="card">
							<div class="card-header">
								<h4><?php echo $districtVendor->name; ?></h4>
							</div>
							<div class="card-img-bottom">

								<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $districtVendor->store ).'" class="d-block w-100 browseImg imgEnlarge" alt="'.$districtVendor->name.'"/>'; ?>

							</div>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>

<?php include 'inc/footer.php' ?>