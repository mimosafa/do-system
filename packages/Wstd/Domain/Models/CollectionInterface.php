<?php

namespace Wstd\Domain\Models;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use JsonSerializable;

interface CollectionInterface extends ArrayAccess, Countable, IteratorAggregate, JsonSerializable
{
    /**
     * @return string Name of collection
     */
    public static function collectionName(): string;

    /**
     * @return string Label of collection
     */
    public static function collectionLabel(): string;
}
