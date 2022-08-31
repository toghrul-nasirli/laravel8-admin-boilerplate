<?php

declare(strict_types=1);

use Rector\Php74\Rector\Property\TypedPropertyRector;
use Rector\Set\ValueObject\SetList;
use Rector\Config\RectorConfig;

return static function (RectorConfig $rectorConfig): void {
    // here we can define, what sets of rules will be applied
    // tip: use "SetList" class to autocomplete sets
    $rectorConfig->sets([
        SetList::CODE_QUALITY
    ]);

    // register single rule
    $rectorConfig->rule(TypedPropertyRector::class);
};
