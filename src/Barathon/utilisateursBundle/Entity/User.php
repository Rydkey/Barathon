<?php
/**
 * Created by PhpStorm.
 * User: rydkey
 * Date: 14/01/17
 * Time: 17:01
 */

namespace Barathon\utilisateursBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Entrez un nom s'il vous plait", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="Le nom est trop court",
     *     maxMessage="Le nom est trop long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $nom;

    /**
     * @ORM\Column(type="string", length=255)
     *
     * @Assert\NotBlank(message="Entrez un prénom s'il vous plait", groups={"Registration", "Profile"})
     * @Assert\Length(
     *     min=3,
     *     max=255,
     *     minMessage="Le prenom est trop court",
     *     maxMessage="Le prenom est trop long.",
     *     groups={"Registration", "Profile"}
     * )
     */
    protected $prenom;
   
    /**
     * @ORM\Column(type="string")
     */
    protected $pays;

    /**
     * @ORM\Column(type="string")
     */
    protected $ville;

    /**
     * @ORM\Column(type="integer")
     */
    protected $age;

    /**
     * @ORM\OneToOne(targetEntity="Barathon\barBundle\Entity\Bar")
     * @ORM\JoinColumn(name="bar_id", referencedColumnName="id", nullable=true)
     **/
    protected $bar_id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return User
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set ville
     *
     * @param string $ville
     *
     * @return User
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
     * Set age
     *
     * @param integer $age
     *
     * @return User
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set barId
     *
     * @param \Barathon\utilisateursBundle\Entity\Bar $barId
     *
     * @return User
     */
    public function setBarId(\Barathon\utilisateursBundle\Entity\Bar $barId = null)
    {
        $this->bar_id = $barId;

        return $this;
    }

    /**
     * Get barId
     *
     * @return \Barathon\utilisateursBundle\Entity\Bar
     */
    public function getBarId()
    {
        return $this->bar_id;
    }
}
