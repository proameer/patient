<?php

namespace App\Filament\Resources\PatientResource\Widgets;

use App\Enums\Localization;
use App\Models\Patient;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class PatientStatsOverview extends BaseWidget
{

    protected function getColumns(): int
    {
        return 1;
    }

    protected function getStats(): array
    {
        return [
            Stat::make(__(Localization::Patient->value . '.count'), $this->getPatientsCount())
                ->color('primary')
                ->chart([2, 2]),
        ];
    }

    public function getPatientsCount()
    {
        return Patient::count();
    }
}
