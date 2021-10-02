<?php
declare(strict_types=1);

namespace App\Common\Application;

use Throwable;

/**
 * The transaction interface. A database transaction class can implement this
 */
interface ITransaction
{
    /**
     * Starts a transaction
     *
     * @return void
     * @throws Throwable If anything went wrong
     */
    public function start(): void;

    /**
     * Commits a transaction
     *
     * @return void
     * @throws Throwable If anything went wrong
     */
    public function commit(): void;

    /**
     * Rolls back a transaction
     *
     * @return void
     * @throws Throwable If anything went wrong
     */
    public function rollBack(): void;

    /**
     * Exposes if the transaction is started or not
     *
     * @return bool
     */
    public function isStarted(): bool;
}

?>
