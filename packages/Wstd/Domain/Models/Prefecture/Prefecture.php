<?php

namespace Wstd\Domain\Models\Prefecture;

final class Prefecture implements PrefectureInterface
{
    private $prefecture_id;
    private $prefecture_name;

    public function __construct(int $prefecture_id, string $prefecture_name)
    {
        $this->prefecture_id = $prefecture_id;
        $this->prefecture_name = $prefecture_name;
    }

    public function getId(): int
    {
        return $this->prefecture_id;
    }

    public function getName(): string
    {
        return $this->prefecture_name;
    }

    public function __toString()
    {
        return $this->getName();
    }
}
