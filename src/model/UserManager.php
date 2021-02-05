<?php

namespace Src\Model;


class UserManager extends Manager{


	public function addUser()
    {
        $req = $this->getConnection()->prepare("INSERT INTO user(first_name, last_name, email, password_user)
                                                   VALUES (:first_name, :last_name, :email, password_user)");
        $req->bindValue(':first_name', $_POST['first_name'], \PDO::PARAM_STR);
        $req->bindValue(':last_name', $_POST['last_name'], \PDO::PARAM_STR);
		$req->bindValue(':email', $_POST['email'], \PDO::PARAM_STR);
		$req->bindValue(':password_user', $_POST['password_user'], \PDO::PARAM_STR);
		
        $req->execute();
    }

    
}