<?php
namespace PollBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="AnswersRepository")
 * @ORM\Table(name="answers")
 */
class Answers
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="integer")
     */
    protected $question_id;
    /**
     * @ORM\ManyToOne(targetEntity="Questions", inversedBy="answers")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     * @ORM\Column(type="string", length=255)
     */
    protected $answer;


    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $correct = false;



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
     * Set question_id
     *
     * @param integer $questionId
     * @return Answers
     */
    public function setQuestionId($questionId)
    {
        $this->question_id = $questionId;

        return $this;
    }

    /**
     * Get question_id
     *
     * @return integer 
     */
    public function getQuestionId()
    {
        return $this->question_id;
    }

    /**
     * Set answer
     *
     * @param string $answer
     * @return Answers
     */
    public function setAnswer($answer)
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get answer
     *
     * @return string 
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set correct
     *
     * @param boolean $correct
     * @return Answers
     */
    public function setCorrect($correct)
    {
        $this->correct = $correct;

        return $this;
    }

    /**
     * Get correct
     *
     * @return boolean 
     */
    public function getCorrect()
    {
        return $this->correct;
    }
}
