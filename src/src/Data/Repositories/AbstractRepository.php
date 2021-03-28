<?

namespace src\Data\Repositories;

use src\Applications\Clients\Contracts\StorageInterface;

abstract class AbstractRepository
{
    public function __construct(
        protected StorageInterface $storage
    ) {}
}