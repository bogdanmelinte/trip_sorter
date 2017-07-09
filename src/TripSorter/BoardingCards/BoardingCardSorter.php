<?php

namespace TripSorter\BoardingCards;


class BoardingCardSorter
{
    /** @var  AbstractBoardingCard[] */
    private $boardingCards;

    /**
     * BoardingCardSorter constructor.
     * @param AbstractBoardingCard[] $boardingCards
     */
    public function __construct(array $boardingCards)
    {
        $this->boardingCards = $boardingCards;
    }

    /**
     * Get boarding cards
     *
     * @return array
     */
    public function getBoardingCards(): array
    {
        return $this->boardingCards;
    }

    /**
     * Sort boarding cards
     *
     * @return array
     */
    public function sort(): array
    {
        $indexByOrigin = [];
        $indexByDestination = [];

        foreach ($this->getBoardingCards() as $boardingCard) {
            $indexByOrigin[$boardingCard->getOrigin()] = $boardingCard;
            $indexByDestination[$boardingCard->getDestination()] = $boardingCard;
        }

        $commonIndex = array_intersect_key($indexByOrigin, $indexByDestination);
        $uniqueOrigins = array_diff_key($indexByOrigin, $commonIndex);
        $uniqueDestinations = array_diff_key($indexByDestination, $commonIndex);

        if (count($uniqueOrigins) > 1 || count($uniqueDestinations) > 1) {
            // TODO: Can't establish departure and/or destination
        }

        /** @var AbstractBoardingCard $origin */
        $origin = array_pop($uniqueOrigins);
        $currentLocation = $origin->getDestination();

        $sortedBoardingCards = [$origin];

        while (
            $currentBoardingCard = (
                array_key_exists($currentLocation, $indexByDestination)
                    ?  $indexByDestination[$currentLocation]
                    : null
            )
        ) {
            array_push($sortedBoardingCards, $currentBoardingCard);

            $currentLocation = $currentBoardingCard->getDestination();
        }

        return $sortedBoardingCards;
    }
}