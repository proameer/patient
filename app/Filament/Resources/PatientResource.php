<?php

namespace App\Filament\Resources;

use App\Enums\Gender;
use App\Enums\Localization;
use App\Filament\Resources\PatientResource\Pages;
use App\Filament\Resources\PatientResource\RelationManagers;
use App\Filament\Resources\PatientResource\RelationManagers\ChecksRelationManager;
use App\Models\Patient;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PatientResource extends Resource
{
    protected static ?string $model = Patient::class;

    protected static ?string $navigationIcon = 'carbon-person';


    public static function getNavigationLabel(): string
    {
        return __(Localization::Patient->value . '.title');
    }

    public static function getModelLabel(): string
    {

        return __(Localization::Patient->value . '.title');
    }

    public static function getPluralModelLabel(): string
    {

        return __(Localization::Patient->value . '.title');
    }

    public static function getPluralLabel(): ?string
    {

        return __(Localization::Patient->value . '.title');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__(Localization::Patient->value . '.personal_information'))->schema([
                    Grid::make(2)->schema([

                        Forms\Components\TextInput::make('full_name')
                            ->label(__(Localization::Patient->value . '.full_name'))
                            ->required(),

                        Forms\Components\TextInput::make('first_name')
                            ->label(__(Localization::Patient->value . '.first_name')),

                        Forms\Components\TextInput::make('second_name')
                            ->label(__(Localization::Patient->value . '.second_name')),

                        Forms\Components\TextInput::make('third_name')
                            ->label(__(Localization::Patient->value . '.third_name')),

                        Forms\Components\TextInput::make('fourth_name')
                            ->label(__(Localization::Patient->value . '.fourth_name')),

                        Forms\Components\FileUpload::make('photo')
                            ->label(__(Localization::Patient->value . '.photo'))
                            ->image(),

                        Forms\Components\Select::make('gender')
                            ->label(__(Localization::Patient->value . '.gender.title'))
                            ->native(false)
                            ->options(collect(Gender::cases())->mapWithKeys(fn($gender) => [$gender->value => $gender->label()])),

                        Forms\Components\TextInput::make('age')
                            ->label(__(Localization::Patient->value . '.age'))
                            ->numeric(),
                    ])
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {

        return $table
            ->searchable()
            ->striped()
            ->columns([

                ViewColumn::make('qr_code')
                    ->label(Localization::Patient->value . '.qr_code')
                    ->translateLabel()
                    ->view('filament.pages.patient-qr-code'),

                Tables\Columns\TextColumn::make('full_name')
                    ->label(Localization::Patient->value . '.full_name')
                    ->translateLabel()
                    ->toggleable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('gender')
                    ->label(Localization::Patient->value . '.gender.title')
                    ->translateLabel()
                    ->formatStateUsing(fn($state) => Gender::getLabelByValue($state))
                    ->toggleable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('age')
                    ->label(Localization::Patient->value . '.age')
                    ->translateLabel()
                    ->toggleable()
                    ->sortable(),

                ImageColumn::make('photo')
                    ->label(Localization::Patient->value . '.photo')
                    ->translateLabel()
                    ->toggleable()
                    ->disk('public'),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(Localization::Patient->value . '.created_at')
                    ->translateLabel()
                    ->toggleable()
                    ->timezone('Asia/Baghdad')
                    ->dateTime('d/m/Y h:i:s A')
                    ->sortable(),
            ])
            ->filters([
                // Optionally add filters here
            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Action::make('print_qr_code')
                        ->label(Localization::Patient->value . '.print_qr_code')
                        ->translateLabel()
                        ->icon('carbon-printer')
                        ->url(fn($record) => route('patient.pdf', ['qrCode' => $record->qr_code]))
                        ->openUrlInNewTab(),
                ])
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ChecksRelationManager::class,
        ];
    }







    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPatients::route('/'),
            'create' => Pages\CreatePatient::route('/create'),
            'edit' => Pages\EditPatient::route('/{record}/edit'),
        ];
    }
}
