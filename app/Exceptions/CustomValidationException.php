<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;

class CustomValidationException extends ValidationException
{
    public function render(Request $request): JsonResponse
    {
        return new JsonResponse([
            'errors' => $this->validator->errors()->getMessages(),
        ], Response::HTTP_UNPROCESSABLE_ENTITY);
    }
}