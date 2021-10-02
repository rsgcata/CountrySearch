<?php
declare(strict_types=1);

namespace App\Common\Infrastructure\Persistence;

use App\Common\Application\ITransaction;
use Doctrine\ORM\EntityManagerInterface;

/**
 * Transaction class
 * Should be used generally by services like application services / command handlers to
 * manage the transaction
 */
class Transaction implements ITransaction
{
    /**
     * The db session
     *
     * @var EntityManagerInterface
     * @access protected
     */
    protected EntityManagerInterface $entityManager;

    /**
     * Class constructor
     *
     * @param EntityManagerInterface $entityManager The database session
     *
     * @return void
     * @throws --
     * @access public
     */
    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @throws Exception
     */
    public function start(): void
    {
        $this->entityManager->beginTransaction();
    }

    /**
     * @throws Exception
     */
    public function commit(): void
    {
        $this->entityManager->commit();
    }

    /**
     * @throws Exception
     */
    public function rollBack(): void
    {
        $this->entityManager->rollback();
    }

    /**
     * @return bool
     */
    public function isStarted(): bool
    {
        $this->entityManager->getConnection()->isTransactionActive();
    }
}

?>
