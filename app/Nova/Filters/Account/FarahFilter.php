<?php

namespace App\Nova\Filters\Account;

use App\Models\Master\MasterFarah;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class FarahFilter extends Filter
{
    /**
     * The displayable name of the filter.
     *
     * @var string
     */
    public $name = 'Far\'ah';

    /**
     * The filter's component.
     *
     * @var string
     */
    public $component = 'select-filter';

    /**
     * Apply the filter to the given query.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply(Request $request, $query, $value)
    {
        return $query->where('users.farah', '=', $value);
    }

    /**
     * Get the filter's available options.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function options(Request $request)
    {
        $filterList = [];
        $masterFarah = MasterFarah::get();
        foreach($masterFarah as $farah){
            $filterList[$farah->nama_farah] = $farah->kode_farah;
        }
        return $filterList;
    }
}
