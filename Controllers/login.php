<?php


class login extends Controller
{
    function quit()
    {
        unset ($_SESSION['admin']);
        header("Location: /");
    }

    function enter()
    {
        $d['errors'] = [];

        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $this->secure_form($_POST);
            if (isset($_POST["login"])) {
                require(ROOT . 'Models/MLogin.php');

                $login = new MLogin();

                if ($login->enter($_POST["login"], $_POST["pass"])) {
                    $_SESSION['admin'] = true;
                    header("Location: /");
                } else {
                    unset ($_SESSION['admin']);
                    $d['errors'][] = 'Incorrect data';
                }
            }
        }

        $this->set($d);
        $this->render("enter");
    }

}