<?php

namespace App\Casts\Anggota;

use Illuminate\Contracts\Database\Eloquent\CastsAttributes;

class AnggotaEncdec implements CastsAttributes
{
    /**
     * Cast the given value.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function get($model, string $key, $value, array $attributes)
    {
        return trim($this->decryptData($value));
    }

    /**
     * Prepare the given value for storage.
     *
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @param  string  $key
     * @param  mixed  $value
     * @param  array  $attributes
     * @return mixed
     */
    public function set($model, string $key, $value, array $attributes)
    {
        return $this->encryptData(trim($value));
    }
    private function encryptData($data)
    {
        $key = env('APP_ENCRYPT_KEY', 'default-secret-key'); // Kunci enkripsi
        $iv = substr(hash('sha256', $key), 0, 16); // IV untuk AES-256-CBC

        return base64_encode(openssl_encrypt($data, 'AES-256-CBC', $key, 0, $iv));
    }

    private function decryptData($data)
    {
        $key = env('APP_ENCRYPT_KEY', 'default-secret-key');
        $iv = substr(hash('sha256', $key), 0, 16);
        return openssl_decrypt(base64_decode($data), 'AES-256-CBC', $key, 0, $iv);
    }
}
