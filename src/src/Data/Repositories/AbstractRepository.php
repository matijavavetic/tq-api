<?

namespace src\Data\Repositories;

use src\Applications\Clients\Contracts\ApiClientInterface;

abstract class AbstractRepository
{
    public function __construct(
        protected ApiClientInterface $apiClient
    ) {}
}