<?php

declare(strict_types=1);

namespace PetStoreApi\Model;

class DogInfo
{
    /**
     * @var string
     */
    public $breed;

    /**
     * @var bool
     */
    public $crate_trained;

    /**
     * @var bool
     */
    public $leash_trained;

    /**
     * @var bool
     */
    public $potty_trained;
}
