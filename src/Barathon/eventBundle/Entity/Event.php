<?php
/**
 * Created by PhpStorm.
 * User: rydkey
 * Date: 16/01/17
 * Time: 15:55
 */

namespace Barathon\eventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="myEventRepository")
 * @ORM\Table(name="event")
 */

class Event
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $libelle_event;

    /**
     * @ORM\Column(type="date")
     */
    protected $date_event;

    /**
     * @ORM\Column(type="time")
     */
    protected $heureDebut;

    /**
     * @ORM\Column(type="time")
     */
    protected $heureFin;

    /**
     * @ORM\Column(type="text")
     */
    protected $descrition_event;

    /**
     * @ORM\ManyToOne(targetEntity="Barathon\barBundle\Entity\Bar", cascade={"persist"})
     **/
    protected $bar_id;

    /**
     * @ORM\ManyToOne(targetEntity="Barathon\utilisateursBundle\Entity\User", cascade={"persist"})
     **/
    protected $user_id;
    /**
     * @ORM\Column(type="string")
     */
    protected $nameImage;

    private $file;


    public function __construct()
    {
        $this->date_event = new \DateTime();
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
     * Set libelleEvent
     *
     * @param string $libelleEvent
     *
     * @return Event
     */
    public function setLibelleEvent($libelleEvent)
    {
        $this->libelle_event = $libelleEvent;

        return $this;
    }

    /**
     * Get libelleEvent
     *
     * @return string
     */
    public function getLibelleEvent()
    {
        return $this->libelle_event;
    }

    /**
     * Set dateEvent
     *
     * @param \DateTime $dateEvent
     *
     * @return Event
     */
    public function setDateEvent($dateEvent)
    {
        $this->date_event = $dateEvent;

        return $this;
    }

    /**
     * Get dateEvent
     *
     * @return \DateTime
     */
    public function getDateEvent()
    {
        return $this->date_event;
    }

    /**
     * Set barId
     *
     * @param \Barathon\barBundle\Entity\Bar $barId
     *
     * @return Event
     */
    public function setBarId(\Barathon\barBundle\Entity\Bar $barId = null)
    {
        $this->bar_id = $barId;

        return $this;
    }

    /**
     * Get barId
     *
     * @return \Barathon\barBundle\Entity\Bar
     */
    public function getBarId()
    {
        return $this->bar_id;
    }

    /**
     * Set userId
     *
     * @param \Barathon\utilisateursBundle\Entity\User $userId
     *
     * @return Event
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
     * Set descritionEvent
     *
     * @param string $descritionEvent
     *
     * @return Event
     */
    public function setDescritionEvent($descritionEvent)
    {
        $this->descrition_event = $descritionEvent;

        return $this;
    }

    /**
     * Get descritionEvent
     *
     * @return string
     */
    public function getDescritionEvent()
    {
        return $this->descrition_event;
    }

    /**
     * Get Ville
     *
     * @return string
     */
    public function getVille(){
        return $this->getBarId()->getVille();
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
        $this->file = $file;
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
        return $this->getUploadDir().''.$this->nameImage;
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
     * @return mixed
     */
    public function getHeureDebut()
    {
        return $this->heureDebut;
    }

    /**
     * @param mixed $heureDebut
     */
    public function setHeureDebut($heureDebut)
    {
        $this->heureDebut = $heureDebut;
    }

    /**
     * @return mixed
     */
    public function getHeureFin()
    {
        return $this->heureFin;
    }

    /**
     * @param mixed $heureFin
     */
    public function setHeureFin($heureFin)
    {
        $this->heureFin = $heureFin;


    }


}
