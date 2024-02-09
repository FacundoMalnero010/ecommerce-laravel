<?php

namespace Modules\Carrito\app\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Response\ErrorResponse;
use App\Http\Response\SuccessResponse;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Carrito\app\Http\Requests\CarritoFindRequest;
use Modules\Carrito\app\Http\Requests\CarritoUpdateRequest;
use Modules\Carrito\Services\CarritoService;

class CarritoController extends Controller
{
    protected CarritoService $carritoService;

    public function __construct(CarritoService $carritoService)
    {
        $this->carritoService = $carritoService;
    }

    /**
     * Returns a list of carts
     * @return SuccessResponse|ErrorResponse
     * @throws Exception
     */
    public function get(): SuccessResponse|ErrorResponse
    {
        try {
            $response = $this->carritoService->get();
            return new SuccessResponse($response);
        } catch (Exception $e) {
            return new ErrorResponse($e->getMessage(),$e->getCode());
        }
    }

    /**
     * Finds a cart by ID
     * @param CarritoFindRequest $request
     * @return SuccessResponse|ErrorResponse
     * @throws Exception
     */
    public function find(CarritoFindRequest $request): SuccessResponse|ErrorResponse
    {
        try {
            $response = $this->carritoService->find($request->input('id'));
            return new SuccessResponse($response);
        } catch (Exception $e) {
            return new ErrorResponse($e->getMessage(),$e->getCode());
        }
    }

    /**
     * Updates a cart's data
     * @param CarritoUpdateRequest $request
     * @return SuccessResponse|ErrorResponse
     * @throws Exception
     */
    public function update(CarritoUpdateRequest $request): SuccessResponse|ErrorResponse
    {
        try {
            $response = $this->carritoService->update($request->input('id'),$request->except('id'));
            return new SuccessResponse($response);
        } catch (Exception $e){
            return new ErrorResponse($e->getMessage(),$e->getCode());
        }
    }
}
