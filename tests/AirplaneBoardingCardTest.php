<?php

namespace TripSorter\Tests;


use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCards\AirplaneBoardingCard;

/**
 * Class AirplaneBoardingCardTest
 * @package TripSorter\Tests
 */
class AirplaneBoardingCardTest extends TestCase
{
    /**
     * Test airplane boarding card with baggage counter
     */
    public function testWithBaggageCounter()
    {
        $airplaneBoardingCard = new AirplaneBoardingCard(
            'Bucharest',
            'Barcelona',
            '16B',
            'AZ123',
            'B23',
            '13'
        );

        $this->assertEquals(
            "From Bucharest, take flight AZ123 to Barcelona. Gate B23, seat 16B. Baggage drop at ticket counter 13.",
            $airplaneBoardingCard->__toString()

        );
    }

    /**
     * Test airplane boarding card without baggage counter
     */
    public function testWithoutBaggageCounter()
    {
        $airplaneBoardingCard = new AirplaneBoardingCard(
            'Bucharest',
            'Barcelona',
            '16B',
            'AZ123',
            'B23'
        );

        $this->assertEquals(
            "From Bucharest, take flight AZ123 to Barcelona. Gate B23, seat 16B. Baggage will we automatically transferred from your last leg.",
            $airplaneBoardingCard->__toString()
        );
    }
}