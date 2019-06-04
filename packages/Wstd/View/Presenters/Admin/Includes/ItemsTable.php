<?php

namespace Wstd\View\Presenters\Admin\Includes;

use Wstd\Domain\Models\Item\ItemCollectionInterface;
use Wstd\View\Presenters\Admin\Modules\EntitiesTable;

class ItemsTable extends EntitiesTable
{
    public $id = 'items_table';
    public $title = '商品';

    public function __construct(ItemCollectionInterface $items, array $args = [])
    {
        parent::__construct($items, $args);
    }
}
