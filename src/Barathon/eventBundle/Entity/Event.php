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
    protected $event_id;

    /**
     * @ORM\Column(type="string")
     */
    protected $libelle_event;

    /**
     * @ORM\Column(type="date")
     */
    protected $date_event;

    /**
     * @ORM\ManyToOne(targetEntity="Barathon\barBundle\Entity\Bar", cascade={"persist"})
     * @ORM\JoinColumn(name="bar_id", referencedColumnName="bar_id")
     **/
    protected $bar_id;

    /**
     * @ORM\ManyToMany(targetEntity="Barathon\utilisateursBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="user_id")
     **/
    protected $user_id;

    /**
     * Get idEvent
     *
     * @return integer
     */
    public function getEventId()
    {
        return $this->event_id;
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
     * Set bar_id
     *
     * @param \Barathon\barBundle\Entity\Bar $bar_id
     *
     * @return Event
     */
    public function setBarId(\Barathon\barBundle\Entity\Bar $bar_id = null)
    {
        $this->bar_id = $bar_id;

        return $this;
    }

    /**
     * Get bar_id
     *
     * @return \Barathon\barBundle\Entity\Bar
     */
    public function getBarId()
    {
        return $this->bar_id;
    }

    public function __toString()
    {
        return $this->getLibelleEvent();
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->bar_id = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add bar_id
     *
     * @param \Barathon\barBundle\Entity\Bar $bar_id
     *
     * @return Event
     */
    public function addBarId(\Barathon\barBundle\Entity\Bar $bar_id)
    {
        $this->bar_id[] = $bar_id;

        return $this;
    }

    /**
     * Remove bar_id
     *
     * @param \Barathon\barBundle\Entity\Bar $bar_id
     */
    public function removeBarId(\Barathon\barBundle\Entity\Bar $bar_id)
    {
        $this->bar_id->removeElement($bar_id);
    }

    /**
     * Get id
     *
     * @return integer
     */
//    public function getIdEvent()
//    {
//        return $this->id_event;
//    }

    public function getevent_idEvent(){
        return $this->event_id;
    }

    public function getid(){
        return $this->event_id;

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
     * Add userId
     *
     * @param \Barathon\utilisateursBundle\Entity\User $userId
     *
     * @return Event
     */
    public function addUserId(\Barathon\utilisateursBundle\Entity\User $userId)
    {
        $this->user_id[] = $userId;

        return $this;
    }

    /**
     * Remove userId
     *
     * @param \Barathon\utilisateursBundle\Entity\User $userId
     */
    public function removeUserId(\Barathon\utilisateursBundle\Entity\User $userId)
    {
        $this->user_id->removeElement($userId);
    }
}
