<?php

namespace DC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OpeningHours
 *
 * @ORM\Table(name="opening_hours")
 * @ORM\Entity(repositoryClass="DC\AdminBundle\Repository\OpeningHoursRepository")
 */
class OpeningHours
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dayOneOpening", type="time")
     */
    private $dayOneOpening;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dayOneClosing", type="time")
     */
    private $dayOneClosing;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dayTwoOpening", type="time")
     */
    private $dayTwoOpening;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dayTwoClosing", type="time")
     */
    private $dayTwoClosing;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dayThreeOpening", type="time")
     */
    private $dayThreeOpening;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dayThreeClosing", type="time")
     */
    private $dayThreeClosing;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dayFourOpening", type="time")
     */
    private $dayFourOpening;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dayFourClosing", type="time")
     */
    private $dayFourClosing;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dayFiveOpening", type="time")
     */
    private $dayFiveOpening;

    /**
     * @var string
     *
     * @ORM\Column(name="dayFiveClosing", type="time")
     */
    private $dayFiveClosing;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="daySixOpening", type="time")
     */
    private $daySixOpening;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="daySixClosing", type="time")
     */
    private $daySixClosing;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="daySevenOpening", type="time")
     */
    private $daySevenOpening;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="daySevenClosing", type="time")
     */
    private $daySevenClosing;


    /**
     * @ORM\ManyToOne(targetEntity="DC\AdminBundle\Entity\WashingMachine")
     * @ORM\JoinColumn(nullable=true)
     */
    private $washingmachine;



    /**
     * @var \integer
     *
     * @ORM\Column(name="idDC", type="integer")
     */
    private $idDC;




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
     * Set dayOneOpening
     *
     * @param \DateTime $dayOneOpening
     *
     * @return OpeningHours
     */
    public function setDayOneOpening($dayOneOpening)
    {
        $this->dayOneOpening = $dayOneOpening;

        return $this;
    }

    /**
     * Get dayOneOpening
     *
     * @return \DateTime
     */
    public function getDayOneOpening()
    {
        return $this->dayOneOpening;
    }

    /**
     * Set dayOneClosing
     *
     * @param \DateTime $dayOneClosing
     *
     * @return OpeningHours
     */
    public function setDayOneClosing($dayOneClosing)
    {
        $this->dayOneClosing = $dayOneClosing;

        return $this;
    }

    /**
     * Get dayOneClosing
     *
     * @return \DateTime
     */
    public function getDayOneClosing()
    {
        return $this->dayOneClosing;
    }

    /**
     * Set dayTwoOpening
     *
     * @param \DateTime $dayTwoOpening
     *
     * @return OpeningHours
     */
    public function setDayTwoOpening($dayTwoOpening)
    {
        $this->dayTwoOpening = $dayTwoOpening;

        return $this;
    }

    /**
     * Get dayTwoOpening
     *
     * @return \DateTime
     */
    public function getDayTwoOpening()
    {
        return $this->dayTwoOpening;
    }

    /**
     * Set dayTwoClosing
     *
     * @param \DateTime $dayTwoClosing
     *
     * @return OpeningHours
     */
    public function setDayTwoClosing($dayTwoClosing)
    {
        $this->dayTwoClosing = $dayTwoClosing;

        return $this;
    }

    /**
     * Get dayTwoClosing
     *
     * @return \DateTime
     */
    public function getDayTwoClosing()
    {
        return $this->dayTwoClosing;
    }

    /**
     * Set dayThreeOpening
     *
     * @param \DateTime $dayThreeOpening
     *
     * @return OpeningHours
     */
    public function setDayThreeOpening($dayThreeOpening)
    {
        $this->dayThreeOpening = $dayThreeOpening;

        return $this;
    }

    /**
     * Get dayThreeOpening
     *
     * @return \DateTime
     */
    public function getDayThreeOpening()
    {
        return $this->dayThreeOpening;
    }

    /**
     * Set dayThreeClosing
     *
     * @param \DateTime $dayThreeClosing
     *
     * @return OpeningHours
     */
    public function setDayThreeClosing($dayThreeClosing)
    {
        $this->dayThreeClosing = $dayThreeClosing;

        return $this;
    }

    /**
     * Get dayThreeClosing
     *
     * @return \DateTime
     */
    public function getDayThreeClosing()
    {
        return $this->dayThreeClosing;
    }

    /**
     * Set dayFourOpening
     *
     * @param \DateTime $dayFourOpening
     *
     * @return OpeningHours
     */
    public function setDayFourOpening($dayFourOpening)
    {
        $this->dayFourOpening = $dayFourOpening;

        return $this;
    }

    /**
     * Get dayFourOpening
     *
     * @return \DateTime
     */
    public function getDayFourOpening()
    {
        return $this->dayFourOpening;
    }

    /**
     * Set dayFourClosing
     *
     * @param \DateTime $dayFourClosing
     *
     * @return OpeningHours
     */
    public function setDayFourClosing($dayFourClosing)
    {
        $this->dayFourClosing = $dayFourClosing;

        return $this;
    }

    /**
     * Get dayFourClosing
     *
     * @return \DateTime
     */
    public function getDayFourClosing()
    {
        return $this->dayFourClosing;
    }

    /**
     * Set dayFiveOpening
     *
     * @param \DateTime $dayFiveOpening
     *
     * @return OpeningHours
     */
    public function setDayFiveOpening($dayFiveOpening)
    {
        $this->dayFiveOpening = $dayFiveOpening;

        return $this;
    }

    /**
     * Get dayFiveOpening
     *
     * @return \DateTime
     */
    public function getDayFiveOpening()
    {
        return $this->dayFiveOpening;
    }

    /**
     * Set dayFiveClosing
     *
     * @param string $dayFiveClosing
     *
     * @return OpeningHours
     */
    public function setDayFiveClosing($dayFiveClosing)
    {
        $this->dayFiveClosing = $dayFiveClosing;

        return $this;
    }

    /**
     * Get dayFiveClosing
     *
     * @return string
     */
    public function getDayFiveClosing()
    {
        return $this->dayFiveClosing;
    }

    /**
     * Set daySixOpening
     *
     * @param \DateTime $daySixOpening
     *
     * @return OpeningHours
     */
    public function setDaySixOpening($daySixOpening)
    {
        $this->daySixOpening = $daySixOpening;

        return $this;
    }

    /**
     * Get daySixOpening
     *
     * @return \DateTime
     */
    public function getDaySixOpening()
    {
        return $this->daySixOpening;
    }

    /**
     * Set daySixClosing
     *
     * @param \DateTime $daySixClosing
     *
     * @return OpeningHours
     */
    public function setDaySixClosing($daySixClosing)
    {
        $this->daySixClosing = $daySixClosing;

        return $this;
    }

    /**
     * Get daySixClosing
     *
     * @return \DateTime
     */
    public function getDaySixClosing()
    {
        return $this->daySixClosing;
    }

    /**
     * Set daySevenOpening
     *
     * @param \DateTime $daySevenOpening
     *
     * @return OpeningHours
     */
    public function setDaySevenOpening($daySevenOpening)
    {
        $this->daySevenOpening = $daySevenOpening;

        return $this;
    }

    /**
     * Get daySevenOpening
     *
     * @return \DateTime
     */
    public function getDaySevenOpening()
    {
        return $this->daySevenOpening;
    }

    /**
     * Set daySevenClosing
     *
     * @param \DateTime $daySevenClosing
     *
     * @return OpeningHours
     */
    public function setDaySevenClosing($daySevenClosing)
    {
        $this->daySevenClosing = $daySevenClosing;

        return $this;
    }

    /**
     * Get daySevenClosing
     *
     * @return \DateTime
     */
    public function getDaySevenClosing()
    {
        return $this->daySevenClosing;
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



    public function getIdDC(){
        return $this->idDC;
    }


    public function setIdDC($idDC){
        $this->idDC = $idDC;

        return $this;
    }

}


