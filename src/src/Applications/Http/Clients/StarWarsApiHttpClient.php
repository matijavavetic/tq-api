<?

namespace src\Applications\Http\Clients;

use GuzzleHttp\Client;
use src\Applications\Http\Clients\Contracts\StorageInterface;

class StarWarsApiHttpClient implements StorageInterface
{
    const API_BASE_PATH = 'https://swapi.dev/api/';

    public function __construct(
        protected Client $client
    ) {}

    public function people(?string $name): array
    {
        $response = $this->client->request('GET', self::API_BASE_PATH . 'people/?search=' . $name);

        $responseBody = json_decode($response->getBody(), true);

        return $responseBody['results'];
    }

    public function films(): array
    {
        $response = $this->client->request('GET', self::API_BASE_PATH . 'films');

        $responseBody = json_decode($response->getBody(), true);

        return $responseBody['results'];
    }
}