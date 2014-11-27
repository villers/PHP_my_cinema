<?php include_once(dirname(__FILE__)."/../base/header.php"); ?>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">
						Les Films
						<?php if(isset($member->id_job) && $member->id_job == 3): ?>
							<a href="<?php echo $base_url ?>film/add" id="addFilm" title="Action"><i class="fa fa-file"></i></a>
						<?php endif; ?>
					</h1>
				</div>
				<div class="col-md-6 col-sm-12 pull-left">
					<form action="#" method="GET" role="form" class="form-inline">
						<select class="form-control" name="type" id="type">
							<option value="nom">Nom</option>
							<option value="genre">Genre</option>
							<option value="distribution">Distribution</option>
							<option value="date">Date de projection</option>
						</select>
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
									<th>Id</th>
									<th>Titre</th>
									<th>Genre</th>
									<th>Distribution</th>
									<th>Durée</th>
									<th>Année</th>
									<th>Date de mise à l'affiche</th>
									<th>Date de fin</th>
									<?php if(isset($member->id_job) && $member->id_job == 3): ?>
										<th>Actions</th>
									<?php endif; ?>
								</tr>
							</thead>
							<tbody>
								<?php foreach($films as $film): ?>
									<tr class="popup" data-toggle="tooltip" data-placement="top" title="<?php echo $film->resum ?>">
										<td><?php echo $film->id_film ?></td>
										<td><?php echo $film->titre ?></td>
										<td><?php echo ($film->nom_genre)? $film->nom_genre : '-' ?></td>
										<td><?php echo ($film->nom_distrib)? $film->nom_distrib : '-' ?></td>
										<td><?php echo $film->duree_min ?></td>
										<td><?php echo $film->annee_prod ?></td>
										<td><?php echo $film->date_debut_affiche ?></td>
										<td><?php echo $film->date_fin_affiche ?></td>
										<?php if(isset($member->id_job) && $member->id_job == 3): ?>
											<td>
												<a href="<?php echo $base_url ?>film/edit/<?php echo $film->id_film ?>" title="Editer" id="editFilm">
													<i class="fa fa-edit"></i>
												</a>
												<a href="<?php echo $base_url ?>film/delete/<?php echo $film->id_film ?>" title="Supprimer" id="delFilm">
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