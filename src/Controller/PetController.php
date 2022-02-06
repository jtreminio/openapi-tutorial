<?php

declare(strict_types=1);

namespace PetStoreApi\Controller;

use OpenApi\Annotations as OA;
use PetStoreApi\Model;
use PetStoreApi\RequestInterface;

class PetController
{
    /**
     * @OA\Post(path="/pet",
     *     summary="Add a new pet",
     *     operationId="petCreate",
     *     tags={"Pet"},
     *     @OA\RequestBody(
     *         @OA\MediaType(mediaType="multipart/form-data",
     *             @OA\Schema(ref="#/components/schemas/Pet"),
     *         ),
     *     ),
     * )
     */
    public function petCreate(RequestInterface $request): string
    {
        $pet = new Model\Pet();
        $pet->name = $request->get('name');
        $pet->age = $request->get('age');
        $pet->type = $request->get('type');
        $pet->status = $request->get('status');

        // depending on the type of animal the info will be different
        if ($pet->type === 'dog') {
            $info = new Model\DogInfo();
            $info->breed = $request->get('info[breed]');
            $info->crate_trained = $request->get('info[crate_trained]');
            $info->leash_trained = $request->get('info[leash_trained]');
            $info->potty_trained = $request->get('info[potty_trained]');
        } elseif ($pet->type === 'cat') {
            $info = new Model\CatInfo();
            $info->breed = $request->get('info[breed]');
            $info->litter_trained = $request->get('info[litter_trained]');
        } else {
            $info = new Model\FishInfo();
            $info->breed = $request->get('info[breed]');
            $info->water_type = $request->get('info[water_type]');
            $info->community = $request->get('info[community]');
        }

        // photo is optional when creating the pet
        if ($request->file('photo')) {
            $pet->photo = $request->file('photo');
        }

        // persist $pet here
        // [...]

        return json_encode([
            'code' => 200,
            'message' => [
                'pet' => $pet,
            ],
        ]);
    }

    /**
     * GET /pet/{id}
     */
    public function petGet(RequestInterface $request): string
    {
        // get id from path
        $id = $request->path('id');

        // find pet in DB here
        $pet = new Model\Pet();

        // pet not in DB
        if (!$pet) {
            return json_encode([
                'code' => 404,
                'message' => 'Pet not found',
            ]);
        }

        return json_encode([
            'code' => 200,
            'message' => [
                'pet' => $pet,
            ],
        ]);
    }

    /**
     * GET /pet/findBy
     */
    public function petFindBy(RequestInterface $request): string
    {
        // get type and value from query
        // name | type | status
        $type = $request->query('type');
        $value = $request->query('value');

        // find pets in DB here
        $pets = [new Model\Pet()];

        return json_encode([
            'code' => 200,
            'message' => [
                'pets' => $pets,
            ],
        ]);
    }

    /**
     * GET /pet/list
     */
    public function petList(RequestInterface $request): string
    {
        // get page and page_size from query
        $page = $request->query('page');
        $page_size = $request->query('page_size');

        // find pets in DB here
        $pets = [new Model\Pet()];

        return json_encode([
            'code' => 200,
            'message' => [
                'page' => $page,
                'page_size' => $page_size,
                'pets' => $pets,
            ],
        ]);
    }

    /**
     * PUT /pet/{id}
     */
    public function petUpdate(RequestInterface $request): string
    {
        // get id from path
        $id = $request->path('id');

        // find pet in DB here
        $pet = new Model\Pet();

        // pet not in DB
        if (!$pet) {
            return json_encode([
                'code' => 404,
                'message' => 'Pet not found',
            ]);
        }

        // update pet here
        $pet->name = $request->get('name');
        $pet->age = $request->get('age');
        $pet->type = $request->get('type');
        $pet->status = $request->get('status');

        // depending on the type of animal the info will be different
        if ($pet->type === 'dog') {
            $info = new Model\DogInfo();
            $info->breed = $request->get('info[breed]');
            $info->crate_trained = $request->get('info[crate_trained]');
            $info->leash_trained = $request->get('info[leash_trained]');
            $info->potty_trained = $request->get('info[potty_trained]');
        } elseif ($pet->type === 'cat') {
            $info = new Model\CatInfo();
            $info->breed = $request->get('info[breed]');
            $info->litter_trained = $request->get('info[litter_trained]');
        } else {
            $info = new Model\FishInfo();
            $info->breed = $request->get('info[breed]');
            $info->water_type = $request->get('info[water_type]');
            $info->community = $request->get('info[community]');
        }

        $pet->info = $info;

        // updating photo happens in PUT /pet/{id}/photo

        // persist $pet here
        // [...]

        return json_encode([
            'code' => 200,
            'message' => 'Pet successfully updated',
        ]);
    }

    /**
     * PUT /pet/{id}/photo
     */
    public function petUpdatePhoto(RequestInterface $request): string
    {
        // get id from path
        $id = $request->path('id');

        /**
         * photo is uploaded data (binary)
         * it could also be null to allow deleting the current photo
         */
        $photo = $request->file('photo');

        // find pet in DB here
        $pet = new Model\Pet();

        // pet not in DB
        if (!$pet) {
            return json_encode([
                'code' => 404,
                'message' => 'Pet not found',
            ]);
        }

        // update pet here
        $pet->photo = $photo;

        // persist $pet here
        // [...]

        return json_encode([
            'code' => 200,
            'message' => 'Pet photo successfully updated',
        ]);
    }

    /**
     * DELETE /pet/{id}
     */
    public function petDelete(RequestInterface $request): string
    {
        // get id from path
        $id = $request->path('id');

        // find pet in DB here
        $pet = new Model\Pet();

        // pet not in DB
        if (!$pet) {
            return json_encode([
                'code' => 404,
                'message' => 'Pet not found',
            ]);
        }

        // delete pet here
        // [...]

        return json_encode([
            'code' => 200,
            'message' => 'Pet successfully deleted',
        ]);
    }
}
