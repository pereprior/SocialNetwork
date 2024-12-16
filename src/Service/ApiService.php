<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ApiService
{
    private HttpClientInterface $httpClient;

    public function __construct(HttpClientInterface $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function fetch($url): array
    {
        try {
            return $this->httpClient->request('GET', $url)->toArray();
        } catch (ClientExceptionInterface $e) {
            return ['error' => 'Client error: ' . $e->getMessage()];
        } catch (DecodingExceptionInterface $e) {
            return ['error' => 'Decoding error: ' . $e->getMessage()];
        } catch (RedirectionExceptionInterface $e) {
            return ['error' => 'Redirection error: ' . $e->getMessage()];
        } catch (ServerExceptionInterface $e) {
            return ['error' => 'Server error: ' . $e->getMessage()];
        } catch (TransportExceptionInterface $e) {
            return ['error' => 'Transport error: ' . $e->getMessage()];
        }
    }
}