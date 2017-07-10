<?php

namespace TripSorter\BoardingCards;

/**
 * Class TrainBoardingCard
 * @package TripSorter\BoardingCards
 */
class TrainBoardingCard extends AbstractBoardingCard
{
    /** @var  string */
    private $seatNumber;

    /** @var  string */
    private $trainNumber;

    /**
     * TrainBoardingCard constructor.
     * @param string $origin
     * @param string $destination
     * @param string $seatNumber
     * @param string $trainNumber
     */
    public function __construct(string $origin, string $destination, string $seatNumber, string $trainNumber)
    {
        parent::__construct($origin, $destination);

        $this->seatNumber = $seatNumber;
        $this->trainNumber = $trainNumber;
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
    public function getTrainNumber(): string
    {
        return $this->trainNumber;
    }

    /**
     * @param string $trainNumber
     */
    public function setTrainNumber(string $trainNumber)
    {
        $this->trainNumber = $trainNumber;
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
            'Take train %s from %s to %s. %s',
            $this->getTrainNumber(),
            $this->getOrigin(),
            $this->getDestination(),
            $seatInformation
        );
    }
}