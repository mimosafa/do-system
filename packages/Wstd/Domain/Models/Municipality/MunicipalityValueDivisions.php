<?php

namespace Wstd\Domain\Models\Municipality;

use Illuminate\Support\Str;
use Wstd\Domain\Models\ValueObjectInterface;
use Wstd\Domain\Modules\Models\ValueObjectTrait;

class MunicipalityValueDivisions implements ValueObjectInterface
{
    use ValueObjectTrait;

    const NAME = 'division';
    const LABEL = '都市区分';

    private $divisions = [];

    public function __construct(array $divisions)
    {
        if (!$divisions) {
            return;
        }

        foreach ($divisions as $division) {
            $this->divisions[] = MunicipalityValueDivision::of($division);
        }
    }

    public function getValue()
    {
        return $this->divisions;
    }

    public function __call($name, $arguments)
    {
        if (preg_match('/^is(.+)$/', $name, $match)) {
            if (!$this->divisions) {
                return false;
            }
            foreach ($this->divisions as $division) {
                if ($division->{$name}()) {
                    return true;
                }
            }
            return false;
        }

        throw new \BadMethodCallException("No method constant '$name' in class " . \get_called_class());
    }

    public function __toString()
    {
        if (empty($this->divisions)) {
            return '';
        }

        return implode(', ', $this->divisions);
    }
}
