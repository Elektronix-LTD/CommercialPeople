<?php
/**
 * Created by PhpStorm.
 * User: Lukas
 * Date: 10.09.2018
 * Time: 02:01
 */

namespace App\JWT;


class JWT
{
    const SECRET = 'D@fpGn9#fgj42Bz19sl2';
    const ALGORITHM = 'sha256';

    public function checkJWTToken(?string $jwtToken) : bool
    {
        if (!$jwtToken)
            return false;

        // Checking if the user is authenticated and authorized
        list($header, $payload, $signature) = explode('.',$jwtToken);
        $header = base64_decode($header);
        $payload = base64_decode($payload);
        $signature = base64_decode($signature);

        $calculatedSignature = hash_hmac(json_decode($header)->algorithm,$header.'.'.$payload, self::SECRET);
        return ($signature === $calculatedSignature) && (json_decode($payload)->authenticated) && (json_decode($payload)->authorized);
    }

    public function createJWTToken(int $userId) : string
    {
        $data = [
            [
                'algorithm' => 'sha256',
                'type' => 'JWT'
            ],
            [
                'userId' => $userId,
                'authenticated' => true,
                'authorized' => true
            ],
            [
                // signature here
            ]
        ];
        $signature = hash_hmac(self::ALGORITHM, json_encode($data[0]).'.'.json_encode($data[1]), self::SECRET);
        $data[2] = $signature;

        $finalArray[] = base64_encode(json_encode($data[0]));
        $finalArray[] = base64_encode(json_encode($data[1]));
        $finalArray[] = base64_encode($data[2]);
//        print_r($data);
        return implode('.', $finalArray);
    }
}