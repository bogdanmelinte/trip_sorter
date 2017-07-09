<?php

namespace TripSorter\BoardingCards;

/**
 * Class TrainBoardingCard
 * @package TripSorter\BoardingCards
 */
class TrainBoardingCard extends AbstractBoardingCard
{
    /** @var  string */
    private $trainNumber;

    /**
     * @return string
     */
    public function getTrainNumber(): string
    {
        return $this->trainNumber;
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
        $this->trainNumber = $array['train_number'];
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
            'train_number' => $this->trainNumber,
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
            'Take train $s from $s to %s. $s',
            $this->getTrainNumber(),
            $this->getOrigin(),
            $this->getDestination(),
            $seatInformation
        );
    }
}