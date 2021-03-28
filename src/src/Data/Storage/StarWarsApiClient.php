<?

namespace src\Applications\Clients;

use GuzzleHttp\Client;
use src\Applications\Enums\SWApiEndpoint;
use src\Applications\Clients\Contracts\StorageInterface;
use GuzzleHttp\Psr7\Response;

class StarWarsApiClient implements StorageInterface
{
    public function __construct(
        protected Client $client
    ) {}

    public function fetch(SWApiEndpoint $endpoint, string $search = null): array
    {
        $response = $this->client->request('GET', $endpoint . $search);

        $responseBody = $this->getResponseBody($response);

        return $responseBody;
    }

    private function getResponseBody(Response $response): array
    {
        return json_decode($response->getBody(), true);
    }
}