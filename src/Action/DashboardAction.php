<?php

namespace Ekkinox\SlimADR\Action;

use Ekkinox\SlimADR\Manager\User\UserManager;
use Ekkinox\SlimADR\Responder\Dashboard\DashboardResponder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

/**
 * Class MyAction
 *
 * @package Ekkinox\SlimADR\Action
 */
class DashboardAction
{
    /**
     * @var DashboardResponder
     */
    protected $responder;

    /**
     * @var UserManager
     */
    protected $manager;

    /**
     * @param DashboardResponder $responder
     * @param UserManager        $manager
     */
    public function __construct(DashboardResponder $responder, UserManager $manager)
    {
        $this->responder = $responder;
        $this->manager   = $manager;
    }

    /**
     * @param Request  $request
     * @param Response $response
     * @param string   $name
     *
     * @return Response
     */
    public function __invoke(Request $request, Response $response, $name = null): Response
    {
        return $this->responder->render(
            $response,
            [
                'name'  => $name ?? 'visitor',
                'users' => $this->manager->findAll()
            ]
        );
    }
}
