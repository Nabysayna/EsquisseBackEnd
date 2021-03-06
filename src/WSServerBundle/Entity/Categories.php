<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity
 */
class Categories
{
    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=225, nullable=false)
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="detailCategorie", type="string", length=225, nullable=false)
     */
    private $detailcategorie;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Categories
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set detailcategorie
     *
     * @param string $detailcategorie
     *
     * @return Categories
     */
    public function setDetailcategorie($detailcategorie)
    {
        $this->detailcategorie = $detailcategorie;

        return $this;
    }

    /**
     * Get detailcategorie
     *
     * @return string
     */
    public function getDetailcategorie()
    {
        return $this->detailcategorie;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}
