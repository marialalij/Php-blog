<?php
namespace App\src\controller;

use App\config\Parameter;


class UserController extends Controller
{ 
    
/**
* Registration on the site
* @param $post Parameter User registration data
*/

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
                header('Location: ../public/index.php?route=login');
            }
            return $this->view->render('register', [
                'post' => $post,
                'errors' => $errors
            ]);

        }
        return $this->view->render('register');
    }
    
    
/**
* Login page
* @param Parameter $post Connection data
*/
    public function login(Parameter $post)
    {  
        
         // If form submitted, identity verification  
        // Store user information in the session
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
                
            // If the password is invalid, reset the connection page with info
        }
        return $this->view->render('login');
        
// If no form submitted, return to the login page
    }
    
/**
* Logout of the current user
*/
    public function logout()
    {
        if ($this->checkLoggedIn()) {
            $this->session->destroy();
            $this->session->start();
            $this->session->set('logout', 'Déconnexion réussie');
            header('Location: ../public/index.php');
        }
    }
    private function checkLoggedIn()
    {
        if(!$this->session->get('pseudo')) {
            $this->session->set('need_login', 'Vous devez vous connecter pour accéder à cette page');
            header('Location: ../public/index.php?route=login');
        } else {
            return true;
        }
    }
    private function checkAdmin()
    {
        $this->checkLoggedIn();
        if(!($this->session->get('role') === 'admin')) {
            $this->session->set('not_admin', 'Vous n\'avez pas le droit d\'accéder à cette page');
            header('Location: ../public/index.php?route=profile');
        } else {
            return true;
        }
    }
  
/**
* Profile of the logged in user
*/
    public function profile()
    {
        if ($this->checkLoggedIn()) {
            $this->view->render('profile');
        }
    }
    
/**
* Deletion of the user account
*/
    public function deleteUser($userId)
       {
            $this->userManager->deleteUser($userId);
            $this->session->set('delete_user', 'L\'utilisateur a bien été supprimé');
            header('Location: ../public/index.php?route=administration');
       }
   /*
    * Update user password
    * @param Parameter $post New password
    */
  public function updatePassword(Parameter $post)
    {
        if ($this->checkLoggedIn()) {
            if ($post->get('submit')) {
                $errors = $this->validation->validate($post, 'User');
                if (!$errors) {
                    $this->userManager->updatePassword($post, $this->session->get('user'));
                    $this->session->set('update_password', 'Le mot de passe à bien été mis à jour');
                    header('Location: ../public/index.php?route=profile');
                } else {
                    $this->view->render('update_Password', [
                        'errors' => $errors
                    ]);
                }
            } else {
                $this->view->render('update_Password');
            }
        }
    }
}