<?php

namespace App\Jobs;

use App\Http\Controllers\Admin\User\StoreController;
use App\Mail\User\PasswordMail;
use Illuminate\Auth\Events\Registered;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class StoreUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private array $data;
    private StoreController $store;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($data, $store)
    {
        $this->data = $data;
        $this->store = $store;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $password = Str::random(10);
        $this->data['password'] = Hash::make($password);
        Mail::to($this->data['email'])->send(new PasswordMail($password));
        $user = $this->store->service->store($this->data);
        event(new Registered($user));
    }
}
