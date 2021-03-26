<?

namespace src\Applications\Http\Clients\Contracts;

interface StorageInterface
{
    public function people(?string $name): array;
    public function films(): array;
}