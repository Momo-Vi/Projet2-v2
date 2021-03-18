<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Center Game</title>
    <link rel="icon" href="images/icon.png" />
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/style_log_reg.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap_min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light font-weight-bold" style="font-size:1.3rem;">

        <a class=" navbar-brand" href="index.php?choix=0&error=0"><i class="fas fa-undo-alt"></i> Retour</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item text-right ml-3 active">
                    <a style="color:black;text-decoration:none;" href="index.php?choix=0&error=0">
                        <i class="fas fa-th-list"></i> Liste de jeux
                    </a>
                </li>
                <li class="nav-item text-right ml-3 active">
                    <a style="color:black;text-decoration:none;" href="event.php">
                        <i class="far fa-calendar-alt"></i> Evènement
                    </a>
                </li>
                <li class="nav-item text-right ml-3 ">
                    <a style="color:black;text-decoration:none;" href="forum.php">
                        <i class="far fa-comments"></i> Forum
                    </a>
                </li>

            </ul>
        </div>
    </nav>
</body>
<?php include_once('js/script.php'); ?>

</html>