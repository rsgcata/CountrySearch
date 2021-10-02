<?php
declare(strict_types=1);

namespace App\Common\Application;

use Exception;

/**
 * This is the exception class for invalid Application quries. This should be triggered in case
 * bad queries/input are sent
 */
class InvalidQueryException extends Exception
{

}

?>
