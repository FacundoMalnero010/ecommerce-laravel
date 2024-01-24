<?php

namespace Modules\Usuario\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Response\ErrorResponse;
use App\Http\Response\SuccessResponse;
use Exception;
use Modules\Usuario\app\Http\Requests\UsuarioFindRequest;
use Modules\Usuario\app\Http\Requests\UsuarioStoreRequest;
use Modules\Usuario\app\Http\Requests\UsuarioUpdateRequest;
use Modules\Usuario\Services\UsuarioService;


class UsuarioController extends Controller
{
    protected UsuarioService $usuarioService;

    public function __construct(UsuarioService $usuarioService)
    {
        $this->usuarioService = $usuarioService;
    }

    /**
     * Returns a list of users
     * @return SuccessResponse|ErrorResponse
     * @throws Exception
     */
    public function get(): SuccessResponse|ErrorResponse
    {
        try {
            $response = $this->usuarioService->get();
            return new SuccessResponse($response);
        }catch (Exception $e) {
            return new ErrorResponse($e->getMessage(),$e->getCode());
        }
    }

    /**
     * Finds a user by id
     * @param UsuarioFindRequest $request
     * @return SuccessResponse|ErrorResponse
     * @throws Exception
     */
    public function find(UsuarioFindRequest $request): SuccessResponse|ErrorResponse
    {
        try {
            $response = $this->usuarioService->find($request->input('id'));
            return new SuccessResponse($response);
        }catch (Exception $e) {
            return new ErrorResponse($e->getMessage(),$e->getCode());
        }
    }

    /**
     * Persists a user
     * @param UsuarioStoreRequest $request User's data
     * @return SuccessResponse|ErrorResponse
     * @throws Exception
     */
    public function store(UsuarioStoreRequest $request): SuccessResponse|ErrorResponse
    {
        try {
            $response = $this->usuarioService->store($request->all());
            return new SuccessResponse($response);
        }catch (Exception $e) {
            return new ErrorResponse($e->getMessage(),$e->getCode());
        }
    }

    /**
     * Updates a user's data
     * @param UsuarioUpdateRequest $request
     * @return SuccessResponse|ErrorResponse
     * @throws Exception
     */
    public function update(UsuarioUpdateRequest $request): SuccessResponse|ErrorResponse
    {
        try {
            $response = $this->usuarioService->update($request->input('id'),$request->except('id'));
            return new SuccessResponse($response);
        }catch (Exception $e) {
            return new ErrorResponse($e->getMessage(),$e->getCode());
        }
    }

    /**
     * Destroys a user
     * @param UsuarioFindRequest $request
     * @return SuccessResponse|ErrorResponse
     * @throws Exception
     */
    public function destroy(UsuarioFindRequest $request): SuccessResponse|ErrorResponse
    {
        try {
            $response = $this->usuarioService->destroy($request->input('id'));
            return new SuccessResponse($response);
        }catch (Exception $e) {
            return new ErrorResponse($e->getMessage(),$e->getCode());
        }
    }
}
