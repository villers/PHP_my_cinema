<?php include_once(dirname(__FILE__)."/../base/header.php"); ?>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Les Réductions
						<?php if(isset($member->id_job) && $member->id_job == 3): ?>
							<a href="<?php echo $base_url ?>reduction/add" title="Action"><i class="fa fa-file"></i></a>
						<?php endif; ?>
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
									<th>Date de début</th>
									<th>Date de fin</th>
									<th>Pourcentage</th>
									<?php if(isset($member->id_job) && $member->id_job == 3): ?>
										<th>Actions</th>
									<?php endif; ?>
								</tr>
							</thead>
							<tbody>
								<?php foreach($reductions as $reduction): ?>
									<tr>
										<td><?php echo $reduction->nom ?></td>
										<td><?php echo $reduction->date_debut ?></td>
										<td><?php echo $reduction->date_fin ?></td>
										<td><?php echo $reduction->pourcentage_reduc ?>%</td>
										<?php if(isset($member->id_job) && $member->id_job == 3): ?>
										<td>
											<a href="<?php echo $base_url ?>reduction/show/<?php echo $reduction->id_reduction ?>" title="Action">
												<i class="fa fa-edit"></i>
											</a>
											<a href="<?php echo $base_url ?>reduction/delete/<?php echo $reduction->id_reduction ?>" title="Action">
												<i class="fa fa-trash-o"></i>
											</a>
										</td>
										<?php endif; ?>
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