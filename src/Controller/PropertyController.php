<?php

namespace App\Controller;

use App\Entity\ScrapedPropertyModel;
use App\Repository\ScrapedPropertyModelRepository;
use Exception;
use PHPUnit\Util\Json;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use function PHPUnit\Framework\throwException;

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

    /**
     * @Route("api/v1/property/{range}/{zipcode}", name="app_property_get_by_range")
     * @method ("GET")
     * @param int $range
     * @param string $zipcode
     * @param ScrapedPropertyModelRepository $scrapedPropertyModelRepository
     * @return JsonResponse
     */
    public function getPropertiesInRange(int $range, string $zipcode, ScrapedPropertyModelRepository $scrapedPropertyModelRepository): JsonResponse
    {
        $zipcodeRange = self::getZipcodeRange($range, $zipcode);
        $fetchedProperties = $scrapedPropertyModelRepository->findPropertiesInRange($zipcodeRange);
        $data = [
            'message' => 'success',
            'status' => 200,
            'data' => $fetchedProperties,
            'info' => null
        ];

        if (empty($fetchedProperties)) {
            $data['info'] = [
                'message' => 'No properties found with given range.',
                'range' => $range,
                'zipcodeRange' => $zipcodeRange
            ];
        }

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @param int $range
     * @param string $zipcode
     * @return array
     * @throws Exception
     */
    private static function getZipcodeRange(int $range, string $zipcode): array
    {
        // TODO create unittest
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, "postcode.vanvulpen.nl/afstand/$zipcode/$range/");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        try {
            $fetchedRange = curl_exec($curl);
        } catch (Exception $e) {
            throw new Exception('Connection error. Check api call.', $e);
        }
        return json_decode($fetchedRange);
    }
}
