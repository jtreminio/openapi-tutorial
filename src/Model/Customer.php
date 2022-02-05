<?php

declare(strict_types=1);

namespace PetStoreApi\Model;

class Customer
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $first_name;

    /**
     * @var string
     */
    public $last_name;

    /**
     * @var string
     */
    public $email_address;

    /**
     * @var Address
     */
    public $address;

    /**
     * @var Phone[]
     */
    public $phone_numbers = [];
}
