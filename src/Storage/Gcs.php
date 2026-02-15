<?php

declare(strict_types=1);

namespace Devscast\Tinify\Storage;

/**
 * @package Devscast\Tinify\Storage
 * @author bernard-ng <bernard@devscast.tech>
 */
class Gcs implements StorageInterface
{
    public function __construct(
        private readonly string $access_token,
        private readonly array $option = []
    ) {
    }

    public function getConfiguration(): array
    {
        return array_merge([
            'service' => 'gcs',
            'gcp_access_token' => $this->access_token,
        ], $this->option);
    }
}
