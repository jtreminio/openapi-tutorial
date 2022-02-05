<?php

declare(strict_types=1);

namespace PetStoreApi\Model;

class Phone
{
    /**
     * @var string "home"|"mobile"|"work"
     */
    public $type;

    /**
     * @var string
     */
    public $number;
}
