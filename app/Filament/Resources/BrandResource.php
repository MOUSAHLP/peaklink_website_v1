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

class BrandResource extends Resource
{
    use Translatable;
    protected static ?string $model = Brand::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';
    protected static ?string $navigationGroup = 'الصفحة الرئيسية';
    protected static ?int $navigationSort = 16;

                public static function getModelLabel(): string
            {
                return 'العلامة التجارية';
            }
                public static function getPluralLabel(): string
            {
                return 'العلامة التجارية';
            }
                public static function getNavigationLabel(): string
            {
                return 'العلامة التجارية';
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
                    ->label('اسم العلامة التجارية')
                        ->required(),
                    Forms\Components\TextInput::make('slug')
                    ->label('رابط العلامة التجارية')
    
                        ->required()
                        ->maxLength(255),
                    // Forms\Components\FileUpload::make('logo')
                    // ->label('شعار العلامة التجارية')
                    // ->image()
                    // ->imageEditor()
                    // ->columnSpanFull()
                    //     ->required(),

                        CuratorPicker::make('logo')
                        ->label(__('شعار العلامة التجارية'))
                        ->size('sm') 
                        ->outlined(false)
                        ->color('info')
                        ->constrained(true)
                        ->listDisplay(false)
                        ->columnSpanFull(),

                    Forms\Components\Toggle::make('status')
                    ->columnSpanFull()
                    ->label('حالة نشر العلامة التجارية'),

                ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('اسم العلامة التجارية')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                ->label('رابط العلامة التجارية')
                    ->searchable(),
                Tables\Columns\imageColumn::make('logo')
                ->label('شعار العلامة التجارية')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status')
                ->label('حالة نشر العلامة التجارية'),

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
            'index' => Pages\ListBrands::route('/'),
            'create' => Pages\CreateBrand::route('/create'),
            'view' => Pages\ViewBrand::route('/{record}'),
            'edit' => Pages\EditBrand::route('/{record}/edit'),
        ];
    }
}
