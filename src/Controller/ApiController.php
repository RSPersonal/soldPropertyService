<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApiController extends AbstractController
{
    /**
     * @Route("/", name="app_api")
     */
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'success',
            'status' => 200,
            'Title' => 'Scraped property service',
            'Author'=> 'Raphael Sparenberg',
            'Version' => "1.0",
            ]);
    }
}
