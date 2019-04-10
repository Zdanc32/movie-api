<?php

namespace App\Repository;

use App\Entity\Mark;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Mark|null find($id, $lockMode = null, $lockVersion = null)
 * @method Mark|null findOneBy(array $criteria, array $orderBy = null)
 * @method Mark[]    findAll()
 * @method Mark[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MarkRepository extends ServiceEntityRepository
{    
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Mark::class);
    }

    

    public function addMark(Movie $movie, $mark_value, EntityManagerInterface $em)
    {
        $mark = new Mark();
        $mark->setMovie($movie);
        $mark->setMarkValue($mark_value);
        $result = $em->persist($mark);
        $em->flush();
        return $result;
    }
}
