<?php
namespace App\model;

use App\Connexion\ConnexionDb;
use App\model\User;
use Respect\Validation\Validator as v;

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
            ['email', $email, \PDO::PARAM_STR],
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


    /**
     * Add new user in database
     * 
     * @param object $user
     */
    static function addUser(User $user){

        $validation = signupValid();

        if($validation === "OK"){
            $base = new ConnexionDb;

            $base->qw('INSERT INTO user(`username`, `firstname`, `email`, `pass`, `valid`)
                      VALUES (:username, :firstname, :email, :pass, :1)',
            array(
                array('username',$_POST['username'],\PDO::PARAM_STR),
                array('firstname',$_POST['firstname'],\PDO::PARAM_STR),
                array('email',$_POST['email'],\PDO::PARAM_STR),
                array('pass',\PDO::PARAM_STR),
                array('valid',\PDO::PARAM_INT)
                )
            );
            $userM = new User($_POST);

        }else{
            echo 'erreur d\'inscription';
        }
    }

    // check pour valider l'inscription
    private function signupValid(){
        if ($this->checkMail($_POST['email'])){
            if ($this->checkUsername($_POST['username'])){
                if ($this->checkPass($_POST['pass']) && $this->checkPass($_POST['passconf'])){
                    if($_POST['pass'] === $_POST['passconf']){
                        if(!$this->checkUsernameExist()){
                            if(!$this->checkMailExist()){
                                return 'OK';
                            }else{
                                return "Cette adresse e-mail est deja utilisée";
                            }
                        }else{
                            return "Ce nom d'utilisateur est deja pris";
                        }
                    }else{
                        return "Le mot de passe et la confirmation sont différents";
                    }
                }else{
                    return "Mot de passe invalide";
                }
            }else{
                return "Nom d'utilisateur invalide";
            }
        }else{
            return 'Adresse e-mail invalide';
        } 
    }


    // check si User name exist
    private function checkUsernameExist(){
        $base = new ConnexionDb();

            $req = $base->query(
                "SELECT u.username FROM user as u WHERE u.username = :username",
                array(
                    array('username',$_POST['username'],\PDO::PARAM_STR)
                    )
            );

            if(isset($req[0]->username)){
                return true;
            }else{
                return false;
            }
    }

    // Check mail exist
    private function checkMailExist(){
        $base = new ConnexionDb();

            $req = $base->query(
                "SELECT u.email FROM user as u WHERE u.email = :email",
                array(
                    array('email',$_POST['email'],\PDO::PARAM_STR)
                    )
            );

            if(isset($req[0]->mail)){
                return true;
            }else{
                return false;
            }
    }

    private function checkUsername($username){
        if(isset($username) && !empty($username)){
            if(v::stringVal()->validate($username)){
                return true;
            }
        }
        return false;
    }
    private function checkMail($email){
        if(isset($email) && !empty($email)){
            if(v::email()->validate($email)){
                return true;
            }
        }
        return false;
    }
    private function checkPass($pass){
        if(isset($pass) && !empty($pass)){
            return true;
        }
        return false;
    }
}