<?php
declare(strict_types=1);

namespace App\Common\Application;

/**
 * Interface for checking if a command is deliberate
 * All commands that require to check if the action was deliberate should implement this
 * interface / contract
 */
interface IDeliberateCommand
{
    const HEADER_NAME = 'X-Deliberate-Application';
    const HEADER_VALUE = 'yes';
}

?>
