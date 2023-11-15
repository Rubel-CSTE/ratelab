<?php

namespace App\Models;

use App\Constants\Status;
use App\Traits\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Company extends Model
{
    use Searchable;

    protected $casts = [
        'tags' => 'object'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function scopeApproved()
    {
        return $this->where('status', Status::APPROVED);
    }
    public function scopePending()
    {
        return $this->where('status', Status::PENDING);
    }

    public function scopeRejected()
    {
        return $this->where('status', Status::REJECTED);
    }
    

    public function badgeData()
    {
        $html = '';
        
        if($this->status == Status::APPROVED){
            $html = '<span class="badge badge--success">'.trans("Approved").'</span>';
        }
        elseif($this->status == Status::PENDING){
            $html = '<span class="badge badge--warning">'.trans("Pending").'</span>';
        }
        elseif($this->status == Status::REJECTED){
            $html = '<span class="badge badge--danger">'.trans("Rejected").'</span>';
        }
        return $html;
    }

    public function statusBadge(): Attribute
    {
        return new Attribute(
            get:fn () => $this->badgeData(),
        );
    }

}
