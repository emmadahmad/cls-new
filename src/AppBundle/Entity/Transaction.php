<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

abstract class Transaction
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $transactionId;

    /**
     * @var integer
     */
    private $type;

    /**
     * @var float
     */
    private $amount;

    /**
     * @var string
     */
    private $balance;

    /**
     * @var integer
     */
    private $creditDebit;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $status;

    /**
     * @var float
     */
    private $commissionPercentage;

    /**
     * @var float
     */
    private $commissionAmount;

    /**
     * @var \DateTime
     */
    private $dateCreated;

    /**
     * @var \DateTime
     */
    private $dateUpdated;

    /**
     * @var \AppBundle\Entity\User
     */
    private $user;

    /**
     * @var \AppBundle\Entity\User
     */
    private $admin;


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
     * Set transactionId
     *
     * @param string $transactionId
     * @return Transaction
     */
    public function setTransactionId($transactionId)
    {
        $this->transactionId = $transactionId;

        return $this;
    }

    /**
     * Get transactionId
     *
     * @return string 
     */
    public function getTransactionId()
    {
        return $this->transactionId;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return Transaction
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set amount
     *
     * @param float $amount
     * @return Transaction
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get amount
     *
     * @return float 
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set balance
     *
     * @param string $balance
     * @return Transaction
     */
    public function setBalance($balance)
    {
        $this->balance = $balance;

        return $this;
    }

    /**
     * Get balance
     *
     * @return string 
     */
    public function getBalance()
    {
        return $this->balance;
    }

    /**
     * Set creditDebit
     *
     * @param integer $creditDebit
     * @return Transaction
     */
    public function setCreditDebit($creditDebit)
    {
        $this->creditDebit = $creditDebit;

        return $this;
    }

    /**
     * Get creditDebit
     *
     * @return integer 
     */
    public function getCreditDebit()
    {
        return $this->creditDebit;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Transaction
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
     * @return Transaction
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
     * Set commissionPercentage
     *
     * @param float $commissionPercentage
     * @return Transaction
     */
    public function setCommissionPercentage($commissionPercentage)
    {
        $this->commissionPercentage = $commissionPercentage;

        return $this;
    }

    /**
     * Get commissionPercentage
     *
     * @return float 
     */
    public function getCommissionPercentage()
    {
        return $this->commissionPercentage;
    }

    /**
     * Set commissionAmount
     *
     * @param float $commissionAmount
     * @return Transaction
     */
    public function setCommissionAmount($commissionAmount)
    {
        $this->commissionAmount = $commissionAmount;

        return $this;
    }

    /**
     * Get commissionAmount
     *
     * @return float 
     */
    public function getCommissionAmount()
    {
        return $this->commissionAmount;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     * @return Transaction
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
     * @return Transaction
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
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Transaction
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

    /**
     * Set admin
     *
     * @param \AppBundle\Entity\User $admin
     * @return Transaction
     */
    public function setAdmin(\AppBundle\Entity\User $admin)
    {
        $this->admin = $admin;

        return $this;
    }

    /**
     * Get admin
     *
     * @return \AppBundle\Entity\User 
     */
    public function getAdmin()
    {
        return $this->admin;
    }
}
