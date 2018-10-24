<?php 

// namespace JF\Project4\Model;

class Comment {

    protected $_id;
    protected $_postId;
    protected $_statut;
    protected $_comment;
    protected $_author;
    protected $_postedDate;


    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method))
            {
                $this->$method($value);
            }
        }
    }


    /**
     * Getters
     */

     public function getId()
     {
         return $this->_id;
     }

     public function getPostId()
     {
         return $this->_postId;
     }

     public function getStatut()
     {
         return $this->_statut;
     }

     public function getComment()
     {
         return $this->_comment;
     }

     public function getAuthor()
     {
         return $this->_author;
     }

     public function getPostedDate()
     {
         return $this->_postedDate;
     }


     /**
     * Setters
     */

    public function setId($id)
    {
        if((int)$id)
        {
            $this->_id = $id;
        }
     }

     public function setPostId($postId)
    {
        if((int)$postId)
        {
            $this->_postId = $postId;
        }
     }

     public function setStatut($statut)
     {
        if(is_string($statut))
        {
            $this->_statut = $statut;
        }
     }

     public function setComment($comment)
     {
        if(is_string($comment))
        {
            $this->_comment = $comment;
        }
     }

     public function setAuthor($author)
     {
        if(is_string($author))
        {
            $this->_author = $author;
        }
     }

     public function setPostedDate($postedDate)
     {
        if(is_string($postedDate))
        {
            $this->_postedDate = $postedDate;
        }
     }

     public function setPostImg($postImg)
     {
        if(is_string($postImg))
        {
            $this->_postImg = $postImg;
        }
     }

}