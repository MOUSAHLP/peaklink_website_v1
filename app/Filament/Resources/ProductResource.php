<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    use Translatable;
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    
    protected static ?string $navigationGroup = 'المتجر';
    protected static ?int $navigationSort = 3;

                public static function getModelLabel(): string
            {
                return 'المنتج';
            }
                public static function getPluralLabel(): string
            {
                return 'المنتجات';
            }
                public static function getNavigationLabel(): string
            {
                return 'المنتجات';
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
                Forms\Components\Select::make('category_id')
                    ->label(_("الفئة"))
                    ->required()
                    ->relationship("category", "name")
                    ->getOptionLabelFromRecordUsing(fn ($record, $livewire) => $record->hasTranslation('name', $livewire->activeLocale)
                        ? $record->getTranslation('name', $livewire->activeLocale)
                        : $record->name),
                Forms\Components\TextInput::make('name')
                    ->label(_("الاسم"))
                    ->required()
                    ->maxLength(255)
                    ->debounce()
                ->afterStateUpdated(function ($set, ?string $state) { 
                        $set('slug', Str::slug($state));
                }),
                Forms\Components\TextInput::make('price')
                    ->label(_("السعر"))
                    ->required()
                    ->numeric()
                    ->minValue(0)
                    ->prefix('$'),
                    Forms\Components\TextInput::make('slug')
                    ->label(_("رابط المنتج"))
                    ->required()
                    ->unique()
                    ->maxLength(255),
                    
                    Forms\Components\Select::make('tags')
                    ->relationship('tags', 'name')
                        ->label('اختر الوسوم')
                        ->multiple()
                        ->preload()
                        ->getOptionLabelFromRecordUsing(fn($record, $livewire) => $record->hasTranslation('name', $livewire->activeLocale)
                        ? $record->getTranslation('name', $livewire->activeLocale)
                        : $record->name),
                Forms\Components\Textarea::make('short_description')
                    ->label(_("وصف قصير"))
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                  
                    TinyEditor::make('long_description')
                        ->label(_("وصف طويل"))
                        ->required()
                        ->columnSpanFull(),
                          
                    Forms\Components\Toggle::make('is_in_store')
                    ->label(_("في المتجر ؟"))
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('category.name')
                ->label(_("اسم الفئة"))
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('name')
                ->label(_("اسم المنتج"))
                ->sortable()
                ->searchable(),
                Tables\Columns\TextColumn::make('price')
                ->label(_("سعر المنتج"))
                ->money()
                ->searchable()
                ->sortable(),
                Tables\Columns\TextColumn::make('short_description')
                ->label(_("الشرح الصغير"))
                ->searchable(),
                Tables\Columns\TextColumn::make('long_description')
                ->label(_("الشرح الكبير"))
                ->searchable()
                ->html()
                ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('slug')
                ->label(_("رابط المنتج"))
                ->searchable(),

                Tables\Columns\IconColumn::make('is_in_store')
                    ->boolean(),
                    Tables\Columns\ToggleColumn::make('is_in_store')
                    ->label('في المتجر ؟'),

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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
