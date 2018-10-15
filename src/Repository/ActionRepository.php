<?php

namespace App\Repository;

use App\Entity\Action;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Action|null find($id, $lockMode = null, $lockVersion = null)
 * @method Action|null findOneBy(array $criteria, array $orderBy = null)
 * @method Action[]    findAll()
 * @method Action[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ActionRepository extends ServiceEntityRepository
{
    const TRY_COUNT = 10;

    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Action::class);
    }

    /**
     * @return array
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getRandomValue()
    {
        $prodCount = $this->getMaxIndex();
        if (!isset($prodCount['id'])) {
            return NULL;
        }

        $prodCount = $prodCount['id'];
        $randIndex = rand(1,$prodCount);

        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT value FROM ig_action WHERE id = :index
        ';

        $stmt = $conn->prepare($sql);
        $stmt->execute(['index' => $randIndex]);
        $result = $stmt->fetchAll();
        return $result[0];
    }

    /**
     * @return array
     * @throws \Doctrine\DBAL\DBALException
     */
    private function getMaxIndex()
    {
        $conn = $this->getEntityManager()->getConnection();

        $sql = '
        SELECT MAX(id) as id FROM ig_action
        ';

        $stmt = $conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll()[0];
    }
}
