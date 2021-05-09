<?php

namespace App\Nova\Account;

use App\Nova\Resource;
use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class UserEducation extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Account\UserEducation';

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
            Select::make('pendidikan', 'pendidikan')->options([
                'sd'    => 'SD',
                'smp'   => 'SMP',
                'sma'   => 'SMA',
                'd1'    => 'D1',
                'd2'    => 'D2',
                'd3'    => 'D3',
                's1'    => 'S1',
                's2'    => 'S2',
                's3'    => 'S3'
            ])->displayUsing(function ($value) {
                return strtoupper($value);
            }),
            Text::make('nama_lembaga', 'nama_lembaga')->sortable(),
            Text::make('jurusan', 'jurusan')->sortable(),
            Text::make('gelar_akademik', 'gelar_akademik')->sortable(),
            Select::make('pendidikan_tamat', 'pendidikan_tamat')->options([
                'n'    => 'Tidak',
                'p'   => 'Masih Dijalani',
                'y'   => 'Ya',
            ])->displayUsing(function ($value) {
                if($value=='n'){
                    return 'Tidak';
                } else if($value=='p'){
                    return 'Masih Dijalani';
                } else if($value=='y'){
                    return 'Ya';
                } else {
                    return ucfirst($value);
                }
            }),
            Number::make('tamat_tahun', 'tamat_tahun')->sortable(),
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
