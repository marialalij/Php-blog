<?php 
 namespace App\src\entity;

 class Article{
     
     private $idArticle;
     private $title;
     private $chapo;
     private $content;
     private $createDate;
     private $updateDate;
     private $mainImage;
   //setters

      public function setIdArticle($idArticle)
      {
            $this->idArticle = $idArticle;
      }


     public function setTitle($title)
     {
         $this->title = $title;
     }
 
     public function setChapo($chapo)
     {
         $this->chapo = $chapo;
     }

     public function setContent($content)
     {
         $this->content = $content;
     }
 
     public function setCreateDate($createDate)
     {
         $this->createDate = $createDate;
     }
 
     public function setUpdateDate($updateDate) 
     {
         $this->updateDate = $updateDate;
     }

   
    public function setMainImage($mainImage)
	{
		$this->mainImage = $mainImage;
    }

    //getters

    
    public function getIdArticle()
	{
		return $this->idArticle;
	}

    public function getTitle()
	{
		return $this->title;
	}

	public function getChapo()
	{
		return $this->chapo;
	}

	public function getContent()
	{
		return $this->content;
	}


	public function getCreateDate()
	{
		return $this->createDate;
    }
    
    public function getUpdateDate()
	{
		return $this->updateDate;
	}

	public function getMainImage()
	{
		return $this->mainImage;
	}

	
 }