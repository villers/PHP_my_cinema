<?php include_once(dirname(__FILE__)."/../base/header.php"); ?>

		<div id="page-wrapper">
			<?php echo \system\Session::getFlash(); ?>
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Les Membres
						<?php if(isset($member->id_job) && $member->id_job == 3): ?>
							<a href="<?php echo $base_url ?>membre/add" title="Action"><i class="fa fa-file"></i></a>
						<?php endif; ?>
					</h1>

				</div>

				<div class="col-md-6 col-sm-12 pull-left">
					<form action="#" method="GET" role="form" class="form-inline">
						<div class="input-group">
							<input type="text" class="form-control" name="search" placeholder="Rechercher">
							<span class="input-group-btn">
								<button class="btn btn-primary" type="submit">
									<i class="fa fa-search"></i>
								</button>
							</span>
						</div>
					</form>
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
									<th>Prenom</th>
									<th>Mail</th>
									<th>Ville</th>
									<th>Abonnement</th>
									<th>Fin de l'abonnement</th>
									<?php if(isset($member->id_job) && $member->id_job == 3): ?>
										<th>Actions</th>
									<?php endif; ?>
								</tr>
							</thead>
							<tbody>
								<?php foreach($membres as $membre): ?>
									<tr>
										<td><?php echo $membre->nom ?></td>
										<td><?php echo $membre->prenom ?></td>
										<td><?php echo $membre->email ?></td>
										<td><?php echo $membre->ville ?></td>
										<td><?php echo $membre->nomabo ?></td>
										<td><?php echo $membre->date_abo ?></td>
										<?php if(isset($member->id_job) && $member->id_job == 3): ?>
										<td>
											<a href="<?php echo $base_url ?>membre/edit/<?php echo $membre->id_membre ?>" title="Action">
												<i class="fa fa-edit"></i>
											</a>
											<a href="<?php echo $base_url ?>membre/delete/<?php echo $membre->id_membre ?>" title="Action">
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