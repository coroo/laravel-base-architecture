<?php

namespace App\Nova\Master;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\Resource;
use Laravel\Nova\Fields\Text;

class MasterMudzakkir extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Master\MasterMudzakkir';

    public static $group = 'Master';
    
    public static function label() {
        return 'Mudzakkir List';
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    // public static $title = 'nama_mudzakkir';
    public function title()
    {
        return $this->kode_mudzakkir . ' | ' . $this->nama_mudzakkir;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'kode_mudzakkir', 'nama_mudzakkir',
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
            Text::make('Kode Mudzakkir', 'kode_mudzakkir')->sortable(),
            Text::make('Nama Mudzakkir', 'nama_mudzakkir')->sortable(),
        ];
    }

    protected static function applyOrderings($query, array $orderings)
    {
        if (empty($orderings)) {
            // This is your default order
            return $query->orderBy('kode_mudzakkir', 'asc');
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
