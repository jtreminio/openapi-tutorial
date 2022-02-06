<?php

declare(strict_types=1);

namespace PetStoreApi\Model;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(schema="Pet")
 */
class Pet
{
    public const TYPE_ENUM = [
        'dog',
        'cat',
        'fish',
    ];

    public const STATUS_ENUM = [
        'available',
        'pending',
        'sold',
    ];

    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     * @OA\Property(type="string")
     */
    public $name;

    /**
     * @var int
     * @OA\Property(type="integer")
     */
    public $age;

    /**
     * @var \SplFileInfo|null
     * @OA\Property(type="string",
     *     format="binary",
     * )
     */
    public $photo = null;

    /**
     * @var string
     * @OA\Property(type="string",
     *     enum=\PetStoreApi\Model\Pet::TYPE_ENUM
     * )
     */
    public $type;

    /**
     * @var DogInfo|CatInfo|FishInfo
     */
    public $info;

    /**
     * @var string
     * @OA\Property(type="string",
     *     enum=\PetStoreApi\Model\Pet::STATUS_ENUM
     * )
     */
    public $status = 'available';
}
