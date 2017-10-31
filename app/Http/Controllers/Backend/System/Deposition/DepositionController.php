<?php

namespace MVG\Http\Controllers\Backend\System\Deposition;

use MVG\Models\System\Deposition;
use MVG\Http\Controllers\Controller;
use MVG\Repositories\Backend\System\DepositionRepository;
use MVG\Http\Requests\Backend\System\Deposition\StoreDepositionRequest;
use MVG\Http\Requests\Backend\System\Deposition\ManageDepositionRequest;
use MVG\Http\Requests\Backend\System\Deposition\UpdateDepositionRequest;

/**
 * Class DepositionController.
 */
class DepositionController extends Controller
{
    /**
     * @var DepositionRepository
     */
    protected $depositionRepository;

    /**
     * @param DepositionRepository $depositionRepository
     */
    public function __construct(DepositionRepository $depositionRepository)
    {
        $this->depositionRepository = $depositionRepository;
    }

    /**
     * @param ManageDepositionRequest $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ManageDepositionRequest $request)
    {
        return view('backend.system.deposition.index')
            ->withDepositions($this->depositionRepository->getPaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageDepositionRequest $request
     *
     * @return mixed
     */
    public function create(ManageDepositionRequest $request)
    {
        return view('backend.system.deposition.create');
    }

    /**
     * @param StoreDepositionRequest $request
     *
     * @return mixed
     */
    public function store(StoreDepositionRequest $request)
    {
        $this->depositionRepository->create($request->only(
            'user_id',
            'cover',
            'name',
            'city',
            'state',
            'link'
        ));

        return redirect()->route('admin.system.deposition.index')->withFlashSuccess(__('alerts.backend.depositions.created'));
    }

    /**
     * @param Deposition              $deposition
     * @param ManageDepositionRequest $request
     *
     * @return mixed
     */
    public function edit(Deposition $deposition, ManageDepositionRequest $request)
    {
        return view('backend.system.deposition.edit')
            ->withDeposition($deposition);
    }

    /**
     * @param Deposition              $deposition
     * @param UpdateDepositionRequest $request
     *
     * @return mixed
     */
    public function update(Deposition $deposition, UpdateDepositionRequest $request)
    {
        $this->depositionRepository->update($deposition->id, $request->only(
            'user_id',
            'cover',
            'name',
            'city',
            'state',
            'link'
        ));

        return redirect()->route('admin.system.deposition.index')->withFlashSuccess(__('alerts.backend.Depositions.updated'));
    }

    /**
     * @param Deposition              $deposition
     * @param ManageDepositionRequest $request
     *
     * @return mixed
     */
    public function destroy(Deposition $deposition, ManageDepositionRequest $request)
    {
        $this->depositionRepository->delete($deposition->id);

        return redirect()->route('admin.system.deposition.deleted')->withFlashSuccess(__('alerts.backend.Depositions.deleted'));
    }
}