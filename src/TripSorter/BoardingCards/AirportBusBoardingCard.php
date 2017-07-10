<?php

namespace TripSorter\BoardingCards;

/**
 * Class AirportBusBoardingCard
 * @package TripSorter\BoardingCards
 */
class AirportBusBoardingCard extends AbstractBoardingCard
{
    /** @var string */
    private $seatNumber;

    /**
     * AirportBusBoardingCard constructor.
     * @param string $origin
     * @param string $destination
     * @param string $seatNumber
     */
    public function __construct(string $origin, string $destination, string $seatNumber = null)
    {
        parent::__construct($origin, $destination);

        $this->seatNumber = $seatNumber;
    }

    /**
     * Get seat number
     *
     * @return string|null
     */
    public function getSeatNumber()
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
            'Take the airport bus from %s to %s. %s',
            $this->getOrigin(),
            $this->getDestination(),
            $seatInformation
        );
    }
}