<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tmpcommande
 *
 * @ORM\Table(name="tmpcommande")
 * @ORM\Entity
 */
class Tmpcommande
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_article", type="integer", nullable=false)
     */
    private $idArticle;

    /**
     * @var string
     *
     * @ORM\Column(name="designation", type="string", length=30, nullable=false)
     */
    private $designation;

    /**
     * @var integer
     *
     * @ORM\Column(name="qte", type="integer", nullable=false)
     */
    private $qte;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_commande", type="datetime", nullable=false)
     */
    private $dateCommande;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_client", type="integer", nullable=false)
     */
    private $idClient;

    /**
     * @var string
     *
     * @ORM\Column(name="code_commande", type="string", length=20, nullable=false)
     */
    private $codeCommande;

    /**
     * @var string
     *
     * @ORM\Column(name="telclient", type="string", length=50, nullable=false)
     */
    private $telclient;

    /**
     * @var string
     *
     * @ORM\Column(name="prenomclient", type="string", length=50, nullable=false)
     */
    private $prenomclient;

    /**
     * @var string
     *
     * @ORM\Column(name="nomclient", type="string", length=50, nullable=false)
     */
    private $nomclient;

    /**
     * @var integer
     *
     * @ORM\Column(name="mntcmd", type="integer", nullable=false)
     */
    private $mntcmd;

    /**
     * @var integer
     *
     * @ORM\Column(name="pourvoyeur", type="integer", nullable=false)
     */
    private $pourvoyeur;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



}
