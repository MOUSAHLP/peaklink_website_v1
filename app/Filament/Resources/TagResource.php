<?php

namespace App\Filament\Resources;

use App\Models\Tag;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use App\Filament\Resources\TagResource\Pages;
use Filament\Resources\Concerns\Translatable;

class TagResource extends Resource
{
    use Translatable;
    protected static ?string $model = Tag::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 13;

                public static function getModelLabel(): string
            {
                return 'وسوم المدونة';
            }
                public static function getPluralLabel(): string
            {
                return 'وسوم المدونة';
            }
                public static function getNavigationLabel(): string
            {
                return 'وسوم المدونة';
            }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Section::make()
                ->schema([
                 Forms\Components\TextInput::make('name')
                 ->label('عنوان الوسم')
                     ->required(),
                 Forms\Components\TextInput::make('slug')
                 ->label('رابط الوسم')
                     ->required()
                     ->maxLength(255),
                 Forms\Components\Toggle::make('status')
                 ->label('حالة نشر الوسم')
                     ->required(),
                ])->columns(2),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('عنوان الوسم')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                ->label('رابط الوسم')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status')
                ->label('حالة نشر الوسم'),
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
            'index' => Pages\ListTags::route('/'),
            'create' => Pages\CreateTag::route('/create'),
            'view' => Pages\ViewTag::route('/{record}'),
            'edit' => Pages\EditTag::route('/{record}/edit'),
        ];
    }
}
