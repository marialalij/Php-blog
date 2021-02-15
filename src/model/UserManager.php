<?php

namespace App\src\model;

use App\config\Parameter;


class UserManager extends Manager
{
    public function register(Parameter $post)
    {
        $sql = 'INSERT INTO user (pseudo, email, first_name, last_name, password) VALUES (?, ?, ?, ?, ?)';
        $this->createQuery($sql, [$post->get('pseudo'), $post->get('email'), $post->get('first_name'), $post->get('last_name'), password_hash($post->get('password'), PASSWORD_BCRYPT)]);
    }


    public function checkUser(Parameter $post)
    {
        $sql = 'SELECT COUNT(pseudo) FROM user WHERE pseudo = ?';
        $result = $this->createQuery($sql, [$post->get('pseudo')]);
        $isUnique = $result->fetchColumn();
        if($isUnique) {
            return '<p>Le pseudo existe déjà</p>';
        }
    }


    public function login(Parameter $post)
    {
        $sql = 'SELECT iduser, password FROM user WHERE pseudo = ?';
        $data = $this->createQuery($sql, [$post->get('pseudo')]);
        $result = $data->fetch();
        $isPasswordValid = password_verify($post->get('password'), $result['password']);
        return [
            'result' => $result,
            'isPasswordValid' => $isPasswordValid
        ];
    }
}