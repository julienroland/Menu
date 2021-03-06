<?php namespace Menu\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use Translatable;

    protected $fillable = [
        'name',
        'class',
        'title',
        'status',
    ];
    public $translatedAttributes = ['title', 'status'];

    public function menuitems()
    {
        return $this->hasMany('Modules\Menu\Entities\Menuitem')->orderBy('position', 'asc');
    }
}
