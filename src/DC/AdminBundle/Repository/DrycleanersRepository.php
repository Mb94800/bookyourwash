<?php

namespace DC\AdminBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * DrycleanersRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DrycleanersRepository extends \Doctrine\ORM\EntityRepository
{

    public function myFindAllDryCleanersByOwner($id){

        $qb = $this->createQueryBuilder('a');


        $qb
            ->where('a.IDOwner = :id')
            ->setParameter('id', $id)
        ;

        return $qb
            ->getQuery()
            ->getResult()
            ;
    }

 

    public function getDryCleaner($id){
        $qb = $this->createQueryBuilder('a');
        $qb
            ->where('a.id = :id')
            ->setParameter('id', $id)
        ;

        return $qb
            ->getQuery()
            ->getResult()
            ;

    }

    public function getAllDryCleaner(){
        $qb = $this->createQueryBuilder('a');

        return $qb
            ->getQuery()
            ->getResult()
            ;
    }
    
    
    public function countWashingMachineByDryCleaners(){
        $qb = $this->createQueryBuilder('a');


        $qb
            ->where('a.id = :id')
            ->setParameter('id', $id)
        ;

        return $qb
            ->getQuery()
            ->getResult()
            ;
    }
}
