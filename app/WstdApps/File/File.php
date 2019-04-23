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
    protected $collection;

    public function __construct(HolderInterface $holder)
    {
        $this->holder = $holder;
        $this->file_holders = $holder->fileHoldersMorphMany;
    }

    public function get(string $collection = '')
    {
        $file_holders = $this->file_holders->sortBy('order');
        return $collection ? $file_holders->where('collection', $collection) : $this->file_holders;
    }

    public function add(UploadedFile $file, string $collection = '', string $disk = '')
    {
        $file_id = $this->storeUploadedFile($file, $collection, $disk);
        $fillable = ['file_id' => $file_id,];
        if ($collection) {
            $fillable['collection'] = $collection;
        }
        $this->holder->fileHoldersMorphMany()->create($fillable);
    }

    protected function storeUploadedFile(UploadedFile $uploaded_file, string $collection, string $disk)
    {
        $file = new FileModel();
        $file->disk = $disk;
        $file->dir = $collection;
        $file->uploaded_file = $uploaded_file;
        $file->save();

        return $file->id;
    }
}
