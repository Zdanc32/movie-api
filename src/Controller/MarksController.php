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
use App\Repository\MarkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;


class MarksController extends ApiController
{
    private $markRepository;

    public function __construct(MarkRepository $markRepository)
    {
        $this->markRepository = $markRepository;
    }

    /**
     * @Route("/marks/create/{movie}", methods="POST")
     * @param Movie $movie
     * @param Request $request
     * @param EntityManagerInterface $em
     * @return Symfony\Component\HttpFoundation\JsonResponse
     */
    public function createAction(Movie $movie, Request $request, EntityManagerInterface $em)
    {
        if ( ! $request) {
            return $this->respondValidationError('Nieprawidłowe żądanie!');
        }

        if ( ! $request->get('mark_value')) {
            return $this->respondValidationError('Podaj ocene filmu!');
        }

        if ($request->get('mark_value') < 0 || $request->get('mark_value') > 10) {
            return $this->respondValidationError('Ocena ma złą wartość!');
        }


        $mark_value = $request->get('mark_value');

        $mark = $this->markRepository->addMark($movie, $mark_value, $em);
        $created_mark = $this->markRepository->getMark($mark);
        return $this->respondCreated($created_mark);
    }

}