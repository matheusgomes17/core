<?php

namespace MVG\Repositories\Backend\System;

use MVG\Events\Backend\System\Deposition\DepositionCreated;
use MVG\Events\Backend\System\Deposition\DepositionPermanentlyDeleted;
use MVG\Events\Backend\System\Deposition\DepositionUpdated;
use MVG\Events\Backend\System\Deposition\DepositionDeleted;
use MVG\Models\System\Deposition;
use MVG\Repositories\Backend\ImageRepository;
use MVG\Repositories\BaseEloquentRepository;
use MVG\Repositories\Traits\CacheResults;
use MVG\Repositories\Traits\ImageManager;
use MVG\Exceptions\GeneralException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

/**
 * Class DepositionRepository.
 */
class DepositionRepository extends BaseEloquentRepository
{
    use CacheResults;

    /**
     * @var array
     */
    protected $relationships = ['users'];

    /**
     * @var string
     */
    protected $model = Deposition::class;

    /**
     * Get paged items.
     *
     * @param  int $paged Items per page
     * @param  string $orderBy Column to sort by
     * @param  string $sort Sort direction
     * @return \Illuminate\Pagination\Paginator
     */
    public function getPaginated($paged = 15, $orderBy = 'created_at', $sort = 'DESC')
    {
        return $this->model
            ->with($this->requiredRelationships)
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param int    $paged
     * @param string $orderBy
     * @param string $sort
     *
     * @return LengthAwarePaginator
     */
    public function getDeletedPaginated($paged = 25, $orderBy = 'created_at', $sort = 'desc') : LengthAwarePaginator
    {
        return $this->model
            ->onlyTrashed()
            ->orderBy($orderBy, $sort)
            ->paginate($paged);
    }

    /**
     * @param array $data
     *
     * @return Deposition
     */
    public function create(array $data): Deposition
    {
        return DB::transaction(function () use ($data) {

            $deposition = $this->model->create([
                'user_id' => auth()->user()->id,
                'name' => $data['name'],
                'city' => $data['city'],
                'state' => $data['state'],
                'link' => $data['link']
            ]);

            if ($deposition) {
                if (request()->hasFile('cover')) {

                    $image = new ImageRepository();
                    $file = request()->file('cover');
                    $deposition->cover = $image->saveImage($file, 'depositions', 120);
                    $deposition->save();
                }

                event(new DepositionCreated($deposition));

                return $deposition;
            }

            throw new GeneralException(__('exceptions.backend.system.depositions.create_error'));
        });
    }

    /**
     * @param mixed $id
     * @param array $data
     *
     * @return Deposition
     */
    public function update($id, array $data) : Deposition
    {
        $deposition = Deposition::findOrFail($id);

        return DB::transaction(function () use ($deposition, $data) {

            if ($deposition->update([
                'user_id' => auth()->user()->id,
                'name' => $data['name'],
                'city' => $data['city'],
                'state' => $data['state'],
                'link' => $data['link']
            ])) {
                if (request()->hasFile('cover')) {

                    $image = new ImageRepository();
                    $file = request()->file('cover');
                    unlink(public_path($deposition->cover));
                    $deposition->cover = $image->saveImage($file, 'depositions', 120);
                    $deposition->save();
                }

                event(new DepositionUpdated($deposition));

                return $deposition;
            }

            throw new GeneralException(__('exceptions.backend.system.depositions.update_error'));
        });
    }

    /**
     * @param $id
     *
     * @throws GeneralException
     *
     * @return bool
     */
    public function delete($id)
    {
        $deposition = Deposition::findOrFail($id);

        return DB::transaction(function () use ($deposition) {
            if ($deposition->delete()) {

                event(new DepositionDeleted($deposition));

                return $deposition;
            }

            throw new GeneralException(trans('exceptions.backend.system.depositions.delete_error'));
        });
    }

    /**
     * @param Deposition $id
     *
     * @return Deposition
     * @throws GeneralException
     */
    public function forceDelete($id) : Deposition
    {
        $deposition = Deposition::findOrFail($id);

        if (is_null($deposition->deleted_at)) {
            throw new GeneralException(__('exceptions.backend.system.depositions.delete_first'));
        }

        return DB::transaction(function () use ($deposition) {
            if ($deposition->forceDelete()) {

                event(new DepositionPermanentlyDeleted($deposition));

                return $deposition;
            }

            throw new GeneralException(__('exceptions.backend.system.depositions.delete_error'));
        });
    }
}