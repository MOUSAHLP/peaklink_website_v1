<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use App\Models\CategoryProject;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\CategoryProjectResource\Pages;

class CategoryProjectResource extends Resource
{
    use Translatable;
    protected static ?string $model = CategoryProject::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Home';

    protected static ?int $navigationSort = 6;

    public static function getModelLabel(): string
{
    return 'أقسام المشاريع';
}
    public static function getPluralLabel(): string
{
    return 'أقسام المشاريع';
}
    public static function getNavigationLabel(): string
{
    return 'أقسام المشاريع';
}

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Section::make()
               ->schema([
                Forms\Components\TextInput::make('title')
                ->label('عنوان القسم')
                    ->required(),
                    // ->reactive()
                    // ->debounce(1000)
                    // ->afterStateUpdated(function(Set $set,Get $get){ $set('slug', Str::slug($get('title'))); }),

                Forms\Components\TextInput::make('slug')
                // ->readOnly()
                ->unique(ignoreRecord: true)
                ->required(fn (string $operation): bool => $operation === 'create')
                ->label('رابط القسم')

                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('status')
                ->label('حالة نشر القسم'),
               ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label('عنوان القسم')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                ->label('رابط القسم')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status')
                ->label('حالة نشر القسم'),

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
            'index' => Pages\ListCategoryProjects::route('/'),
            'create' => Pages\CreateCategoryProject::route('/create'),
            'view' => Pages\ViewCategoryProject::route('/{record}'),
            'edit' => Pages\EditCategoryProject::route('/{record}/edit'),
        ];
    }
}
