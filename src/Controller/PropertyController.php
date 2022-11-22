<?php

namespace App\Controller;

use App\Entity\ScrapedPropertyModel;
use App\Repository\ScrapedPropertyModelRepository;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PropertyController extends AbstractController
{
    /**
     * @Route("api/v1/property", name="app_property")
     */
    public function index(): JsonResponse
    {
        return $this->json([
            'message' => 'Welcome to your new controller!',
            'path' => 'src/Controller/PropertyController.php',
        ]);
    }

    /**
     * @Route("api/v1/property/{id}", name="app_property_get_by_id")
     * @method ("GET")
     * @param string $id
     * @param ScrapedPropertyModelRepository $scrapedPropertyModelRepository
     * @return JsonResponse
     */
    public function getPropertyById(string $id, ScrapedPropertyModelRepository $scrapedPropertyModelRepository): JsonResponse
    {
        $property = $scrapedPropertyModelRepository->find($id);
        $data = [
            'message' => 'success',
            'status' => 200,
            'info' => null
        ];
        if (!$property) {
            $data['data'] = null;
            $data['status'] = 404;
            $data['info'] = [
                'message' => 'No entry found with given id.',
                'id' => $id
            ];
            return new JsonResponse($data, Response::HTTP_NOT_FOUND);
        };

        $data['data'] = [
            'id' => $property->getId(),
            'street' => $property->getStreet(),
            'housenumber' => $property->getHousenumber(),
            'housenumberAdd' => $property->getHousenumberAdd(),
            'city' => $property->getCity(),
            'municipality' => $property->getMunicipality(),
            'askPrice' => $property->getAskPrice(),
            'livingArea' => $property->getLivingArea(),
            'typeOfProperty' => $property->getTypeOfProperty(),
        ];
        return new JsonResponse($data, Response::HTTP_OK);
    }
}
