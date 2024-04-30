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

    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';
    protected static ?string $navigationGroup = 'المشاريع';

    protected static ?int $navigationSort = 1;


    public static function getNavigationGroup(): ?string
    {
        return __('projects.projects');
    }

    public static function getModelLabel(): string
    {
        return __('projects.projectsCategories');
    }
    public static function getPluralLabel(): string
    {
        return __('projects.projectsCategories');
    }
    public static function getNavigationLabel(): string
    {
        return __('projects.projectsCategories');
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'warning' : 'info';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label( __('projects.categoryTitle'))
                            ->required(),

                        Forms\Components\TextInput::make('slug')
                            // ->readOnly()
                            ->unique(ignoreRecord: true)
                            ->required(fn (string $operation): bool => $operation === 'create')
                            ->label( __('projects.categoryLink'))

                            ->required()
                            ->maxLength(255),
                        Forms\Components\Toggle::make('status')
                            ->label(__("filament_form.status")),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__('projects.categoryTitle'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label(__('projects.categoryLink'))
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
