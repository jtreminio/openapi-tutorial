<?php

declare(strict_types=1);

namespace PetStoreApi\Controller;

use PetStoreApi\Model;
use PetStoreApi\RequestInterface;

class CustomerController
{
    /**
     * POST /customer
     */
    public function customerCreate(RequestInterface $request): string
    {
        $customer = new Model\Customer();
        $customer->first_name = $request->get('first_name');
        $customer->last_name = $request->get('last_name');
        $customer->email_address = $request->get('email_address');

        $address = new Model\Address();
        $address->address_1 = $request->get('address[address_1]');
        $address->address_2 = $request->get('address[address_2]');
        $address->city = $request->get('address[city]');
        $address->state = $request->get('address[state]');
        $address->zip_code = $request->get('address[zip_code]');
        $customer->address = $address;

        // Only add phone numbers if data was sent
        foreach ($request->get('phone_numbers') ?? [] as $v) {
            $phone = new Model\Phone();
            $phone->type = $v['type'];
            $phone->number = $v['number'];
            $customer->phone_numbers[] = $phone;
        }

        // persist $customer here
        // [...]

        return json_encode([
            'code' => 200,
            'message' => [
                'custom' => $customer,
            ],
        ]);
    }

    /**
     * GET /customer/{id}
     */
    public function customerGet(RequestInterface $request): string
    {
        // get id from path
        $id = $request->path('id');

        // find customer in DB here
        $customer = new Model\Customer();

        // customer not in DB
        if (!$customer) {
            return json_encode([
                'code' => 404,
                'message' => 'Customer not found',
            ]);
        }

        return json_encode([
            'code' => 200,
            'message' => [
                'custom' => $customer,
            ],
        ]);
    }

    /**
     * GET /customer/findBy
     */
    public function customerFindBy(RequestInterface $request): string
    {
        // get type and value from query
        // name | email_address | address | phone_number
        $type = $request->query('type');
        $value = $request->query('value');

        // find customers in DB here
        $customers = [new Model\Customer()];

        return json_encode([
            'code' => 200,
            'message' => [
                'customers' => $customers,
            ],
        ]);
    }

    /**
     * GET /customer/list
     */
    public function customerList(RequestInterface $request): string
    {
        // get page and page_size from query
        $page = $request->query('page');
        $page_size = $request->query('page_size');

        // find customers in DB here
        $customers = [new Model\Customer()];

        return json_encode([
            'code' => 200,
            'message' => [
                'page' => $page,
                'page_size' => $page_size,
                'customers' => $customers,
            ],
        ]);
    }

    /**
     * PUT /customer/{id}
     */
    public function customerUpdate(RequestInterface $request): string
    {
        // get id from path
        $id = $request->path('id');

        // find customer in DB here
        $customer = new Model\Customer();

        // customer not in DB
        if (!$customer) {
            return json_encode([
                'code' => 404,
                'message' => 'Customer not found',
            ]);
        }

        // update customer here
        $customer->first_name = $request->get('first_name');
        $customer->last_name = $request->get('last_name');
        $customer->email_address = $request->get('email_address');

        $address = $customer->address;
        $address->address_1 = $request->get('address[address_1]');
        $address->address_2 = $request->get('address[address_2]');
        $address->city = $request->get('address[city]');
        $address->state = $request->get('address[state]');
        $address->zip_code = $request->get('address[zip_code]');

        // update phone numbers in PUT /customer/{id}/phone

        // persist $customer here
        // [...]

        return json_encode([
            'code' => 200,
            'message' => 'Customer successfully updated',
        ]);
    }

    /**
     * DELETE /customer/{id}
     */
    public function customerDelete(RequestInterface $request): string
    {
        // get id from path
        $id = $request->path('id');

        // find customer in DB here
        $customer = new Model\Customer();

        // customer not in DB
        if (!$customer) {
            return json_encode([
                'code' => 404,
                'message' => 'Customer not found',
            ]);
        }

        // delete customer here
        // [...]

        return json_encode([
            'code' => 200,
            'message' => 'Customer successfully deleted',
        ]);
    }

    /**
     * PUT /customer/{id}/phone
     */
    public function customerAddPhone(RequestInterface $request): string
    {
        // get id from path
        $id = $request->path('id');

        // find customer in DB here
        $customer = new Model\Customer();

        // customer not in DB
        if (!$customer) {
            return json_encode([
                'code' => 404,
                'message' => 'Customer not found',
            ]);
        }

        $phone = new Model\Phone();
        $phone->type = $request->get('type');
        $phone->number = $request->get('number');
        $customer->phone_numbers[] = $phone;

        // persist $customer here
        // [...]

        return json_encode([
            'code' => 200,
            'message' => 'Customer phone number successfully added',
        ]);
    }

    /**
     * DELETE /customer/{id}/phone
     */
    public function customerDeletePhone(RequestInterface $request): string
    {
        // get id from path
        $id = $request->path('id');
        $number = $request->get('number');

        // find customer in DB here
        $customer = new Model\Customer();

        // customer not in DB
        if (!$customer) {
            return json_encode([
                'code' => 404,
                'message' => 'Customer not found',
            ]);
        }

        foreach ($customer->phone_numbers as $phone) {
            if ($phone->number === $number) {
                // remove phone number here
                // [...]
            }
        }

        // persist $customer here
        // [...]

        return json_encode([
            'code' => 200,
            'message' => 'Customer phone number successfully deleted',
        ]);
    }
}
