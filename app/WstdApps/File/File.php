<?php

namespace Wstd\File;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Wstd\File\HolderInterface;
use Wstd\File\Models\File as FileModel;
use Wstd\File\Models\FileHolder;

class File
{
    /**
     * @var HolderInterface
     */
    protected $holder;

    /**
     * @var Illuminate\Database\Eloquent\Collection[FileHolder]
     */
    protected $file_holders;

    /**
     * @var string
     */
    protected $disk;

    /**
     * @var string
     */
    protected $dir;

    /**
     * @var string
     */
    protected $collection;

    public function __construct(HolderInterface $holder, string $collection, string $dir, string $disk)
    {
        $this->holder = $holder;
        $this->disk = $disk;
        $this->dir = $dir;
        $this->collection = $collection;
        $this->file_holders = $holder->fileHoldersMorphMany;
    }

    public function get(string $collection = '')
    {
        $file_holders = $this->file_holders->sortBy('order');
        return $collection ? $file_holders->where('collection', $collection) : $this->file_holders;
    }

    public function add(UploadedFile $file)
    {
        //
    }

    protected function storeUploadedFile(UploadedFile $uploaded_file)
    {
        $file = new FileModel();
        $file->disk = $this->disk;
        $file->dir = $this->dir;
        $file->uploaded_file = $uploaded_file;
        $file->save();

        return $file->id;
    }
}
