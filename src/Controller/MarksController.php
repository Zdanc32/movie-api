<?php
/**
 * Created by PhpStorm.
 * User: Gabriel
 * Date: 4/9/2019
 * Time: 6:34 PM
 */

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Mark;
use App\Repository\MarkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class MarksController extends ApiController
{
    private $movieRepository;
    private $markRepository;

    public function __construct(MarkRepository $markRepository, MovieRepository $movieRepository)
    {
        $this->movieRepository = $movieRepository;
        $this->markRepository = $markRepository;
    }
    
    /**
     * @Route("/create/{movie}", methods="POST")
     * @param MarkRepository $markRepository
     * @return Symfony\Component\HttpFoundation\JsonResponse
     */
    public function createAction(Movie $movie, Request $request)
    {
        if ( ! $request) {
            return $this->respondValidationError('Nieprawidłowe żądanie!');
        }

        if ( ! $movie) {
            $this->respondNotFound();
        }

        if ( ! $request->get('mark_value')) {
            return $this->respondValidationError('Podaj ocene filmu!');
        }
        $movie_id = $request->get('movie_id');
        $movie =  

        $mark = $markRepository->addMark($movie);

        return $this->respond($movies);
    }

}