<?php
require_once('modeles/modele.php');


// LOGIN USER

class LoginBdd extends Modele
{

    public function login()
    {
        if (isset($_POST['login_user'])) {
            $username = mysqli_real_escape_string($this->getBdd(), $_POST['username']);
            $password = mysqli_real_escape_string($this->getBdd(), $_POST['password']);

            if (empty($username)) {
                array_push($errors, "Nom de compte requis");
            }
            if (empty($password)) {
                array_push($errors, "Mot de passe requis");
            }

            if (count($errors) == 0) {
                $password = md5($password);
                $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
                $id_user = mysqli_query($this->getBdd(), "SELECT id FROM user WHERE username = '$username'")->fetch_object()->id;
                $results = mysqli_query($this->getBdd(), $query);

                if (mysqli_num_rows($results) == 1) {
                    $_SESSION['username'] = $username;
                    $_SESSION['id'] = $id_user;
                    header('location:  index.php?choix=0');
                } else {
                    array_push($errors, "Mauvais nom de compte/mot de passe");
                }
            }
        }
    }
}
