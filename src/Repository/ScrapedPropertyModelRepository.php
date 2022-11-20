<?php

namespace App\Repository;

use App\Entity\ScrapedPropertyModel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

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
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScrapedPropertyModel::class);
    }

    public function add(ScrapedPropertyModel $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ScrapedPropertyModel $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
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
