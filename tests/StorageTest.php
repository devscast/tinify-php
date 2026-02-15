<?php

declare(strict_types=1);

namespace Devscast\Tinify\Tests;

use Devscast\Tinify\Storage\Aws;
use Devscast\Tinify\Storage\Gcs;
use PHPUnit\Framework\TestCase;

final class StorageTest extends TestCase
{
    public function testAwsConfigurationContainsRequiredKeysAndOptions(): void
    {
        $storage = new Aws(
            region: 'us-east-1',
            secret_access_key: 'secret',
            access_key_id: 'access',
            option: [
                'headers' => [
                    'Cache-Control' => 'public, max-age=31536000',
                ],
            ]
        );

        $this->assertSame(
            [
                'service' => 'aws',
                'region' => 'us-east-1',
                'aws_secret_access_key' => 'secret',
                'aws_access_key_id' => 'access',
                'headers' => [
                    'Cache-Control' => 'public, max-age=31536000',
                ],
            ],
            $storage->getConfiguration()
        );
    }

    public function testGcsConfigurationContainsRequiredKeysAndOptions(): void
    {
        $storage = new Gcs(
            access_token: 'token',
            option: [
                'headers' => [
                    'Cache-Control' => 'public, max-age=31536000',
                ],
            ]
        );

        $this->assertSame(
            [
                'service' => 'gcs',
                'gcp_access_token' => 'token',
                'headers' => [
                    'Cache-Control' => 'public, max-age=31536000',
                ],
            ],
            $storage->getConfiguration()
        );
    }
}
