<?php

namespace App\Http\Controllers\API;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Routing\Controller as BaseController;
use Symfony\Component\HttpFoundation\Response;

class BaseApiController extends BaseController
{
    use AuthorizesRequests;
    use ValidatesRequests;

    private array $response = [];

    private int $statusCode = Response::HTTP_OK;

    public function addToResponse(array $data): static
    {
        $this->response += $data;

        return $this;
    }

    public function addSuccessMessageToResponse(string $message): static
    {
        $this->response += [
            'message' => $message,
        ];

        return $this;
    }

    public function fromResource(JsonResource $resource): self
    {
        $this->addToResponse([$resource::$wrap => $resource]);
        if ($resource->resource instanceof LengthAwarePaginator) {

            $this->addToResponse($this->getPaginationResponse($resource->resource));
        }

        return $this;
    }

    public function setStatusCode(int $statusCode): self
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    public function getPaginationResponse(LengthAwarePaginator $resource): array
    {
        return [
            'meta' => [
                'total_items' => $resource->total(),
                'items_per_page' => $resource->perPage(),
                'current_page' => $resource->currentPage(),
                'last_page' => $resource->lastPage(),
            ],
        ];
    }

    public function toResponse(): JsonResponse
    {
        return response()->json($this->response, $this->statusCode);
    }
}
