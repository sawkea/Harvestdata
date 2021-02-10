<?php
namespace App\model;

use App\Connexion\ConnexionDb;
use App\model\User;

class UserController
{
    /**
     * Verifcation user exist
     * 
     * @param object $user
     * @return bool $bool
     */
    static function existUser(User $user)
    {
        $email = $user->get_email();

        $connexion = new ConnexionDb();

        $query = "SELECT email FROM user WHERE email = :email";
        $params = [
            ['email', $email, \PDO::PARAM_STR]
        ];

        $exist = $connexion->query($query, $params);
        $bool = (empty($exist)) ? false : true;

        $connexion = null;

        return $bool;
    }

    /**
     * Connexion to account user
     * 
     * @param object $user
     * @return array $_SESSION
     */
    static function connexionUser(User $user)
    {
        $email = $user->get_email();

        $connexion = new ConnexionDb();

        $query = "SELECT * FROM user WHERE email = :email";
        $params = [
            ['email', $email, \PDO::PARAM_STR]
        ];

        $informationUser = $connexion->query($query, $params);
        
        if($_POST['pass'] == $informationUser[0]->pass) {
            // if(password_verify($_POST['pass'], $informationUser[0]->pass)) {
            $arrayhydrate = [];
            foreach($informationUser[0] as $key => $value) {
                $arrayhydrate[$key] = $value;
            }
            $user->hydrate($arrayhydrate);

            $_SESSION['user'] = true;
            $_SESSION['id'] = $user->get_id();
        }else{
            $_SESSION['user'] = false;
        }
        $connexion = null;
        return $validate = $_SESSION['user'];
    }

}