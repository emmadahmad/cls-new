<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Lesson
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var boolean
     */
    private $isFree;

    /**
     * @var \DateTime
     */
    private $dateCreated;

    /**
     * @var \DateTime
     */
    private $dateUpdated;

    /**
     * @var \DateTime
     */
    private $dateApproved;

    /**
     * @var \AppBundle\Entity\Media
     */
    private $videoMedia;

    /**
     * @var \AppBundle\Entity\Chapter
     */
    private $chapter;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Lesson
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Lesson
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Lesson
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set isFree
     *
     * @param boolean $isFree
     * @return Lesson
     */
    public function setIsFree($isFree)
    {
        $this->isFree = $isFree;

        return $this;
    }

    /**
     * Get isFree
     *
     * @return boolean 
     */
    public function getIsFree()
    {
        return $this->isFree;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Lesson
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime 
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * Set dateUpdated
     *
     * @param \DateTime $dateUpdated
     * @return Lesson
     */
    public function setDateUpdated($dateUpdated)
    {
        $this->dateUpdated = $dateUpdated;

        return $this;
    }

    /**
     * Get dateUpdated
     *
     * @return \DateTime 
     */
    public function getDateUpdated()
    {
        return $this->dateUpdated;
    }

    /**
     * Set dateApproved
     *
     * @param \DateTime $dateApproved
     * @return Lesson
     */
    public function setDateApproved($dateApproved)
    {
        $this->dateApproved = $dateApproved;

        return $this;
    }

    /**
     * Get dateApproved
     *
     * @return \DateTime 
     */
    public function getDateApproved()
    {
        return $this->dateApproved;
    }

    /**
     * Set videoMedia
     *
     * @param \AppBundle\Entity\Media $videoMedia
     * @return Lesson
     */
    public function setVideoMedia(\AppBundle\Entity\Media $videoMedia = null)
    {
        $this->videoMedia = $videoMedia;

        return $this;
    }

    /**
     * Get videoMedia
     *
     * @return \AppBundle\Entity\Media 
     */
    public function getVideoMedia()
    {
        return $this->videoMedia;
    }

    /**
     * Set chapter
     *
     * @param \AppBundle\Entity\Chapter $chapter
     * @return Lesson
     */
    public function setChapter(\AppBundle\Entity\Chapter $chapter)
    {
        $this->chapter = $chapter;

        return $this;
    }

    /**
     * Get chapter
     *
     * @return \AppBundle\Entity\Chapter 
     */
    public function getChapter()
    {
        return $this->chapter;
    }
}
