<?php

namespace App\Service;

use App\Repository\TypeRepository;

class TypeGenerator
{
    public function __construct(TypeRepository $typeRepository)
    {
        $types = $typeRepository->findAll();

        return $types;
    }
}
