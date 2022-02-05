<?php

declare(strict_types=1);

namespace PetStoreApi\Model;

class FishInfo
{
    /**
     * @var string
     */
    public $breed;

    /**
     * @var string "fresh"|"salt"
     */
    public $water_type;

    /**
     * @var bool
     */
    public $community;
}
