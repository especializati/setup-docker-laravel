<?php

namespace App\Services;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Repositories\SupportRepositoryInterface;
use SebastianBergmann\Type\NullType;
use stdClass;

class SupportService
{
    public function __construct(
        protected SupportRepositoryInterface $repository,
    ){}

    public function getAll(string $filter = null): array
    {
        return $this ->repository -> getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this ->repository ->findOne($id);
    }

     public function new(CreateSupportDTO $dto): stdClass
    {
        return $this -> repository -> new($dto);
     }

     public function update(UpdateSupportDTO $dto):stdClass|null
    {
        return $this -> repository -> update($dto);
     }

    public function delete(string $id): void
    {
        $this ->repository -> delete($id);
    }
}