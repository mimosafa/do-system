<?php

namespace Wstd\View\Models\Admin\Includes;

interface BelongsInterface
{
    /**
     * @return string
     */
    public function nameOfBelongs(): string;

    /**
     * @return string
     */
    public function labelOfBelongs(): string;

    /**
     *
     */
    public function getBladeTemplate(): string;
}
