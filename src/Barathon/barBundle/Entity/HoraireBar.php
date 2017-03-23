<?php
/**
 * Created by PhpStorm.
 * User: ANTOINE
 * Date: 23/03/2017
 * Time: 11:44
 */

namespace Barathon\barBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="HoraireBar")
 */

class HoraireBar
{
    /**
     * @ORM\Column(type="date")
     */
    protected $debut;
    /**
     * @ORM\Column(type="date")
     */
    protected $fin;



    /**
     * Set debut
     *
     * @param \DateTime $debut
     *
     * @return HoraireBar
     */
    public function setDebut($debut)
    {
        $this->debut = $debut;

        return $this;
    }

    /**
     * Get debut
     *
     * @return \DateTime
     */
    public function getDebut()
    {
        return $this->debut;
    }

    /**
     * Set fin
     *
     * @param \DateTime $fin
     *
     * @return HoraireBar
     */
    public function setFin($fin)
    {
        $this->fin = $fin;

        return $this;
    }

    /**
     * Get fin
     *
     * @return \DateTime
     */
    public function getFin()
    {
        return $this->fin;
    }
}
