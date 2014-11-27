<?php include_once(dirname(__FILE__)."/../base/header.php"); ?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Ajouter un Membre</h1>
					<div class="col-lg-4 well">
						<form action="#" method="POST" role="form">
							<div class="form-group">
								<label for="">Nom</label>
								<input type="text" class="form-control" id="nom" name="nom" value="<?php echo $perso->nom ?>">
							</div>
							<div class="form-group">
								<label for="">Prenom</label>
								<input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $perso->prenom ?>">
							</div>
							<div class="form-group">
								<label for="">Date de naissance</label>
								<input type="datetime" class="form-control" id="date_naissance" name="date_naissance" value="<?php echo $perso->date_naissance ?>">
							</div>
							<div class="form-group">
								<label for="">Mail</label>
								<input type="email" class="form-control" id="mail" name="mail" value="<?php echo $perso->email ?>">
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" class="form-control" id="password" name="password" value="<?php echo $perso->password ?>">
							</div>
							<div class="form-group">
								<label for="">Adresse</label>
								<input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $perso->adresse ?>">
							</div>
							<div class="form-group">
								<label for="">Ville</label>
								<input type="text" class="form-control" id="ville" name="ville" value="<?php echo $perso->ville ?>">
							</div>
							<div class="form-group">
								<label for="">Pays</label>
								<input type="text" class="form-control" id="pays" name="pays" value="<?php echo $perso->pays ?>">
							</div>
							<div class="form-group">
								<label for="">Code Postal</label>
								<input type="text" class="form-control" id="cpostal" name="cpostal" value="<?php echo $perso->cpostal ?>">
							</div>
							<div class="form-group">
								<label for="">Abonnement</label>
								<input type="text" class="form-control" id="abo" name="abo" value="<?php echo $membre->id_abo ?>">
							</div>
							<div class="form-group">
								<label for="">Fin de l'abonnement</label>
								<input type="datetime" class="form-control" id="date" name="date" value="<?php echo $membre->date_abo ?>">
							</div>
							<input type="hidden" name="id_perso" value="<?php echo $perso->id_perso ?>">
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container -->

<?php include_once(dirname(__FILE__)."/../base/footer.php"); ?>