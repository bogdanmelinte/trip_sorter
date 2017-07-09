<?php

namespace TripSorter\BoardingCards;


abstract class AbstractBoardingCard
{
    /** @var  string */
    protected $origin;

    /** @var  string */
    protected $destination;

    /** @var  string */
    protected $seatNumber;

    /**
     * Hydrate array to object
     *
     * @param array $array
     * @return void
     */
    abstract public function hydrate(array $array);

    /**
     * Extract array from object
     *
     * @return array
     */
    abstract public function extract(): array;

    /**
     * Output boarding card
     *
     * @return string
     */
    abstract public function __toString(): string;

    /**
     * @return string
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }

    /**
     * @param string $origin
     * @return AbstractBoardingCard
     */
    public function setOrigin(string $origin): AbstractBoardingCard
    {
        $this->origin = $origin;
        return $this;
    }

    /**
     * @return string
     */
    public function getDestination(): string
    {
        return $this->destination;
    }

    /**
     * @param string $destination
     * @return AbstractBoardingCard
     */
    public function setDestination(string $destination): AbstractBoardingCard
    {
        $this->destination = $destination;
        return $this;
    }

    /**
     * @return string
     */
    public function getSeatNumber(): string
    {
        return $this->seatNumber;
    }

    /**
     * @param string $seatNumber
     * @return AbstractBoardingCard
     */
    public function setSeatNumber(string $seatNumber): AbstractBoardingCard
    {
        $this->seatNumber = $seatNumber;
        return $this;
    }
}