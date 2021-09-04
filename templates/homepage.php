<?php include 'inc/header.php' ?>

<div class="container">
	<h1>Your choice of FOOD is only a few clicks away!</h1>

	<?php echo DisplayMessage(); ?>

	<form autocomplete="off" method="POST" action="index.php">
		<div class="autocomplete">
			<input id="searchBox" name="searchBox" class="form-control" type="text" placeholder="Search By Keyword(s)">
			<button id="searchBtn" type="submit" class="btn btn-search btn-lg">
				<i class="bi bi-search"></i>
			</button>
		</div>		
	</form>

	<div class="row browse">
		<div class="col-md-4">
			<div class="card browse-box">
				<div id="carouselVendor" class="carousel slide carousel-fade" data-bs-ride="carousel">
					<h5 class="card-header"><a href="browse.php?browse=vendor&id=0">Browse By Vendor</a></h5> 
					<div class="carousel-inner">
						<?php foreach($vendors as $vendor) : ?>

							<?php if($vendor->id == 1) : ?>
								<div class="carousel-item active" data-bs-interval="2000">
									<?php else : ?>
										<div class="carousel-item" data-bs-interval="2000">
										<?php endif; ?>

										<a href="browse.php?browse=vendor&id=<?php echo $vendor->id; ?>">
											<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $vendor->store ).'" class="d-block w-100 browseImg" alt="'.$vendor->name.'"/>'; ?>
											<div class="carousel-caption d-none d-md-block">
												<div class="card">
													<h5 class="cheesed"><?php echo $vendor->name; ?></h5>
												</div>
											</div>
										</a>
									</div>
								<?php endforeach; ?>
							</div>
							<button class="carousel-control-prev" type="button" data-bs-target="#carouselVendor" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button" data-bs-target="#carouselVendor" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Next</span>
							</button>
						</div>
					</div>
				</div>

				<div class="col-md-4">
					<div class="card browse-box">
						<div id="carouselCategories" class="carousel slide carousel-fade" data-bs-ride="carousel">
							<h5 class="card-header"><a href="browse.php?browse=category&id=0">Browse By Food Categories</a></h5>
							<div class="carousel-inner">
								<?php foreach($categories as $category) : ?>

									<?php if($category->Category_Id == 1) : ?>
										<div class="carousel-item active" data-bs-interval="1500">
											<?php else : ?>
												<div class="carousel-item" data-bs-interval="1500">
												<?php endif; ?>

												<a href="browse.php?browse=category&id=<?php echo $category->Category_Id; ?>">
													<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $category->Food_Image ).'" class="d-block w-100 browseImg" alt="'.$category->Category_Category.'"/>'; ?>
													<div class="carousel-caption d-none d-md-block">
														<div class="card">
															<h5 class="cheesed"><?php echo $category->Category_Category; ?></h5>
														</div>
													</div>
												</a>
											</div>
										<?php endforeach; ?>
									</div>
									<button class="carousel-control-prev" type="button" data-bs-target="#carouselCategories" data-bs-slide="prev">
										<span class="carousel-control-prev-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Previous</span>
									</button>
									<button class="carousel-control-next" type="button" data-bs-target="#carouselCategories" data-bs-slide="next">
										<span class="carousel-control-next-icon" aria-hidden="true"></span>
										<span class="visually-hidden">Next</span>
									</button>
								</div>
							</div>
						</div>

						<div class="col-md-4">
							<div class="card browse-box">
								<div id="carouselDistrict" class="carousel slide carousel-fade" data-bs-ride="carousel">
									<h5 class="card-header"><a href="browse.php?browse=district&id=0">Browse By District</a></h5>
									<div class="carousel-inner">
										<?php foreach($districts as $district) : ?>

											<?php if($district->id == 1) : ?>
												<div class="carousel-item active" data-bs-interval="2500">
													<?php else : ?>
														<div class="carousel-item" data-bs-interval="2500">
														<?php endif; ?>

														<a href="browse.php?browse=district&id=<?php echo $district->id; ?>">
															<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $district->img ).'" class="d-block w-100 browseImg" alt="'.$district->district.'"/>'; ?>
															<div class="carousel-caption d-none d-md-block">
																<div class="card">
																	<h5 class="cheesed"><?php echo $district->district; ?></h5>
																</div>
															</div>
														</a>
													</div>
												<?php endforeach; ?>
											</div>
											<button class="carousel-control-prev" type="button" data-bs-target="#carouselDistrict" data-bs-slide="prev">
												<span class="carousel-control-prev-icon" aria-hidden="true"></span>
												<span class="visually-hidden">Previous</span>
											</button>
											<button class="carousel-control-next" type="button" data-bs-target="#carouselDistrict" data-bs-slide="next">
												<span class="carousel-control-next-icon" aria-hidden="true"></span>
												<span class="visually-hidden">Next</span>
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div id="map-section">
						<div class="section-a">
							<div class="row">
								<div class="col-md-12">
									<h1>Browse By Map</h1>
								</div>
							</div>
						</div>

						<!-- The map -->
						<div id="map" class="map-home"></div>
					</div>

					<?php include 'inc/footer.php' ?>