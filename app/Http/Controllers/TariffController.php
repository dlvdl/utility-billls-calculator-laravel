<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tariff;
use App\Http\Requests\TariffRequest;
use App\Http\Resources\TariffResource;
use App\Actions\CreateTariffAction;
use App\Actions\UpdateTariffAction;
use App\Http\Requests\UpdateTariffRequest;

class TariffController extends Controller
{
    public function index()
    {
        return TariffResource::collection(Tariff::query()->orderBy('id', 'desc')->paginate(10));
    }

    public function store(TariffRequest $request, CreateTariffAction $createTariffAction)
    {
        return new TariffResource($createTariffAction($request->validated()));
    }

    public function show(Tariff $tariff)
    {
        return new TariffResource($tariff);
    }

    public function update(UpdateTariffRequest $request, string $id, UpdateTariffAction $updateTariffAction)
    {
        $data = $request->validated();
        $updatedData = $updateTariffAction($id, $data);
        return new TariffResource($updatedData);

    }

    public function destroy(Tariff $tariff)
    {
        //TODO Think about delet operation. For now this can destroy all my logic.
        // $tariff->delete();
        // return response('', 204);
    }
}