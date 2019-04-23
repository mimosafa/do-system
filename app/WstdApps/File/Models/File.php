<?php

namespace Wstd\File\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use Wstd\File\Models\FileHolder;

class File extends Model
{
    /**
     * @var array
     */
    protected $upload_where = [
        /**
         * @var string
         */
        'disk' => '',
        /**
         * @var string
         */
        'dir'  => '',
    ];

    /**
     * @var UploadedFile
     */
    protected $uploaded_file;

    /**
     * Root url for 'disk'
     *
     * @var array[string]
     */
    protected static $publishedUrls = [];

    protected $fillable = ['uploaded_file', 'client_name'];

    /**
     * File Holders
     *
     * @return HasMany
     */
    public function fileHoldersHasMany(): HasMany
    {
        return $this->hasMany(FileHolder::class);
    }

    /**
     * Overwrite Model::save
     *
     * @access public
     */
    public function save(array $options = [])
    {
        $this->prepareForSave();
        $this->saveUploadedFile();

        parent::save($options);
    }

    /**
     * @access protected
     */
    protected function prepareForSave()
    {
        $this->attributes['disk'] = $this->upload_where['disk'] ?: config('filesystems.default');
    }

    /**
     * Property `url`
     *
     * @access public
     *
     * @return string
     */
    public function getUrlAttribute(): string
    {
        if (! $url = self::getPublishedUrl($this->attributes['disk'])) {
            return '';
        }
        return Str::finish($url, '/') . $this->name;
    }

    /**
     * Property `disk`
     *
     * @access public
     *
     * @param string $disk
     * @return static
     */
    public function setDiskAttribute(string $disk)
    {
        if (self::isDisk($disk)) {
            $this->upload_where['disk'] = $disk;
        }
        return $this;
    }

    /**
     * Property `dir`
     *
     * @access public
     *
     * @param string $dir
     * @return static
     */
    public function setDirAttribute(string $dir)
    {
        $this->upload_where['dir'] = $dir;
        return $this;
    }

    public function setNameAttribute(string $name)
    {
        /**
         * 'name' is protected
         */
        return $this;
    }

    /**
     * Property `uploaded_file`
     *
     * @access public
     *
     * @param UploadedFile $file
     * @return static
     */
    public function setUploadedFileAttribute(UploadedFile $file)
    {
        $this->uploaded_file = $file;
        return $this;
    }

    /**
     * @access protected
     */
    protected function saveUploadedFile()
    {
        if (isset($this->uploaded_file) && $this->uploaded_file->isValid()) {
            // Storage instance
            $disk = Storage::disk($this->attributes['disk']);
            $path = $disk->putFile($this->upload_where['dir'], $this->uploaded_file);
            // File path stored as `name`
            $this->attributes['name'] = $path;
            $this->attributes['mime_type'] = $this->uploaded_file->getMimeType();
            if (! isset($this->attributes['client_name']) || empty($this->attributes['client_name'])) {
                $this->attributes['client_name'] = $this->uploaded_file->getClientOriginalName();
            }
            $this->attributes['user_id'] = Auth::user()->id;
        }
    }

    /**
     * @static
     * @access public
     *
     * @param string $disk
     * @return bool
     */
    public static function isDisk(string $disk): bool
    {
        $disks = config('filesystems.disks');
        return isset($disks[$disk]);
    }

    /**
     * @static
     * @access protected
     *
     * @param string $disk
     * @return string
     */
    protected static function getPublishedUrl(string $disk): string
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
