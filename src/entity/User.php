<?php 
namespace App\src\entity;
 class User{
     private $idUser;
     private $pseudo;
     private $email;
     private $password;
     private $firstName;
     private $lastName;
     private $mobile;
     private $birthDate;
     private $image;
     private $role;
     private $status;

   //setters
 

   public function setIdUser($idUser)
   {

       $this->idUser = $idUser;
   }

     public function setPseudo($pseudo)
     {
 
         $this->pseudo = $pseudo;
     }
 
     public function setEmail($email)
     {
         $this->email = $email;
     }
 
     public function setPassword($password)
     {
         $this->password = $password;
     }

     public function setFirstName($firstName)
     {
         $this->firstName = $firstName;
     }
 
     public function setLastName($lastName)
     {
         $this->lastName = $lastName;
     }
 
     public function setMobile($mobile)
     {
         $this->mobile = $mobile;
     }

     public function setBirthDate($birthDate)
	{
		$this->birthDate = $birthDate;
	}

    public function setImage($image)
	{
		$this->image = $image;
    }
    public function setRole($role)
	{
		$this->role = $role;
    }

    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getStatus()
    {
        return $this->status;
    }
    


    //getters

    public function getIdUser()
	{
		return $this->idUser;
	}

    public function getPseudo()
	{
		return $this->pseudo;
	}

	public function getEmail()
	{
		return $this->email;
	}

	public function getPassword()
	{
		return $this->password;
	}

    public function getFirstName()
	{
		return $this->firstName;
	}

	public function getLastName()
	{
		return $this->lastName;
	}

	public function getMobile()
	{
		return $this->mobile;
    }
    
    public function getBirthDate()
	{
		return $this->birthDate;
	}

	public function getImage()
	{
		return $this->image;
	}

	public function getRole()
	{
		return $this->role;
	}

 }