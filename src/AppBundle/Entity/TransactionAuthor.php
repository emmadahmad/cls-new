<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Transaction;

class TransactionAuthor extends Transaction
{
    /**
     * @var \AppBundle\Entity\Course
     */
    private $course;


    /**
     * Set course
     *
     * @param \AppBundle\Entity\Course $course
     * @return TransactionAuthor
     */
    public function setCourse(\AppBundle\Entity\Course $course = null)
    {
        $this->course = $course;

        return $this;
    }

    /**
     * Get course
     *
     * @return \AppBundle\Entity\Course 
     */
    public function getCourse()
    {
        return $this->course;
    }
}
