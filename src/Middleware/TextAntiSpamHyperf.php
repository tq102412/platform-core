<?php


namespace Ineplant\Middleware;


use Hyperf\HttpServer\Contract\RequestInterface;
use Hyperf\HttpServer\Contract\ResponseInterface as HttpResponse;
use Ineplant\Rpc\Platform;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class TextAntiSpamHyperf implements MiddlewareInterface {
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @var RequestInterface
     */
    protected $request;

    /**
     * @var HttpResponse
     */
    protected $response;

    public function __construct(ContainerInterface $container, HttpResponse $response, RequestInterface $request) {
        $this->container = $container;
        $this->response  = $response;
        $this->request   = $request;
    }

    /**
     * 文本垃圾检测
     *
     * @param ServerRequestInterface $request
     * @param RequestHandlerInterface $handler
     * @return ResponseInterface
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws \Ineplant\Exceptions\ErrCodeException
     * @throws \Ineplant\Exceptions\ReturnException
     */
    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface {
        if ('POST' == $this->request->getMethod()) {
            Platform::textAntiSpam((string)$this->request->getBody());
        }
        return $handler->handle($request);
    }
}