<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class File extends Model
{
    /**
     * @var string
     */
    protected $disk;

    /**
     * @var string
     */
    protected $dir = 'upload';

    /**
     * 公開されている（ URL を持っている） 'disk'
     *
     * @var array
     */
    protected static $publishedUrls = [];

    /**
     * デフォルトの 'disk' をプロパティにセットするため
     * Illuminate\Database\Eloquent\Model::__construct メソッドを上書き
     */
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->disk = config('filesystems.default');
    }

    /**
     * 'disk' を永続化するため Illuminate\Database\Eloquent\Model::save メソッドを上書き
     *
     * @see Illuminate\Database\Eloquent\Concerns\HasAttributes::setAttribute
     */
    public function save(array $options = [])
    {
        $this->attributes['disk'] = $this->disk;
        parent::save($options);
    }

    public function setFileAttribute(UploadedFile $file)
    {
        if ($file->isValid()) {
            $path = $file->store($this->dir, $this->disk);
            $this->setAttribute('name', $path);
            $this->setAttribute('mime_type', $file->getMimeType() );
            if (!isset($this->attributes['client_name']) || empty($this->attributes['client_name'])) {
                $this->setAttribute('client_name', $file->getClientOriginalName());
            }
        }
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
            $this->disk = $disk;
        }
        return $this;
    }

    public function setDirAttribute(string $dir)
    {
        $this->dir = $dir;
        return $this;
    }

    public function getUrlAttribute()
    {
        if (!$url = self::getPublishedUrl($this->attributes['disk'])) {
            return '';
        }
        return rtrim($url, '/') . '/' . $this->name;
    }

    protected static function getPublishedUrl($disk)
    {
        static $done = false;
        if (!$done && empty(self::$publishedUrls)) {
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
