<?php

namespace TripSorter\BoardingCards;

/**
 * Class AirplaneBoardingCard
 * @package TripSorter\BoardingCards
 */
class AirplaneBoardingCard extends AbstractBoardingCard
{
    /** @var  string */
    private $flightNumber;

    /** @var  string */
    private $departureGate;

    /** @var  string|null */
    private $baggageCounter;

    /**
     * @return string
     */
    public function getFlightNumber(): string
    {
        return $this->flightNumber;
    }

    /**
     * @param string $flightNumber
     * @return AirplaneBoardingCard
     */
    public function setFlightNumber(string $flightNumber): AirplaneBoardingCard
    {
        $this->flightNumber = $flightNumber;
        return $this;
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
     * @return AirplaneBoardingCard
     */
    public function setDepartureGate(string $departureGate): AirplaneBoardingCard
    {
        $this->departureGate = $departureGate;
        return $this;
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
     * @return AirplaneBoardingCard
     */
    public function setBaggageCounter(string $baggageCounter): AirplaneBoardingCard
    {
        $this->baggageCounter = $baggageCounter;
        return $this;
    }

    /**
     * Hydrate array to object
     *
     * @param array $array
     * @return void
     */
    public function hydrate(array $array)
    {
        $this->origin = $array['origin'];
        $this->destination = $array['destination'];
        $this->flightNumber = $array['flight_number'];
        $this->departureGate = $array['departure_gate'];
        $this->seatNumber = $array['seat_number'];
    }

    /**
     * Extract array from object
     *
     * @return array
     */
    public function extract(): array
    {
        return [
            'origin' => $this->origin,
            'destination' => $this->destination,
            'flight_number' => $this->flightNumber,
            'departure_gate' => $this->departureGate,
            'seat_number' => $this->seatNumber
        ];
    }

    /**
     * Output boarding card
     *
     * @return string
     */
    function __toString(): string
    {
        $baggageInformation = $this->getBaggageCounter()
            ? sprintf('Baggage drop at ticket counter %s.', $this->getBaggageCounter())
            : 'Baggage will we automatically transferred from your last leg.';

        return sprintf(
            'From %s, take flight %s to %s. Gate %s, seat %s. $s',
            $this->getOrigin(),
            $this->getFlightNumber(),
            $this->getDestination(),
            $this->getDepartureGate(),
            $this->getSeatNumber(),
            $baggageInformation
        );
    }
}