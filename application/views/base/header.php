<!DOCTYPE html>
<html>

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo $site_name ?></title>
	<link href="<?php echo $base_url.$assets ?>css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo $base_url.$assets ?>font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="<?php echo $base_url.$assets ?>css/app.css" rel="stylesheet">

</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?php echo $base_url ?>">My Cinema</a>
			</div>

			<ul class="nav navbar-top-links navbar-right">
				<?php if($loged): ?>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
							<li><a href="<?php echo $base_url ?>profile"><i class="fa fa-user fa-fw"></i> Mon profil</a></li>
							<li class="divider"></li>
							<li><a href="<?php echo $base_url ?>json/logout"><i class="fa fa-sign-out fa-fw"></i> Deconnexion</a></li>
						</ul>
					</li>
				<?php else: ?>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							Inscription <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li>
								<div class="row">
									<div class="col-md-12">
										<form class="form" method="post" action="<?php echo $base_url ?>json/register">
											<div class="form-group">
												<label class="sr-only" for="email">Email</label>
												<input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
											</div>
											<div class="form-group">
												<label class="sr-only" for="password">Password</label>
												<input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-success btn-block">S'inscrire</button>
											</div>
										</form>
									</div>
								</div>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							Connexion </i>  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li>
								<div class="row">
									<div class="col-md-12">
										<form class="form" method="post" action="<?php echo $base_url ?>json/login">
											<div class="form-group">
												<label class="sr-only" for="email">email</label>
												<input type="text" class="form-control" id="email2" name="email" placeholder="email" required>
											</div>
											<div class="form-group">
												<label class="sr-only" for="password">Password</label>
												<input type="password" class="form-control" id="passwordc" name="password" placeholder="Password" required>
											</div>
											<div class="form-group">
												<button type="submit" class="btn btn-success btn-block">Se connecter</button>
											</div>
										</form>
									</div>
								</div>
							</li>
						</ul>
					</li>
				<?php endif; ?>
			</ul>


			<div class="navbar-default navbar-static-side" role="navigation">
				<div class="sidebar-collapse">
					<ul class="nav" id="side-menu">
						<li>
							<a href="<?php echo $base_url ?>accueil"><i class="fa fa-home fa-fw"></i> Accueil</a>
						</li>
						<li>
							<a href="<?php echo $base_url ?>film"><i class="fa fa-film fa-fw"></i> Les Films</a>
						</li>
						<?php if(isset($member->id_job) && $member->id_job == 3): ?>
							<li>
								<a href="<?php echo $base_url ?>abonnement"><i class="fa fa-star-o fa-fw"></i> Les Abonnements</a>
							</li>
						<?php endif; ?>
						<li>
							<a href="<?php echo $base_url ?>reduction"><i class="fa fa-credit-card fa-fw"></i> Les réductions</a>
						</li>
						<?php if(isset($member->id_job) && $member->id_job == 3): ?>
							<li>
								<a href="<?php echo $base_url ?>distributeur"><i class="fa fa-certificate fa-fw"></i> Les distributeurs</a>
							</li>
						<?php endif; ?>
						<li>
							<a href="<?php echo $base_url ?>genre"><i class="fa fa-tags fa-fw"></i> Les Genres</a>
						</li>
						<?php if(isset($member->id_job) && $member->id_job == 3): ?>
							<li>
								<a href="<?php echo $base_url ?>personnel"><i class="fa fa-gavel fa-fw"></i> Le Personnel</a>
							</li>
						<?php endif; ?>
						<li>
							<a href="<?php echo $base_url ?>membre"><i class="fa fa-users fa-fw"></i> Les membres</a>
						</li>

					</ul>
				</div>
			</div>
		</nav>