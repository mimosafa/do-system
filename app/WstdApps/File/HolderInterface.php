<?php

namespace Wstd\File;

use Illuminate\Database\Eloquent\Relations\MorphMany;

interface HolderInterface
{
    public function filesMorphMany(): MorphMany;
}
