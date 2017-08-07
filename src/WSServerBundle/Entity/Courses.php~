<?php

namespace WSServerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Courses
 *
 * @ORM\Table(name="courses")
 * @ORM\Entity
 */
class Courses
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id_coursier", type="integer", nullable=false)
     */
    private $idCoursier;

    /**
     * @var integer
     *
     * @ORM\Column(name="id_cmd", type="integer", nullable=false)
     */
    private $idCmd;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_course", type="datetime", nullable=false)
     */
    private $dateCourse;

    /**
     * @var integer
     *
     * @ORM\Column(name="etat", type="integer", nullable=false)
     */
    private $etat;

    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;



    /**
     * Set idCoursier
     *
     * @param integer $idCoursier
     *
     * @return Courses
     */
    public function setIdCoursier($idCoursier)
    {
        $this->idCoursier = $idCoursier;

        return $this;
    }

    /**
     * Get idCoursier
     *
     * @return integer
     */
    public function getIdCoursier()
    {
        return $this->idCoursier;
    }

    /**
     * Set idCmd
     *
     * @param integer $idCmd
     *
     * @return Courses
     */
    public function setIdCmd($idCmd)
    {
        $this->idCmd = $idCmd;

        return $this;
    }

    /**
     * Get idCmd
     *
     * @return integer
     */
    public function getIdCmd()
    {
        return $this->idCmd;
    }

    /**
     * Set dateCourse
     *
     * @param \DateTime $dateCourse
     *
     * @return Courses
     */
    public function setDateCourse($dateCourse)
    {
        $this->dateCourse = $dateCourse;

        return $this;
    }

    /**
     * Get dateCourse
     *
     * @return \DateTime
     */
    public function getDateCourse()
    {
        return $this->dateCourse;
    }

    /**
     * Set etat
     *
     * @param integer $etat
     *
     * @return Courses
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return integer
     */
    public function getEtat()
    {
        return $this->etat;
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
