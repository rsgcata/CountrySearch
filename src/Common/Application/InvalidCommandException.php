<?php
declare(strict_types=1);

namespace App\Common\Application;

use Exception;

/**
 * This is the exception class for invalid command. This should be triggered in case bad
 * actions/input are sent
 */
class InvalidCommandException extends Exception
{

}

?>
