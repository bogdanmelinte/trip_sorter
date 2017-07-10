<?php

// Composer autoload
use TripSorter\BoardingCards\AirplaneBoardingCard;
use TripSorter\BoardingCards\AirportBusBoardingCard;
use TripSorter\BoardingCards\TrainBoardingCard;
use TripSorter\TripSorter;

require_once './vendor/autoload.php';

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

$tripSorter = new TripSorter($boardingCards);

echo $tripSorter->getItineraryList();