<?php

namespace App\API\NewsStream\Policies;

use App\Policies\AbstractPolicyOfGod;
use App\User;
use App\API\NewsStream\Models\News;
use Illuminate\Support\Facades\Log;

class NewsStreamPolicy extends AbstractPolicyOfGod
{
    /**
     * Determine whether the user can view the news.
     *
     * @param  \App\User  $user
     * @param  News  $news
     * @return mixed
     */
    public function view(User $user, News $news)
    {
        return true;
    }

    /**
     * Determine whether the user can create news.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return false;
    }

    /**
     * Determine whether the user can update the news.
     *
     * @param  \App\User  $user
     * @param  News  $news
     * @return mixed
     */
    public function update(User $user, News $news)
    {
        return false;
    }

    /**
     * Determine whether the user can delete the news.
     *
     * @param  \App\User  $user
     * @param  News  $news
     * @return mixed
     */
    public function delete(User $user, News $news)
    {
        return false;
    }
}
