<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use PhpParser\Node\Stmt\DeclareDeclare;

class Attendance extends Model
{
  public $totalAttendanceHours=7;
  protected $fillable=["attendance_day","check_in","check_out","employee_id","late"];
    public function setLateAttribute() {
        $checkInCarboned = Carbon::parse($this->attributes["check_in"]);
        $checkOutCarboned = Carbon::parse($this->attributes["check_out"]);
        $diffInHours=$checkInCarboned->diffInHours($checkOutCarboned);
        $lateHours=$this->totalAttendanceHours-$diffInHours;
        $this->attributes['late'] =$lateHours;
    }
  public function employee(){
      return $this->belongsTo(Employee::class);
  }


}
