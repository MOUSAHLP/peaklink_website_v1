<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceCategoryResource\Pages;
use App\Filament\Resources\ServiceCategoryResource\RelationManagers;
use App\Models\ServiceCategory;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class ServiceCategoryResource extends Resource
{
    use Translatable;
    protected static ?string $model = ServiceCategory::class;

    
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'الخدمات';
    protected static ?int $navigationSort = 1;

    
            public static function getNavigationGroup(): ?string
            {
                return __('home/services.services');
            }
                public static function getModelLabel(): string
            {
                return __('home/services.service_categories');
            }
                public static function getPluralLabel(): string
            {
                return __('home/services.service_categories');
            }
                public static function getNavigationLabel(): string
            {
                return __('home/services.service_categories');
            }
            public static function getNavigationBadge(): ?string
            {
                return static::getModel()::count();
            }
            public static function getNavigationBadgeColor(): ?string
            {
                return static::getModel()::count() > 3 ? 'primary' : 'info';
            }
     

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                ->label(__("filament_form.category_name"))
                ->maxLength(255)
                ->required()
                ->debounce()
                ->afterStateUpdated(function ($set, ?string $state) { 
                        $set('slug', Str::slug($state));
                }),
                Forms\Components\TextInput::make('slug')
                ->label(__("filament_form.category_url"))
                ->maxLength(255)
                ->required(),
                Forms\Components\Toggle::make('status')
                ->label(__("filament_form.status"))
                ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label(__("filament_form.category_name"))
                ->searchable()
                ->sortable(),

                Tables\Columns\TextColumn::make('slug')
                ->label(__("filament_form.category_url"))
                ->searchable()
                ->sortable(),

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
            'index' => Pages\ListServiceCategories::route('/'),
            'create' => Pages\CreateServiceCategory::route('/create'),
            'edit' => Pages\EditServiceCategory::route('/{record}/edit'),
        ];
    }
}
