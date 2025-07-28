<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class TestGoogleScript extends Command
{
    protected $signature = 'test:google-script';
    protected $description = 'Test Google Apps Script integration';

    public function handle()
    {
        $this->info('Testing Google Apps Script integration...');

        // Test data
        $testData = [
            'type' => 'confirm',
            'timestamp' => now()->toISOString(),
            'name' => 'Test User',
            'phone' => '0123456789',
            'email' => 'test@example.com',
            'message' => 'Test message from Laravel command'
        ];

        try {
            $config = config('services.google_script');
            $this->info('Google Script URL: ' . $config['url']);

            $httpClient = Http::timeout($config['timeout']);
            
            if (!$config['verify_ssl']) {
                $httpClient = $httpClient->withoutVerifying();
            }
            
            $httpClient = $httpClient->retry($config['retry_times'], $config['retry_delay']);
            
            $this->info('Sending test data: ' . json_encode($testData));
            
            $response = $httpClient->post($config['url'], $testData);
            
            $this->info('Response Status: ' . $response->status());
            $this->info('Response Body: ' . $response->body());
            
            if ($response->successful()) {
                $this->info('✅ Request sent successfully!');
                $responseData = $response->json();
                if (isset($responseData['result']) && $responseData['result'] === 'success') {
                    $this->info('✅ Google Script processed data successfully');
                } elseif (isset($responseData['result']) && $responseData['result'] === 'error') {
                    $this->error('❌ Google Script returned error: ' . ($responseData['error'] ?? 'Unknown error'));
                } else {
                    $this->warn('⚠️ Unexpected response format');
                }
            } else {
                $this->error('❌ Request failed with status: ' . $response->status());
            }
            
            Log::info('Google Script test completed', [
                'status' => $response->status(),
                'body' => $response->body()
            ]);
            
        } catch (\Exception $e) {
            $this->error('❌ Error: ' . $e->getMessage());
            Log::error('Google Script test failed: ' . $e->getMessage());
        }
    }
}
