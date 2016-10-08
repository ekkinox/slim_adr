<?php

namespace Ekkinox\SlimADR\Responder\Dashboard;

use Ekkinox\SlimADR\Responder\AbstractTwigResponder;

/**
 * Class DashboardResponder
 *
 * @package Ekkinox\SlimADR\Responder\Dashboard
 */
class DashboardResponder extends AbstractTwigResponder
{
    /**
     * @@inheritdoc
     */
    protected function getTemplate(): string
    {
        return 'dashboard.html.twig';
    }
}
