<?php

namespace Modules\Carrito\Repository;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Carrito\app\Models\Carrito;

class CarritoRepository
{
    protected Builder $carrito;

    public function __construct(Carrito $carrito)
    {
        $this->carrito = $carrito->query();
    }

    /**
     * Returns an existing carts list
     * @return Collection
     * @uses Carrito
     * @throws Exception
     */
    public function get(): Collection
    {
        try {
            return Carrito::all();
        } catch (Exception $e) {
            throw new Exception('No se ha podido consultar los carritos',409);
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
            return $this->carrito->find($id);
        } catch (Exception $e) {
            throw new Exception('No se ha encontrado el carrito',404);
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
            $cart = $this->carrito->find($id);
            $cart->update($data);
            return $cart;
        } catch (Exception $e) {
            throw new Exception('No se ha podido actualizar los datos del carrito',409);
        }
    }
}
