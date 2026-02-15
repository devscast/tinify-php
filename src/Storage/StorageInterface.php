<?php

declare(strict_types=1);

namespace Devscast\Tinify\Storage;

/**
 * @package Devscast\Tinify\Storage
 * @author bernard-ng <bernard@devscast.tech>
 */
interface StorageInterface
{
    public function getConfiguration(): array;
}
