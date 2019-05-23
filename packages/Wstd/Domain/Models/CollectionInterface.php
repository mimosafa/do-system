<?php

namespace Wstd\Domain\Models;

use ArrayAccess;
use Countable;
use IteratorAggregate;
use JsonSerializable;

interface CollectionInterface extends ArrayAccess, Countable, IteratorAggregate, JsonSerializable
{
    //
}
