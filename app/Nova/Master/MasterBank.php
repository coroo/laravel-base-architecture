<?php

namespace App\Nova\Master;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\Resource;
use Laravel\Nova\Fields\Text;

class MasterBank extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Master\MasterBank';

    public static $group = 'Master';
    
    public static function label() {
        return 'Bank List';
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'nama_bank';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'kode_bank', 'nama_bank',
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
            Text::make('Kode Bank', 'kode_bank')->sortable(),
            Text::make('Nama Bank', 'nama_bank')->sortable(),
        ];
    }

    protected static function applyOrderings($query, array $orderings)
    {
        if (empty($orderings)) {
            // This is your default order
            return $query->orderBy('kode_bank', 'asc');
        }

        foreach ($orderings as $column => $direction) {
            $query->orderBy($column, $direction);
        }

        return $query;
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
