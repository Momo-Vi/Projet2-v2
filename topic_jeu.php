<?php
session_start();
require_once('modeles/categories.php');
require_once('modeles/topic_comment.php');
require_once('modeles/user.php');
require_once('modeles/reply_topic_comment.php');
require_once('modeles/like_dislike_topic_comment.php');
require_once('modeles/topic.php');

require_once('templates/base_topic.php');

$ReplyTopicComment = new ReplyTopicComment;
$TopicLike = new TopicLikeDislike;
$User = new User();
$TopicComment = new TopicComment();
$Topic = new Topic();
$liste_topic = $Topic->getTopic();


if (isset($_GET['topic'])) {
    $liste_topic_comment = $TopicComment->getTopicComment($_GET['topic']);
} else {
    // rediriger vers l'accueil
}
?>

<body>
    <div class="wrapper">
        <article class="article_topic">
            <div class="header_topic">
                <div>
                    <h3> Commentaires (<?= count($liste_topic_comment) + 1 ?>) </h3>
                    <form class="form3" style="top:0" method="post" action="Action/add_topic_comment.php" autocomplete="off">
                        <div>
                            <input class="col-md-9" type="text" name="comment" size="100%" placeholder="Ajouter un commentaire" required>
                            <input hidden="True" name="id_topic" value="<?= $_GET['topic']; ?>">
                            <button class="btnsend col-md-2" type="submit">Envoyer <i class="far fa-paper-plane"></i></button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="topic_comm">

                <?php foreach ($liste_topic as $topic) {
                    if ($topic['id'] == $_GET['topic']) {
                        $titre = $topic['titre'];
                        $contenu = $topic['contenu'];
                        $date = strtotime($topic['date_create']);
                        $username = $topic['auteur_name'];
                    }
                }
                ?>
                <div class="topic_subject" id="comment">
                    <div>
                        <a href=" profil.php?=<?= $username; ?>" style="color:black;"> <b> <?= $username; ?> </b></a>
                        <small style="float:right"> <?= date('d/m/Y H:i:s', $date) ?></small>
                    </div>
                    <div style=" text-align:center; font-size:24px">
                        <b> <?= $titre; ?> </b>
                        <hr>
                        <p style="font-size:18px;float:left;">
                            <?= $contenu ?>
                        </p>
                    </div>

                    <br>

                </div>

                <?php

                foreach ($liste_topic_comment as $comm) {
                    $date = strtotime($comm['date_create']);
                    $topiclike = $TopicLike->getTopicLike($comm['id_topic_comment']);
                    $topicdislike = $TopicLike->getTopicDislike($comm['id_topic_comment']);


                ?>
                    <div class="commenter" id="comment">
                        <div>
                            <a href=" profil.php?=<?= $comm["username"]; ?>" style="color:black;"> <b> <?= $comm["username"]; ?> </b></a>
                            <small style="float:right"> <?= date('d/m/Y H:i:s', $date) ?></small>
                        </div>

                        <hr>

                        <div style=" text-align:center;">
                            <div style="float: left;">
                                <b> <?= $comm["contenu"]; ?> </b>
                            </div>


                            <div style="float:right; margin-top:-10px;">

                                <a href="Action/add_dislike_topic_comment.php?id_topic_comment=<?= $comm['id_topic_comment'] ?>&topic=<?= $_GET['topic'] ?>&username=<?= $_SESSION['username'] ?>"><button class="btnlike" type="submit"><i class="far fa-thumbs-down"></i> <?= count($topicdislike) ?></button></a>
                                <a href="Action/add_like_topic_comment.php?id_topic_comment=<?= $comm['id_topic_comment'] ?>&topic=<?= $_GET['topic'] ?>&username=<?= $_SESSION['username'] ?>"><button class="btnlike" type="submit"><i class="far fa-thumbs-up"></i> <?= count($topiclike) ?></button></a>

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


        <?php }
        ?>




        </article>
    </div>
</body>