<?php

declare(strict_types=1);

namespace PetStoreApi;

interface RequestInterface
{
    /**
     * Get FILE uploaded data
     *
     * @return mixed
     */
    public function file(string $parameter);

    /**
     * Get POST data
     *
     * @return mixed
     */
    public function get(string $parameter);

    /**
     * Get data from path, /customer/{id}
     *
     * @return mixed
     */
    public function path(string $parameter);

    /**
     * Get query data, /customer/list?page=1&page_size=100
     *
     * @return mixed
     */
    public function query(string $parameter);
}
