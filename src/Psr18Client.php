<?php

namespace Gpn273\LaravelPsr18HttpBridge;

use Closure;
use Illuminate\Http\Client\PendingRequest;
use Illuminate\Support\Facades\Http;
use Psr\Http\Client\ClientInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class Psr18Client implements ClientInterface
{
    /**
     * @var Closure(): PendingRequest
     */
    private readonly Closure $callable;

    /**
     * @param Closure(): PendingRequest|null $callable
     */
    public function __construct(?Closure $callable = null)
    {
        $this->callable = $callable ?? static fn (): PendingRequest => Http::withOptions([]);
    }

    public function sendRequest(RequestInterface $request): ResponseInterface
    {
        $http = ($this->callable)();

        $body = $request->getBody();

        if ($body->isSeekable()) {
            $body->seek(0);
        }

        $options = [
            'body' => $request->getBody()
        ];

        if ($request->getProtocolVersion() === '1.0') {
            $options['http_version'] = '1.0';
        }

        $http
            ->withHeaders($request->getHeaders())
            ->send($request->getMethod(), (string) $request->getUri(), $options)
            ->toPsrResponse()
        ;
    }
}