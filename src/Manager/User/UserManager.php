<?php

namespace Ekkinox\SlimADR\Manager\User;

use Ekkinox\SlimADR\Manager\AbstractManager;
use Ekkinox\SlimADR\Entity\User;

/**
 * Class UserManager
 */
class UserManager extends AbstractManager
{
    /**
     * {@inheritdoc}
     */
    public function getEntity(): string
    {
        return User::class;
    }
}
