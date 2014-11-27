<?php include_once(dirname(__FILE__)."/../base/header.php"); ?>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Les Abonnements
						<a href="<?php echo $base_url ?>abonnement/add" id="addFilm" title="Action"><i class="fa fa-file"></i></a>
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
									<th>Resum</th>
									<th>Prix</th>
									<th>Durée Abonnement</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($abonnements as $abonnement): ?>
									<tr>
										<td><?php echo $abonnement->nom ?></td>
										<td><?php echo $abonnement->resum ?></td>
										<td><?php echo $abonnement->prix ?>€</td>
										<td><?php echo $abonnement->duree_abo ?></td>
										<td>
											<a href="<?php echo $base_url ?>abonnement/show/<?php echo $abonnement->id_abo ?>" title="Action">
												<i class="fa fa-edit"></i>
											</a>
											<a href="<?php echo $base_url ?>abonnement/delete/<?php echo $abonnement->id_abo ?>" title="Action">
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