<?php
namespace PollBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="QuestionsRepository")
 * @ORM\Table(name="questions")
 */
class Questions
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
    protected $test_id;


    /**
     * @ORM\ManyToOne(targetEntity="Tests", inversedBy="questions")
     * @ORM\JoinColumn(name="test_id", referencedColumnName="id")
     * @ORM\Column(type="string", length=255)
     */
    protected $question;

    /**
     * @ORM\OneToMany(targetEntity="Answers", mappedBy="questions", cascade={"all"}, orphanRemoval=true )
     */
    protected $answers;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $type;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $published = false;





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
     * Set test_id
     *
     * @param integer $testId
     * @return Questions
     */
    public function setTestId($testId)
    {
        $this->test_id = $testId;

        return $this;
    }

    /**
     * Get test_id
     *
     * @return integer 
     */
    public function getTestId()
    {
        return $this->test_id;
    }

    /**
     * Set question_id
     *
     * @param integer $questionId
     * @return Questions
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
     * Set question
     *
     * @param string $question
     * @return Questions
     */
    public function setQuestion($question)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return string 
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Questions
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return Questions
     */
    public function setPublished($published)
    {
        $this->published = $published;

        return $this;
    }

    /**
     * Get published
     *
     * @return boolean 
     */
    public function getPublished()
    {
        return $this->published;
    }

    /**
     * Add answers
     *
     * @param \PollBundle\Entity\Answers $answers
     * @return Questions
     */
    public function addAnswer(\PollBundle\Entity\Answers $answers)
    {
        $this->answers[] = $answers;

        return $this;
    }

    /**
     * Remove answers
     *
     * @param \PollBundle\Entity\Answers $answers
     */
    public function removeAnswer(\PollBundle\Entity\Answers $answers)
    {
        $this->answers->removeElement($answers);
    }

    /**
     * Get answers
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAnswers()
    {
        return $this->answers;
    }
}
