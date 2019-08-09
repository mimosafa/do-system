<?php

namespace Wstd\Domain\Models\BusinessArea;

use Wstd\Domain\Models\Municipality\MunicipalityInterface;
use Wstd\Domain\Models\Municipality\MunicipalityRepositoryInterface;
use Wstd\Domain\Models\Prefecture\PrefectureInterface;
use Wstd\Domain\Models\Prefecture\PrefectureRepositoryInterface;
use Wstd\Infrastructure\Eloquents\BusinessArea as Eloquent;

final class BusinessArea implements BusinessAreaInterface
{
    private $eloquent;

    /**
     * @param mixed $eloquent
     */
    public function __construct($eloquent)
    {
        if (!($eloquent instanceof Eloquent)) {
            $eloquent = Eloquent::findOrFail($eloquent);
        }

        $this->eloquent = $eloquent;
    }

    public function getId(): int
    {
        return $this->eloquent->id;
    }

    public function getName(): string
    {
        if ($city = $this->getMunicipality()) {
            return $this->makeNameString($city);
        }
        return $this->makeNameString($this->getPrefecture());
    }

    public function getPrefecture(): PrefectureInterface
    {
        $repository = resolve(PrefectureRepositoryInterface::class);
        return $repository->findById($this->eloquent->prefecture_id);
    }

    public function getMunicipality(): ?MunicipalityInterface
    {
        if (!$cityId = $this->eloquent->city_id) {
            return null;
        }

        $repository = resolve(MunicipalityRepositoryInterface::class);
        return $repository->findById($cityId);
    }

    /**
     * @todo
     */
    public function contains(MunicipalityInterface $city): bool
    {
        return false;
    }

    public function __toString()
    {
        return $this->getName();
    }

    private function makeNameString($cityOrPref): string
    {
        $string = e($cityOrPref);
        $safix = mb_substr($string, -1);
        return sprintf('%s (%s内一円)', $string, $safix);
    }
}
