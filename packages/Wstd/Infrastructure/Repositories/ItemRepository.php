<?php

namespace Wstd\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Wstd\Domain\Models\Item\ItemInterface;
use Wstd\Domain\Models\Item\ItemCollectionInterface;
use Wstd\Domain\Models\Item\ItemRepositoryInterface;
use Wstd\Infrastructure\Eloquents\Item as Eloquent;
use Wstd\Infrastructure\Factories\ItemFactory;

final class ItemRepository implements ItemRepositoryInterface
{
    public function find(array $params): ItemCollectionInterface
    {
        $eloquents = $this->query($params);
        return $this->makeCollectionFromEloquents($eloquents);
    }

    public function findById(int $id): ?ItemInterface
    {
        $eloquent = Eloquent::find($id);
        return $eloquent ? ItemFactory::makeFromEloquent($eloquent) : null;
    }

    public function store(array $params): ItemInterface
    {
        return ItemFactory::make($params);
    }

    /**
     * @todo
     */
    public function makeCollectionFromEloquents(Collection $eloquents): ItemCollectionInterface
    {
        $collection = resolve(ItemCollectionInterface::class);

        if ($eloquents->isNotEmpty()) {
            foreach ($eloquents as $eloquent) {
                $collection[] = ItemFactory::makeFromEloquent($eloquent);
            }
        }

        return $collection;
    }

    private function query(array $params)
    {
        extract($params);

        return (new Eloquent())->when(isset($vendor_id), function ($query) use (&$vendor_id) {
            return $query->where('items.vendor_id', '=', $vendor_id);
        })->when(isset($name), function ($query) use (&$name) {
            return $query->where('items.name', 'like', "%{$name}%");
        })->when(isset($status), function ($query) use (&$status) {
            return $query->whereIn('items.status', $status);
        })->get();
    }
}
