<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event{

    private $title;
    private $date;
    private $attendeeCount;
    private $maxAttendeeCount;

    function __construct($title, $date, $attendeeCount)
    {
        $this->title = $title;
        $this->date = $date;
        $this->attendeeCount = $attendeeCount;
    }

    function addAttendee($count)
    {
        if ($this->attendeeCount += $count > $this->maxAttendeeCount)
            {
                echo "Count overpasses max attendee count!";
            }
            else
            {
                $this->attendeeCount += $count;
            }
    }

    function setMaxAttendeeCount($count)
    {
        $this->maxAttendeeCount += $count;
    }

    function showInfo()
    {
        echo
        "\n" .
        $this->title .
        "\n",
        $this->date .
        "\n",
        $this->attendeeCount .
        "\n";
    }
}