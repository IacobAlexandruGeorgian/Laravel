<?php

namespace App\Listeners;

use App\Events\BlogPostPosted;
use App\Jobs\ThrottleMail;
use App\Mail\BlogPostAdded;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyAdminWhenBlogPostCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(BlogPostPosted $event)
    {
        User::thatsIsAnAdmin()->get()->map(function (User $user) {
            ThrottleMail::dispatch(
                new BlogPostAdded(),
                $user
            );
        });
    }
}
