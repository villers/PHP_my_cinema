<?php include_once(dirname(__FILE__)."/../base/header.php"); ?>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Le Personnel
						<a href="<?php echo $base_url ?>personnel/add" title="Action"><i class="fa fa-file"></i></a>
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
									<th>Prenom</th>
									<th>Mail</th>
									<th>Ville</th>
									<th>Rôle</th>
									<th>Actions</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($personnels as $personnel): ?>
									<tr>
										<td><?php echo $personnel->nom ?></td>
										<td><?php echo $personnel->prenom ?></td>
										<td><?php echo $personnel->email ?></td>
										<td><?php echo $personnel->ville ?></td>
										<td><?php echo $personnel->nomjob ?></td>
										<td>
											<a href="<?php echo $base_url ?>personnel/show/<?php echo $personnel->id_personnel ?>" title="Action">
												<i class="fa fa-edit"></i>
											</a>
											<a href="<?php echo $base_url ?>personnel/delete/<?php echo $personnel->id_personnel ?>" title="Action">
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