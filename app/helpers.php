<?php

function prayerStatusToLabel($status)
{
    $listStatusLabel = getListPrayerStatusLabel();

    return $listStatusLabel[$status] ?? '';
}

function getListPrayerStatusLabel()
{
    return [
        \App\Models\Prayer::STATUS_ACTIVE => 'Nhờ ACE cầu nguyện',
        \App\Models\Prayer::STATUS_COMPLETED => 'Đã hoàn tất'
    ];
}
