<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 4/9/2019
 * Time: 6:34 PM
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movie;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;

class MoviesController extends ApiController
{
    /**
     * @Route("/movies", methods="GET")
     * @param MovieRepository $movieRepository
     * @return Symfony\Component\HttpFoundation\JsonResponse
     */
    public function moviesAction(MovieRepository $movieRepository)
    {
        $movies = $movieRepository->getAllMovies();

        return $this->respond($movies);
    }

    /**
     * @Route("/movie/{movie}", methods="GET")
     * @param Movie $movie
     * @param MovieRepository $movieRepository
     * @return Symfony\Component\HttpFoundation\JsonResponse
     */
    public function movieAction(Movie $movie, MovieRepository $movieRepository)
    {
        $movie_details = $movieRepository->getMovieWithMark($movie);

        if ( ! $movie) {
            $this->respondNotFound();
        }

        return $this->respond($movie_details);
    }

}