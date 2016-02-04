<?php
namespace PollBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="QuestionRepository")
 * @ORM\Table(name="question")
 */
class Question
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public  $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    protected $question;


    /**
     * @ORM\ManyToOne(targetEntity="Test", inversedBy="questions")
     */
    protected $test;


    /**
     * @ORM\OneToMany(targetEntity="Answer", mappedBy="question", cascade={"all"}, orphanRemoval=true)
     */
    protected $answers;

    public function __construct()
    {
        $this->answers = new ArrayCollection();
    }

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    protected $type = false;

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
     * @return Question
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
     * Set question
     *
     * @param string $question
     * @return Question
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
     * @param boolean $type
     * @return Question
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return boolean 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return Question
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
     * @param \PollBundle\Entity\Answer $answers
     * @return Question
     */
    public function addAnswer(\PollBundle\Entity\Answer $answers)
    {
        $this->answers[] = $answers;

        return $this;
    }

    /**
     * Remove answers
     *
     * @param \PollBundle\Entity\Answer $answers
     */
    public function removeAnswer(\PollBundle\Entity\Answer $answers)
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

    /**
     * Set test
     *
     * @param \PollBundle\Entity\Test $test
     * @return Question
     */
    public function setTest(\PollBundle\Entity\Test $test = null)
    {
        $this->test = $test;

        return $this;
    }

    /**
     * Get test
     *
     * @return \PollBundle\Entity\Test 
     */
    public function getTest()
    {
        return $this->test;
    }

    public function __toString()
    {
        return strval($this->id);
    }
}
