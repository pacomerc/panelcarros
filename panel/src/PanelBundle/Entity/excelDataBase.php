<?php

namespace PanelBundle\Entity;

/**
 * excelDataBase
 */
class excelDataBase
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $stockNumber;

    /**
     * @var string
     */
    private $vin;

    /**
     * @var string
     */
    private $year;

    /**
     * @var string
     */
    private $make;

    /**
     * @var string
     */
    private $model;

    /**
     * @var string
     */
    private $bodyStyle;

    /**
     * @var string
     */
    private $mileage;

    /**
     * @var string
     */
    private $price;

    /**
     * @var string
     */
    private $mSRP;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $exteriorColor;

    /**
     * @var string
     */
    private $interiorColor;

    /**
     * @var string
     */
    private $trim;

    /**
     * @var string
     */
    private $modelCode;

    /**
     * @var string
     */
    private $transmission;

    /**
     * @var string
     */
    private $cost;

    /**
     * @var string
     */
    private $dateArrived;

    /**
     * @var string
     */
    private $featuredEquipment;

    /**
     * @var string
     */
    private $optionGroup;

    /**
     * @var string
     */
    private $fedColor;

    /**
     * @var string
     */
    private $location;

    /**
     * @var string
     */
    private $certified;


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
     * Set stockNumber
     *
     * @param string $stockNumber
     *
     * @return excelDataBase
     */
    public function setStockNumber($stockNumber)
    {
        $this->stockNumber = $stockNumber;

        return $this;
    }

    /**
     * Get stockNumber
     *
     * @return string
     */
    public function getStockNumber()
    {
        return $this->stockNumber;
    }

    /**
     * Set vin
     *
     * @param string $vin
     *
     * @return excelDataBase
     */
    public function setVin($vin)
    {
        $this->vin = $vin;

        return $this;
    }

    /**
     * Get vin
     *
     * @return string
     */
    public function getVin()
    {
        return $this->vin;
    }

    /**
     * Set year
     *
     * @param string $year
     *
     * @return excelDataBase
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return string
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set make
     *
     * @param string $make
     *
     * @return excelDataBase
     */
    public function setMake($make)
    {
        $this->make = $make;

        return $this;
    }

    /**
     * Get make
     *
     * @return string
     */
    public function getMake()
    {
        return $this->make;
    }

    /**
     * Set model
     *
     * @param string $model
     *
     * @return excelDataBase
     */
    public function setModel($model)
    {
        $this->model = $model;

        return $this;
    }

    /**
     * Get model
     *
     * @return string
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Set bodyStyle
     *
     * @param string $bodyStyle
     *
     * @return excelDataBase
     */
    public function setBodyStyle($bodyStyle)
    {
        $this->bodyStyle = $bodyStyle;

        return $this;
    }

    /**
     * Get bodyStyle
     *
     * @return string
     */
    public function getBodyStyle()
    {
        return $this->bodyStyle;
    }

    /**
     * Set mileage
     *
     * @param string $mileage
     *
     * @return excelDataBase
     */
    public function setMileage($mileage)
    {
        $this->mileage = $mileage;

        return $this;
    }

    /**
     * Get mileage
     *
     * @return string
     */
    public function getMileage()
    {
        return $this->mileage;
    }

    /**
     * Set price
     *
     * @param string $price
     *
     * @return excelDataBase
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set mSRP
     *
     * @param string $mSRP
     *
     * @return excelDataBase
     */
    public function setMSRP($mSRP)
    {
        $this->mSRP = $mSRP;

        return $this;
    }

    /**
     * Get mSRP
     *
     * @return string
     */
    public function getMSRP()
    {
        return $this->mSRP;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return excelDataBase
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set exteriorColor
     *
     * @param string $exteriorColor
     *
     * @return excelDataBase
     */
    public function setExteriorColor($exteriorColor)
    {
        $this->exteriorColor = $exteriorColor;

        return $this;
    }

    /**
     * Get exteriorColor
     *
     * @return string
     */
    public function getExteriorColor()
    {
        return $this->exteriorColor;
    }

    /**
     * Set interiorColor
     *
     * @param string $interiorColor
     *
     * @return excelDataBase
     */
    public function setInteriorColor($interiorColor)
    {
        $this->interiorColor = $interiorColor;

        return $this;
    }

    /**
     * Get interiorColor
     *
     * @return string
     */
    public function getInteriorColor()
    {
        return $this->interiorColor;
    }

    /**
     * Set trim
     *
     * @param string $trim
     *
     * @return excelDataBase
     */
    public function setTrim($trim)
    {
        $this->trim = $trim;

        return $this;
    }

    /**
     * Get trim
     *
     * @return string
     */
    public function getTrim()
    {
        return $this->trim;
    }

    /**
     * Set modelCode
     *
     * @param string $modelCode
     *
     * @return excelDataBase
     */
    public function setModelCode($modelCode)
    {
        $this->modelCode = $modelCode;

        return $this;
    }

    /**
     * Get modelCode
     *
     * @return string
     */
    public function getModelCode()
    {
        return $this->modelCode;
    }

    /**
     * Set transmission
     *
     * @param string $transmission
     *
     * @return excelDataBase
     */
    public function setTransmission($transmission)
    {
        $this->transmission = $transmission;

        return $this;
    }

    /**
     * Get transmission
     *
     * @return string
     */
    public function getTransmission()
    {
        return $this->transmission;
    }

    /**
     * Set cost
     *
     * @param string $cost
     *
     * @return excelDataBase
     */
    public function setCost($cost)
    {
        $this->cost = $cost;

        return $this;
    }

    /**
     * Get cost
     *
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * Set dateArrived
     *
     * @param string $dateArrived
     *
     * @return excelDataBase
     */
    public function setDateArrived($dateArrived)
    {
        $this->dateArrived = $dateArrived;

        return $this;
    }

    /**
     * Get dateArrived
     *
     * @return string
     */
    public function getDateArrived()
    {
        return $this->dateArrived;
    }

    /**
     * Set featuredEquipment
     *
     * @param string $featuredEquipment
     *
     * @return excelDataBase
     */
    public function setFeaturedEquipment($featuredEquipment)
    {
        $this->featuredEquipment = $featuredEquipment;

        return $this;
    }

    /**
     * Get featuredEquipment
     *
     * @return string
     */
    public function getFeaturedEquipment()
    {
        return $this->featuredEquipment;
    }

    /**
     * Set optionGroup
     *
     * @param string $optionGroup
     *
     * @return excelDataBase
     */
    public function setOptionGroup($optionGroup)
    {
        $this->optionGroup = $optionGroup;

        return $this;
    }

    /**
     * Get optionGroup
     *
     * @return string
     */
    public function getOptionGroup()
    {
        return $this->optionGroup;
    }

    /**
     * Set fedColor
     *
     * @param string $fedColor
     *
     * @return excelDataBase
     */
    public function setFedColor($fedColor)
    {
        $this->fedColor = $fedColor;

        return $this;
    }

    /**
     * Get fedColor
     *
     * @return string
     */
    public function getFedColor()
    {
        return $this->fedColor;
    }

    /**
     * Set location
     *
     * @param string $location
     *
     * @return excelDataBase
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set certified
     *
     * @param string $certified
     *
     * @return excelDataBase
     */
    public function setCertified($certified)
    {
        $this->certified = $certified;

        return $this;
    }

    /**
     * Get certified
     *
     * @return string
     */
    public function getCertified()
    {
        return $this->certified;
    }
}

