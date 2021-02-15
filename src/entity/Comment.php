<?php

namespace App\src\entity;

class Comment
{ 
    private $idComment;
    private $content;
	private $commentDate;

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

  	// GETTERS //

	public function getIdComment()
	{
		return $this->commentDate;
	}

	public function getContent()
	{
		return $this->content;
	}

	public function getCommentDate()
	{
		return $this->commentDate;
	}


}
