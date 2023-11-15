<?php

namespace App\Models;
use App\Constants\Status;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Casts\Attribute;


use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
 use Searchable;
    public function statusBadge(): Attribute
    {
        return new Attribute(
            get:fn () => $this->badgeData(),
        );
    }

    public function badgeData(){
        $html = '';
        if($this->status == Status::ENABLE){
            $html = '<span class="badge badge--success">'.trans("Enable").'</span>';
        }
        elseif($this->status == Status::DISABLE){
            $html = '<span class="badge badge--warning">'.trans("Disable").'</span>';
        }
        return $html;
    }
}
