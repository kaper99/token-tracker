<?php

namespace App\Requests;

interface ExternalRequest
{
    public function getMethod(): string;

    public function getPath(): string;

    public function getBody(): array;

    public function getHeaders(): array;
}
