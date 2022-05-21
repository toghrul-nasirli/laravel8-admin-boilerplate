<?php

namespace Appstract\BladeDirectives;

class Parser
{
    public static function multipleArgs($expression)
    {
        return collect(explode(',', $expression))->map(function ($item) {
            return trim($item);
        });
    }

    public static function stripQuotes($expression)
    {
        return str_replace(["'", '"'], '', $expression);
    }
}