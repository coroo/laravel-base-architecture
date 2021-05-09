<?php

namespace App\Nova\Filters\Account;

use App\Models\Master\MasterSyubah;
use Illuminate\Http\Request;
use Laravel\Nova\Filters\Filter;

class SyubahFilter extends Filter
{
    /**
     * The displayable name of the filter.
     *
     * @var string
     */
    public $name = 'Syu\'bah';

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
        return $query->where('users.syubah', '=', $value);
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
        $masterSyubah = MasterSyubah::get();
        foreach($masterSyubah as $syubah){
            $filterList[$syubah->nama_syubah] = $syubah->kode_syubah;
        }
        return $filterList;
    }
}
