<?php

namespace App\Filament\Resources;
use Filament\Forms;
use Filament\Tables;
use App\Models\Pricing;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\ActionGroup;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\PricingResource\Pages;

class PricingResource extends Resource
{
    use Translatable;
    protected static ?string $model = Pricing::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 10;

                public static function getModelLabel(): string
            {
                return 'الباقات';
            }
                public static function getPluralLabel(): string
            {
                return 'الباقات';
            }
                public static function getNavigationLabel(): string
            {
                return 'الباقات';
            }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([

                    Repeater::make('pricing')
                    ->label('الباقات')
                    ->schema([

                        Forms\Components\TextInput::make('planName')->label(__('عنوان الخطة'))->maxLength(20)->required(),
                        Forms\Components\TextInput::make('planPrice')->label(__('سعر الخطة'))->integer()->required(),
                        Forms\Components\TextInput::make('PlanTime')->label(__('مدة الخطة [أسبوع - شهر - سنة - مدة الحياة]'))->maxLength(15)->required(),
                        Forms\Components\TextInput::make('planDesc')->label(__('وصف مختصر للخطة'))->maxLength(40)->required()
                            ->columnSpan('full'),
                        Forms\Components\Toggle::make('status')->label(__('إظهار الباقة'))
                            ->columnSpan('full'),
                        Forms\Components\Toggle::make('speical_status')->label(__('الباقة المميزة'))
                            ->columnSpan('full'),


                        Repeater::make('planfeatires')
                            ->label('المميزات')
                            ->schema([
                                Forms\Components\TextInput::make('feature')->label(__('تضمين في الخطة'))->maxLength(30)->required(),
                                Forms\Components\Toggle::make('status')
                                    ->label('تضمين في الخطة'),

                            ])
                            ->columnSpan('full')
                            ->grid(4),

                    ])
                    ->disableItemCreation()
                    ->disableItemDeletion()
                    ->columnSpan('full')
                    ->columns(3)
                    ->grid(1),

                    Forms\Components\Toggle::make('status')
                    ->label('حالة النشر'),
              
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('pricing.planName')->label('العنوان'),

                Tables\Columns\ToggleColumn::make('status')->label('حالة النشر'),


                Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true)
            ])
            ->filters([
                //
            ])
            ->actions([
                ActionGroup::make(
                    [
                        Tables\Actions\ViewAction::make(),
                        Tables\Actions\EditAction::make(),
                        Tables\Actions\ReplicateAction::make(),
                    ]
                  ),
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
            'index' => Pages\ListPricings::route('/'),
            'create' => Pages\CreatePricing::route('/create'),
            'view' => Pages\ViewPricing::route('/{record}'),
            'edit' => Pages\EditPricing::route('/{record}/edit'),
        ];
    }
}
