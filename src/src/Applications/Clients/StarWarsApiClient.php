<?

namespace src\Applications\Clients;

use GuzzleHttp\Client;
use src\Applications\Enums\SWApiEndpoint;
use src\Applications\Clients\Contracts\ApiClientInterface;
use GuzzleHttp\Psr7\Response;

class StarWarsApiClient implements ApiClientInterface
{
    public function __construct(
        protected Client $client
    ) {}

    public function fetchPeople(?string $name): array
    {
        if ($name) {
            $response = $this->client->request('GET', SWApiEndpoint::PEOPLE_SEARCH . $name);
        } else {
            $response = $this->client->request('GET', SWApiEndpoint::PEOPLE);
        }

        $responseBody = $this->getResponseBody($response);

        return $responseBody;
    }

    public function fetchFilms(): array
    {
        $response = $this->client->request('GET', SWApiEndpoint::FILMS);

        $responseBody = $this->getResponseBody($response);

        return $responseBody;
    }

    protected function getResponseBody(Response $response): array
    {
        return json_decode($response->getBody(), true);
    }
}