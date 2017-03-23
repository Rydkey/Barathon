<?php
/**
 * Created by PhpStorm.
 * User: ANTOINE
 * Date: 23/03/2017
 * Time: 17:37
 */

namespace Barathon\eventBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="Horraire")
 */
class HoraireEvent
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="date")
     */
    protected $debutEvent;
    /**
     * @ORM\Column(type="date")
     */
    protected $finEvent;



    /**
     * Set debut
     *
     * @param \DateTime $debut
     *
     * @return HoraireEvent
     */
    public function setDebutEvent($debutEvent)
    {
        $this->debut = $debutEvent;

        return $this;
    }

    /**
     * Get debut
     *
     * @return \DateTime
     */
    public function getDebutEvent()
    {
        return $this->debutEvent;
    }

    /**
     * Set fin
     *
     * @param \DateTime $fin
     *
     * @return HoraireEvent
     */
    public function setFinEvent($finEvent)
    {
        $this->fin = $finEvent;

        return $this;
    }

    /**
     * Get fin
     *
     * @return \DateTime
     */
    public function getFinEvent()
    {
        return $this->finEvent;
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
}
