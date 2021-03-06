<?php

namespace DC\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Drycleaners
 *
 * @ORM\HasLifecycleCallbacks()
 * @ORM\Table(name="drycleaners")
 * @ORM\Entity(repositoryClass="DC\AdminBundle\Repository\DrycleanersRepository")
 */
class DryCleaners
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="postcity", type="string", length=255)
     */
    private $postcity;

    /**
     * @var string
     *
     * @ORM\Column(name="postalcode", type="string", length=255)
     */
    private $postalcode;
    /**
     * @var string
     *
     * @ORM\Column(name="county", type="string", length=255)
     */
    private $county;

    /**
     * @var string
     *
     * @ORM\Column(name="latitude", type="float")
     */
    private $latitude;

    /**
     * @var string
     *
     * @ORM\Column(name="longtitude", type="float")
     */
    private $longtitude;

    /**
     * @var string
     *
     * @ORM\Column(name="addresslineone", type="string", length=255)
     */
    private $addresslineone;

    /**
     * @var string
     *
     * @ORM\Column(name="addresslinetwo", type="string", length=255, nullable=true)
     */
    private $addresslinetwo;

    /**
     * @var string
     *
     * @ORM\Column(name="addresslinethree", type="string", length=255, nullable=true)
     */
    private $addresslinethree;
    /**
     * @var int
     * @ORM\ManyToOne(targetEntity="DC\UserBundle\Entity\User")
     * @ORM\Column(name="IDowner", type="integer", nullable=true)
     */
    private $IDOwner;

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
     * Set name
     *
     * @param string $name
     *
     * @return Drycleaners
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set country
     *
     * @param string $country
     *
     * @return Drycleaners
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set postcity
     *
     * @param string postcity
     *
     * @return Drycleaners
     */
    public function setPostCity($postcity)
    {
        $this->postcity = $postcity;

        return $this;
    }

    /**
     * Get postcity
     *
     * @return string
     */
    public function getPostCity()
    {
        return $this->postcity;
    }


    /**
     * Get postalcode
     *
     * @return string
     */
    public function setPostalCode($postalcode){
        $this->postalcode = $postalcode;

        return $this;
    }

    /**
     * Get postalcode
     *
     * @return string
     */
    public function getPostalCode(){
        return $this->postalcode;
    }

    /**
     * Set county
     *
     * @param string $county
     *
     * @return Drycleaners
     */
    public function setCounty($county)
    {
        $this->county = $county;

        return $this;
    }

    /**
     * Get county
     *
     * @return string
     */
    public function getCounty()
    {
        return $this->county;
    }

    /**
     * Set latitude
     *
     * @param string $latitude
     *
     * @return Drycleaners
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get latitude
     *
     * @return string
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set longtitude
     *
     * @param string $longtitude
     *
     * @return Drycleaners
     */
    public function setLongtitude($longtitude)
    {
        $this->longtitude = $longtitude;

        return $this;
    }

    /**
     * Get longtitude
     *
     * @return string
     */
    public function getLongtitude()
    {
        return $this->longtitude;
    }

    /**
     * Set addresslineone
     *
     * @param string $addresslineone
     *
     * @return Drycleaners
     */
    public function setAddressLineOne($addresslineone)
    {
        $this->addresslineone = $addresslineone;

        return $this;
    }

    /**
     * Get addresslineone
     *
     * @return string
     */
    public function getAddressLineOne()
    {
        return $this->addresslineone;
    }


    /**
     * Set addresslinetwo
     *
     * @param string $addresslinetwo
     *
     * @return Drycleaners
     */
    public function setAddressLineTwo($addresslinetwo)
    {
        $this->addresslinetwo = $addresslinetwo;

        return $this;
    }

    /**
     * Get addresslintwo
     *
     * @return string
     */
    public function getAddressLineTwo()
    {
        return $this->addresslinetwo;

    }


    /**
     * Get addresslinethree
     *
     * @return string
     */
    public function getAddressLineThree()
    {
        return $this->addresslinethree;
    }

    /**
     * Set addresslinethree
     *
     * @param string $addresslinethree
     *
     * @return Drycleaners
     */
    public function setAddressLineThree($addresslinethree)
    {
        $this->addresslinethree = $addresslinethree;

        return $this;
    }


    /**
     * Get IDOwner
     *
     *
     * @return integer
     */
    public function getIDOwner(){
        return $this->IDOwner;
    }

    /**
     * Set IDOwner
     *
     * @return Drycleaners
     */
    public function setIDOwner($IDowner){
        $this->IDOwner= $IDowner;
        return $this;
    }
}
