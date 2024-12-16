<?php


namespace App\Models\Traits;


use App\Http\Filters\FilterInterface;
use Illuminate\Database\Eloquent\Builder;

// по сути это filter(Builder $builder, FilterInterface $filter);
// Builder $builder - интерфейс для построения запросов к базе данных
// $builder - объект в которм указываеться что ищем по квери запросу
// FilterInterface $filter - абстрактный интерфейс с него забераем метод apply()
trait Filterable
{
    /**
     * @param Builder $builder
     * @param FilterInterface $filter
     *
     * @return Builder
     */
    public function scopeFilter(Builder $builder, FilterInterface $filter)
    {
        $filter->apply($builder);
        return $builder;
    }
}
