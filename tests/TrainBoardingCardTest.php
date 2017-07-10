<?php

namespace TripSorter\Tests;


use PHPUnit\Framework\TestCase;
use TripSorter\BoardingCards\TrainBoardingCard;

/**
 * Class TrainBoardingCardTest
 * @package TripSorter\Tests
 */
class TrainBoardingCardTest extends TestCase
{
    /**
     * Test train boarding card
     */
    public function test()
    {
        $trainBoardingCard = new TrainBoardingCard(
            'Bucharest',
            'Barcelona',
            '16B',
            '13'
        );

        $this->assertEquals(
            "Take train 13 from Bucharest to Barcelona. Sit in seat 16B.",
            $trainBoardingCard->__toString()

        );
    }
}