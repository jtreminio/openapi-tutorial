<?php

declare(strict_types=1);

namespace PetStoreApi\Model;

class Pet
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $name;

    /**
     * @var int
     */
    public $age;

    /**
     * @var \SplFileInfo|null
     */
    public $photo = null;

    /**
     * @var string "dog"|"cat"|"fish"
     */
    public $type;

    /**
     * @var DogInfo|CatInfo|FishInfo
     */
    public $info;

    /**
     * @var string "available"|"pending"|"sold"
     */
    public $status = 'available';
}
