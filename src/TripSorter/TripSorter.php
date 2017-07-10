<?php

namespace TripSorter;


use TripSorter\BoardingCards\AbstractBoardingCard;

/**
 * Class TripSorter
 * @package TripSorter
 */
class TripSorter
{
    /** @var  AbstractBoardingCard[] */
    private $boardingCards;

    /**
     * TripSorter constructor.
     * @param AbstractBoardingCard[] $boardingCards
     */
    public function __construct(array $boardingCards = null)
    {
        $this->boardingCards = $boardingCards;
    }

    /**
     * @param AbstractBoardingCard $boardingCard
     */
    public function addBoardingCard(AbstractBoardingCard $boardingCard)
    {
        $this->boardingCards[] = $boardingCard;
    }

    /**
     * @return AbstractBoardingCard[]
     */
    public function getBoardingCards(): array
    {
        return $this->boardingCards;
    }

    /**
     * Sort boarding cards
     *
     * @return AbstractBoardingCard[]
     * @throws \Exception
     */
    private function sortBoardingCards(): array
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
            throw new \Exception("The boarding cards aren't in the required format.");
        }

        /** @var AbstractBoardingCard $origin */
        $origin = array_pop($uniqueOrigins);
        $currentLocation = $origin->getOrigin();

        $sortedBoardingCards = [];

        while (
        $currentBoardingCard = (
        array_key_exists($currentLocation, $indexByOrigin)
            ?  $indexByOrigin[$currentLocation]
            : null
        )
        ) {
            array_push($sortedBoardingCards, $currentBoardingCard);
            $currentLocation = $currentBoardingCard->getDestination();
        }

        return $sortedBoardingCards;
    }

    /**
     * Get itinerary list
     *
     * @return string
     */
    public function getItineraryList(): string
    {
        $boardingCards = $this->sortBoardingCards();

        $tripList = '';

        $step = 1;

        foreach ($boardingCards as $boardingCard) {
            $tripList .= $step . ". " . $boardingCard . "\n";
            $step++;
        }

        $tripList .= $step . ". You have arrived at your final destination.";

        return $tripList;
    }
}