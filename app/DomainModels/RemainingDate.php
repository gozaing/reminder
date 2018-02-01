<?php
namespace App\DomainModels;

use Cake\Chronos\Chronos;

class RemainingDate
{
    private $date;

    public function __construct($date = null) {

        if (is_null($date)) {
            $this->date = Chronos::today();
        } else {
            $this->date = Chronos::parse($date);
        }
    }

    public function calcRemainingDate($target) {

        if (Chronos::parse($target)->isPast()) {
            return 0;
        } else {
            return $this->date->diffInDays(Chronos::parse($target));
        }
    }

}
