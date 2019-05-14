<?php

namespace Wstd\View\Admin;

interface ViewModelInterface
{
    /**
     * @return string Blade template
     */
    public function template(): string;
}
