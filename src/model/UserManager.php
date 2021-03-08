<?php
namespace App\src\model;
use App\config\Parameter;
use App\src\entity\User;

class UserManager extends Manager
/**
 * Class UserManager manages database access for user accounts
 */
{ 
    private function buildObject($row)
    {
        $user = new User();
        $user->setIdUser($row['iduser']);
        $user->setPseudo($row['pseudo']);
        $user->setRole($row['role']);
        return $user;
    }
  
  //display all users
    public function getUsers()
    {
        $sql = 'SELECT user.iduser, user.pseudo, role.role FROM user INNER JOIN role ON role.idrole = user.role_idrole ORDER BY user.role_idrole DESC';
        $result = $this->createQuery($sql);
        $users = [];
        foreach ($result as $row){
            $userId = $row['iduser'];
            $users[$userId] = $this->buildObject($row);
        }
        $result->closeCursor();
        return $users;
    }

   
/**
* Register user in database, password hashed
* @param Parameter $post User data
*/

    public function register(Parameter $post)
    {
        $sql = 'INSERT INTO user (pseudo, email, first_name, last_name, password, role_idrole) VALUES (?, ?, ?, ?, ?, ?)';
        $this->createQuery($sql, [$post->get('pseudo'), $post->get('email'), $post->get('first_name'), $post->get('last_name'), password_hash($post->get('password'), PASSWORD_BCRYPT),2]);
    }

    
/**
* Check if there is not already an account for this user
*@param Parameter $post User data
*/

    public function checkUser(Parameter $post)
    {
        $sql = 'SELECT COUNT(pseudo) FROM user WHERE pseudo = ?';
        $result = $this->createQuery($sql, [$post->get('pseudo')]);
        $isUnique = $result->fetchColumn();
        if($isUnique) {
            return '<p>Le pseudo existe déjà</p>';
        }
    }   
/**
* Verification of login data for a user
* @param Parameter $post Connection data
* @return array
*/
    public function login(Parameter $post)
    {
        $sql = 'SELECT user.iduser, user.role_idrole, user.password, role.role FROM user INNER JOIN role ON role.idrole = user.role_idrole WHERE pseudo = ?';
        $data = $this->createQuery($sql, [$post->get('pseudo')]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post->get('password'), $result['password']);
        $_SESSION['iduser'] = $result['iduser'] ;
        return [
           'result' => $result,    
           'isPasswordValid' => $isPasswordValid
        ];
    }

    /**
    * Update userProfile password in database
    * @param Parameter $post New password
    */

    public function updatePassword(Parameter $post, $pseudo)
    {
        $sql = 'UPDATE user SET password = ? WHERE pseudo = ?';
        $this->createQuery($sql, [password_hash($post->get('password'), PASSWORD_BCRYPT), $pseudo]);
    }

    /**
    * Deletion of an account in the database
    */
    public function deleteAccount($pseudo)
    {
        $sql = 'DELETE FROM user WHERE pseudo = ?';
        $this->createQuery($sql, [$pseudo]);
    }


  // Deletion of user
    
    public function deleteUser($userId)
    {
        $sql = 'DELETE FROM user WHERE iduser = ?';
        $this->createQuery($sql, [$userId]);
    }
}
