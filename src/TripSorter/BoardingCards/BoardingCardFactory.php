<?php

namespace TripSorter\BoardingCards;


class BoardingCardFactory
{
    /**
     * @param array $boardingCard
     * @return AbstractBoardingCard
     */
    public static function factory(array $boardingCard)
    {
        $boardingCardObject = null;

        switch ($boardingCard['type']) {
            case 'airplane':
                $boardingCardObject = new AirplaneBoardingCard();
                $boardingCardObject->hydrate($boardingCard);
                break;

            case 'train':
                $boardingCardObject = new TrainBoardingCard();
                $boardingCardObject->hydrate($boardingCard);
                break;

            case 'bus':
                $boardingCardObject = new AirportBusBoardingCard();
                $boardingCardObject->hydrate($boardingCard);
                break;
        }

        return $boardingCardObject;
    }
}