<?php

namespace Wstd\Domain\Models\Prefecture;

interface PrefectureInterface
{
    public function getId(): int;
    public function getName(): string;
    public function __toString();
}
