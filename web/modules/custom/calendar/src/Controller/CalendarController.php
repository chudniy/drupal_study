<?php

namespace Drupal\calendar\Controller;

use Drupal\Core\Controller\ControllerBase;

class CalendarController extends ControllerBase
{
    public function calendarView()
    {
        $output = [];

        $output['#title'] = 'Custom Calendar';
        $output['#markup'] = 'Select the date for setting to configuration';

        return $output;
    }
}