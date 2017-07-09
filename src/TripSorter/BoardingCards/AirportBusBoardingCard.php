<?php

namespace TripSorter\BoardingCards;

/**
 * Class AirportBusBoardingCard
 * @package TripSorter\BoardingCards
 */
class AirportBusBoardingCard extends AbstractBoardingCard
{
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
            'seat_number' => $this->seatNumber
        ];
    }

    /**
     * Output boarding card
     *
     * @return string
     */
    public function __toString(): string
    {
        $seatInformation = $this->getSeatNumber()
            ? sprintf('Sit in seat %s.', $this->getSeatNumber())
            : 'No seat assignment.';

        return sprintf(
            'Take the airport bus from $s to $s. $s',
            $this->getOrigin(),
            $this->getDestination(),
            $seatInformation
        );
    }
}