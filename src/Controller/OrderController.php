<?php

declare(strict_types=1);

namespace PetStoreApi\Controller;

use PetStoreApi\Model;
use PetStoreApi\RequestInterface;

class OrderController
{
    /**
     * POST /order
     */
    public function orderCreate(RequestInterface $request): string
    {
        $order = new Model\Order();
        $order->customer_id = $request->get('customer_id');
        $order->pet_id = $request->get('pet_id');
        $order->status = 'placed';

        // persist $order here
        // [...]

        return json_encode([
            'code' => 200,
            'message' => [
                'order' => $order,
            ],
        ]);
    }

    /**
     * GET /order/{id}
     */
    public function orderGet(RequestInterface $request): string
    {
        // get id from path
        $id = $request->path('id');

        // find order in DB here
        $order = new Model\Order();

        // order not in DB
        if (!$order) {
            return json_encode([
                'code' => 404,
                'message' => 'Order not found',
            ]);
        }

        return json_encode([
            'code' => 200,
            'message' => [
                'order' => $order,
            ],
        ]);
    }

    /**
     * GET /order/findBy
     */
    public function orderFindBy(RequestInterface $request): string
    {
        // get type and value from query
        // customer_id | pet_id | status
        $type = $request->query('type');
        $value = $request->query('value');

        // find orders in DB here
        $orders = [new Model\Order()];

        return json_encode([
            'code' => 200,
            'message' => [
                'orders' => $orders,
            ],
        ]);
    }

    /**
     * GET /order/list
     */
    public function orderList(RequestInterface $request): string
    {
        // get page and page_size from query
        $page = $request->query('page');
        $page_size = $request->query('page_size');

        // find orders in DB here
        $orders = [new Model\Order()];

        return json_encode([
            'code' => 200,
            'message' => [
                'page' => $page,
                'page_size' => $page_size,
                'orders' => $orders,
            ],
        ]);
    }

    /**
     * PUT /order/{id}
     */
    public function orderUpdate(RequestInterface $request): string
    {
        // get id from path
        $id = $request->path('id');

        // find order in DB here
        $order = new Model\Order();

        // order not in DB
        if (!$order) {
            return json_encode([
                'code' => 404,
                'message' => 'Order not found',
            ]);
        }

        $order->customer_id = $request->get('customer_id');
        $order->pet_id = $request->get('pet_id');
        $order->ship_date = $request->get('ship_date');
        $order->status = $request->get('status');

        // persist $order here
        // [...]

        return json_encode([
            'code' => 200,
            'message' => 'Order successfully updated',
        ]);
    }

    /**
     * DELETE /order/{id}
     */
    public function orderDelete(RequestInterface $request): string
    {
        // get id from path
        $id = $request->path('id');

        // find order in DB here
        $order = new Model\Order();

        // order not in DB
        if (!$order) {
            return json_encode([
                'code' => 404,
                'message' => 'Order not found',
            ]);
        }

        // delete order here
        // [...]

        return json_encode([
            'code' => 200,
            'message' => 'Order successfully deleted',
        ]);
    }
}
