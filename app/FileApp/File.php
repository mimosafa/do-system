<?php

namespace App\FileApp;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class File extends Model
{
    /**
     * @var array
     */
    protected $upload_where = [
        /** @var string */
        'disk' => '',
        /** @var string */
        'dir'  => '',
    ];

    /**
     * @var UploadedFile
     */
    protected $uploaded_file;

    /**
     * Root url for 'disk'
     *
     * @var array[]
     */
    protected static $publishedUrls = [];

    public function save(array $options = [])
    {
        $this->prepareForSave();
        $this->saveUploadedFile();

        parent::save($options);
    }

    protected function prepareForSave()
    {
        $this->attributes['disk'] = $this->upload_where['disk'] ?: config('filesystems.default');
    }

    public function setNameAttribute(string $name)
    {
        /**
         * 'name' is protected
         */
        return $this;
    }

    /**
     * @todo Error handling
     *
     * @param string $disk
     * @return $this
     */
    public function setDiskAttribute(string $disk)
    {
        $disks = config('filesystems.disks');
        if (isset($disks[$disk])) {
            $this->upload_where['disk'] = $disk;
        }
        return $this;
    }

    /**
     * @todo Error handling
     *
     * @param string $disk
     * @return $this
     */
    public function setDirAttribute(string $dir)
    {
        $this->upload_where['dir'] = $dir;
        return $this;
    }

    /**
     * @param UploadedFile $file
     */
    public function setUploadedFileAttribute(UploadedFile $file)
    {
        $this->uploaded_file = $file;
        return $this;
    }

    public function getUrlAttribute()
    {
        if (! $url = self::getPublishedUrl($this->attributes['disk'])) {
            return '';
        }
        return Str::finish($url, '/') . $this->name;
    }

    /**
     * @todo Validate 'name' ('name' is protected in default)
     *
     * @return bool
     */
    protected function saveUploadedFile()
    {
        if (isset($this->uploaded_file) && $this->uploaded_file->isValid()) {
            // Storage instance
            $disk = Storage::disk($this->attributes['disk']);
            // Store file & get path
            if (isset($this->attributes['name']) && isset($this->attributes['name'])) {
                $file_name = $this->attributes['name'];
                if ($extension = $this->uploaded_file->guessExtension()) {
                    $file_name .= '.' . $extension;
                }
                $path = $disk->putFileAs($this->upload_where['dir'], $this->uploaded_file, $file_name);
            } else {
                $path = $disk->putFile($this->upload_where['dir'], $this->uploaded_file);
            }
            // File path stored as `name`
            $this->attributes['name'] = $path;
            $this->attributes['mime_type'] = $this->uploaded_file->getMimeType();
            if (!isset($this->attributes['client_name']) || empty($this->attributes['client_name'])) {
                $this->attributes['client_name'] = $this->uploaded_file->getClientOriginalName();
            }
            return true;
        }
        return false;
    }

    protected static function getPublishedUrl(string $disk)
    {
        static $done = false;
        if (! $done && empty(self::$publishedUrls)) {
            $disks = config('filesystems.disks');
            foreach ($disks as $_disk => $configs) {
                if (isset($configs['url']) && $configs['url']) {
                    self::$publishedUrls[$_disk] = $configs['url'];
                }
            }
            $done = true;
        }
        return self::$publishedUrls[$disk] ?? '';
    }
}
