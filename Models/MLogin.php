<?php

class MLogin extends Model
{
    public function enter($login, $pass)
    {
        $sql = "SELECT count(*) as count from admins where login=:login and pass=:pass";

        $req = Database::getBdd()->prepare($sql);

        $result = $req->execute([
            'login' => $login,
            'pass' => $pass
        ]);

        return $req->fetch()["count"] == 1;
    }
}

?>