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
     * @ORM\ManyToOne(targetEntity="Barathon\utilisateursBundle\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id",nullable=true)
     **/
    protected $user_id;


    /**
     * Get eventId
     *
     * @return integer
     */
    public function getEventId()
    {
        return $this->event_id;
    }

    /**
     * Get eventId
     *
     * @return integer
     */
    public function getId()
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
}
