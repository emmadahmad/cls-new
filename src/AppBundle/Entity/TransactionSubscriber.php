<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Transaction;

class TransactionSubscriber extends Transaction
{
    /**
     * @var \AppBundle\Entity\Subscription
     */
    private $subscription;


    /**
     * Set subscription
     *
     * @param \AppBundle\Entity\Subscription $subscription
     * @return TransactionSubscriber
     */
    public function setSubscription(\AppBundle\Entity\Subscription $subscription = null)
    {
        $this->subscription = $subscription;

        return $this;
    }

    /**
     * Get subscription
     *
     * @return \AppBundle\Entity\Subscription 
     */
    public function getSubscription()
    {
        return $this->subscription;
    }
}
