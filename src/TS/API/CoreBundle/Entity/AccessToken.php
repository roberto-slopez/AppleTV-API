<?php

namespace TS\API\CoreBundle\Entity;

use FOS\OAuthServerBundle\Entity\AccessToken as BaseAccessToken;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
* @ORM\Entity
*/
class AccessToken extends BaseAccessToken
{
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
