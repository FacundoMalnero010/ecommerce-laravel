<?php

namespace Modules\Carrito\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Carrito\Repository\CarritoRepository;

class CarritoService
{
    protected CarritoRepository $carritoRepository;

    public function __construct(CarritoRepository $carritoRepository)
    {
        $this->carritoRepository = $carritoRepository;
    }

    /**
     * Returns a list of carts
     * @return Collection
     * @throws Exception
     */
    public function get(): Collection
    {
        try {
            return $this->carritoRepository->get();
        } catch (Exception $e) {
            throw new Exception($e->getMessage(),$e->getCode());
        }
    }

    /**
     * Finds a cart by ID
     * @param int|string $id
     * @return Model
     * @throws Exception
     */
    public function find(int|string $id): Model
    {
        try {
            return $this->carritoRepository->find($id);
        } catch (Exception $e) {
            throw new Exception($e->getMessage(),$e->getCode());
        }
    }

    /**
     * Updates a cart's data
     * @param int|string $id
     * @param array $data
     * @return Model
     * @throws Exception
     */
    public function update(int|string $id, array $data): Model
    {
        try {
            return $this->carritoRepository->update($id,$data);
        } catch (Exception $e) {
            throw new Exception($e->getMessage(),$e->getCode());
        }
    }
}
