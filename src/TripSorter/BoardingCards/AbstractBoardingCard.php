<?php

namespace TripSorter\BoardingCards;


/**
 * Class AbstractBoardingCard
 * @package TripSorter\BoardingCards
 */
abstract class AbstractBoardingCard
{
    /** @var  string */
    protected $origin;

    /** @var  string */
    protected $destination;

    /**
     * Output boarding card
     *
     * @return string
     */
    abstract public function __toString(): string;

    /**
     * AbstractBoardingCard constructor.
     * @param string $origin
     * @param string $destination
     */
    public function __construct(string $origin, string $destination)
    {
        $this->origin = $origin;
        $this->destination = $destination;
    }

    /**
     * @return string
     */
    public function getOrigin(): string
    {
        return $this->origin;
    }

    /**
     * @param string $origin
     */
    public function setOrigin(string $origin)
    {
        $this->origin = $origin;
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
     */
    public function setDestination(string $destination)
    {
        $this->destination = $destination;
    }
}