<?php include 'inc/header.php' ?>

<div class="container align-center">
	<h1><?php echo $title; ?></h1>
	<br>

	<!-- //Map showing only vendors with the category -->
	<!-- <div id="map" class="map-home"></div> -->

	<h4><?php echo $description; ?></h4>
	
</div>
</div>

<?php if(count($categoryVendors)!=0) : ?>
	<div class="container my-5 card">
		<div class="row browse">
			<?php foreach($categoryVendors as $categoryVendor) : ?>
				<div class="col-md-3 my-2">
					<a href="<?php echo 'vendor.php?id='.$categoryVendor->Vendor_Id ?>">
						<div class="card">
							<div class="card-header">
								<h4><?php echo $categoryVendor->Vendor_Name; ?></h4>
							</div>
							<div class="card-img-bottom">
								<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $categoryVendor->Vendor_Store ).'" class="d-block w-100 browseImg imgEnlarge" alt="'.$categoryVendor->Vendor_Name.'"/>'; ?>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>

<?php include 'inc/footer.php' ?>