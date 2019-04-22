<?php

namespace Wstd\File;

use Wstd\File\HolderInterface;
use Wstd\File\Models\File as FileModel;
use Wstd\File\Models\FileHolder as FileHolderModel;

class File
{
    /**
     * @var HolderInterface
     */
    protected $holderInstance;

    /**
     * @var Wstd\File\Models\FileHolder
     */
    protected $fileHolderInstance;

    public function __construct(HolderInterface $holder)
    {
        $this->holderInstance = $holder;
        $this->fileHolderInstance = $holder->filesMorphMany();
    }

    public function get(string $collection = '')
    {
        //
    }
}
