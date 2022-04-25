<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;

class CreateMailAcc implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private  $token = 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9zc28uaG9zdGluZ2VyLmNvbVwvdjFcL2F1dGhcL3JlZnJlc2giLCJpYXQiOjE2NTA4ODY1ODIsImV4cCI6MTY1MDg5Mzg1NywibmJmIjoxNjUwODkwMjU3LCJqdGkiOiJJWDNiOVIyQjRDbjY4bnpkIiwic3ViIjoxMDM2MzY2MCwicHJ2IjoiNDFlZmI3YmFkN2Y2ZjYzMmUyNDA1YmQzYTc5M2I4YTZiZGVjNjc3NyIsInJpZCI6MjAsImlzZiI6ZmFsc2UsImFpZCI6bnVsbCwiYWNjZXNzIjpudWxsLCJyb2xlIjoiY2xpZW50IiwiY29tcGFueV9pZCI6Imhvc3RpbmdlciIsImlzX2NoYXJnZWJlZSI6ZmFsc2UsInZlcnNpb24iOiIxLjAuMCJ9.EIUn0ReG8HW5hZ_CcH-ugsj12GIJtEoqMOA372tUROqSC7TYneQQHmW9eeUqUi8CPEBnSl6_c48B5nksUwPEyGzNW3Ke1zYIyWeb2YqxUb-x5nkJhwjzhoaXTYXPO2eFilRe6SzYRRHWbqJ_8bMns1D6u5vbKj2WhQtJq9_hwMjPAU2TJqlCjz1EMRBwVTbq0XWg1WsnzIeHohcsBmDEnIuJXv9IUwhSdZBkIgW6vlLdSR8J7CMYjxz0G4UElfketPYzFQRZ0J07x5p-f8wPDXTXHc_FZbw66z554DWIeYd-hE_W6qJb_scmPaCvUurl50LTJW3dIBZ_62EOQcQ9HRLHAcV8a2sTxMVsa7qqnEvhgKws2wkNatjeuY64vOVkW3BcCnZeodcmr6Km3hmaatk05GkM2qeUBWmsFTXtHcc2ZVDKPiVb-qq75rcu_CYkDwMFdJUPqOIKAFIIVrqIvrSKvj0o28m9DGs6lppC92DxIfq_uKoLBu2CMZl3il5BbXR38ZqGUnOZHmzl5olpnk7WsTklXm6j2St_EeyZ1ADtB1rFKFltw7-pxGR7rSJFukJpjAVmdSOwODEOyvbAfxTlWC-Pr6yBa_lIchbvThL3_9Yu9VvPSWsPctMLoOCJbTXki_x8a-jSovi_MDWmIyuR0lnQHHJcfVl43CBw6SI';
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public int $i;
    public function __construct($i)
    {
        $this->i = $i;
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $request = Http::withHeaders([
            'authorization' => $this->token,

        ])->post('https://hmail-core.hostinger.io/api/v1/emails/account?order_id=56839892&gaid=GA1.2.1933404978.1645289801', [
            'domain'=> "truongvandat.tk",
            'email' =>"admintest" .$this->i  ,
            'password'=>"Test123a@"
        ]);
    }
}
