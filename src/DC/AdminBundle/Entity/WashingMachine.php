<?php

namespace DC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WashingMachine
 *
 * @ORM\Table(name="washing_machine")
 * @ORM\Entity(repositoryClass="DC\AdminBundle\Repository\WashingMachineRepository")
 */
class WashingMachine
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\ManyToOne(targetEntity="DC\AdminBundle\Entity\Drycleaners")
     * @ORM\JoinColumn(nullable=false)
     */

    private $id;

    /**
     * @var bool
     *
     * @ORM\Column(name="avaibility", type="boolean")
     */
    private $avaibility;

    /**
     * @var int
     *
     * @ORM\Column(name="idDrycleaner", type="integer")
     */
    private $idDrycleaner;


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
     * Set avaibility
     *
     * @param boolean $avaibility
     *
     * @return WashingMachine
     */
    public function setAvaibility($avaibility)
    {
        $this->avaibility = $avaibility;

        return $this;
    }

    /**
     * Get avaibility
     *
     * @return bool
     */
    public function getAvaibility()
    {
        return $this->avaibility;
    }

    /**
     * Set idDrycleaner
     *
     * @param integer $idDrycleaner
     *
     * @return WashingMachine
     */
    public function setIdDrycleaner($idDrycleaner)
    {
        $this->idDrycleaner = $idDrycleaner;

        return $this;
    }

    public function setDrycleaner(Drycleaners $drycleaner)
    {
        $this->drycleaners = $drycleaner;

        return $this;
    }


    public function getDrycleaner()
    {
        return $this->drycleaners;
    }


    /**
     * Get idDrycleaner
     *
     * @return int
     */
    public function getIdDrycleaner()
    {
        return $this->idDrycleaner;
    }
}

