<?php

namespace App\Http\Controllers\Admin\OVD;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\OVD\OVDIndexRequest;
use App\Http\Requests\Admin\OVD\SubdivisionStoreRequest;
use App\Http\Requests\Admin\OVD\SubdivisionUpdateRequest;
use App\Models\OVD;
use App\Repositories\Interfaces\OVDInterface;
use App\Services\OVDService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Throwable;

class OVDController extends Controller
{
    public function __construct(
        protected OVDInterface $ovdRepository,
        protected OVDService $ovdService,
    )
    {
    }

    public function index(OVDIndexRequest $searchRequest): View
    {
        $dataRequest = $searchRequest->validated();

        return view('pages.admin.ovd.index',
            [
                'ovd' => $dataRequest? $this->ovdRepository->getFilterableOVD($dataRequest) : $this->ovdRepository->getPaginatedOVD(),
            ]
        );
    }

    public function store(SubdivisionStoreRequest $request): RedirectResponse
    {
        try {
            $success = $this->ovdService->storeOVD($request->validated());

            if ($success) {
                return back()->with('success', 'ОВД успешно добавлен');
            }

            return back()->with('error', 'Не удалось создать ОВД.');
        } catch (Throwable $e) {
            return back()->with('error', 'Ошибка при создании ОВД: ' . $e->getMessage());
        }
    }

    public function edit(OVD $ovd): View
    {
        return view('pages.admin.ovd.edit', [
           'ovd' => $this->ovdRepository->findOVDById($ovd->id),
        ]);
    }

    public function update(OVD $ovd, SubdivisionUpdateRequest $request): RedirectResponse
    {
        try {
            $updatedOvd = $this->ovdService->updateOVD($ovd, $request->validated());

            return redirect()
                ->route('admin.ovd.edit', $updatedOvd->id)
                ->with('success', 'Данные ОВД обновлены');
        } catch (Throwable $e) {
            return back()->with('error', 'Ошибка обновления данных ОВД: ' . $e->getMessage());
        }
    }

    public function destroy(OVD $ovd): RedirectResponse
    {
        try {
            $this->ovdService->deleteOVD($ovd);

            return redirect()
                ->route('admin.ovd.index')
                ->with('warning', 'ОВД успешно удалён');
        } catch (Throwable $e) {
            return back()->with('error', 'Ошибка удаления ОВД: ' . $e->getMessage());
        }
    }
}
