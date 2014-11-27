<?php include_once(dirname(__FILE__)."/../base/header.php"); ?>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Les Distributeurs
						<a href="<?php echo $base_url ?>distributeur/add" title="Action"><i class="fa fa-file"></i></a>
					</h1>
				</div>

				<div class="pull-right">
					<form method="GET" action="#" id="nbelemnt" class="form-inline">
						<label for="limit">Nombre de résulat par page:</label>
						<input type="number" id="limit" class="form-control" name="limit" min="1" max="500" value="<?php echo $pagination->limit ?>">
					</form>
				</div>

			</div>
			<div class="row">
				<div class="col-lg-12">

					<div class="panel panel-default">

						<table class="table table-hover">
							<thead>
								<tr class="info">
									<th>Nom</th>
									<th>Téléphone</th>
									<th>Adresse</th>
									<th>Code postal</th>
									<th>Ville</th>
									<th>Pays</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($distribs as $distrib): ?>
									<tr>
										<td><?php echo $distrib->nom ?></td>
										<td><?php echo $distrib->telephone ?></td>
										<td><?php echo $distrib->adresse ?></td>
										<td><?php echo $distrib->cpostal ?></td>
										<td><?php echo $distrib->ville ?></td>
										<td><?php echo $distrib->pays ?></td>
										<td>
											<a href="<?php echo $base_url ?>distributeur/show/<?php echo $distrib->id_distrib ?>" title="Action">
												<i class="fa fa-edit"></i>
											</a>
											<a href="<?php echo $base_url ?>distributeur/delete/<?php echo $distrib->id_distrib ?>" title="Action">
												<i class="fa fa-trash-o"></i>
											</a>
										</td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>

					<div class="text-center">
						<?php echo $pagination ?>
					</div>
				</div>
			</div>
		</div>

	</div>
	<!-- /.container -->

<?php include_once(dirname(__FILE__)."/../base/footer.php"); ?>