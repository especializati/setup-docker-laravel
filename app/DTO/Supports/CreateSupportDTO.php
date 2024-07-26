<?php

namespace App\DTO\Supports;

use App\Enums\SupportStatus;
use App\Http\Requests\StoreUpdateSupport;
use Illuminate\Contracts\Database\Eloquent\SupportsPartialRelations;

class CreateSupportDTO
{
    public function __construct(
        public string $subject,
        public SupportStatus $status,
        public string $body,
    ){}

    public static function makeFromRequest(StoreUpdateSupport $request): self 
    {
        return new self(
            $request ->subject,
            SupportStatus::A,
            $request ->body,
        );
    }
}