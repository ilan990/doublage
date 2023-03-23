<?php

namespace App\Repository;

use App\Entity\ContratDa;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<ContratDa>
 *
 * @method ContratDa|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContratDa|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContratDa[]    findAll()
 * @method ContratDa[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContratDaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContratDa::class);
    }

    public function save(ContratDa $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(ContratDa $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function CaByYearAndDa(int $value): array
    {
        $entityManager = $this->getEntityManager();

        $sql = 'SELECT * FROM contrat_da where YEAR(date_debut) = YEAR(NOW()) and id_da = :id ;';

        $rsm = new ResultSetMappingBuilder($entityManager);

        $query = $entityManager->createNativeQuery($sql, $rsm);
        $query->setParameter('id', $value);

        return $query->getResult();
    }

//    /**
//     * @return ContratDa[] Returns an array of ContratDa objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('c.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?ContratDa
//    {
//        return $this->createQueryBuilder('c')
//            ->andWhere('c.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
