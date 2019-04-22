<?php

namespace App\FileApp;

# use App\FileApp\Models\File as FileModel;
# use App\FileApp\Models\FileHolder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

use Wstd\File\Models\File as FileModel;

class File
{
    /**
     * @var Model
     */
    protected $eloquent;

    /**
     * @var string
     */
    protected $disk;

    /**
     * @var string
     */
    protected $dir = 'files';

    /**
     * @var string
     */
    protected $collection = '';

    public function __construct(Model $eloquent)
    {
        $this->eloquent = $eloquent;
    }

    public function findAll()
    {
        $collection = [];
        $holders = $this->eloquent->files;
        if ($holders->isNotEmpty()) {
            foreach ($holders as $holder) {
                $collection[] = $holder->file;
            }
        }
        return collect($collection);
    }

    public function store(UploadedFile $uploaded_file)
    {
        if ($id = $this->storeUploadedFile($uploaded_file)) {
            $fillable = ['file_id' => $id];
            if ($this->collection) {
                $fillable['collection'] = $this->collection;
            }
            $holder = $this->eloquent->files()->create($fillable);
            return $holder->id;
        }
        return 0;
    }

    protected function storeUploadedFile(UploadedFile $uploaded_file): int
    {
        $file = new FileModel();
        if (isset($this->disk) && FileModel::isDisk($this->disk)) {
            $file->disk = $this->disk;
        }
        $file->dir = $this->dir;
        $file->uploaded_file = $uploaded_file;
        $file->save();

        return $file->id;
    }
}
