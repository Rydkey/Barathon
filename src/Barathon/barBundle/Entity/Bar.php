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
     * Get id
     *
     * @return integer
     */
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
}
