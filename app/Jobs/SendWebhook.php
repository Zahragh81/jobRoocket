<?php

namespace App\Jobs;

use http\Exception\RuntimeException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Throwable;


class SendWebhook implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $tries = 0;

    //در اینجا گفته باز 60ثانیه دیگر
    public $backoff = [60, 600, 3600];

    public $maxExceptions = 10;

    public function retryUntil()
    {
     return now()->addSeconds(40);//تا24ساعت اینده این باید اجرا بشه
    }

    /**
     * Create a new job instance.
     */
    public function __construct(public string $url, public array $data)
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $response = Http::post($this->url,  $this->data);

        throw new RuntimeException('database disconnected');

        if ($response->failed()){
            $this->release(
                now()->addSeconds(10 * $this->attempts())
            );
        }
    }


    public function failed(Throwable $e)
    {
        // send email to a specific user
        \Log::info('do something after send webhook failed');

    }
}
