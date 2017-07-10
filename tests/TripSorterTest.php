<?php

namespace TripSorter\Tests;


use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCards\AirplaneBoardingCard;
use TripSorter\BoardingCards\AirportBusBoardingCard;
use TripSorter\BoardingCards\TrainBoardingCard;
use TripSorter\TripSorter;

/**
 * Class TripSorterTest
 * @package TripSorter\Tests
 */
class TripSorterTest extends TestCase
{
    /**
     * Test TripSorter
     */
    public function test()
    {
        $boardingCards = [
            new AirplaneBoardingCard(
                'Gerona Airport',
                'Stockholm',
                '3A',
                'SK455',
                '45B',
                '344'
            ),
            new AirplaneBoardingCard(
                'Stockholm',
                'New York JFK',
                '7B',
                'SK22',
                '22'
            ),
            new AirportBusBoardingCard(
                'Barcelona',
                'Gerona Airport'
            ),
            new TrainBoardingCard(
                'Madrid',
                'Barcelona',
                '45B',
                '78A'
            )
        ];

        shuffle($boardingCards);

        $tripSorter = new TripSorter($boardingCards);
        $itineraryList = $tripSorter->getItineraryList();

        $this->assertEquals(
            '1. Take train 78A from Madrid to Barcelona. Sit in seat 45B.' . PHP_EOL .
            '2. Take the airport bus from Barcelona to Gerona Airport. No seat assignment.' . PHP_EOL .
            '3. From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A. Baggage drop at ticket counter 344.' . PHP_EOL .
            '4. From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B. Baggage will we automatically transferred from your last leg.' . PHP_EOL .
            '5. You have arrived at your final destination.', $itineraryList);
    }
}