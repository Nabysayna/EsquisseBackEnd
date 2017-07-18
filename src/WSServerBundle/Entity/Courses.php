<?php

namespace WSServerBundle\Entity;

/**
 * Courses
 */
class Courses
{
    /**
     * @var integer
     */
    private $idCoursier;

    /**
     * @var integer
     */
    private $idCmd;

    /**
     * @var \DateTime
     */
    private $dateCourse;

    /**
     * @var integer
     */
    private $etat;

    /**
     * @var integer
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
