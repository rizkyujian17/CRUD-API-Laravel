<?php

namespace App\Policies;
use App\ContentUser;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class ContentPolicy
{
    use HandlesAuthorization;


    public function DeleteByContent(User $user,ContentUser $content_users)
    {
        return $user->ownContent($user,$content_users);
    }
    public function UpdateByContent(User $user,ContentUser $content_users)
    {
        return $user->ownContent($user,$content_users);
    }

    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
