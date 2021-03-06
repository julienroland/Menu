<?php namespace Menu\Entities;

use Baum\Node;
use Core\Internationalisation\Translatable;

class Menuitem extends Node
{
    use Translatable;

    public $translatedAttributes = ['title', 'uri', 'url', 'status'];
    protected $fillable = [
        'menu_id',
        'page_id',
        'position',
        'target',
        'module_name',
        'title',
        'uri',
        'url',
        'status'
    ];

    public function menu()
    {
        return $this->belongsTo('Modules\Menu\Entities\Menu');
    }
}
