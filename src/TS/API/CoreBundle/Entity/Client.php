<?php

namespace TS\API\CoreBundle\Entity;

use FOS\OAuthServerBundle\Entity\Client as BaseClient;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;

/**
* @ORM\Entity
*/
class Client extends BaseClient
{
    use ORMBehaviors\Timestampable\Timestampable;

    /**
    * @ORM\Column(type="guid")
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="UUID")
    */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}
