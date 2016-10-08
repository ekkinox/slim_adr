<?php

namespace Ekkinox\SlimADR\Responder;

use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\Twig;

/**
 * Class AbstractTwigResponder
 *
 * @package Ekkinox\SlimADR\Responder
 */
abstract class AbstractTwigResponder
{
    /**
     * @var Twig
     */
    protected $twig;

    /**
     * @param Twig $twig
     */
    public function __construct(Twig $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param Response $response
     * @param array    $params
     *
     * @return Response
     */
    public function render(Response $response, array $params): Response
    {
        return $this->twig->render($response, $this->getTemplate(), $params);
    }

    /**
     * @return string
     */
    abstract protected function getTemplate(): string;
}
