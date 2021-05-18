<?

namespace src\Data\Repositories;

use src\Data\Contracts\StorageInterface;

abstract class AbstractRepository
{
    public function __construct(
        protected StorageInterface $storage
    ) {}
}