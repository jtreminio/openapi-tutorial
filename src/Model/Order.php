<?php

declare(strict_types=1);

namespace PetStoreApi\Model;

class Order
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var int
     */
    public $customer_id;

    /**
     * @var int
     */
    public $pet_id;

    /**
     * @var string
     */
    public $ship_date;

    /**
     * @var string "placed"|"shipped"|"delivered"
     */
    public $status;
}
