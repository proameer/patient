<?php

namespace App\Filament\Pages;

use App\Enums\Localization;
use App\Filament\Widgets\AppointmentsCalendarWidget;
use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;

class AppointmentsCalendar extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.appointments-calendar';

    public static function getNavigationLabel(): string
    {
        return __(Localization::Patient->value . '.appointments.title');
    }

    public function getTitle(): string | Htmlable
    {
        return __(Localization::Patient->value . '.appointments.title');
    }

    protected function getHeaderWidgets(): array
    {
        return [
            AppointmentsCalendarWidget::class,
        ];
    }
}
