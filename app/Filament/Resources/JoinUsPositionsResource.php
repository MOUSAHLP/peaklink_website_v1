<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JoinUsPositionsResource\Pages;
use App\Models\JoinUsPositions;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class JoinUsPositionsResource extends Resource
{
    use Translatable;
    protected static ?string $model = JoinUsPositions::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'انضم الينا';
    protected static ?int $navigationSort = 2;


    public static function getNavigationGroup(): ?string
    {
        return __('join_us.join_us');
    }
    public static function getModelLabel(): string
    {
        return __('join_us.join_us_position');
    }
    public static function getPluralLabel(): string
    {
        return __('join_us.join_us_positions');
    }
    public static function getNavigationLabel(): string
    {
        return __('join_us.join_us_positions');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('position')
                            ->label(__("filament_form.join_us_position"))
                            ->maxLength(255),
                        Forms\Components\Toggle::make('status')
                            ->label(__("filament_form.status")),

                    ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('position')
                    ->label(__("filament_form.join_us_position"))
                    ->searchable(),

                Tables\Columns\ToggleColumn::make('status')
                    ->label(__("filament_form.status")),

                Tables\Columns\TextColumn::make('created_at')
                    ->label(__("filament_form.created_at"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label(__("filament_form.updated_at"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),

            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJoinUsPositions::route('/'),
            'create' => Pages\CreateJoinUsPositions::route('/create'),
            'edit' => Pages\EditJoinUsPositions::route('/{record}/edit'),
        ];
    }
}
