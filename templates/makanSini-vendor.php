<?php include 'inc/header.php' ?>

<div class="container">
	<h1 class="align-center"><?php echo $title; ?></h1>
	<br>
	<div class="jumbotron-description">
	<h3 class="align-center"><?php echo $description; ?></h3>
	<?php if(count($branches)!=0) : ?>
		<table class="table table-borderless tableTxt">
			<thead>
				<tr>
					<th scope="col" style="width: 50%">Branches</th>
					<th scope="col" style="width: 35%">Opening Hour</th>
					<th scope="col" style="width: 15%">Contact</th>
				</tr>
			</thead>
			
			<tbody>
				<?php foreach($branches as $branch) : ?>
					<tr>
						<td><?php echo $branch->location; ?></td>
						<td><?php echo $branch->opening_hr; ?></td>
						<td><?php echo $branch->contact; ?></td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	<?php endif; ?>
	</div>
</div>
</div>

<?php if(count($foods)!=0) : ?>
	<div class="container my-5 card">
		<div class="row">
			<div class="card-title"><h2>Food</h2></div>
			<?php foreach($foods as $food) : ?>
				<div class="col-md-3 my-2">
					<div class="card">
						<div class="card-header">
							<h4><?php echo $food->food; ?></h4>
						</div>
						<div class="card-img-bottom">
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $food->img ).'" class="d-block w-100 browseImg imgEnlarge" alt="'.$food->food.'"/>'; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
<?php endif; ?>

<?php if(count($drinks)!=0) : ?>
	<div class="container my-5 card">
		<div class="row">
			<div class="card-title"><h2>Drinks</h2></div>
			<?php foreach($drinks as $drink) : ?>
				<div class="col-md-3 my-2">
					<div class="card">
						<div class="card-header">
							<h3><?php echo $drink->drink; ?></h3>
						</div>
						<div class="card-img-bottom">
							<?php echo '<img src="data:image/jpeg;base64,'.base64_encode( $drink->img ).'" class="d-block w-100 browseImg imgEnlarge" alt="'.$drink->drink.'"/>'; ?>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>	
	</div>
<?php endif; ?>

<?php include 'inc/footer.php' ?>