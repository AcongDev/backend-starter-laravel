<?php

namespace App\Services\Traits;
trait ResponseTrait
{

    public function response($data, $status = 'success', $statusCode = 200, $additionalData = [])
    {
        $response = (object) [
            'status' => $status
        ];

        switch ($status) {
            case 'error':
            case 'failed':
                $response->message = $data;
                break;
            default:
                $response->data = $data;
                break;
        }

        if (is_string($data) && isset($response->data)) {
            unset($response->data);
            $response->message = $data;
        }
        if (!empty($additionalData)) {
            $response->additional_data = $additionalData;
        }

        return response()->json($response, $statusCode);
    }


}