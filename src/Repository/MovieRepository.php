<?php

namespace App\Repository;

use App\Entity\Movie;
use App\Entity\Mark;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\DBAL\DriverManager;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Movie|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movie|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movie[]    findAll()
 * @method Movie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovieRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Movie::class);
    }

    public function getMovie(Movie $movie)
    {
        return [
            'id' => (int) $movie->getId(),
            'title' => (string) $movie->getTitle(),
            'description' => (string) $movie->getDescription()
        ];
    }

    public function getMovieWithMark(Movie $movie)
    {
        $avg_mark_value = $this->getAvgMark($movie);
        return [
            'id' => (int) $movie->getId(),
            'title' => (string) $movie->getTitle(),
            'description' => (string) $movie->getDescription(),
            'avg_mark_value' => $avg_mark_value
        ];
    }

    public function getAllMovies()
    {
        $movies = $this->findAll();
        $moviesArray = [];

        foreach ($movies as $movie) {
            $moviesArray[] = $this->getMovie($movie);
        }

        return $moviesArray;
    }

    public function getAvgMark(Movie $movie)
    {
        $entityManager = $this->getEntityManager()->getConnection();

        $queryBuilder = $entityManager->createQueryBuilder();

        $queryBuilder->select('AVG(M.mark_value) AS mark_value')
                     ->from('mark', 'M')
                     ->where('M.movie_id = '.$movie->getId())
                     ->execute();

        $stmt = $entityManager->prepare($queryBuilder);
        $stmt->execute();
        $avg_mark_value = $stmt->fetchAll();

        return $avg_mark_value[0]['mark_value'];
    }

}
