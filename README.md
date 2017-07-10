# Trip Sorter

## Task
You are given a stack of boarding cards for various transportations that will take you from a point
A to point B via several stops on the way. All of the boarding cards are out of order and you don't know where your journey starts, nor where it ends. Each boarding card contains information about seat assignment, and means of transportation (such as flight number, bus number etc).

Write an API that lets you sort this kind of list and present back a description of how to complete your journey.

For instance the API should be able to take an unordered set of boarding cards, provided in a format defined by you, and produce this list:
1. Take train 78A from Madrid to Barcelona. Sit in seat 45B.
2. Take the airport bus from Barcelona to Gerona Airport. No seat assignment.
3. From Gerona Airport, take flight SK455 to Stockholm. Gate 45B, seat 3A.
Baggage drop at ticket counter 344.
4. From Stockholm, take flight SK22 to New York JFK. Gate 22, seat 7B.
Baggage will we automatically transferred from your last leg.
5. You have arrived at your final destination.
The list should be defined in a format that's compatible with the input format.
The API is to be an internal PHP API so it will only communicate with other parts of a PHP application, not server to server, nor server to client. Use PHP-doc to document the input and output your API accepts / returns.

## Solution
In order to sort boarding cards and display the itinerary list you need to 
* Instantiate TripSorter\TripSorter with an array of BoardingCard instances OR simply add them prior to instantiation by using TripSorter\TripSorter::addBoardingCard();
* Call TripSorter\TripSorter::getItineraryList();

Adding new types of transportation is simply done by creating new objects that extend TripSorter\BoardingCards\AbstractBoardingCard and implement the needed methods.


## Requirements
* PHP >= 7
* Composer

## Installation
Build the application with the following commands:

```
git clone git@github.com:bogdanmelinte/trip_sorter.git
cd trip_sorter
composer install
```

## Run
Run a basic example with:
```
php example.php
```

## Tests
Run the unit tests by running the following command from the project root directory:
```
./vendor/bin/phpunit
```