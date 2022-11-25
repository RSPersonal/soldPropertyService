<?php

namespace App\Repository;

use App\Entity\ScrapedPropertyModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * @extends ServiceEntityRepository<ScrapedPropertyModel>
 *
 * @method ScrapedPropertyModel|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScrapedPropertyModel|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScrapedPropertyModel[]    findAll()
 * @method ScrapedPropertyModel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScrapedPropertyModelRepository extends ServiceEntityRepository
{
    /**
     * @param ManagerRegistry $registry
     */
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScrapedPropertyModel::class);
    }

    /**
     * @param ScrapedPropertyModel $entity
     * @param bool $flush
     * @return void
     */
    public function add(ScrapedPropertyModel $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @param ScrapedPropertyModel $entity
     * @param bool $flush
     * @return void
     */
    public function remove(ScrapedPropertyModel $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * @param array $zipcode
     * @return array|float|int|string
     */
    public function findPropertiesInRange(array $zipcode)
    {
        // TODO create unittest

        $properties = [];
        if (empty($zipcode)){
            return $properties;
        }
        $lastItem = end($zipcode);

        $query = $this->createQueryBuilder('property')
            ->where('property.zipcode BETWEEN ?1 AND ?2')
            ->setParameter(1, $zipcode[0])
            ->setParameter(2, $lastItem);

        $fetchedProperties = $query->getQuery()->getArrayResult();

        if ($fetchedProperties){
            $properties = $fetchedProperties;
        }
        return $properties;
    }


//    /**
//     * @return ScrapedPropertyModel[] Returns an array of ScrapedPropertyModel objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ScrapedPropertyModel
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
