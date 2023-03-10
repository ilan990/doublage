<?php

namespace App\Repository;

use App\Entity\Role;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\ResultSetMappingBuilder;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Role>
 *
 * @method Role|null find($id, $lockMode = null, $lockVersion = null)
 * @method Role|null findOneBy(array $criteria, array $orderBy = null)
 * @method Role[]    findAll()
 * @method Role[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RoleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Role::class);
    }

    public function save(Role $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Role $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function findIdDaByContratDa($value): int
    {
        $entityManager = $this->getEntityManager();

        $sql = 'SELECT cd.id_da 
                FROM contrat_da cd 
                INNER JOIN role r ON cd.id_contrat_da = r.id_contrat_da 
                WHERE r.id_role = :id';

        $rsm = new ResultSetMappingBuilder($entityManager);
        $rsm->addScalarResult('id_da', 'id_da');

        $query = $entityManager->createNativeQuery($sql, $rsm);
        $query->setParameter('id', $value);

        return $query->getSingleScalarResult();
    }
    public function findAllRolesByDa(int $value): array
    {
        $entityManager = $this->getEntityManager();

        $sql = 'SELECT r.id_role,r.nom 
                FROM contrat_da cd 
                    INNER JOIN da d ON d.id_da = cd.id_da 
                    INNER JOIN role r on r.id_contrat_da = cd.id_contrat_da 
                    LEFT JOIN contrat_comedien cc ON cc.id_role = r.id_role 
                WHERE d.id_da = :id 
                  AND r.id_role NOT IN ( SELECT id_role FROM contrat_comedien);';

        $rsm = new ResultSetMappingBuilder($entityManager);

        $rsm->addScalarResult('id_role', 'id_role');
        $rsm->addScalarResult('nom', 'nom');
        $query = $entityManager->createNativeQuery($sql, $rsm);
        $query->setParameter('id', $value);

        return $query->getResult();
    }

//    /**
//     * @return Role[] Returns an array of Role objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Role
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
