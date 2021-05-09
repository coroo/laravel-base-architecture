<?php

namespace App\Nova\Master;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Http\Requests\NovaRequest;
use App\Nova\Resource;
use App\User;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\HasMany;
use Laravel\Nova\Fields\Text;
use NovaAttachMany\AttachMany;

class MasterHalaqah extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Models\Master\MasterHalaqah';

    public static $group = 'Master';
    
    public static function label() {
        return 'Halaqah List';
    }

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    // public static $title = 'nama_halaqah';
    public function title()
    {
        return $this->kode_halaqah . ' | ' . $this->nama_halaqah;
    }

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'kode_halaqah', 'nama_halaqah',
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
            Text::make('Kode Halaqah', 'kode_halaqah')->sortable(),
            Text::make('Nama Halaqah', 'nama_halaqah')->sortable(),
            AttachMany::make('Anggota', 'user', \App\Nova\User::class)
                ->showCounts()
                ->showPreview()
                ->height('500px')
                ->fullWidth(),
            BelongsToMany::make('Anggota', 'user', \App\Nova\User::class)->readonly()->sortable(),
        ];
    }

    protected static function applyOrderings($query, array $orderings)
    {
        if (empty($orderings)) {
            // This is your default order
            return $query->orderBy('kode_halaqah', 'asc');
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
