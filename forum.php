<?php
session_start();

if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "Vous devez d'abord vous connecter";
    header('location:  login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location:  login.php");
}
require_once('templates/base_forum.php');
require_once('modeles/jeux.php');
require_once('modeles/topic.php');


$Topic = new Topic();
$liste_topic = $Topic->getTopic();

$Jeux =  new Jeux();
$liste_jeux = $Jeux->getJeux();

?>
<section class="wrapper">
    <div id="CarouselCatControls" class="carousel slide" data-interval="false" style="padding-top:2vh">
        <ol class="carousel-indicators">
            <?php
            $j = 0;
            foreach ($liste_jeux as $jeu) {
            ?>
                <li data-target="#CarouselCatControls" data-slide-to="<?= $j; ?>" class="<?= ($j == 0 ? "active" : ""); ?>"></li>
            <?php $j++;
            } ?>
        </ol>

        <div class="carousel-inner">

            <?php $i = 0;
            foreach ($liste_jeux as $jeu) {
            ?>

                <div class="carousel-item <?= ($i == 0 ? "active" : ""); ?>">
                    <div class="article_jeux">
                        <div id=" <?= $jeu['id'] ?>" class="header_jeux" data-categorie="<?= $jeu['id'] ?>">
                            <h2><?= $jeu['name']; ?></h2>
                        </div>
                        <div class="jeux3">

                            <?php foreach ($liste_topic as $topic) {
                                if ($topic['name_jeu'] == $jeu['name']) {
                                    $date = strtotime($topic['date_create']);

                            ?>
                                    <article class="card" style="margin-bottom: 10px; margin-top: 10px; border: 1px solid black;background-color: rgba(250, 250, 250, 0.6); box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);">
                                        <div class=" row no-gutters" style="border: 1px solid black;">
                                            <div class="card-body" style="text-align: center;">
                                                <h4 class="card-title" style="float: left;"><?= $topic['auteur_name'] ?> </h4>
                                                <h4 class="card-title" style="float: right;"><?= date('d/m/Y H:i:s', $date) ?></h4>
                                                <a href=" topic_jeu.php?topic=<?= $topic['id'] ?>">
                                                    <button type="button" class="collapsible">
                                                        <span style="text-align: center; text-overflow:ellipsis;"><?= $topic['titre'] ?></span>
                                                    </button>
                                                </a>
                                            </div>

                                        </div>
                                    </article>
                                    <hr>
                            <?php }
                            }  ?>
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