<?php


namespace Modules\Frontend\Http\Service;


use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class Api
{
    const HTTP_OK = 200;
    const HTTP_ERROR = 400;
    const HTTP_UNAUTHORIZED = 401;
    const HTTP_FORBIDDEN = 403;

    public static function post($url, $data = [])
    {
        $data['lang'] = Session::get('lang');
        $user = session()->get('user');
        if ($user && isset($user['token_web'])) {
            $response = Http::withHeaders([
                'Authorization' => $user['token_web']
            ])->post(env('API_URL') . $url, $data);
        } else {
            $response = Http::post(env('API_URL') . $url, $data);
        }
        if ($response->ok()) {
            $data = json_decode($response->body(), true);
            if (isset($data['status'])) {
                if ($data['status'] == self::HTTP_UNAUTHORIZED) {
                    session()->forget('user');
                    header('Location: ' . route('Frontend::home.index'));
                    exit();
                } elseif ($data['status'] == self::HTTP_FORBIDDEN) {
                    session()->forget('user');
                    header('Location: ' . route('Frontend::home.index'));
                    exit();
                } else {
                    return $data;
                }
            }
        }
        return null;
    }

    public static function get($url, $data = [])
    {
        $data['lang'] = Session::get('lang');
        $user = session()->get('user');
        if ($user && isset($user['token_web'])) {
            $response = Http::withHeaders([
                'Authorization' => $user['token_web']
            ])->get(env('API_URL') . $url, $data);
        } else {
            $response = Http::get(env('API_URL') . $url, $data);
        }
        if ($response->ok()) {
            $data = json_decode($response->body(), true);
            if (isset($data['status'])) {
                if ($data['status'] == self::HTTP_UNAUTHORIZED) {
                    session()->forget('user');
                    header('Location: ' . route('Frontend::home.index'));
                    exit();
                } elseif ($data['status'] == self::HTTP_FORBIDDEN) {
                    session()->forget('user');
                    header('Location: ' . route('Frontend::home.index'));
                    exit();
                } else {
                    return $data;
                }
            }
        }
        return null;
    }
}
