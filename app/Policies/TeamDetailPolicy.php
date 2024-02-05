<?php

namespace App\Policies;

use App\Models\User;
use App\Models\TeamDetail;
use Illuminate\Auth\Access\HandlesAuthorization;

class TeamDetailPolicy
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
        return $user->can('view_any_team::detail');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TeamDetail  $teamDetail
     * @return bool
     */
    public function view(User $user, TeamDetail $teamDetail): bool
    {
        return $user->can('view_team::detail');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function create(User $user): bool
    {
        return $user->can('create_team::detail');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TeamDetail  $teamDetail
     * @return bool
     */
    public function update(User $user, TeamDetail $teamDetail): bool
    {
        return $user->can('update_team::detail');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TeamDetail  $teamDetail
     * @return bool
     */
    public function delete(User $user, TeamDetail $teamDetail): bool
    {
        return $user->can('delete_team::detail');
    }

    /**
     * Determine whether the user can bulk delete.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function deleteAny(User $user): bool
    {
        return $user->can('delete_any_team::detail');
    }

    /**
     * Determine whether the user can permanently delete.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\TeamDetail  $teamDetail
     * @return bool
     */
    public function forceDelete(User $user, TeamDetail $teamDetail): bool
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
     * @param  \App\Models\TeamDetail  $teamDetail
     * @return bool
     */
    public function restore(User $user, TeamDetail $teamDetail): bool
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
     * @param  \App\Models\TeamDetail  $teamDetail
     * @return bool
     */
    public function replicate(User $user, TeamDetail $teamDetail): bool
    {
        return $user->can('replicate_team::detail');
    }

    /**
     * Determine whether the user can reorder.
     *
     * @param  \App\Models\User  $user
     * @return bool
     */
    public function reorder(User $user): bool
    {
        return $user->can('reorder_team::detail');
    }

}
