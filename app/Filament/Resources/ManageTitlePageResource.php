<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ManageTitlePage;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ManageTitlePageResource\Pages;
use App\Filament\Resources\ManageTitlePageResource\RelationManagers;

class ManageTitlePageResource extends Resource
{
    use Translatable;
    protected static ?string $model = ManageTitlePage::class;

    protected static ?string $navigationIcon = 'heroicon-o-cog-8-tooth';
    protected static ?string $navigationGroup = 'الإعدادات';
    protected static ?int $navigationSort = 2;

                public static function getModelLabel(): string
            {
                return 'إدارة  عناوين الصفحات';
            }
                public static function getPluralLabel(): string
            {
                return 'إدارة  عناوين الصفحات';
            }
                public static function getNavigationLabel(): string
            {
                return 'إدارة  عناوين الصفحات';
            }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Section::make()
              ->schema([
                Forms\Components\TextInput::make('title')
                ->label('العنوان')
                ->maxLength(50),
            Forms\Components\TextInput::make('description')
                ->label('الوصف')
                ->maxLength(255),
              ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label('العنوان')

                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                ->limit(100)
                ->label('الوصف')

                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListManageTitlePages::route('/'),
            'create' => Pages\CreateManageTitlePage::route('/create'),
            'view' => Pages\ViewManageTitlePage::route('/{record}'),
            'edit' => Pages\EditManageTitlePage::route('/{record}/edit'),
        ];
    }
}
