<?php include 'inc/header.php' ?>

<div class="container">
	<h1><?php echo $header; ?></h1>
</div>
</div>

<?php if($id != 0) : ?>
	<div class="container">
		<div class="row sub">
			<div class="col-md-12">
				<?php if($id != 0) : ?>
					<div class="card">
						<div class="row">
							<div class="col-md-4">
								<a href="<?php echo $browse.'.php?id='.$id; ?>">
									<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $img ).'" class="d-block w-100 center" alt="'.$title.'"/>'; ?>
								</a>
							</div>
							<div class="col-md-8">
								<div class="card card-header">
									<h3 class="card-title">
										<?php echo $title; ?>
									</h3>
								</div>
								<div class="card-body">
									<h5 class="card-text">
										<?php echo $description; ?>
									</h5>
								</div>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
<?php endif; ?>

<?php if($browse == 'vendor') : ?>
	<div class="container my-5 card">
		<div class="row browse">
			<?php foreach($vendors as $vendor) : ?>
				<div class="col-md-3 my-2">
					<a href="<?php echo 'vendor.php?id='.$vendor->id ?>">
						<div class="card">
							<div class="card-header">
								<h4><?php echo $vendor->name; ?></h4>
							</div>
							<div class="card-img-bottom">

								<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $vendor->logo ).'" class="d-block w-100 browseImg imgEnlarge" alt="'.$vendor->name.'"/>'; ?>

							</div>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>

<?php if($browse == 'category') : ?>
	<div class="container my-5 card">
		<div class="row browse">
			<?php foreach($categories as $category) : ?>
				<div class="col-md-3 my-2">
					<a href="<?php echo 'category.php?id='.$category->Category_Id; ?>">
						<div class="card">
							<div class="card-header">
								<h4><?php echo $category->Category_Category; ?></h4>
							</div>
							<div class="card-img-bottom">
								<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $category->Food_Image ).'" class="d-block w-100 browseImg imgEnlarge" alt="'.$category->Category_Category.'"/>'; ?>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>

<?php if($browse == 'district') : ?>
	<div class="container my-5 card">
		<div class="row browse">
			<?php foreach($districts as $district) : ?>
				<div class="col-md-3 my-2">
					<a href="<?php echo 'district.php?id='.$district->id ?>">
						<div class="card">
							<div class="card-header">
								<h4><?php echo $district->district; ?></h4>
							</div>
							<div class="card-img-bottom">
								<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $district->img ).'" class="d-block w-100 browseImg imgEnlarge" alt="'.$district->district.'"/>'; ?>
							</div>
						</div>
					</a>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>

<?php include 'inc/footer.php' ?>