<?php


namespace onOffice\Api\Client\Gui\cli;

/**
 * Class CliArguments
 *
 * Read arguments from argv
 *
 */

class CliArguments
{
    public function getByFlag($flag, $argv)
    {
        foreach ($argv as $index => $argument)
        {
            if ($flag === $argument && array_key_exists($index + 1, $argv))
            {
                return $argv[$index +1];
            }
        }
    }
}