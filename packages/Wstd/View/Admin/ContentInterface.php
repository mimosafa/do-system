<?php

namespace Wstd\View\Admin;

interface ContentInterface extends ViewModelInterface
{
    /**
     * @return string
     */
    public function id(): string;

    /**
     * @return string
     */
    public function title(): string;
}
