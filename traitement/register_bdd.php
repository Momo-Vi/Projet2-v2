<?php
require_once('modeles/modele.php');

class RegisterBdd extends Modele
{
    public function register()
    {
        if (isset($_POST['reg_user'])) {
            // receive all input values from the form
            $username = mysqli_real_escape_string($this->getBdd(), $_POST['username']);

            $nom = mysqli_real_escape_string($this->getBdd(), $_POST['nom']);
            $prenom = mysqli_real_escape_string($this->getBdd(), $_POST['prenom']);
            $birthday = mysqli_real_escape_string($this->getBdd(), $_POST['birthday']);
            $adresse = mysqli_real_escape_string($this->getBdd(), $_POST['adresse']);
            $num_tel = mysqli_real_escape_string($this->getBdd(), $_POST['num_tel']);
            $pays = mysqli_real_escape_string($this->getBdd(), $_POST['pays']);

            $email = mysqli_real_escape_string($this->getBdd(), $_POST['email']);
            $password_1 = mysqli_real_escape_string($this->getBdd(), $_POST['password_1']);
            $password_2 = $_POST['password_2'];

            // form validation: ensure that the form is correctly filled
            if (empty($username)) {
                array_push($errors, "Nom de compte requis");
            }
            if (empty($email)) {
                array_push($errors, "Email requis");
            }

            if ($password_1 != $password_2) {
                array_push($errors, "Les deux mots de passe ne correspondent pas");
            }

            // register user if there are no errors in the form
            if (count($errors) == 0) {
                $password = md5($password_1);
                $query = "INSERT INTO user (username, email, password, nom, prenom, birthday, num_tel, adresse, pays, status) 
                    VALUES('$username', '$email', '$password','$nom', '$prenom', '$birthday', '$num_tel', '$adresse', '$pays', 'user')";

                mysqli_query($this->getBdd(), $query);

                $id_user = mysqli_query($this->getBdd(), "SELECT id FROM user WHERE username = '$username'")->fetch_object()->id;

                $_SESSION['username'] = $username;
                $_SESSION['id'] = $id_user;
                $_SESSION['success'] = "Vous etes bien connecter";
                header('location:  index.php');
            }
        }
    }
}
