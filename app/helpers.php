<?php

function prayerStatusToLabel($status)
{
    $listStatusLabel = getListPrayerStatusLabel();

    return $listStatusLabel[$status] ?? '';
}

function prayerStatusToBadge($status)
{
    $listStatusLabel = getListPrayerStatusLabel();

    switch ($status) {
        case \App\Models\Prayer::STATUS_ACTIVE:
            return sprintf('<span class="badge bg-warning">%s</span>', $listStatusLabel[$status] ?? '');
        case \App\Models\Prayer::STATUS_COMPLETED:
            return sprintf('<span class="badge bg-success">%s</span>', $listStatusLabel[$status] ?? '');
        default:
            return sprintf('<span class="badge bg-primary">%s</span>', $listStatusLabel[$status] ?? '');
    }

    return $listStatusLabel[$status] ?? '';
}

function getListPrayerStatusLabel()
{
    return [
        \App\Models\Prayer::STATUS_ACTIVE => 'Nhờ cầu nguyện',
        \App\Models\Prayer::STATUS_COMPLETED => 'Đã hoàn tất'
    ];
}
