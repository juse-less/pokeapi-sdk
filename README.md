# PokéAPI Saloon SDK
This is an example/PoC PHP SDK built with [Saloon v2](https://github.com/sammyjo20/saloon), where I test various things to build better SDKs.

## Usage

### Regular/Standalone requests
```php
use JuseLess\PokeApi\PokeApiConnector;
use JuseLess\PokeApi\Resources\Pokemon\Requests\GetPokemonRequest;
use JuseLess\PokeApi\Resources\Pokemon\Requests\GetPokemonsRequest;

$connector = PokeApiConnector::make();
$pokemonWithIdFortyTwo = $connector->send(GetPokemonRequest::make(42));
$pokemonWithNamePikachu = $connector->send(GetPokemonRequest::make('pikachu'));
$pageOneOfAllPokemons = $conenctor->send(GetPokemonsRequest::make());
```

### Resource Repository
```php
use JuseLess\PokeApi\PokeApiConnector;
use JuseLess\PokeApi\Resources\Pokemon\PokemonRepository;

// These two repository instantiations are equivalent.
$pokemons = new PokemonRepository(PokeApiConnector::make());
$pokemons = PokeApiConnector::make()->pokemons();
```

```php
use JuseLess\PokeApi\PokeApiConnector;
use JuseLess\PokeApi\Resources\Pokemon\PokemonRepository;

$pokemons = PokeApiConnector::make()->pokemons();

$pokemonWithIdFortyTwo = $pokemons->get(42);
$pokemonWithNamePikachu = $pokemons->get('pikachu');
$pageOneOfAllPokemons = $pokemons->getAll();
```

### Pagination
You can iterate a request by giving it as an argument to `PokeApiConnector::paginate()`, or `ResourceRepository`.  
They will return a `RequestPaginator`, which will send new requests (but bump page/offset) for every iteration in a loop.
```php
use JuseLess\PokeApi\PokeApiConnector;

$connector = PokeApiConnector::make();

foreach ($connector->paginate(GetPokemonsRequest::make()) as $response) {
    // ...
}

foreach ($connector->pokemons()->paginate(GetPokemonsRequest::make()) as $response) {
    // ...
}
```

### Request Pooling
Also note that, because the `RequestPaginator`s are iterable, you can use them directly with the request Pool.
```php
use JuseLess\PokeApi\PokeApiConnector;
use JuseLess\PokeApi\Resources\Pokemon\Responses\GetPokemonsResponse;

$connector = PokeApiConnector::make();

$pokemonsResponseHandler = function (GetPokemonsResponse $response): void {
    // Fictive.
    handle_pokemons_response($response->json('items'));
};

$connector
    ->pool($connector->paginate(GetPokemonsRequest::make()), responseHandler: $pokemonsResponseHandler)
    ->send()
    ->wait();
```
