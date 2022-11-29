<?php

namespace App\Models\Blocks\BlockControls;

use App\Models\Blocks\BlockControlInterface;
use JetBrains\PhpStorm\ArrayShape;

class BlueCoatProxy implements BlockControlInterface
{


    public function getControlName(): string
    {
        return "Blue Coat Next Gen Proxy";
    }

    #[ArrayShape(['file_name' => "string[]"])]
    public function defineAdditionalProperties(): array {
        return [
            'file_name' => [
                'type' => 'string',
                'default' => 'proxy.txt'
            ]
        ];
    }

}
