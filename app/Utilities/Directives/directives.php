<?php

use Appstract\BladeDirectives\Parser;
use Illuminate\Support\Str;

return [
    // @istrue / @isfalse
    'istrue' => function ($expression) {
        if (Str::contains($expression, ',')) {
            $expression = Parser::multipleArgs($expression);

            return implode('', [
                "<?php if (isset({$expression->get(0)}) && (bool) {$expression->get(0)} === true) : ?>",
                "<?php echo {$expression->get(1)}; ?>",
                '<?php endif; ?>',
            ]);
        }

        return "<?php if (isset({$expression}) && (bool) {$expression} === true) : ?>";
    },

    'endistrue' => function ($expression) {
        return '<?php endif; ?>';
    },

    'isfalse' => function ($expression) {
        if (Str::contains($expression, ',')) {
            $expression = Parser::multipleArgs($expression);

            return implode('', [
                "<?php if (isset({$expression->get(0)}) && (bool) {$expression->get(0)} === false) : ?>",
                "<?php echo {$expression->get(1)}; ?>",
                '<?php endif; ?>',
            ]);
        }

        return "<?php if (isset({$expression}) && (bool) {$expression} === false) : ?>";
    },

    'endisfalse' => function ($expression) {
        return '<?php endif; ?>';
    },

    // @isnull / @isnotnull
    'isnull' => function ($expression) {
        if (Str::contains($expression, ',')) {
            $expression = Parser::multipleArgs($expression);

            return implode('', [
                "<?php if (is_null({$expression->get(0)})) : ?>",
                "<?php echo {$expression->get(1)}; ?>",
                '<?php endif; ?>',
            ]);
        }

        return "<?php if (is_null({$expression})) : ?>";
    },

    'endisnull' => function ($expression) {
        return '<?php endif; ?>';
    },

    'isnotnull' => function ($expression) {
        if (Str::contains($expression, ',')) {
            $expression = Parser::multipleArgs($expression);

            return implode('', [
                "<?php if (! is_null({$expression->get(0)})) : ?>",
                "<?php echo {$expression->get(1)}; ?>",
                '<?php endif; ?>',
            ]);
        }

        return "<?php if (! is_null({$expression})) : ?>";
    },

    'endisnotnull' => function ($expression) {
        return '<?php endif; ?>';
    },

    // @style / @script
    'style' => function ($expression) {
        if (!empty($expression)) {
            return '<link rel="stylesheet" href="' . Parser::stripQuotes($expression) . '">';
        }

        return '<style>';
    },

    'endstyle' => function () {
        return '</style>';
    },

    'script' => function ($expression) {
        if (!empty($expression)) {
            return '<script src="' . Parser::stripQuotes($expression) . '"></script>';
        }

        return '<script>';
    },

    'endscript' => function () {
        return '</script>';
    },

    // @routeis
    'routeis' => function ($expression) {
        return "<?php if (fnmatch({$expression}, Route::currentRouteName())) : ?>";
    },

    'endrouteis' => function ($expression) {
        return '<?php endif; ?>';
    },

    'routeisnot' => function ($expression) {
        return "<?php if (! fnmatch({$expression}, Route::currentRouteName())) : ?>";
    },

    'endrouteisnot' => function ($expression) {
        return '<?php endif; ?>';
    },

    // @dumpa / @dda

    'dumpa' => function ($expression) {
        return "<?php dump({$expression}->toArray()); ?>";
    },

    'dda' => function ($expression) {
        return "<?php dd({$expression}->toArray()); ?>";
    },

];
