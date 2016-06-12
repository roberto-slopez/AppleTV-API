<?php

namespace TS\API\CoreBundle\Entity;

use FOS\OAuthServerBundle\Entity\RefreshToken as BaseRefreshToken;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
* @ORM\Entity
*/
class RefreshToken extends BaseRefreshToken
{
    use ORMBehaviors\Timestampable\Timestampable;

    /**
    * @ORM\Column(type="guid")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="UUID")
    */
    protected $id;

    /**
    * @ORM\ManyToOne(targetEntity="Client")
    * @ORM\JoinColumn(nullable=false)
    */
    protected $client;

    /**
    * @ORM\ManyToOne(targetEntity="User")
    */
    protected $user;
}
