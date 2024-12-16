<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class PostFilter extends AbstractFilter
{
    // ключи из request
    public const TITLE = 'title';
    public const CONTENT = 'content';
    public const AUTHOR = 'author';


    // реализация абстрактного метода возращающий массив методов
    // в котором каждый имеет свой query запрос в БД
    protected function getCallbacks(): array
    {
        return [
            self::TITLE => [$this, 'title'],
            self::CONTENT => [$this, 'content'],
            self::AUTHOR => [$this, 'author'],
        ];
    }

    // реализация call_user_func($callback, $builder, $this->queryParams[$name]);
    // $this->queryParams[$name] = параметры ?title=dasdasd ($value = dasdasd)
    public function title(Builder $builder, $value)
    {
        $builder->where('title', 'like', "%{$value}%");
    }

    public function content(Builder $builder, $value)
    {
        $builder->where('content', 'like', "%{$value}%");
    }

    public function author(Builder $builder, $value)
    {
        $builder->where('author', 'like', "%{$value}%");
    }
}
