<?php


namespace App\DTO;


class WeatherDTO
{
    /** @var PlaceDTO string  */
    private $place = "";

    private $forecastType = "";

    private $forecastCreationTimeUtc = "";

    function __construct() {


    }
    /**
     * @return string
     */
    public function getPlace(): string
    {
        return $this->place;
    }

    /**
     * @param string $place
     */
    public function setPlace(string $place): void
    {
        $this->place = $place;
    }

    /**
     * @return string
     */
    public function getForecastType(): string
    {
        return $this->forecastType;
    }

    /**
     * @param string $forecastType
     */
    public function setForecastType(string $forecastType): void
    {
        $this->forecastType = $forecastType;
    }

    /**
     * @return string
     */
    public function getForecastCreationTimeUtc(): string
    {
        return $this->forecastCreationTimeUtc;
    }

    /**
     * @param string $forecastCreationTimeUtc
     */
    public function setForecastCreationTimeUtc(string $forecastCreationTimeUtc): void
    {
        $this->forecastCreationTimeUtc = $forecastCreationTimeUtc;
    }

}