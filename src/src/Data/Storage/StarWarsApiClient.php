<?

namespace src\Data\Storage;

use GuzzleHttp\Client;
use src\Data\Enums\SWApiEndpoint;
use src\Data\Contracts\StorageInterface;
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

        $responseResults = $responseBody['results'];

        if (! is_null($responseBody['next'])) {
            while (true) {
                $response = $this->client->request('GET', $responseBody['next']);
                $responseBody = $this->getResponseBody($response);

                $responseResults = array_merge($responseResults, $responseBody['results']);

                if ($responseBody['next'] === null) {
                    break;
                }
            }
        }

        return $responseResults;
    }

    private function getResponseBody(Response $response): array
    {
        return json_decode($response->getBody(), true);
    }
}