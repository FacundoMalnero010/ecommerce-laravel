<?php

namespace Modules\Usuario\Repository;

use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Modules\Usuario\app\Models\Usuario;

class UsuarioRepository
{
    protected Builder $usuario;

    public function __construct(Usuario $usuario)
    {
        $this->usuario = Usuario::query();
    }

    /**
     * Returns an existing users list
     * @return Collection
     * @uses Usuario
     * @throws Exception
     */
    public function get(): Collection
    {
        try {
            return Usuario::all();
        }catch (Exception $e) {
            throw new Exception('No se ha podido consultar los usuarios',409);
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
            return $this->usuario->find($id);
        }catch (Exception $e) {
            throw new Exception('No se ha encontrado al usuario', 404);
        }
    }

    /**
     * Persists a user
     * @param array $data User's data
     * @throws Exception
     */
    public function store(array $data): Usuario
    {
        try {
            $user = new Usuario($data);
            $user->save();
            return $user;

        }catch (Exception $e) {
            throw new Exception('No se ha podido almacenar el usuario',409);
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
            $user = $this->usuario->find($id);
            $user->update($data);
            return $user;
        }catch (Exception $e) {
            throw new Exception('No se ha podido actualizar los datos del usuario',409);
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
            $user = $this->usuario->find($id);
            $user->delete();
            return $user;
        }catch (Exception $e) {
            throw new Exception('No se ha podido eliminar el usuario',409);
        }
    }
}
