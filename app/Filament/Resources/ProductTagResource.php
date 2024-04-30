<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductTagResource\Pages;
use App\Models\ProductTag;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class ProductTagResource extends Resource
{
    use Translatable;

    protected static ?string $model = ProductTag::class;

    protected static ?string $navigationIcon = 'heroicon-o-paper-airplane';
    protected static ?string $navigationGroup = 'المتجر';
    protected static ?int $navigationSort = 2;

    public static function getModelLabel(): string
    {
        return 'الوسم';
    }
    public static function getPluralLabel(): string
    {
        return 'الوسوم';
    }
    public static function getNavigationLabel(): string
    {
        return 'الوسوم';
    }
    public static function getNavigationGroup(): ?string
    {
        return __('products.products');
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'danger' : 'warning';
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        Forms\Components\TextInput::make('name')
                            ->label('عنوان الوسم')
                            ->required()
                            ->debounce()
                            ->afterStateUpdated(function ($set, ?string $state) {
                                $set('slug', Str::slug($state));
                            }),
                        Forms\Components\TextInput::make('slug')
                            ->label('رابط الوسم')
                            ->required()
                            ->unique()
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
                    ->label(_("تم الانشاء"))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label(_("اخر تحديث"))
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
            'index' => Pages\ListProductTags::route('/'),
            'create' => Pages\CreateProductTag::route('/create'),
            'edit' => Pages\EditProductTag::route('/{record}/edit'),
        ];
    }
}
