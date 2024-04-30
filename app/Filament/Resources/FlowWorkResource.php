<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\FlowWork;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\ActionGroup;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\FlowWorkResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Guava\FilamentIconPicker\Tables\IconColumn;

class FlowWorkResource extends Resource
{
    use Translatable;
    protected static ?string $model = FlowWork::class;

    protected static ?string $navigationIcon = 'heroicon-o-receipt-refund';
    protected static ?string $navigationGroup = 'الصفحة الرئيسية';
    protected static ?int $navigationSort = 4;


    public static function getNavigationGroup(): ?string
    {
        return __('home/homepage.homepage');
    }

    public static function getModelLabel(): string
    {
        return __('home/workflow.workflow');
    }
    public static function getPluralLabel(): string
    {
        return __('home/workflow.workflow');
    }
    public static function getNavigationLabel(): string
    {
        return __('home/workflow.workflow');
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
                            ->label(__("filament_form.title"))
                            ->maxLength(30)
                            ->required(),
                        Forms\Components\TextInput::make('short_description')
                            ->label(__("filament_form.short_description"))
                            ->maxLength(60)
                            ->required(),

                        IconPicker::make('image')
                            ->label(__("filament_form.icon"))
                            ->columns([
                                'default' => 1,
                                'lg' => 3,
                                '2xl' => 5,
                            ])
                            ->required(),

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
                Tables\Columns\TextColumn::make('title')
                    ->label(__("filament_form.title"))
                    ->searchable(),

                IconColumn::make("image")
                    ->label(__("filament_form.icon")),

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
                ActionGroup::make(
                    [
                        Tables\Actions\ViewAction::make(),
                        Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListFlowWorks::route('/'),
            'create' => Pages\CreateFlowWork::route('/create'),
            'view' => Pages\ViewFlowWork::route('/{record}'),
            'edit' => Pages\EditFlowWork::route('/{record}/edit'),
        ];
    }
}
