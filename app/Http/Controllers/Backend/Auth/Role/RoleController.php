<?php

namespace MVG\Http\Controllers\Backend\Auth\Role;

use Spatie\Permission\Models\Role;
use MVG\Http\Controllers\Controller;
use MVG\Events\Backend\Auth\Role\RoleDeleted;
use MVG\Repositories\Backend\Auth\RoleRepository;
use MVG\Repositories\Backend\Auth\PermissionRepository;
use MVG\Http\Requests\Backend\Auth\Role\StoreRoleRequest;
use MVG\Http\Requests\Backend\Auth\Role\ManageRoleRequest;
use MVG\Http\Requests\Backend\Auth\Role\UpdateRoleRequest;

/**
 * Class RoleController.
 */
class RoleController extends Controller
{
    /**
     * @var RoleRepository
     */
    protected $roleRepository;

    /**
     * @var PermissionRepository
     */
    protected $permissionRepository;

    /**
     * @param RoleRepository       $roleRepository
     * @param PermissionRepository $permissionRepository
     */
    public function __construct(RoleRepository $roleRepository, PermissionRepository $permissionRepository)
    {
        $this->roleRepository = $roleRepository;
        $this->permissionRepository = $permissionRepository;
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function index(ManageRoleRequest $request)
    {
        return view('backend.auth.role.index')
            ->withRoles($this->roleRepository->with('users', 'permissions')
                ->getPaginated(25, 'id', 'asc'));
    }

    /**
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function create(ManageRoleRequest $request)
    {
        return view('backend.auth.role.create')
            ->withPermissions($this->permissionRepository->getAll());
    }

    /**
     * @param StoreRoleRequest $request
     *
     * @return mixed
     */
    public function store(StoreRoleRequest $request)
    {
        $this->roleRepository->create($request->only('name', 'associated-permissions', 'permissions', 'sort'));

        return redirect()->route('admin.auth.role.index')->withFlashSuccess(__('alerts.backend.roles.created'));
    }

    /**
     * @param Role              $role
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function edit(Role $role, ManageRoleRequest $request)
    {
        if ($role->id == 1) {
            return redirect()->back()->withFlashDanger('You can not edit the administrator role.');
        }

        return view('backend.auth.role.edit')
            ->withRole($role)
            ->withRolePermissions($role->permissions->pluck('name')->all())
            ->withPermissions($this->permissionRepository->getAll());
    }

    /**
     * @param Role              $role
     * @param UpdateRoleRequest $request
     *
     * @return mixed
     */
    public function update(Role $role, UpdateRoleRequest $request)
    {
        $this->roleRepository->update($role->id, $request->only('name', 'permissions'));

        return redirect()->route('admin.auth.role.index')->withFlashSuccess(__('alerts.backend.roles.updated'));
    }

    /**
     * @param Role              $role
     * @param ManageRoleRequest $request
     *
     * @return mixed
     */
    public function destroy(Role $role, ManageRoleRequest $request)
    {
        if ($role->id == 1) {
            return redirect()->back()->withFlashDanger('You can not delete the administrator role.');
        }

        $this->roleRepository->delete($role->id);

        event(new RoleDeleted($role));

        return redirect()->route('admin.auth.role.index')->withFlashSuccess(__('alerts.backend.roles.deleted'));
    }
}
