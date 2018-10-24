<?php 

// namespace JF\Project4\Model;

class Post {

    protected $_id;
    protected $_title;
    protected $_content;
    protected $_creationDate;
    protected $_postImg;


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

     public function getTitle()
     {
         return $this->_title;
     }

     public function getContent()
     {
         return $this->_content;
     }

     public function getCreationDate()
     {
         return $this->_creationDate;
     }

     public function getPostImg()
     {
         return $this->_postImg;
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

     public function setTitle($title)
     {
        if(is_string($title))
        {
            $this->_title = $title;
        }
     }

     public function setContent($content)
     {
        if(is_string($content))
        {
            $this->_content = $content;
        }
     }

     public function setCreationDate($creationDate)
     {
        if(is_string($creationDate))
        {
            $this->_creationDate = $creationDate;
        }
     }

     public function setPostImg($postImg)
     {
        $this->_postImg = $postImg;
     }

}