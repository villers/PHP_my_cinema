<?php include_once(dirname(__FILE__)."/../base/header.php"); ?>

		<div id="page-wrapper">
			<div class="row">
				<div class="col-lg-12">
					<h1 class="page-header">Ajouter un Films</h1>
					<div class="col-lg-4 well">
						<form action="#" method="POST" role="form">
							<div class="form-group">
								<label for="">Titre</label>
								<input type="text" class="form-control" id="titre" name="titre" placeholder="Batman">
							</div>
							<div class="form-group">
								<label for="">Genre ID</label>
								<input type="number" class="form-control" id="genre" name="genre" placeholder="0">
							</div>
							<div class="form-group">
								<label for="">Distributeur ID</label>
								<input type="number" class="form-control" id="distribution" name="distribution" placeholder="0">
							</div>
							<div class="form-group">
								<label for="">Durée (min)</label>
								<input type="number" class="form-control" id="duree" name="duree" placeholder="0">
							</div>
							<div class="form-group">
								<label for="">Année</label>
								<input type="text" class="form-control" id="annee" name="annee" placeholder="2014">
							</div>
							<div class="form-group">
								<label for="">Date de mise à l'affiche</label>
								<input type="date" class="form-control" id="date" name="date">
							</div>
							<div class="form-group">
								<label for="">Date de fin</label>
								<input type="date" class="form-control" id="fin" name="fin">
							</div>
							<div class="form-group">
								<label for="">Resum</label>
								<textarea class="form-control" name="resum"></textarea>
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