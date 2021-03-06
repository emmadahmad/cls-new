<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
    /**
     * @var string
     */
    private $fullName;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var string
     */
    private $bio;

    /**
     * @var float
     */
    private $credits = 0;

    /**
     * @var boolean
     */
    private $emailVerified = 0;

    /**
     * @var \DateTime
     */
    private $dateCreated;

    /**
     * @var \DateTime
     */
    private $dateUpdated;

    /**
     * @var \AppBundle\Entity\Media
     */
    private $profileMedia;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $comments;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $userTransactions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $adminTransactions;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $courses;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $courseLiker;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $subscriptions;


    /**
     * Set fullName
     *
     * @param string $fullName
     * @return User
     */
    public function setFullName($fullName)
    {
        $this->fullName = $fullName;

        return $this;
    }

    /**
     * Get fullName
     *
     * @return string 
     */
    public function getFullName()
    {
        return $this->fullName;
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string 
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string 
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set bio
     *
     * @param string $bio
     * @return User
     */
    public function setBio($bio)
    {
        $this->bio = $bio;

        return $this;
    }

    /**
     * Get bio
     *
     * @return string 
     */
    public function getBio()
    {
        return $this->bio;
    }

    /**
     * Set credits
     *
     * @param float $credits
     * @return User
     */
    public function setCredits($credits)
    {
        $this->credits = $credits;

        return $this;
    }

    /**
     * Get credits
     *
     * @return float 
     */
    public function getCredits()
    {
        return $this->credits;
    }

    /**
     * Set emailVerified
     *
     * @param boolean $emailVerified
     * @return User
     */
    public function setEmailVerified($emailVerified)
    {
        $this->emailVerified = $emailVerified;

        return $this;
    }

    /**
     * Get emailVerified
     *
     * @return boolean 
     */
    public function getEmailVerified()
    {
        return $this->emailVerified;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return User
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
     * @return User
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
     * Set profileMedia
     *
     * @param \AppBundle\Entity\Media $profileMedia
     * @return User
     */
    public function setProfileMedia(\AppBundle\Entity\Media $profileMedia = null)
    {
        $this->profileMedia = $profileMedia;

        return $this;
    }

    /**
     * Get profileMedia
     *
     * @return \AppBundle\Entity\Media 
     */
    public function getProfileMedia()
    {
        return $this->profileMedia;
    }

    /**
     * Add comments
     *
     * @param \AppBundle\Entity\Comment $comments
     * @return User
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
     * Add userTransactions
     *
     * @param \AppBundle\Entity\Transaction $userTransactions
     * @return User
     */
    public function addUserTransaction(\AppBundle\Entity\Transaction $userTransactions)
    {
        $this->userTransactions[] = $userTransactions;

        return $this;
    }

    /**
     * Remove userTransactions
     *
     * @param \AppBundle\Entity\Transaction $userTransactions
     */
    public function removeUserTransaction(\AppBundle\Entity\Transaction $userTransactions)
    {
        $this->userTransactions->removeElement($userTransactions);
    }

    /**
     * Get userTransactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUserTransactions()
    {
        return $this->userTransactions;
    }

    /**
     * Add adminTransactions
     *
     * @param \AppBundle\Entity\Transaction $adminTransactions
     * @return User
     */
    public function addAdminTransaction(\AppBundle\Entity\Transaction $adminTransactions)
    {
        $this->adminTransactions[] = $adminTransactions;

        return $this;
    }

    /**
     * Remove adminTransactions
     *
     * @param \AppBundle\Entity\Transaction $adminTransactions
     */
    public function removeAdminTransaction(\AppBundle\Entity\Transaction $adminTransactions)
    {
        $this->adminTransactions->removeElement($adminTransactions);
    }

    /**
     * Get adminTransactions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAdminTransactions()
    {
        return $this->adminTransactions;
    }

    /**
     * Add courses
     *
     * @param \AppBundle\Entity\Course $courses
     * @return User
     */
    public function addCourse(\AppBundle\Entity\Course $courses)
    {
        $this->courses[] = $courses;

        return $this;
    }

    /**
     * Remove courses
     *
     * @param \AppBundle\Entity\Course $courses
     */
    public function removeCourse(\AppBundle\Entity\Course $courses)
    {
        $this->courses->removeElement($courses);
    }

    /**
     * Get courses
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * Add courseLiker
     *
     * @param \AppBundle\Entity\CourseLike $courseLiker
     * @return User
     */
    public function addCourseLiker(\AppBundle\Entity\CourseLike $courseLiker)
    {
        $this->courseLiker[] = $courseLiker;

        return $this;
    }

    /**
     * Remove courseLiker
     *
     * @param \AppBundle\Entity\CourseLike $courseLiker
     */
    public function removeCourseLiker(\AppBundle\Entity\CourseLike $courseLiker)
    {
        $this->courseLiker->removeElement($courseLiker);
    }

    /**
     * Get courseLiker
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCourseLiker()
    {
        return $this->courseLiker;
    }

    /**
     * Add subscriptions
     *
     * @param \AppBundle\Entity\Subscription $subscriptions
     * @return User
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
}
