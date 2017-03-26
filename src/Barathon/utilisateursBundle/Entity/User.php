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
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
     * @ORM\Column(type="date")
     */
    protected $anniversaire;

    /**
     * @ORM\ManyToMany(targetEntity="Barathon\eventBundle\Entity\Event", cascade={"persist"})
     */
    protected $events;

    /**
     * @ORM\Column(type="string")
     */
    protected $nameImage;

    private $file;


    public function __construct()
    {
        parent::__construct();
        $this->anniversaire = new \DateTime();
        $this->nameImage='default_profil_pic.png';
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
     * Add event
     *
     * @param \Barathon\eventBundle\Entity\Event $event
     *
     * @return User
     */
    public function addEvent(\Barathon\eventBundle\Entity\Event $event)
    {
        $this->events[] = $event;

        return $this;
    }

    /**
     * Remove event
     *
     * @param \Barathon\eventBundle\Entity\Event $event
     */
    public function removeEvent(\Barathon\eventBundle\Entity\Event $event)
    {
        $this->events->removeElement($event);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEvents()
    {
        return $this->events;
    }


    /**
     * @return mixed
     */
    public function getNameImage()
    {
        return $this->nameImage;
    }

    /**
     * @param mixed $nameImage
     */
    public function setNameImage($nameImage)
    {
        $this->nameImage = $nameImage;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile(UploadedFile $file)
    {
        if (!isset($this->file)){
            $this->file = $file;
        }
        if (isset($this->file) && $file==null){
            return $this->getFile();
        }
    }

    public function getUploadDir()
    {
        return 'uploads/images';
    }
    public function getAbsolutPath()
    {
        return $this->getUploadRoot().$this->nameImage;
    }
    public function getWebPath(){
        return $this->getUploadDir().'/'.$this->nameImage;
    }
    public function getUploadRoot()
    {
        return __DIR__ .'/../../../../web/' .$this->getUploadDir() .'/';
    }
    public function upload()
    {
        if ($this->file === null){
            return;
        }
        $this->nameImage = $this ->file->getClientOriginalName();
        // if(!is_dir($this->getUploadRoot())){
        //   mkdir($this->getUploadRoot(),'0777',true);
        //}
        $this->file->move($this->getUploadRoot(),$this->nameImage);
        unset($this->file);

    }


    /**
     * Set anniversaire
     *
     * @param \DateTime $anniversaire
     *
     * @return User
     */
    public function setAnniversaire($anniversaire)
    {
        $this->anniversaire = $anniversaire;

        return $this;
    }

    /**
     * Get anniversaire
     *
     * @return \DateTime
     */
    public function getAnniversaire()
    {
        return $this->anniversaire;
    }
}
