<?php

namespace App\Repository;

use App\Entity\Mark;
use App\Entity\Movie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\EntityManagerInterface;
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


    public function getMark(Mark $mark)
    {
        return [
            'id' => (int) $mark->getId(),
            'movie_id' => (int) $mark->getMovie()->getId(),
            'mark_value' => (int) $mark->getMarkValue()
        ];
    }

    public function addMark(Movie $movie, $mark_value, EntityManagerInterface $em)
    {
        $mark = new Mark();
        $mark->setMovie($movie);
        $mark->setMarkValue($mark_value);
        $em->persist($mark);
        $em->flush();
        return $mark;
    }
}
