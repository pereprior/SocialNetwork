<?php

namespace App\Service;

use DateTime;
use DateTimeInterface;
use DateInterval;

class DateTimeService
{
    public function nowDate(): string
    {
        return (new DateTime())->format('Y-m-d H:i:s');
    }

    public function timeSince(DateTimeInterface $datetime): string
    {
        $now = new DateTime();
        $interval = $now->diff($datetime);

        if ($interval->y > 0) {
            return $interval->y . ' years ago';
        }

        if ($interval->m > 0) {
            return $interval->m . ' months ago';
        }

        if ($interval->d > 0) {
            return $interval->d . ' days ago';
        }

        if ($interval->h > 0) {
            return $interval->h . ' hours ago';
        }

        if ($interval->i > 0) {
            return $interval->i . ' minutes ago';
        }

        return $interval->s . ' seconds ago';
    }
}