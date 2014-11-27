<?php include_once(dirname(__FILE__)."/../base/header.php"); ?>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Editer un Films</h1>
					<div class="col-lg-4 well">
						<form action="#" method="POST" role="form">
							<div class="form-group">
								<label for="titre">Titre</label>
								<input type="text" class="form-control" id="titre" name="titre" value="<?php if(isset($film->titre)) echo $film->titre; ?>">
							</div>
							<div class="form-group">
								<label for="genre">Genre ID</label>
								<input type="number" class="form-control" id="genre" name="genre" value="<?php if(isset($film->id_genre)) echo $film->id_genre; ?>">
							</div>
							<div class="form-group">
								<label for="distribution">Distributeur ID</label>
								<input type="number" class="form-control" id="distribution" name="distribution" value="<?php if(isset($film->id_distrib)) echo $film->id_distrib; ?>">
							</div>
							<div class="form-group">
								<label for="duree">Durée (min)</label>
								<input type="number" class="form-control" id="duree" name="duree" value="<?php if(isset($film->duree_min)) echo $film->duree_min; ?>">
							</div>
							<div class="form-group">
								<label for="annee">Année</label>
								<input type="text" class="form-control" id="annee" name="annee" value="<?php if(isset($film->annee_prod)) echo $film->annee_prod; ?>">
							</div>
							<div class="form-group">
								<label for="date">Date de mise à l'affiche</label>
								<input type="date" class="form-control" id="date" name="date" value="<?php if(isset($film->date_debut_affiche)) echo $film->date_debut_affiche; ?>">
							</div>
							<div class="form-group">
								<label for="fin">Date de fin</label>
								<input type="date" class="form-control" id="fin" name="fin" value="<?php if(isset($film->date_fin_affiche)) echo $film->date_fin_affiche; ?>">
							</div>
							 <div class="form-group">
								<label for="">Resum</label>
								<textarea class="form-control" name="resum"><?php if(isset($film->resum)) echo $film->resum; ?></textarea>
							</div>
							<input type="hidden" name="id_film" value="<?php if(isset($film->id_film)) echo $film->id_film; ?>">
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container -->

<?php include_once(dirname(__FILE__)."/../base/footer.php"); ?>