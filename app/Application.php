<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Database\Eloquent\Model;

class Application extends Model implements \MaddHatter\LaravelFullcalendar\Event
{
    protected  $fillable = [
        'date_applied', 'start_date', 'end_date', 'purpose', 'name_relative', 'relation', 'emp_notes', 'manager_notes', 'admin_notes', 'user_id', 'type_id', 'status_id',
    ];

    protected $dates = [
        'date_applied', 'start_date', 'end_date',
    ];

    public function scopeActive($query) {
        $query->where('start_date', '==', Carbon::now())->where(Carbon::now(), '<=', 'end_date');
    }

    public function setDateAppliedAttribute($date) {
        $this->attributes['date_applied'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function setStartDateAttribute($date) {
        $this->attributes['start_date'] = Carbon::parse($date);
    }

    public function setEndDateAttribute($date) {
        $this->attributes['end_date'] = Carbon::parse($date);
    }

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function attachment() {
        return $this->hasOne('App\Attachment');
    }

    public function status() {
        return $this->belongsTo('App\Status');
    }

    public function type() {
        return $this->belongsTo('App\Type');
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->user_id;
    }

    public function isAllDay() {
        return true;
    }

    public function getStart() {
        return $this->start_date;
    }

    public function getEnd() {
        return $this->end_date;
    }
}
