<?php

if (!function_exists('metaAPI')) {

    /**
     * description.
     *
     * @return
     */
    function metaAPI()
    {
        return [
            'meta' => [
                'copyright' => env('APP_COPYRIGHT'),
                'authors'   => explode(',', env('APP_AUTHORS')),
                'locale'    => request()->lang ?? config('app.locale'),
            ],
            'jsonapi' => [
                'version' => env('API_VERSION'),
            ],
        ];
    }
}
