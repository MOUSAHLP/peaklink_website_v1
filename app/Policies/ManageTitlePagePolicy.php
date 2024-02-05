<?php

namespace App\Policies;

use App\Models\User;
use App\Models\ManageTitlePage;
use Illuminate\Auth\Access\HandlesAuthorization;

class ManageTitlePagePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function viewAny(User $user): bool
    {
        return $user->can('view_any_manage::title::page');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ManageTitlePage  $manageTitlePage
     * @return bool
     */
    public function view(User $user, ManageTitlePage $manageTitlePage): bool
    {
        return $user->can('view_manage::title::page');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_manage::title::page');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ManageTitlePage  $manageTitlePage
     * @return bool
     */
    public function update(User $user, ManageTitlePage $manageTitlePage): bool
    {
        return $user->can('update_manage::title::page');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ManageTitlePage  $manageTitlePage
     * @return bool
     */
    public function delete(User $user, ManageTitlePage $manageTitlePage): bool
    {
        return $user->can('delete_manage::title::page');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_manage::title::page');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ManageTitlePage  $manageTitlePage
     * @return bool
     */
    public function forceDelete(User $user, ManageTitlePage $manageTitlePage): bool
    {
        return $user->can('{{ ForceDelete }}');
    }

    /**
     * Determine whether the user can permanently bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function forceDeleteAny(User $user): bool
    {
        return $user->can('{{ ForceDeleteAny }}');
    }

    /**
     * Determine whether the user can restore.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ManageTitlePage  $manageTitlePage
     * @return bool
     */
    public function restore(User $user, ManageTitlePage $manageTitlePage): bool
    {
        return $user->can('{{ Restore }}');
    }

    /**
     * Determine whether the user can bulk restore.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function restoreAny(User $user): bool
    {
        return $user->can('{{ RestoreAny }}');
    }

    /**
     * Determine whether the user can replicate.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ManageTitlePage  $manageTitlePage
     * @return bool
     */
    public function replicate(User $user, ManageTitlePage $manageTitlePage): bool
    {
        return $user->can('replicate_manage::title::page');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_manage::title::page');
    }

}
