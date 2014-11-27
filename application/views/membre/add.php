<?php include_once(dirname(__FILE__)."/../base/header.php"); ?>
		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Ajouter un Membre</h1>
					<div class="col-lg-4 well">
						<form action="#" method="POST" role="form">
							<div class="form-group">
								<label for="">Nom</label>
								<input type="text" class="form-control" id="nom" name="nom" placeholder="Batman">
							</div>
							<div class="form-group">
								<label for="">Prenom</label>
								<input type="text" class="form-control" id="prenom" name="prenom" placeholder="John">
							</div>
							<div class="form-group">
								<label for="">Date de naissance</label>
								<input type="datetime" class="form-control" id="date_naissance" name="date_naissance">
							</div>
							<div class="form-group">
								<label for="">Mail</label>
								<input type="email" class="form-control" id="mail" name="mail" placeholder="batman@lol.com">
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="password">
							</div>
							<div class="form-group">
								<label for="">Adresse</label>
								<input type="text" class="form-control" id="adresse" name="adresse" placeholder="29 rue des roses">
							</div>
							<div class="form-group">
								<label for="">Ville</label>
								<input type="text" class="form-control" id="ville" name="ville" placeholder="Gotham">
							</div>
							<div class="form-group">
								<label for="">Pays</label>
								<input type="text" class="form-control" id="pays" name="pays" placeholder="Amerique">
							</div>
							<div class="form-group">
								<label for="">Code Postal</label>
								<input type="text" class="form-control" id="cpostal" name="cpostal" placeholder="69003">
							</div>
							<div class="form-group">
								<label for="">Abonnement</label>
								<input type="text" class="form-control" id="abo" name="abo" placeholder="0">
							</div>
							<div class="form-group">
								<label for="">Fin de l'abonnement</label>
								<input type="datetime" class="form-control" id="date" name="date" placeholder="1899-11-30 00:00:00">
							</div>
							<button type="submit" class="btn btn-primary">Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container -->

<?php include_once(dirname(__FILE__)."/../base/footer.php"); ?>