<?php

namespace App\Models\Blocks;

interface BlockControlInterface
{

    /**
     * @return string
     */
    public function getControlName(): string;

    /**
     * @return array
     */
    public function defineAdditionalProperties(): array;

}
