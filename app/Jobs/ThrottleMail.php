<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redis;

class ThrottleMail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;
    public $email;

    public $tries = 5; // tries 5 times to run the job
    public $timeout = 30; // how maximum seconds cand try to run the job

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Mailable $email, User $user)
    {
        $this->email = $email;
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Redis::throttle('mailtrap')->allow(10)->every(60)->then(function () {
            Mail::to($this->user)->send($this->email);
        }, function () {
            return $this->release(5);
        });
    }
}
