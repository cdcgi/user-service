<?php

namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Throwable;
use Cake\Http\Response;

class ApiMiddleware
{
    protected function notFoundException(Throwable $exception, ServerRequestInterface $request): ResponseInterface    
    {
        $response = $this->getResponse();
        $json =  ["status_code" => "cdc-002", "status_message" => "ops! internal server error", "data"=> null];
        try {
            $json["status_code"] = "cdc-001";
            $json["status_message"] = $exception->getMessage();
            $response = $response->withStatus(404);
        } catch (Throwable $internalException) {
                $response = $response->withStatus(500);
            }
        return $response->withStringBody(json_encode($json));
    }

    protected function recordNotFoundException(Throwable $exception, ServerRequestInterface $request): ResponseInterface    
    {
        $response = $this->getResponse();
        $json =  ["status_code" => "cdc-002", "status_message" => "ops! internal server error", "data"=> null];
        try {
            $json["status_code"] = "cdc-0011";
            $json["status_message"] = $exception->getMessage();
            $response = $response->withStatus(404);
        } catch (Throwable $internalException) {
                $response = $response->withStatus(500);
            }
        return $response->withStringBody(json_encode($json));
    }

    protected function notAuthException(Throwable $exception, ServerRequestInterface $request): ResponseInterface   
    {
        $response = $this->getResponse();
        $json =  ["status_code" => "cdc-002", "status_message" => "ops! internal server error", "data"=> null];
        try {
            $json["status_code"] = "cdc-0011";
            $json["status_message"] = $exception->getMessage();
            $response = $response->withStatus(401);
        } catch (Throwable $internalException) {
            $response = $response->withStatus(500);
        }
        return $response->withStringBody(json_encode($json));
    }

    protected function getResponse() : Response
    {
        $response = (new Response)->withType('application/json');
        $response = $response->withHeader('Access-Control-Allow-Origin','*');
        $response = $response->withHeader('Access-Control-Allow-Methods','DELETE, POST, GET, OPTIONS, PUT');
        $response = $response->withHeader('Access-Control-Allow-Headers','Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, X-Token, Token, Imei, Cache-Control, Pragma, Expires');
        $response = $response->withHeader('Content-Type', 'application/json; charset=utf-8');
	
        return $response;
    }

}
