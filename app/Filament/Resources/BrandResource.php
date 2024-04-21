<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Brand;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\BrandResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;

class BrandResource extends Resource
{
    use Translatable;
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';
    protected static ?string $navigationGroup = 'الصفحة الرئيسية';
    protected static ?int $navigationSort = 16;


    
            public static function getNavigationGroup(): ?string
            {
                return __('home/homepage.homepage');
            }
                public static function getModelLabel(): string
            {
                return __('home/brands.brands');
            }
                public static function getPluralLabel(): string
            {
                return __('home/brands.brands');
            }
                public static function getNavigationLabel(): string
            {
                return __('home/brands.brands');
            }
            public static function getNavigationBadge(): ?string
            {
                return static::getModel()::count();
            }
            public static function getNavigationBadgeColor(): ?string
            {
                return static::getModel()::count() > 10 ? 'danger' : 'info';
            }
     
          

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               

                Section::make()
                ->schema([
                    Forms\Components\TextInput::make('name')
                     ->label(__('home/brands.brand_name'))
                        ->required(),
                    Forms\Components\TextInput::make('slug')
                     ->label(__('home/brands.brand_link'))
    
                        ->required()
                        ->maxLength(255),
                    // Forms\Components\FileUpload::make('logo')
                    // ->label('شعار العلامة التجارية')
                    // ->image()
                    // ->imageEditor()
                    // ->columnSpanFull()
                    //     ->required(),

                        CuratorPicker::make('logo')
                        ->label(__('home/brands.brand_logo'))
                        ->size('sm') 
                        ->outlined(false)
                        ->color('info')
                        ->constrained(true)
                        ->listDisplay(false)
                        ->columnSpanFull(),

                    Forms\Components\Toggle::make('status')
                    ->label(__("filament_form.status"))
                    ->columnSpanFull(),

                ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('home/brands.brand_name'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label(__('home/brands.brand_link'))
                    ->searchable(),
              
                CuratorColumn::make('logo')
                    ->label(__('home/brands.brand_logo'))
                    ->width('100px'),

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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'view' => Pages\ViewBrand::route('/{record}'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
