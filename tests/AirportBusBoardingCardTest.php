<?php

namespace TripSorter\Tests;


use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCards\AirportBusBoardingCard;

/**
 * Class AirportBusBoardingCardTest
 * @package TripSorter\Tests
 */
class AirportBusBoardingCardTest extends TestCase
{
    /**
     * Test airport bus boarding card
     */
    public function test()
    {
        $airportBusBoardingCard = new AirportBusBoardingCard(
            'Bucharest',
            'Barcelona',
            '16B'
        );

        $this->assertEquals(
            "Take the airport bus from Bucharest to Barcelona. Sit in seat 16B.",
            $airportBusBoardingCard->__toString()

        );
    }
}