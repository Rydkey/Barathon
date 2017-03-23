<?php
/**
 * Created by PhpStorm.
 * User: rydkey
 * Date: 16/01/17
 * Time: 15:55
 */

namespace Barathon\barBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="bar")
 */
class Bar{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $name;
    
    /**
     * @ORM\Column(type="string")
     */
    protected $ville;

    /**
     *
     * @ORM\ManyToOne(targetEntity="Barathon\utilisateursBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     **/
    protected $user_id;

    /**
     * @ORM\Column(type="text")
     */
    protected $description;

    /**
     * @ORM\ManyToMany(targetEntity="Barathon\barBundle\Entity\Category", cascade={"persist"})
     **/
    protected $category;

    /**
     * Get id
     *
     * @return integer
     */
    /**
     * @ORM\Column(type="string")
     */
    protected $imageFront;
    /**
     * @ORM\Column(type="string")
     */
    protected $imageCarousel1;
    /**
     * @ORM\Column(type="string")
     */
    protected $imageCarousel2;

    /**
     * @ORM\Column(type="string")
     */
    protected $imageCarousel3;
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Bar
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return Bar
     */
    public function setVille($ville)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return string
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set userId
     *
     * @param \Barathon\utilisateursBundle\Entity\User $userId
     *
     * @return Bar
     */
    public function setUserId(\Barathon\utilisateursBundle\Entity\User $userId = null)
    {
        $this->user_id = $userId;


        return $this;
    }

    /**
     * Get userId
     *
     * @return \Barathon\utilisateursBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add category
     *
     * @param \Barathon\barBundle\Entity\Category $category
     *
     * @return Bar
     */
    public function addCategory(\Barathon\barBundle\Entity\Category $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \Barathon\barBundle\Entity\Category $category
     */
    public function removeCategory(\Barathon\barBundle\Entity\Category $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Bar
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set imageFront
     *
     * @param string $imageFront
     *
     * @return Bar
     */
    public function setImageFront($imageFront)
    {
        $this->imageFront = $imageFront;

        return $this;
    }

    /**
     * Get imageFront
     *
     * @return string
     */
    public function getImageFront()
    {
        return $this->imageFront;
    }

    /**
     * Set imageCarousel1
     *
     * @param string $imageCarousel1
     *
     * @return Bar
     */
    public function setImageCarousel1($imageCarousel1)
    {
        $this->imageCarousel1 = $imageCarousel1;

        return $this;
    }

    /**
     * Get imageCarousel1
     *
     * @return string
     */
    public function getImageCarousel1()
    {
        return $this->imageCarousel1;
    }

    /**
     * Set imageCarousel2
     *
     * @param string $imageCarousel2
     *
     * @return Bar
     */
    public function setImageCarousel2($imageCarousel2)
    {
        $this->imageCarousel2 = $imageCarousel2;

        return $this;
    }

    /**
     * Get imageCarousel2
     *
     * @return string
     */
    public function getImageCarousel2()
    {
        return $this->imageCarousel2;
    }

    /**
     * Set imageCarousel3
     *
     * @param string $imageCarousel3
     *
     * @return Bar
     */
    public function setImageCarousel3($imageCarousel3)
    {
        $this->imageCarousel3 = $imageCarousel3;

        return $this;
    }

    /**
     * Get imageCarousel3
     *
     * @return string
     */
    public function getImageCarousel3()
    {
        return $this->imageCarousel3;
    }
    public function __toString(){
        return $this->getName();
    }
}
