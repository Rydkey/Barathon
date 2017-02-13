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
    protected $bar_id;

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
     * Get bar_id
     *
     * @return integer
     */
    public function getbarId()
    {
        return $this->bar_id;
    }

    /**
     * Get bar_id
     *
     * @return integer
     */
    public function getbar_Id()
    {
        return $this->bar_id;
    }
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->bar_id;
    }

    /**
     * Get user_id
     *
     * @return \Barathon\utilisateursBundle\Entity\User
     */
    public function getuserId()
    {
        return $this->user_id;
    }

    /**
     * Set user_id
     *
     * @param \Barathon\utilisateursBundle\Entity\User $user_id
     *
     * @return Bar
     */
    public function setUserId(\Barathon\utilisateursBundle\Entity\User $user_id = null)
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function __toString()
    {
        // TODO: Implement __toString() method.
        return $this->getName();
    }
}
