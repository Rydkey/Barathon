<?php
namespace Barathon\eventBundle\Repository;
/**
 * Created by PhpStorm.
 * User: lenovo
 * Date: 2017/1/12
 * Time: 20:06
 */
class EventRepository extends \Doctrine\ORM\EntityRepository
{
    public function getEvenement()
    {
        $qb = $this->createQueryBuilder('e'); // il lui faut une lettre, i : item en base de données donc schéma
        $qb->select('e.id', 'e.libelle_event', 'e.date_event', 'b.name')// pas de from sproduits
        ->join('BarathonbarBundle:Bar', 'b')
            ->where('e.bar_id=b.id')
            ->addOrderBy('b.name', 'ASC');
        return $qb->getQuery()->getResult();
    }
}