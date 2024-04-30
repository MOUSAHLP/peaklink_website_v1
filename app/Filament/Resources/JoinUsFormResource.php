<?php

namespace App\Filament\Resources;

use App\Filament\Resources\JoinUsFormResource\Pages;
use App\Filament\Resources\JoinUsFormResource\RelationManagers;
use App\Models\JoinUsForm;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JoinUsFormResource extends Resource
{
    protected static ?string $model = JoinUsForm::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'الاستمارات';

    protected static ?int $navigationSort = 3;


    public static function getNavigationGroup(): ?string
    {
        return __('home/contact_us.forms');
    }
    public static function getModelLabel(): string
    {
        return __('join_us.join_us_form');
    }
    public static function getPluralLabel(): string
    {
        return __('join_us.join_us_form');
    }
    public static function getNavigationLabel(): string
    {
        return __('join_us.join_us_form');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Forms\Components\TextInput::make('join_us_position_id')
                //     ->required()
                //     ->numeric(),
                // Forms\Components\TextInput::make('full_name')
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('email')
                //     ->email()
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\TextInput::make('phone')
                //     ->tel()
                //     ->required()
                //     ->maxLength(255),
                // Forms\Components\Textarea::make('message')
                //     ->required()
                //     ->maxLength(65535)
                //     ->columnSpanFull(),
                // Forms\Components\TextInput::make('file')
                //     ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('position.position')
                    ->label(__("filament_form.join_us_position"))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('full_name')
                    ->label(__("filament_form.full_name"))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('email')
                    ->label(__("filament_form.email"))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label(__("filament_form.phone"))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('message')
                    ->label(__("filament_form.message"))
                    ->searchable(),

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
                // Tables\Actions\EditAction::make(),
                Action::make('file')
                    ->label(__("filament_form.download_file"))
                    ->icon('heroicon-o-document-arrow-down')
                    ->action(function ($record) {
                        if ($record->file == null) {
                            Notification::make()
                                ->title(__('home/contact_us.no_file'))
                                ->danger()
                                ->send();
                        } else {
                            Notification::make()
                                ->title(__('home/contact_us.file_saved'))
                                ->icon('heroicon-o-document-text')
                                ->iconColor('success')
                                ->send();
                            return response()->download($record->file);
                        }
                    }),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListJoinUsForms::route('/'),
            // 'create' => Pages\CreateJoinUsForm::route('/create'),
            // 'edit' => Pages\EditJoinUsForm::route('/{record}/edit'),
        ];
    }
}
