<?php

namespace App\Nova\Account;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\Resource;
use App\Nova\User;
use Laravel\Nova\Fields\BelongsTo;

class UserJob extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Account\UserJob';

    public static $group = 'Account';
    
    public static function label() {
        return 'Riwayat Pekerjaan';
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            // ID::make()->sortable(),
            Number::make('Tahun Mulai', 'tahun_mulai')->sortable(),
            Number::make('Tahun Selesai', 'tahun_selesai')->sortable(),
            Text::make('Nama Pekerjaan', 'nama_pekerjaan')->sortable(),
            Text::make('Nama Institusi', 'nama_institusi')->sortable(),
            Text::make('Kota Institusi', 'kota')->sortable(),

            BelongsTo::make('Credential', 'user', User::class)
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
