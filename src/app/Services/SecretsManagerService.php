<?php

namespace App\Services;

use Aws\Exception\AwsException;
use Aws\SecretsManager\SecretsManagerClient;
use Illuminate\Support\Facades\Log;

class SecretsManagerService
{
    private static SecretsManagerClient $client = null;

    /**
     * Initialize Secrets Manager Client as a Singleton.
     *
     * @return SecretsManagerClient
     */
    private static function getClient(): SecretsManagerClient
    {
        if (is_null(self::$client)) {
            try {
                self::$client = new SecretsManagerClient([
                    'version' => 'latest',
                    'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
                    'credentials' => [
                        'key'    => env('AWS_ACCESS_KEY_ID'),
                        'secret' => env('AWS_SECRET_ACCESS_KEY'),
                    ],
                ]);
                Log::info('Secrets Manager Client initialized.');
            } catch (AwsException $e) {
                Log::error('Error initializing Secrets Manager Client: ' . $e->getMessage());
                throw $e;
            }
        }

        return self::$client;
    }

    /**
     * Retrieve secrets from AWS Secrets Manager.
     *
     * @param string $secretId
     * @return array|null
     */
    public static function getSecret(string $secretId): ?array
    {
        try {
            $client = self::getClient();
            $result = $client->getSecretValue([
                'SecretId' => $secretId,
            ]);

            $secretString = $result['SecretString'] ?? null;
            if ($secretString) {
                Log::info("Secret accessed: {$secretId}");
                return json_decode($secretString, true);
            }

            return null;
        } catch (AwsException $e) {
            Log::error("Error retrieving secret [{$secretId}]: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Update secrets in AWS Secrets Manager.
     *
     * @param string $secretId
     * @param array $secretValues
     */
    public static function putSecret(string $secretId, array $secretValues): void
    {
        try {
            $client = self::getClient();
            $client->putSecretValue([
                'SecretId' => $secretId,
                'SecretString' => json_encode($secretValues),
            ]);

            Log::info("Secret updated: {$secretId}");
        } catch (AwsException $e) {
            Log::error("Error updating secret [{$secretId}]: " . $e->getMessage());
        }
    }

    /**
     * Describe a secret in AWS Secrets Manager.
     *
     * @param string $secretId
     * @return array|null
     */
    public static function describeSecret(string $secretId): ?array
    {
        try {
            $client = self::getClient();
            $result = $client->describeSecret([
                'SecretId' => $secretId,
            ]);

            Log::info("Secret described: {$secretId}");
            return $result->toArray();
        } catch (AwsException $e) {
            Log::error("Error describing secret [{$secretId}]: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Update a secret's version stage in AWS Secrets Manager.
     *
     * @param string $secretId
     * @param string $versionId
     * @param string $moveToVersionId
     */
    public static function updateSecretVersionStage(
        string $secretId,
        string $versionId,
        string $moveToVersionId
    ): void {
        try {
            $client = self::getClient();
            $client->updateSecretVersionStage([
                'SecretId' => $secretId,
                'VersionStage' => $versionId,
                'MoveToVersionId' => $moveToVersionId,
            ]);

            Log::info("Secret version stage updated: {$secretId}");
        } catch (AwsException $e) {
            Log::error("Error updating secret version stage [{$secretId}]: " . $e->getMessage());
        }
    }
}
