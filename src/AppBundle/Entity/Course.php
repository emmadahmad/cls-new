<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

class Course
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $skillId;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $subtitle;

    /**
     * @var string
     */
    private $prerequisites;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $language;

    /**
     * @var integer
     */
    private $totalLikes;

    /**
     * @var string
     */
    private $hashedId;

    /**
     * @var float
     */
    private $price;

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
    private $coverMedia;

    /**
     * @var \AppBundle\Entity\Media
     */
    private $referenceFilesMedia;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $categories;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $chapters;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $likes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $subscriptions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tags;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $transactions;

    /**
     * @var \AppBundle\Entity\User
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->categories = new \Doctrine\Common\Collections\ArrayCollection();
        $this->chapters = new \Doctrine\Common\Collections\ArrayCollection();
        $this->comments = new \Doctrine\Common\Collections\ArrayCollection();
        $this->likes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->subscriptions = new \Doctrine\Common\Collections\ArrayCollection();
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->transactions = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * Set skillId
     *
     * @param integer $skillId
     * @return Course
     */
    public function setSkillId($skillId)
    {
        $this->skillId = $skillId;

        return $this;
    }

    /**
     * Get skillId
     *
     * @return integer 
     */
    public function getSkillId()
    {
        return $this->skillId;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Course
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
     * Set subtitle
     *
     * @param string $subtitle
     * @return Course
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;

        return $this;
    }

    /**
     * Get subtitle
     *
     * @return string 
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Set prerequisites
     *
     * @param string $prerequisites
     * @return Course
     */
    public function setPrerequisites($prerequisites)
    {
        $this->prerequisites = $prerequisites;

        return $this;
    }

    /**
     * Get prerequisites
     *
     * @return string 
     */
    public function getPrerequisites()
    {
        return $this->prerequisites;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Course
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
     * Set language
     *
     * @param string $language
     * @return Course
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set totalLikes
     *
     * @param integer $totalLikes
     * @return Course
     */
    public function setTotalLikes($totalLikes)
    {
        $this->totalLikes = $totalLikes;

        return $this;
    }

    /**
     * Get totalLikes
     *
     * @return integer 
     */
    public function getTotalLikes()
    {
        return $this->totalLikes;
    }

    /**
     * Set hashedId
     *
     * @param string $hashedId
     * @return Course
     */
    public function setHashedId($hashedId)
    {
        $this->hashedId = $hashedId;

        return $this;
    }

    /**
     * Get hashedId
     *
     * @return string 
     */
    public function getHashedId()
    {
        return $this->hashedId;
    }

    /**
     * Set price
     *
     * @param float $price
     * @return Course
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return float 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return Course
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
     * @return Course
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
     * @return Course
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
     * @return Course
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
     * @return Course
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
     * Set coverMedia
     *
     * @param \AppBundle\Entity\Media $coverMedia
     * @return Course
     */
    public function setCoverMedia(\AppBundle\Entity\Media $coverMedia = null)
    {
        $this->coverMedia = $coverMedia;

        return $this;
    }

    /**
     * Get coverMedia
     *
     * @return \AppBundle\Entity\Media 
     */
    public function getCoverMedia()
    {
        return $this->coverMedia;
    }

    /**
     * Set referenceFilesMedia
     *
     * @param \AppBundle\Entity\Media $referenceFilesMedia
     * @return Course
     */
    public function setReferenceFilesMedia(\AppBundle\Entity\Media $referenceFilesMedia = null)
    {
        $this->referenceFilesMedia = $referenceFilesMedia;

        return $this;
    }

    /**
     * Get referenceFilesMedia
     *
     * @return \AppBundle\Entity\Media 
     */
    public function getReferenceFilesMedia()
    {
        return $this->referenceFilesMedia;
    }

    /**
     * Add categories
     *
     * @param \AppBundle\Entity\CourseCategory $categories
     * @return Course
     */
    public function addCategory(\AppBundle\Entity\CourseCategory $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \AppBundle\Entity\CourseCategory $categories
     */
    public function removeCategory(\AppBundle\Entity\CourseCategory $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }

    /**
     * Add chapters
     *
     * @param \AppBundle\Entity\Chapter $chapters
     * @return Course
     */
    public function addChapter(\AppBundle\Entity\Chapter $chapters)
    {
        $this->chapters[] = $chapters;

        return $this;
    }

    /**
     * Remove chapters
     *
     * @param \AppBundle\Entity\Chapter $chapters
     */
    public function removeChapter(\AppBundle\Entity\Chapter $chapters)
    {
        $this->chapters->removeElement($chapters);
    }

    /**
     * Get chapters
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChapters()
    {
        return $this->chapters;
    }

    /**
     * Add comments
     *
     * @param \AppBundle\Entity\Comment $comments
     * @return Course
     */
    public function addComment(\AppBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \AppBundle\Entity\Comment $comments
     */
    public function removeComment(\AppBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Add likes
     *
     * @param \AppBundle\Entity\CourseLike $likes
     * @return Course
     */
    public function addLike(\AppBundle\Entity\CourseLike $likes)
    {
        $this->likes[] = $likes;

        return $this;
    }

    /**
     * Remove likes
     *
     * @param \AppBundle\Entity\CourseLike $likes
     */
    public function removeLike(\AppBundle\Entity\CourseLike $likes)
    {
        $this->likes->removeElement($likes);
    }

    /**
     * Get likes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Add subscriptions
     *
     * @param \AppBundle\Entity\Subscription $subscriptions
     * @return Course
     */
    public function addSubscription(\AppBundle\Entity\Subscription $subscriptions)
    {
        $this->subscriptions[] = $subscriptions;

        return $this;
    }

    /**
     * Remove subscriptions
     *
     * @param \AppBundle\Entity\Subscription $subscriptions
     */
    public function removeSubscription(\AppBundle\Entity\Subscription $subscriptions)
    {
        $this->subscriptions->removeElement($subscriptions);
    }

    /**
     * Get subscriptions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubscriptions()
    {
        return $this->subscriptions;
    }

    /**
     * Add tags
     *
     * @param \AppBundle\Entity\CourseTag $tags
     * @return Course
     */
    public function addTag(\AppBundle\Entity\CourseTag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \AppBundle\Entity\CourseTag $tags
     */
    public function removeTag(\AppBundle\Entity\CourseTag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Add transactions
     *
     * @param \AppBundle\Entity\Transaction $transactions
     * @return Course
     */
    public function addTransaction(\AppBundle\Entity\Transaction $transactions)
    {
        $this->transactions[] = $transactions;

        return $this;
    }

    /**
     * Remove transactions
     *
     * @param \AppBundle\Entity\Transaction $transactions
     */
    public function removeTransaction(\AppBundle\Entity\Transaction $transactions)
    {
        $this->transactions->removeElement($transactions);
    }

    /**
     * Get transactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Course
     */
    public function setUser(\AppBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
