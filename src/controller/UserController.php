<?php
namespace App\src\controller;

use App\config\Parameter;


class UserController extends Controller
{ 

 public function register(Parameter $post)
     {
        if($post->get('submit')) {
            $errors = $this->validation->validate($post, 'User');
            if($this->userManager->checkUser($post)) {
                $errors['pseudo'] = $this->userManager->checkUser($post);
            }
            if(!$errors) {
                $this->userManager->register($post);
                $this->session->set('register', 'Votre inscription a bien été effectuée');
                header('Location: ../public/index.php');
            }
            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);

        }
        return $this->view->render('register');
    }

    public function login(Parameter $post)
    {
        if($post->get('submit')) {
            $result = $this->userManager->login($post);
            if($result && $result['isPasswordValid']) {
                $this->session->set('login', 'Content de vous revoir');
                $this->session->set('iduser', $result['result']['iduser']);
                $this->session->set('role', $result['result']['role']);
                $this->session->set('pseudo', $post->get('pseudo'));
                header('Location: ../public/index.php');
            }
                $this->session->set('error_login', 'Le pseudo ou le mot de passe sont incorrects');
                return $this->view->render('login', [
                    'post'=> $post
                ]);
        }
        return $this->view->render('login');
    }
    public function profile()
    {
        return $this->view->render('profile');
    }
 }