<?php 
 namespace Entity;

 class user{

     private $pseudo;
     private $email;
     private $password;
     private $firstName;
     private $lastName;
     private $mobile;
     private $birthDate;
     private $image;
     private $role;

   //setters

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
    


    //getters

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