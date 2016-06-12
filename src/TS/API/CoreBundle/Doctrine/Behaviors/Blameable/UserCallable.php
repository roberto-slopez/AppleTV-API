<?php

namespace TS\API\CoreBundle\Doctrine\Behaviors\Blameable;

use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\Security\Core\User\User;

/**
 * UserCallable can be invoked to return a blameable user
 */
class UserCallable
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @param callable
     * @param string $userEntity
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function __invoke()
    {
        $token = $this->container->get('security.token_storage')->getToken();

        if (null !== $token) {
            return $token->getUser();
        }
    }
}
