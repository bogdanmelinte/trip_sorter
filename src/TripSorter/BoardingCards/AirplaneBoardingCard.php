<?php

namespace TripSorter\BoardingCards;

/**
 * Class AirplaneBoardingCard
 * @package TripSorter\BoardingCards
 */
class AirplaneBoardingCard extends AbstractBoardingCard
{
    /** @var  string */
    private $seatNumber;

    /** @var  string */
    private $flightNumber;

    /** @var  string */
    private $departureGate;

    /** @var  string|null */
    private $baggageCounter;

    /**
     * AirplaneBoardingCard constructor.
     * @param string $origin
     * @param string $destination
     * @param string $seatNumber
     * @param string $flightNumber
     * @param string $departureGate
     * @param string $baggageCounter
     */
    public function __construct(string $origin, string $destination, string $seatNumber, string $flightNumber,
                                string $departureGate, string $baggageCounter = null)
    {
        parent::__construct($origin, $destination);

        $this->seatNumber = $seatNumber;
        $this->flightNumber = $flightNumber;
        $this->departureGate = $departureGate;
        $this->baggageCounter = $baggageCounter;
    }

    /**
     * Get seat number
     *
     * @return string
     */
    public function getSeatNumber(): string
    {
        return $this->seatNumber;
    }

    /**
     * Set seat number
     *
     * @param string $seatNumber
     */
    public function setSeatNumber(string $seatNumber)
    {
        $this->seatNumber = $seatNumber;
    }

    /**
     * @return string
     */
    public function getFlightNumber(): string
    {
        return $this->flightNumber;
    }

    /**
     * @param string $flightNumber
     */
    public function setFlightNumber(string $flightNumber)
    {
        $this->flightNumber = $flightNumber;
    }

    /**
     * @return string
     */
    public function getDepartureGate(): string
    {
        return $this->departureGate;
    }

    /**
     * @param string $departureGate
     */
    public function setDepartureGate(string $departureGate)
    {
        $this->departureGate = $departureGate;
    }

    /**
     * @return null|string
     */
    public function getBaggageCounter()
    {
        return $this->baggageCounter;
    }

    /**
     * @param null|string $baggageCounter
     */
    public function setBaggageCounter(string $baggageCounter)
    {
        $this->baggageCounter = $baggageCounter;
    }

    /**
     * Output boarding card
     *
     * @return string
     */
    public function __toString(): string
    {
        $baggageInformation = $this->getBaggageCounter()
            ? sprintf('Baggage drop at ticket counter %s.', $this->getBaggageCounter())
            : 'Baggage will we automatically transferred from your last leg.';

        return sprintf(
            'From %s, take flight %s to %s. Gate %s, seat %s. %s',
            $this->getOrigin(),
            $this->getFlightNumber(),
            $this->getDestination(),
            $this->getDepartureGate(),
            $this->getSeatNumber(),
            $baggageInformation
        );
    }
}