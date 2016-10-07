<?php

namespace Ekkinox\SlimADR\Action;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Interop\Container\ContainerInterface;

/**
 * Class MyAction
 *
 * @package Ekkinox\SlimADR\Action
 */
class DashboardAction
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }

    /**
     * @param Request  $request
     * @param Response $response
     * @param array    $args
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $response->getBody()->write(
            sprintf('Hello %s', $args['name'] ?? 'visitor')
        );

        return $response;
    }
}
