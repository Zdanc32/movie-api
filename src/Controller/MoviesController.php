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
    private $movieRepository;

    public function __construct(MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    /**
     * @Route("/movies", methods="GET")
     * @return Symfony\Component\HttpFoundation\JsonResponse
     */
    public function indexAction()
    {
        $movies = $this->movieRepository->getAllMovies();

        return $this->respond($movies);
    }

    /**
     * @Route("movies/details/{movie}", methods="GET")
     * @param Movie $movie
     * @return Symfony\Component\HttpFoundation\JsonResponse
     */
    public function detailsAction(Movie $movie)
    {
        $movie_details = $this->movieRepository->getMovieWithMark($movie);
        return $this->respond($movie_details);
    }

}