<?php

namespace App\Http\Controllers;

use App\Utils\ResponseUtil;
use http\Message;
use Response;

/**
 * This class should be parent class for other API controllers
 * Class AppBaseController
 */
class AppBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        return Response::json(ResponseUtil::makeResponse($message, $result));
    }

    public function sendError($error, $code = 404)
    {
        return Response::json(ResponseUtil::makeError($error), $code);
    }
    public function sendValidate($error, $code = 422)
    {
        return Response::json($error, $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'message' => $message
        ], 200);
    }

    public function try($callback)
    {
        try {
            return $callback();
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 400);
        }
    }

}
