<?php
/**
 * Created by PhpStorm.
 * User: rydkey
 * Date: 16/01/17
 * Time: 15:55
 */

namespace Barathon\eventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
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
    protected $image;
    /**
     * @ORM\Column(type="string")
     * @ORM\ManyToMany(targetEntity="Barathon\barBundle\Entity\HoraireEvent", cascade={"persist"})

     */
    protected $lundiEvent;
    /**
     * @ORM\Column(type="string")
     * @ORM\ManyToMany(targetEntity="Barathon\barBundle\Entity\HoraireEvent", cascade={"persist"})

     */
    protected $mardiEvent;
    /**
     * @ORM\Column(type="string")
     */
    protected $mercrediEvent;
    /**
     * @ORM\Column(type="string")
     * @ORM\ManyToMany(targetEntity="Barathon\barBundle\Entity\HoraireEvent", cascade={"persist"})
     */
    protected $jeudiEvent;
    /**
     * @ORM\Column(type="string")
     * @ORM\ManyToMany(targetEntity="Barathon\barBundle\Entity\HoraireEvent", cascade={"persist"})
     */
    protected $vendrediEvent;
    /**
     * @ORM\Column(type="string")
     * @ORM\ManyToMany(targetEntity="Barathon\barBundle\Entity\HoraireEvent", cascade={"persist"})
     */
    protected $samediEvent;
    /**
     * @ORM\Column(type="string")
     * @ORM\ManyToMany(targetEntity="Barathon\barBundle\Entity\HoraireEvent", cascade={"persist"})
     */
    protected $dimancheEvent;


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
     * Set image
     *
     * @param string $image
     *
     * @return Event
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
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
     * Set lundiEvent
     *
     * @param string $lundiEvent
     *
     * @return Event
     */
    public function setLundiEvent($lundiEvent)
    {
        $this->lundiEvent = $lundiEvent;

        return $this;
    }

    /**
     * Get lundiEvent
     *
     * @return string
     */
    public function getLundiEvent()
    {
        return $this->lundiEvent;
    }

    /**
     * Set mardiEvent
     *
     * @param string $mardiEvent
     *
     * @return Event
     */
    public function setMardiEvent($mardiEvent)
    {
        $this->mardiEvent = $mardiEvent;

        return $this;
    }

    /**
     * Get mardiEvent
     *
     * @return string
     */
    public function getMardiEvent()
    {
        return $this->mardiEvent;
    }

    /**
     * Set mercrediEvent
     *
     * @param string $mercrediEvent
     *
     * @return Event
     */
    public function setMercrediEvent($mercrediEvent)
    {
        $this->mercrediEvent = $mercrediEvent;

        return $this;
    }

    /**
     * Get mercrediEvent
     *
     * @return string
     */
    public function getMercrediEvent()
    {
        return $this->mercrediEvent;
    }

    /**
     * Set jeudiEvent
     *
     * @param string $jeudiEvent
     *
     * @return Event
     */
    public function setJeudiEvent($jeudiEvent)
    {
        $this->jeudiEvent = $jeudiEvent;

        return $this;
    }

    /**
     * Get jeudiEvent
     *
     * @return string
     */
    public function getJeudiEvent()
    {
        return $this->jeudiEvent;
    }

    /**
     * Set vendrediEvent
     *
     * @param string $vendrediEvent
     *
     * @return Event
     */
    public function setVendrediEvent($vendrediEvent)
    {
        $this->vendrediEvent = $vendrediEvent;

        return $this;
    }

    /**
     * Get vendrediEvent
     *
     * @return string
     */
    public function getVendrediEvent()
    {
        return $this->vendrediEvent;
    }

    /**
     * Set samediEvent
     *
     * @param string $samediEvent
     *
     * @return Event
     */
    public function setSamediEvent($samediEvent)
    {
        $this->samediEvent = $samediEvent;

        return $this;
    }

    /**
     * Get samediEvent
     *
     * @return string
     */
    public function getSamediEvent()
    {
        return $this->samediEvent;
    }

    /**
     * Set dimancheEvent
     *
     * @param string $dimancheEvent
     *
     * @return Event
     */
    public function setDimancheEvent($dimancheEvent)
    {
        $this->dimancheEvent = $dimancheEvent;

        return $this;
    }

    /**
     * Get dimancheEvent
     *
     * @return string
     */
    public function getDimancheEvent()
    {
        return $this->dimancheEvent;
    }
}
