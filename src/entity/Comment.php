<?php

namespace App\src\entity;

class Comment
{ 
    private $idComment;
    private $content;
	private $commentDate;
	private $status;

  	// SETTERS //

    public function setIdComment($idComment)
	{
		$this->idComment = $idComment;
	}

	public function setContent($content)
	{
		$this->content = $content;
	}

	public function setCommentDate($commentDate)
	{
		$this->commentDate = $commentDate;
	}
	public function setStatus($status)
    {
        $this->status = $status;
    
	}
  	// GETTERS //

	public function getIdComment()
	{
		return $this->idComment;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function getCommentDate()
	{
		return $this->commentDate;
	}

	public function getStatus()
    {
        return $this->status;
    }

}
