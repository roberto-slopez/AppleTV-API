<?php

namespace TS\API\CoreBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Knp\DoctrineBehaviors\Model as ORMBehaviors;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    use ORMBehaviors\Timestampable\Timestampable;

    /**
     * @ORM\Column(type="guid")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     * @var string
     */
    protected $fullname;

    /**
     * Set id
     *
     * @param string $id
     * @return User
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getFullname()
    {
        return $this->fullname;
    }

    /**
     * @param string $fullname
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;
    }

    /**
     *
     * @return string [description]
     */
    public function __toString()
    {
        return (string)$this->getId();
    }
}
