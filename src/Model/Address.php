<?php

declare(strict_types=1);

namespace PetStoreApi\Model;

class Address
{
    /**
     * @var string
     */
    public $address_1;

    /**
     * @var string|null
     */
    public $address_2 = null;

    /**
     * @var string
     */
    public $city;

    /**
     * @var string
     */
    public $state;

    /**
     * @var string
     */
    public $zip_code;
}
