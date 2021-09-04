<?php include 'inc/header.php' ?>

<div class="container">
	<h1>Services</h1>
</div>
</div>

<?php echo DisplayMessage(); ?>

<div class="container-fluid">
	<div id="mapService" class="row service">
		<div class="col-md-4 service-browse">
			<form class="form-group" method="POST" action="service.php">
				<?php echo $form; ?>
			</form>

			<?php if($browse != null) : ?>
				<div class="service-panel">
					<div class="container overflow-auto">
						<?php foreach($items as $item) : ?>
							<div class="row">
								<div class="col-md-12">
									<a href="service.php?browse=<?php echo $browse; ?>&id=<?php echo $item->Id; ?>">
										<div class="row">
											<div class="col-md-4">
												<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $item->Image ).'" class="d-block w-100 serviceImg" alt="'.$item->Name.'"/>'; ?>
											</div>
											<div class="col-md-8">
												<div class="center">
													<h3><?php echo $item->Name; ?></h3>
												</div>
											</div>
										</div>
									</a>
								</div>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endif; ?>
		</div>
		<!-- The map -->
		<div class="col-md-8 service-map" id="map"></div>
	</div>
</div>

<?php include 'inc/footer.php' ?>