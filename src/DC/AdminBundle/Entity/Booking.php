<?php

namespace DC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Booking
 *
 * @ORM\Table(name="booking")
 * @ORM\Entity(repositoryClass="DC\AdminBundle\Repository\BookingRepository")
 */
class Booking
{


    /**
     * @ORM\ManyToOne(targetEntity="DC\AdminBundle\Entity\DryCleaners")
     * @ORM\JoinColumn(nullable=true)
     */
    private $drycleaner;


    /**
     * @ORM\ManyToOne(targetEntity="DC\AdminBundle\Entity\WashingMachine")
     * @ORM\JoinColumn(nullable=true)
     */
    private $washingmachine;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="UserId", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var int
     *
     * @ORM\Column(name="DrycleanerId", type="integer")
     */
    private $drycleanerId;

    /**
     * @var string
     *
     * @ORM\Column(name="WashingmachineId", type="string", length=255, nullable=true)
     */
    private $washingmachineId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="StartDateTime", type="time")
     */
    private $startDateTime;

    /**
     * @var int
     *
     * @ORM\Column(name="Duration", type="integer",nullable=true))
     */
    private $duration;

    /**
     * @var boolean
     *
     * @ORM\Column(name="Booked", type="boolean")
     */
     private $booked;

    /**
     * Get booked
     *
     * @return boolean
     */
    public function getBooked(){
        return $this->booked;
    }

    /**
     * Set booked
     *
     *  @param boolean $booked
     *
     * @return boolean
     */
    public function setBooked($booked){
        $this->booked = $booked;

        return $this;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     *
     * @return Booking
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set drycleanerId
     *
     * @param integer $drycleanerId
     *
     * @return Booking
     */
    public function setDrycleanerId($drycleanerId)
    {
        $this->drycleanerId = $drycleanerId;

        return $this;
    }

    /**
     * Get drycleanerId
     *
     * @return int
     */
    public function getDrycleanerId()
    {
        return $this->drycleanerId;
    }

    /**
     * Set washingmachineId
     *
     * @param string $washingmachineId
     *
     * @return Booking
     */
    public function setWashingmachineId($washingmachineId)
    {
        $this->washingmachineId = $washingmachineId;

        return $this;
    }

    /**
     * Get washingmachineId
     *
     * @return string
     */
    public function getWashingmachineId()
    {
        return $this->washingmachineId;
    }

    /**
     * Set startDateTime
     *
     * @param \DateTime $startDateTime
     *
     * @return Booking
     */
    public function setStartDateTime($startDateTime)
    {
        $this->startDateTime = $startDateTime;

        return $this;
    }

    /**
     * Get startDateTime
     *
     * @return \DateTime
     */
    public function getStartDateTime()
    {
        return $this->startDateTime;
    }

    /**
     * Set duration
     *
     * @param integer $duration
     *
     * @return Booking
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * Get duration
     *
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * Set drycleaner
     *
     * @param \DC\AdminBundle\Entity\DryCleaners $drycleaner
     *
     * @return Booking
     */
    public function setDrycleaner(\DC\AdminBundle\Entity\DryCleaners $drycleaner = null)
    {
        $this->drycleaner = $drycleaner;

        return $this;
    }

    /**
     * Get drycleaner
     *
     * @return \DC\AdminBundle\Entity\DryCleaners
     */
    public function getDrycleaner()
    {
        return $this->drycleaner;
    }

    /**
     * Set washingmachine
     *
     * @param \DC\AdminBundle\Entity\WashingMachine $washingmachine
     *
     * @return Booking
     */
    public function setWashingmachine(\DC\AdminBundle\Entity\WashingMachine $washingmachine = null)
    {
        $this->washingmachine = $washingmachine;

        return $this;
    }

    /**
     * Get washingmachine
     *
     * @return \DC\AdminBundle\Entity\WashingMachine
     */
    public function getWashingmachine()
    {
        return $this->washingmachine;
    }
}
