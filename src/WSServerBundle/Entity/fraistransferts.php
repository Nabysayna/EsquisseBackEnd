<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * fraistransferts
 *
 * @ORM\Table(name="fraistransferts")
 * @ORM\Entity(repositoryClass="WSServerBundle\Repository\fraistransfertsRepository")
 */
class fraistransferts
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

