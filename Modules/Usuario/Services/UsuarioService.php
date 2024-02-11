<?php

namespace Modules\Usuario\Services;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Modules\Usuario\app\Models\Usuario;
use Modules\Usuario\Repository\UsuarioRepository;

class UsuarioService
{
    protected UsuarioRepository $usuarioRepository;

    public function __construct(UsuarioRepository $usuarioRepository)
    {
        $this->usuarioRepository = $usuarioRepository;
    }

    /**
     * Returns a list of users
     * @return Collection
     * @throws Exception
     */
    public function get(): Collection
    {
        try {
            return $this->usuarioRepository->get();
        }catch (Exception $e) {
            throw new Exception($e->getMessage(),$e->getCode());
        }
    }

    /**
     * Finds a user by id
     * @param int|string $id
     * @return Model
     * @throws Exception
     */
    public function find(int|string $id): Model
    {
        try {
            return $this->usuarioRepository->find($id);
        }catch (Exception $e) {
            throw new Exception($e->getMessage(),$e->getCode());
        }
    }

    /**
     * Encodes user's password and persists it
     * @param array $data User's data
     * @return Usuario
     * @uses self::createCart()
     * @throws Exception
     */
    public function store(array $data): Usuario
    {
        try {
            $data['password'] = Hash::make($data['password']);
            $user = $this->usuarioRepository->store($data);
            if ($this->createCart($user)) {
                return $user;
            }
        }catch (Exception $e) {
            throw new Exception($e->getMessage(),$e->getCode());
        }
    }

    /**
     * Updates a user's data
     * @param int|string $id
     * @param array $data
     * @return Model
     * @throws Exception
     */
    public function update(int|string $id, array $data): Model
    {
        try {
            if (isset($data['password'])) {
                $data['password'] = Hash::make($data['password']);
            }
            return $this->usuarioRepository->update($id,$data);
        }catch (Exception $e) {
            throw new Exception($e->getMessage(),$e->getCode());
        }
    }

    /**
     * Destroys a user
     * @param int|string $id
     * @return Model
     * @throws Exception
     */
    public function destroy(int|string $id): Model
    {
        try {
            return $this->usuarioRepository->destroy($id);
        }catch (Exception $e) {
            throw new Exception($e->getMessage(),$e->getCode());
        }
    }

    /**
     * Creates a user's cart
     * @param Usuario $user
     * @return bool
     * @throws Exception
     */
    private function createCart(Usuario $user): bool
    {
        try {
            return $this->usuarioRepository->createCart($user);
        } catch (Exception $e) {
            throw new Exception('No se ha podido crear el carrito', 409);
        }
    }
}
