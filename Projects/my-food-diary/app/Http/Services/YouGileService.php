<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Http;

class YouGileService
{
    private string $token;
    private string $url;

    public function __construct(string $token, string $url)
    {
        $this->token = $token;
        $this->url = $url;
    }

    public function getTasks()
    {
        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url . "/tasks");

        return $response->json();
    }

    public function createSupportMessage(int $userId, string $columnId, string $msg)
    {
        $data = [
            "title" => "UserID: $userId",
            "columnId" => "$columnId",
            "description" => "$msg",
            "archived" => false,
            "completed" => false,
            "deadline" => [
                "deadline" => 1653029146646,
                "startDate" => 1653028146646,
                "withTime" => true
            ],
            "checklists" => [
                [
                    "title" => "list 1",
                    "items" => [
                        [
                            "title" => "option 1",
                            "isCompleted" => false
                        ],
                        [
                            "title" => "option 2",
                            "isCompleted" => false
                        ]
                    ]
                ]
            ]
        ];

        $response = Http::withHeaders([
            'Authorization' => "Bearer " . $this->token,
            'Content-Type' => 'application/json',
        ])->post($this->url . "/tasks", $data);

        return $response->json();
    }

}
