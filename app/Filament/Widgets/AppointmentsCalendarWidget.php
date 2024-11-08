<?php

namespace App\Filament\Widgets;

use App\Enums\Localization;
use App\Helpers\CarbonHelper;
use App\Models\Patient;
use App\Models\PatientAppointment;
use Carbon\Carbon;
use Filament\Actions\Action;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Illuminate\Database\Eloquent\Model;
use Filament\Notifications\Notification;
use Saade\FilamentFullCalendar\Actions\CreateAction;
use Saade\FilamentFullCalendar\Actions\DeleteAction;
use Saade\FilamentFullCalendar\Actions\EditAction;
use Saade\FilamentFullCalendar\Actions\ViewAction;
use Saade\FilamentFullCalendar\Data\EventData;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class AppointmentsCalendarWidget extends FullCalendarWidget
{
    public Model | string | null $model = PatientAppointment::class;

    public $patientFullName = null;

    public $createPatientVisiable = true;

    protected function headerActions(): array
    {
        return [
            CreateAction::make()
                ->label(Localization::Patient->value . '.appointments.create')
                ->translateLabel()
                ->modalHeading(__(Localization::Patient->value . '.appointments.create'))
                ->modalWidth('sm')
                ->createAnother(false)
                ->mountUsing(
                    function (Form $form, array $arguments) {
                        $this->createPatientVisiable = true;

                        $form->fill([
                            'start_at' => CarbonHelper::dateTimeFormat($arguments['start'] ?? null),
                            'end_at' => CarbonHelper::dateTimeFormat($arguments['end'] ?? null)
                        ]);
                    }
                )
        ];
    }

    protected function viewAction(): Action
    {
        return ViewAction::make()
            ->modalWidth('sm')
            ->modalHeading(fn($record) => __(Localization::Patient->value . '.appointments.view', ['patient' => $record->patient->full_name]));
    }


    protected function modalActions(): array
    {
        return [
            EditAction::make()
                ->modalHeading(fn($record) => __(Localization::Patient->value . '.appointments.edit', ['patient' => $record->patient->full_name]))
                ->modalWidth('sm')
                ->mountUsing(
                    function (PatientAppointment $record, Form $form, array $arguments) {

                        $form->fill([
                            'name' => $record->name,
                            // TODO: need refactor ( find a way to reduce the use of ??)
                            'start_at' => CarbonHelper::dateTimeFormat($arguments['event']['start'] ?? null) ?? $record->start_at,
                            'end_at' => CarbonHelper::dateTimeFormat($arguments['event']['end'] ?? null) ?? $record->end_at
                        ]);
                    }
                ),
            DeleteAction::make()
                ->modalWidth('sm')
                ->modalDescription(fn($record) => $this->getAppointmentStartAtLocalization($record) . ' - ' . $this->getAppointmentEndAtLocalization($record))
                ->modalHeading(fn($record) => __(Localization::Patient->value . '.appointments.delete', ['patient' => $record->patient->full_name])),
        ];
    }

    public function getAppointmentStartAtLocalization($record)
    {
        return __(Localization::Patient->value . '.appointments.patient_start_at', ['patient' => CarbonHelper::dateTimeFormatArabic($record->start_at)]);
    }

    public function getAppointmentEndAtLocalization($record)
    {
        return __(Localization::Patient->value . '.appointments.patient_end_at', ['patient' => CarbonHelper::dateTimeFormatArabic($record->end_at)]);
    }

    /**
     * FullCalendar will call this function whenever it needs new event data.
     * This is triggered when the user clicks prev/next or switches views on the calendar.
     */
    public function fetchEvents(array $fetchInfo): array
    {
        // You can use $fetchInfo to filter events by date.
        // This method should return an array of event-like objects. See: https://github.com/saade/filament-fullcalendar/blob/3.x/#returning-events
        // You can also return an array of EventData objects. See: https://github.com/saade/filament-fullcalendar/blob/3.x/#the-eventdata-class
        return PatientAppointment::query()
            ->where('start_at', '>=', $fetchInfo['start'])
            ->where('end_at', '<=', $fetchInfo['end'])
            ->get()
            ->map(
                fn(PatientAppointment $event) => EventData::make()
                    ->id($event->id)
                    ->title($event->patient->full_name)
                    ->start($event->start_at)
                    ->end($event->end_at)
            )
            ->toArray();
    }

    public function eventDidMount(): string
    {
        return <<<JS
        function({ event, timeText, isStart, isEnd, isMirror, isPast, isFuture, isToday, el, view }){
            el.setAttribute("x-tooltip", "tooltip");
            el.setAttribute("x-data", "{ tooltip: '"+event.title+"' }");
        }
    JS;
    }

    public function getFormSchema(): array
    {
        return [
            Grid::make(1)->schema([
                Select::make('patient_id')
                    ->native(false)
                    ->label(Localization::Patient->value . '.patient')
                    ->translateLabel()
                    ->searchable()
                    ->live()
                    ->preload()
                    ->required()

                    ->relationship('patient', 'full_name'),
                Section::make(__(Localization::Patient->value . '.quick_create'))
                    ->schema([
                        ViewField::make('create_patient')
                            ->view('filament.pages.appointments-create-patient', [
                                'label' => __(Localization::Patient->value . '.full_name'),
                                'buttonLabel' => __(Localization::Patient->value . '.quick_create'),
                            ])
                            ->columnSpanFull()
                            ->label('Create a new patient'),
                    ])
                    ->collapsed()
                    ->live()
                    ->visible(fn(Get $get) => ! $get('patient_id') && $this->createPatientVisiable),

                DateTimePicker::make('start_at')
                    ->required()
                    ->translateLabel()
                    ->label(Localization::Patient->value . '.appointments.start_at'),
                DateTimePicker::make('end_at')
                    ->required()
                    ->translateLabel()
                    ->label(Localization::Patient->value . '.appointments.end_at'),
            ]),
        ];
    }



    public function config(): array
    {
        return [
            'initialView' => 'timeGridDay', // Set initial view to week view
            'contentHeight' => 'auto', // Adjust the height as needed
            'allDaySlot' => false, // Remove the all-day slot if not needed
            'slotLabelFormat' => [ // Format for time slots
                'hour' => 'numeric',
                'minute' => 'numeric',
                'hour12' => true, // Use 12-hour format
            ],
            'firstDay' => 0,
            'titleFormat' => 'YYYY/MM/DD',
            'headerToolbar' => [
                'left' => 'timeGridWeek,timeGridDay,dayGridMonth',
                'center' => 'title',
                'right' => 'prev,next today',
            ],
        ];
    }

    public function createNewPatient()
    {

        Patient::create([
            'full_name' => $this->patientFullName,
        ]);

        Notification::make()
            ->title(__('notification.success'))
            ->success()
            ->send();

        $this->createPatientVisiable = false;
    }
}
