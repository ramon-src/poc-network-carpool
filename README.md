# POC NETWORK CARPOOL
The network carpool is a carpool system for events, to facilitate the interaction of the event participants before and after the events when they need to reduce the cost of the travel or want to make network with people with the same interests.

## Architecture
This project is based on my knowledge of DDD and Clean Architecture.
Separating the domain logic from the rest of the application layer and peripherals (UI, DATABASE, EXTERNAL SERVICES).

## Antircorruption layer
The use of an Anticorruption layer is important to garantee the integrity of Domain Objects and their lifecycle. 
It is also important to garantee the integrity of each port in the application layer.

## Domain
The Domain layer is the pure state of the business. It should screams the business and not named structures like BarStrategy, FooSingleton... Domain doesn't know about how database will get the data, how to work with controllers and so on.

### Domain Factories
Factories are responsible to create Domain Objects (Entire entities and their aggregates) with integrity.
So for integrity of the Domain Objects we need to validate required data for all the shapes the entity can be. 


## Repositories
The repositories in this project are strictialy based on DDD(Eric Evans) book.
Repositories are responsible for get data from database, validate the data, and populate and retrieve Domain Objects.
They don't know how to make Domain Objects, they know what Factory could be called to mount this objects with respective data from database.

## Run tests
```
php artisan test
```

## Vendors
- [UUID as PK](https://ghobaty.com/eloquent-models-with-string-uuid-as-primary-key)

