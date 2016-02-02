<?php
namespace PollBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection as ArrayCollection;

/**
 * @ORM\Entity(repositoryClass="TestsRepository")
 * @ORM\Table(name="test")
 */
class Test
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    protected $test_name;

    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="test",  cascade={"all"}, orphanRemoval=true)
     */
    protected $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
    }

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
     * Set test_name
     *
     * @param string $testName
     * @return Test
     */
    public function setTestName($testName)
    {
        $this->test_name = $testName;

        return $this;
    }

    /**
     * Get test_name
     *
     * @return string 
     */
    public function getTestName()
    {
        return $this->test_name;
    }

    /**
     * Set published
     *
     * @param boolean $published
     * @return Test
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
     * Add questions
     *
     * @param \PollBundle\Entity\Question $questions
     * @return Test
     */
    public function addQuestion(\PollBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param \PollBundle\Entity\Question $questions
     */
    public function removeQuestion(\PollBundle\Entity\Question $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    public function __toString()
    {
        return strval($this->id);
    }
}
