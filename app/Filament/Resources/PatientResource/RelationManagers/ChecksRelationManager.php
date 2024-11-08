<?php

namespace App\Filament\Resources\PatientResource\RelationManagers;

use App\Enums\Localization;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ChecksRelationManager extends RelationManager
{
    protected static string $relationship = 'checks';


    public static function getTitle(Model $ownerRecord, string $pageClass): string
    {
        return __(Localization::Patient->value . '.checks.title');
    }


    public function table(Table $table): Table
    {
        return $table
            ->emptyStateHeading(__(Localization::Patient->value . '.checks.empty'))
            ->columns([
                Tables\Columns\TextColumn::make('check_in')
                    ->label(__(Localization::Patient->value . '.checks.in'))
                    ->sortable()
                    ->toggleable()
                    ->timezone('Asia/Baghdad')
                    ->dateTime('d/m/Y h:i:s A')
                    ->sortable(),

                Tables\Columns\TextColumn::make('check_out')
                    ->label(__(Localization::Patient->value . '.checks.out'))
                    ->sortable()
                    ->toggleable()
                    ->timezone('Asia/Baghdad')
                    ->dateTime('d/m/Y h:i:s A')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
