<?php

namespace Yabloncev\Giftery;

use GuzzleHttp\Client;

/**
 * Class Payment
 */
class Payment
{
    /**
     * make signature for request
     *
     * @param string $method
     * @param array $data
     *
     * @return string
     */
    protected function signature(string $method, array $data): string
    {
        return hash('sha256', $method . json_encode($data) . config('giftery.secret'));
    }

    /**
     * send data
     *
     * @param string $method
     * @param array $data
     *
     * @return string
     */
    protected function send(string $method, array $data)
    {
        $response = (new Client())->get('https://ssl-api.giftery.ru', [
            'query' => [
                'cmd' => $method,
                'in' => 'json',
                'out' => 'json',
                'data' => json_encode($data),
                'id' => config('giftery.id'),
                'sig' => $this->signature($method, $data),
            ], ])->getBody();

        return json_decode($response, true);
    }

    /**
     * pay phone number
     *
     * @param string $phone
     *
     * @return string
     */
    public function makeTopUp(string $phone)
    {
        return $this->send('makeTopUp', [
            'phone' => preg_replace('#[^\d]#', '', $phone),
            'face' => config('giftery.amount'),
        ]);
    }

    /**
     * get payment status
     *
     * @param int $id payment id
     *
     * @return string
     */
    public function getStatus(int $id)
    {
        return $this->send('getStatus', ['id' => $id]);
    }
}
