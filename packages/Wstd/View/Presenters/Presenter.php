<?php

namespace Wstd\View\Presenters;

use Illuminate\Support\Str;
use ReflectionClass;
use Spatie\ViewModels\ViewModel;

abstract class Presenter extends ViewModel
{
    /**
     * Properties, not arrowed to overwrite by constructing
     *
     * @var array
     */
    protected $guarded = ['guarded'];

    public function __construct($param = null, array $args = [])
    {
        // In extending class, do something with $param
        // and exec `parent::__construct($param, $args)`
        $this->parseArguments($args);
    }

    /**
     * Should be used by constructor
     *
     * @param array $args
     * @return void
     */
    protected function parseArguments(array $args)
    {
        if (! empty($args)) {
            $guarded = $this->guarded();
            $keys = array_filter(array_keys(get_object_vars($this)), function ($key) use ($guarded) {
                return ! in_array($key, $guarded, true);
            });
            foreach ($args as $key => $value) {
                if (in_array($key, $keys, true)) {
                    $this->{$key} = $value;
                }
            }
        }
    }

    protected function guarded(): array
    {
        $guarded = [];
        $class = new ReflectionClass($this);
        do {
            if ($parentGuarded = $class->getDefaultProperties()['guarded'] ?? null) {
                $guarded = array_merge($guarded, $parentGuarded);
            }
        } while ($class = $class->getParentClass());
        return array_unique($guarded);
    }
}
