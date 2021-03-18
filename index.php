<?php
session_start();

require_once('templates/base_index.php');
require_once('modeles/categories.php');
require_once('modeles/jeux.php');

$Categories = new Categories;
$Jeux = new Jeux;
$liste_categorie = $Categories->recupererCategories();
$choix_select = $_GET['choix'];

?>

<section class="wrapper">
	<div id="CarouselCatControls" class="carousel slide" data-interval="false" style="padding-top: 2vh;">
		<ol class="carousel-indicators" style="z-index: 9">
			<?php
			$j = 0;
			foreach ($liste_categorie as $categorie) {
			?>
				<li data-target="#CarouselCatControls" data-slide-to="<?= $j; ?>" class="<?= ($j == 0 ? "active" : ""); ?>">
				</li>
			<?php $j++;
			} ?>
		</ol>

		<div class="carousel-inner">

			<?php $i = 0;
			foreach ($liste_categorie as $categorie) {

				$liste_jeux_cat = $Categories->recupererJeuxParCategorie($categorie['id']);
				$liste_jeux = $Jeux->getJeux();

			?>

				<div class="carousel-item <?= ($i == 0 ? "active" : ""); ?>">
					<div class="article_jeux">
						<form class="form2" method="post" action=" Action/ChooseGame.php " autocomplet="off">
							<div>
								<input style="float:left;margin-left:15%;width:35%" placeholder="Search a game ">
								<select name="choice_game" style="float:left;margin-left:1%;width:28%">
									<?php foreach ($liste_jeux as $game) {
									?>
										<option value="<?= $game['id'] ?>"><?= $game['name'] ?></option>

									<?php } ?>
								</select>

								<button style="width:auto" type="submit"> <i class="fas fa-search"></i></button>
							</div>
						</form>

						<div id=" <?= $categorie['id'] ?>" class="header_jeux" data-categorie="<?= $categorie['id'] ?>">
							<h2><?= $categorie['name']; ?></h2>
						</div>


						<div class="jeux2">

							<?php
							if ($choix_select == 0) {
								foreach ($liste_jeux_cat as $game) {
									$categorie_list = $Categories->recupererCategorie($game['id'])
							?>
									<article class="card card_jeux">
										<div class=" row no-gutters">
											<div class="col-lg-5">
												<img class="img2 card-img" src="<?= $game['images'] ?>">
												<div id="banniere_description2">
													<h4 style="color: white;text-align:center;"><?= $game['name'] ?></h4>
												</div>
											</div>
											<div class="col-lg-7" style="height:100%;">
												<div class="card-body" style="height:100%;overflow-y:auto;">
													<div class="boutton" style="overflow-x:auto; margin-top:30px">
														<?php foreach ($categorie_list as $cat) { ?>
															<button type=button class="pti_collapsible col-md-5" disabled="disabled" style="margin-bottom:5px">
																<span class="span_text-center "><?= $cat['name'] ?></span>
															</button>
														<?php
														}
														?>
													</div>
													<hr>
													<a href=" description_jeu.php?jeu=<?= $game['id'] ?>">
														<button type="button" class="collapsible">
															<span class="span_text-center">Plus d'infos <i class="fas fa-info-circle"></i> </span>
														</button>
													</a>

												</div>
											</div>
										</div>
									</article>
									<hr>
							<?php }
							} ?>

						</div>
					</div>
				</div>
			<?php
				$i++;
			}
			?>
		</div>
		<a class="carousel-control-prev" href="#CarouselCatControls" role="button" data-slide="prev">
			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="carousel-control-next" href="#CarouselCatControls" role="button" data-slide="next">
			<span class="carousel-control-next-icon" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
</section>

<script>
	var toto = <?php echo $_GET['error'] ?>;
	if (toto == 1) {
		alert('Erreur dans le champs username ou mot de passe ou email');
	}
</script>