<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable, LaratrustUserTrait;

    protected $fillable = [
        'name', 'email', 'password','profile_image', 'created_by', 'facility_id', 'sex', 'address', 'phone', 'spoke_id'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function uploaded_clients()
	{
		return $this->hasMany('App\Model\Client', 'user_id', 'id');
	}

    public function facility()
    {
        return $this->belongsTo('App\Model\Facility');
    }

    public function spoke()
    {
        return $this->belongsTo('App\Model\Spoke');
    }

    public function getUserProfileAttribute()
    {
        return asset('storage/'.$this->profile_image);
    }

    public function monthly_clients_to_view()
    {
        if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordinator')){
            $data = array();
            $week_title = array("This Month", "Last Month", "Last 2 Months");

            $start_date = date('Y-m-d', strtotime("-2 month"));
            $end_date = date('Y-m-d', strtotime('+1 day'));
            $i=2;

            for($date = $start_date; $date <= $end_date; $date = date('Y-m-d', strtotime($date. '1 month'))) {
                $dates = getMonthDates($date, $start_date, $end_date);

                $record = DB::table('clients')
                    ->select(DB::raw('COUNT(created_at) as count'))
                    ->whereRaw('created_at >= ? AND created_at <= ?
                                GROUP BY MONTH(created_at)',
                                    [$dates[0], $dates[1]])
                    ->get()->first();

                $data[] = [
                    'title' => $week_title[$i],
                    'count' => ($record ? $record->count : "0"),
                    'month' => date_format(date_create($dates[0]), "M")
                ];

                $i--;
            }

            return array_reverse($data);
        }elseif(auth()->user()->hasRole('facility')){
            $data = array();
            $week_title = array("This Month", "Last Month", "Last 2 Months");

            $start_date = date('Y-m-d', strtotime("-2 month"));
            $end_date = date('Y-m-d', strtotime('+1 day'));
            $i=2;

            for($date = $start_date; $date <= $end_date; $date = date('Y-m-d', strtotime($date. '1 month'))) {
                $dates = getMonthDates($date, $start_date, $end_date);

                $record = DB::table('clients')
                    ->select(DB::raw('COUNT(created_at) as count'))
                    ->whereRaw('user_id = ? AND created_at >= ? AND created_at <= ?
                                GROUP BY MONTH(created_at)',
                                    [auth()->user()->id, $dates[0], $dates[1]])
                    ->get()->first();

                $data[] = [
                    'title' => $week_title[$i],
                    'count' => ($record ? $record->count : "0"),
                    'month' => date_format(date_create($dates[0]), "M")
                ];

                $i--;
            }

            return array_reverse($data);
        }
    }

    public function weekly_clients_to_view()
    {
        if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordinator')){
            $data = array();
            $week_title = array("This Week", "Last Week", "Last 2 Weeks", "Last 3 Weeks", "Last 4 Weeks");

            $start_date = date('Y-m-d', strtotime("-4 week"));
            $end_date = date('Y-m-d', strtotime('+1 day'));
            $i=4;

            for($date = $start_date; $date <= $end_date; $date = date('Y-m-d', strtotime($date. ' + 7 days'))) {
                $dates = getWeekDates($date, $start_date, $end_date);

                $record = DB::table('clients')
                    ->select(DB::raw('COUNT(created_at) as count'))
                    ->whereRaw('created_at >= ? AND created_at <= ?
                                GROUP BY WEEK(created_at)',
                                    [$dates[0], $dates[1]])
                    ->get()->first();

                $data[] = [
                    'title' => $week_title[$i],
                    'count' => ($record ? $record->count : "0"),
                ];

                $i--;
            }

            return array_reverse($data);
        }elseif(auth()->user()->hasRole('facility')){
            $data = array();
            $week_title = array("This Week", "Last Week", "Last 2 Weeks", "Last 3 Weeks", "Last 4 Weeks");

            $start_date = date('Y-m-d', strtotime("-4 week"));
            $end_date = date('Y-m-d', strtotime('+1 day'));
            $i=4;

            for($date = $start_date; $date <= $end_date; $date = date('Y-m-d', strtotime($date. ' + 7 days'))) {
                $dates = getWeekDates($date, $start_date, $end_date);

                $record = DB::table('clients')
                    ->select(DB::raw('COUNT(created_at) as count'))
                    ->whereRaw('user_id = ? AND created_at >= ? AND created_at <= ?
                                GROUP BY WEEK(created_at)',
                                    [auth()->user()->id, $dates[0], $dates[1]])
                    ->get()->first();

                $data[] = [
                    'title' => $week_title[$i],
                    'count' => ($record ? $record->count : "0"),
                ];

                $i--;
            }

            return array_reverse($data);
        }
    }

    public function daily_clients_to_view()
    {
        if(auth()->user()->hasRole('admin') || auth()->user()->hasRole('coordinator')){
            $record = DB::table('clients')
                    ->select(DB::raw('COUNT(created_at) as count'))
                    ->whereRaw('created_at >= ? AND created_at <= ? GROUP BY created_at',
                        [date('Y-m-d', strtotime('now'))." 00:00:00", date('Y-m-d', strtotime('now'))." 23:59:59"])
                    ->get();

            return ($record ? count($record) : "0");
        }elseif(auth()->user()->hasRole('facility')){
            $record = DB::table('clients')
                    ->select(DB::raw('COUNT(created_at) as count'))
                    ->whereRaw('user_id = ? AND created_at >= ? AND created_at <= ? GROUP BY created_at',
                        [auth()->user()->id, date('Y-m-d', strtotime('now'))." 00:00:00", date('Y-m-d', strtotime('now'))." 23:59:59"])
                    ->get();

            return ($record ? count($record) : "0");
        }
    }
}
