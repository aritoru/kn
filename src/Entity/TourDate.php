<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TourDateRepository")
 */
class TourDate
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=2255, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=2255)
     */
    private $place;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $placeLink;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $prePrice;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $price;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $poster;

    /**
     * @ORM\Column(type="string", length=40, nullable=true)
     */
    private $city;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     * @return TourDate
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return TourDate
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return TourDate
     */
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param mixed $place
     * @return TourDate
     */
    public function setPlace($place)
    {
        $this->place = $place;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPlaceLink()
    {
        return $this->placeLink;
    }

    /**
     * @param mixed $placeLink
     * @return TourDate
     */
    public function setPlaceLink($placeLink)
    {
        $this->placeLink = $placeLink;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrePrice()
    {
        return $this->prePrice;
    }

    /**
     * @param mixed $prePrice
     * @return TourDate
     */
    public function setPrePrice($prePrice)
    {
        $this->prePrice = $prePrice;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     * @return TourDate
     */
    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return TourDate
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * @param mixed $poster
     * @return TourDate
     */
    public function setPoster($poster)
    {
        $this->poster = $poster;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     * @return TourDate
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }



}
