<?php

namespace Barathon\barBundle\Entity;

/**
 * myBarRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class myBarRepository extends \Doctrine\ORM\EntityRepository
{
    public function findAll()
    {
        return $this
            ->createQueryBuilder('a')
            ->getQuery()
            ->setMaxResults(5)
            ->getResult()
            ;
    }

    public function getBarProp($id){
        $qb=$this
            ->createQueryBuilder('b')
            ->where('b.user_id='.$id)
        ;
        return $qb
            ->getQuery()
            ->getResult()
            ;
    }

    public function searchBarVille($ville){
        $qb=$this
            ->createQueryBuilder('b')
            ->where('b.ville=\''.$ville.'\'')
            ->addSelect('b')
        ;
        return $qb
            ->getQuery()
            ->getResult()
            ;
    }

    public function searchBarCategory($name,$ville){
        $qb=$this
            ->createQueryBuilder('b')
            ->innerJoin('b.category','c','WITH','c.name=\''.$name.'\'')
            ->where('b.ville=\''.$ville.'\'')

        ;
        return $qb
            ->getQuery()
            ->getResult()
            ;
    }
}
