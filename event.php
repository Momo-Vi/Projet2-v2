<?php
session_start();

require_once('templates/base_event.php');
require_once('modeles/event.php');

$Event = new Events;
$liste_event = $Event->recupererEvent();


?>
<section class="wrapper">
    <div class="article_event" style="padding-top:7vh;">
        <div class="header_event">
            Evenements :
            (<?= count($liste_event) ?>)
        </div>


        <div class="event">
            <?php
            foreach ($liste_event as $event) {
                $date = strtotime($event['date']);
            ?>
                <article class="card card_jeux">
                    <div class=" row no-gutters ro">
                        <div class="col-lg-5 co">
                            <img class="img2 card-img" src="<?= $event['images'] ?>">

                            <div id="banniere_description2">
                                <h4 style="color: white;text-align:center;"><?= $event['name'] ?></h4>
                            </div>
                        </div>
                        <div class="col-lg-7" style="height:100%; ">
                            <div class="card-body" style="height:100%;overflow-y:auto;">

                                <div style="text-align:center;">
                                    <h5 class="card-title" style="font-size:25px;margin-bottom:15px;"><b><u><?= date('j F Y', $date) ?></u></b> </h5>
                                </div>
                                <hr>
                                <a href="<?= $event['link'] ?>">
                                    <button type="button" class="collapsible">
                                        <span class="span_text-center">Site officiel <i class="fas fa-info-circle"></i> </span>
                                    </button>
                                </a>

                            </div>
                        </div>
                    </div>
                </article>
                <hr>
            <?php }
            ?>

        </div>
    </div>
    </div>
</section>