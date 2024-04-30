<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Support\Enums\IconPosition;
use Filament\Tables;
use Filament\Tables\Table;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Guava\FilamentIconPicker\Tables\IconColumn;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    use Translatable;
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';


    protected static ?string $navigationGroup = 'المنتجات';
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
    public static function getNavigationGroup(): ?string
    {
        return __('products.products');
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('معلومات عامة')
                            ->icon('heroicon-m-information-circle')
                            ->iconPosition(IconPosition::After)
                            ->schema([
                                Forms\Components\TextInput::make('name')
                                    ->label(_("الاسم"))
                                    ->required()
                                    ->maxLength(255)
                                    ->debounce()
                                    ->afterStateUpdated(function ($set, $get, ?string $state) {
                                        if ($get('slug') == null)
                                            $set('slug', Str::slug($state));
                                    }),
                                Forms\Components\Select::make('category_id')
                                    ->label(_("الفئة"))
                                    ->required()
                                    ->relationship("category", "name", fn ($query) => $query->where("status", 1))
                                    ->getOptionLabelFromRecordUsing(fn ($record, $livewire) => $record->hasTranslation('name', $livewire->activeLocale)
                                        ? $record->getTranslation('name', $livewire->activeLocale)
                                        : $record->name),

                                Forms\Components\TextInput::make('slug')
                                    ->label(_("رابط المنتج"))
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->maxLength(255),

                                Forms\Components\Select::make('tags')
                                    ->relationship('tags', 'name', fn ($query) => $query->where("status", 1))
                                    ->label('اختر الوسوم')
                                    ->multiple()
                                    ->preload()
                                    ->getOptionLabelFromRecordUsing(fn ($record, $livewire) => $record->hasTranslation('name', $livewire->activeLocale)
                                        ? $record->getTranslation('name', $livewire->activeLocale)
                                        : $record->name),

                                Forms\Components\TextInput::make('demo_url')
                                    ->label(_("رابط حي")),

                                CuratorPicker::make('image')->label(__(''))
                                    ->size('sm')
                                    ->outlined(false)
                                    ->color('info')
                                    ->constrained(true)
                                    ->listDisplay(false)
                                    ->columnSpanFull(),

                                Forms\Components\Toggle::make('status')
                                    ->label(_("في المتجر ؟"))
                                    ->required(),

                                Forms\Components\Textarea::make('short_description')
                                    ->label(_("وصف قصير"))
                                    ->required()
                                    ->maxLength(255)
                                    ->columnSpanFull(),

                                TinyEditor::make('long_description')
                                    ->label(_("وصف طويل"))
                                    ->required()
                                    ->columnSpanFull(),
                            ])->columns(3),
                        Tabs\Tab::make('الروابط الاجتماعية')
                            ->icon('heroicon-m-link')
                            ->iconPosition(IconPosition::After)

                            ->schema([
                                Repeater::make("socials")
                                    ->label(_("الروابط الاجتماعية"))
                                    ->Schema([
                                        IconPicker::make('icon')->label(__('')),
                                        Forms\Components\TextInput::make('url')
                                            ->label(_("الرابط"))
                                            ->required()->url()
                                    ])->grid(3)->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('محركات البحث جوجل "SEO"')
                            ->icon('heroicon-m-globe-europe-africa')
                            ->iconPosition(IconPosition::After)
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->maxLength(30),
                                Forms\Components\TagsInput::make('meta_keywords'),
                                Forms\Components\TextInput::make('meta_description')
                                    ->columnSpanFull(),
                                CuratorPicker::make('meta_image')->label(__(''))
                                    ->size('sm')
                                    ->outlined(false)
                                    ->color('info')
                                    ->constrained(true)
                                    ->listDisplay(false),

                            ])->columns(2),
                    ])->columnSpanFull(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('image')
                    ->label(_("صورة المنتج"))
                    ->width('100px'),

                Tables\Columns\TextColumn::make('name')
                    ->label(_("اسم المنتج"))
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label(_("اسم الفئة"))
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label(_("رابط المنتج"))
                    ->searchable(),

                Tables\Columns\ToggleColumn::make('status')
                    ->label('حالة نشر المدونة'),

                Tables\Columns\TextColumn::make("socials")
                    ->label(__("filament_form.socials"))
                    ->badge()
                    ->state(function (Product $record, $rowLoop) {
                        $value = [];
                        foreach ($record["socials"] as $social) {
                            $value[] = $social["url"];
                        }
                        return $value;
                    })
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('demo_url')
                    ->label(_("رابط حي"))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('short_description')
                    ->label(_("الشرح الصغير"))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('long_description')
                    ->label(_("الشرح الكبير"))
                    ->searchable()
                    ->html()
                    ->toggleable(isToggledHiddenByDefault: true),


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
