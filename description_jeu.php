<section class="wrapper">
    <?php
    session_start();
    require_once('modeles/categories.php');
    require_once('modeles/jeux.php');
    require_once('modeles/commentaire.php');
    require_once('modeles/user.php');
    require_once('modeles/reply_comment.php');
    require_once('modeles/like_dislike_comment.php');

    require_once('templates/base_description_jeu.php');

    $ReplyComment = new ReplyComment;
    $Like = new LikeDislike;
    $User = new User();
    $Commentaire = new Commentaire();
    $Jeux = new Jeux();


    if (isset($_GET['jeu'])) {;
        $alreadylike = false;
        $alreadydislike = false;
        $jeuxInfos = $Jeux->getJeuFromID($_GET['jeu']);
        $listeCommentaires = $Commentaire->getCommentsFromIDJeux($_GET['jeu']);
    } else {
        // rediriger vers l'accueil
    }
    ?>

    <!DOCTYPE html>
    <html>

    <div class="describ">
        <div id="banniere_image_description">
            <div>
                <a href="<?= $jeuxInfos->site ?>" target="_blank">
                    <img class="card-img" style="height: 325px; object-fit:cover;" src="<?= $jeuxInfos->images ?>">

                    <div id="banniere_description2">
                        <h4 style="color: white;text-align:center;"><?= $jeuxInfos->name ?></h4>
                    </div>
                </a>
                <p>
                    <br>
                    <hr><br><?= $jeuxInfos->description ?>
                </p>
            </div>
        </div>
    </div>
    <article class="article_describ_jeux">

        <div class="jeux">

            <h3> Commentaires (<?= count($listeCommentaires) ?>) </h3>



            <form class="form3" style="top:0" method="post" action="Action/add_comment.php" autocomplete="off">
                <div>
                    <input type="text" name="comment" size="100%" placeholder="Ajouter un commentaire">
                    <input hidden="True" name="id_jeu" value="<?= $_GET['jeu']; ?>">
                    <button style="float:right;" class="btnsend" type="submit">Envoyer <i class="far fa-paper-plane"></i></button>
                </div>
            </form>
            <br><br><br><br>
            <hr><br>


            <?php

            foreach ($listeCommentaires as $comm) {
                $date = strtotime($comm['date_create']);
                $like = $Like->getLike($comm['id_comm']);
                $dislike = $Like->getDislike($comm['id_comm']);
                $liste_reply = $ReplyComment->getReplyCommentsFromIDComm($comm['id_comm']);


            ?>
                <div class="commenter" id="comment<?= $comm['id_comm']; ?>">

                    <a href=" profil.php?=<?= $comm["username"]; ?>" style="color:black;"> <b> <?= $comm["username"]; ?> </b> </a>
                    <small> <?= date('d/m/Y H:i:s', $date) ?></small>

                    <div id="reply<?= $comm['id_comm']; ?>" hidden class="reply">

                        <form class="form3" style="top:0" method="post" action="Action/add_reply_comment.php" autocomplete="off">
                            <div style="padding:5px">
                                <input hidden="True" name="id_comment" value="<?= $comm['id_comm'] ?>">
                                <input style="color:black;" type="text" name="reply_comment" size="100%" placeholder="Repondre">
                                <input hidden="True" name="id_jeu" value="<?= $_GET['jeu']; ?>">
                                <button style="float:right;" class="btnsend" type="submit">Envoyer <i class="far fa-paper-plane"></i></button>
                            </div>
                        </form>

                        <br><br><br>

                        <?php
                        foreach ($liste_reply as $reply) {
                            $date = strtotime($reply['date_create']); ?>

                            <div class="reply_commenter">
                                <div id="reply_comment<?= $reply['id'] ?>">
                                    <div>
                                        <b> <?= $reply["username"]; ?> </b>
                                        <small> <?= date('d/m/Y H:i:s', $date) ?></small>
                                        <hr>
                                    </div>
                                    <div style="text-align:center;">
                                        <div style="float: left;">
                                            <b> <?= $reply["contenu"]; ?> </b>
                                        </div>
                                    </div>
                                    <br>

                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>

                    <?php
                    if (count($liste_reply) != 0) {
                    ?>
                        <div class="btn-group" style="float:right">

                            <button class="btn_reply" type="button" href=# onclick="openNavMenu(<?= $comm['id_comm']; ?>)">
                                Voir les réponses (<?= count($liste_reply) ?>)
                            </button>

                        </div>

                        <div class="sidenav" id="sideNavigation">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNavMenu()">&times;</a>
                        </div>

                    <?php
                    } else {
                    ?>
                        <div class="btn-group" style="float:right">
                            <button class="btn_reply" type="button" href=# onclick="openNavMenu(<?= $comm['id_comm']; ?>)">
                                Répondre
                            </button>
                        </div>

                        <div class="sidenav" id="sideNavigation">
                            <a href="javascript:void(0)" class="closebtn" onclick="closeNavMenu()">&times;</a>
                        </div>

                    <?php
                    }
                    ?>
                    <hr>

                    <div style="text-align:center;">
                        <div style="float: left;">
                            <b> <?= $comm["contenu"]; ?> </b>
                        </div>


                        <div style="float:right; margin-top:-10px;">
                            <a href="Action/add_dislike_comment.php?id=<?= $comm['id_comm'] ?>&jeu=<?= $_GET['jeu'] ?>&username=<?= $_SESSION['username'] ?>"><button class="btnlike" type="submit"><i class="fas fa-thumbs-down"></i> <?= count($dislike) ?></button></a>
                            <a href="Action/add_like_comment.php?id=<?= $comm['id_comm'] ?>&jeu=<?= $_GET['jeu'] ?>&username=<?= $_SESSION['username'] ?>"><button class="btnlike" type="submit"><i class="fas fa-thumbs-up"></i> <?= count($like) ?></button></a>
                        </div>

                    </div>
                    <br>

                </div>

            <?php };
            if (isset($_SESSION['username'])) {
            ?>

            <?php }
            if (isset($_SESSION['username'])) {
            ?>
        </div>


    <?php } ?>

    </article>
</section>

<script>
    function openNavMenu(id_comm) {
        var reponse = document.querySelectorAll(".reply");
        for (i = 0; i < reponse.length; i++) {
            reponse[i].setAttribute('hidden', true);
        }
        var sidebar = document.getElementById("sideNavigation");
        var reply = document.getElementById("reply" + id_comm);
        reply.removeAttribute('hidden');

        sidebar.style.width = "45%";
        sidebar.append(reply);

    }

    function closeNavMenu() {
        document.getElementById("sideNavigation").style.width = "0";
        var reponse = document.querySelectorAll(".reply");
        for (i = 0; i < reponse.length; i++) {
            reponse[i].setAttribute('hidden', true);
        }

    }

    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("active");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
</script>

</html>