<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Grade
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Entity\GradeRepository")
 */
class Grade
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    /**
    *@var Student
    * Ici nous avons "l'autre côté" - on rajoute bien "inversedBy"
    *@ORM\ManyToOne(targetEntity="AppBundle\Entity\Student", inversedBy="grades")
    */
    private $student;
    /**
     * @var integer
     *
     * @ORM\Column(name="value", type="integer")
     */
    private $value;
    /**
    *@var Exam
    * Ici nous avons "l'autre côté" - on rajoute bien "inversedBy"
    *@ORM\ManyToOne(targetEntity="AppBundle\Entity\Exam", inversedBy="grades")
    */
    private $exam;

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set value
     *
     * @param integer $value
     *
     * @return Grade
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return integer
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set student
     *
     * @param \AppBundle\Entity\AppBundle\Student $student
     *
     * @return Grade
     */
    public function setStudent($student = null)
    {
        $this->student = $student;

        return $this;
    }

    /**
     * Get student
     *
     * @return \AppBundle\Entity\AppBundle:Student
     */
    public function getStudent()
    {
        return $this->student;
    }

    /**
     * Set exam
     *
     * @param \AppBundle\Entity\Exam $exam
     *
     * @return Grade
     */
    public function setExam(\AppBundle\Entity\Exam $exam = null)
    {
        $this->exam = $exam;

        return $this;
    }

    /**
     * Get exam
     *
     * @return \AppBundle\Entity\Exam
     */
    public function getExam()
    {
        return $this->exam;
    }

}
