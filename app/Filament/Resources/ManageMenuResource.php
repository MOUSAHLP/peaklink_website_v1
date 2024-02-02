<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use App\Models\ManageMenu;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ManageMenuResource\Pages;
use App\Filament\Resources\ManageMenuResource\RelationManagers;

class ManageMenuResource extends Resource
{
    use Translatable;
    protected static ?string $model = ManageMenu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'الإعدادات';
    protected static ?int $navigationSort = 1;

                public static function getModelLabel(): string
            {
                return 'إدارة القوائم';
            }
                public static function getPluralLabel(): string
            {
                return 'إدارة القوائم';
            }
                public static function getNavigationLabel(): string
            {
                return 'إدارة القوائم';
            }
          

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Section::make()
               ->schema([
                Forms\Components\TextInput::make('title')
                ->label('العنوان')
                ->maxLength(255),
            Forms\Components\Toggle::make('status')
            ->label('حالة نشر القائمة'),
            
               ])->columns(1),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label('العنوان')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status')
            ->label('حالة نشر القائمة'),
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
            'index' => Pages\ListManageMenus::route('/'),
            'create' => Pages\CreateManageMenu::route('/create'),
            'view' => Pages\ViewManageMenu::route('/{record}'),
            'edit' => Pages\EditManageMenu::route('/{record}/edit'),
        ];
    }
}
