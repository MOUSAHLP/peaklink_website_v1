<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\OurClientReview;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\OurClientReviewResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;

class OurClientReviewResource extends Resource
{
    use Translatable;

    protected static ?string $model = OurClientReview::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'الصفحة الرئيسية';
    protected static ?int $navigationSort = 8;



    public static function getNavigationGroup(): ?string
    {
        return __('home/homepage.homepage');
    }

    public static function getModelLabel(): string
    {
        return __('home/client_review.client_review');
    }
    public static function getPluralLabel(): string
    {
        return __('home/client_review.client_review');
    }
    public static function getNavigationLabel(): string
    {
        return __('home/client_review.client_review');
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

                        CuratorPicker::make('client_image')
                            ->label(__("filament_form.client_image"))
                            ->size('sm')
                            ->outlined(false)
                            ->color('info')
                            ->constrained(true)
                            ->listDisplay(false)
                            ->columnSpanFull()
                            ->required(),

                        Forms\Components\TextInput::make('client_name')
                            ->label(__("filament_form.client_name"))
                            ->maxLength(30)
                            ->required(),

                        Forms\Components\TextInput::make('client_job')
                            ->label(__("filament_form.client_job"))
                            ->maxLength(30)
                            ->required(),
                        Forms\Components\Select::make('stars')
                            ->label("[1 - 5] " . __("filament_form.stars"))
                            ->options([
                                1 => 1,
                                2 => 2,
                                3 => 3,
                                4 => 4,
                                5 => 5,
                            ])
                            ->required(),


                        Forms\Components\TextInput::make('description')
                            ->label(__("filament_form.client_comment"))
                            ->columnSpanFull()
                            ->maxLength(255)
                            ->required(),

                        Forms\Components\Toggle::make('status')
                            ->label(__("filament_form.status"))
                            ->columnSpanFull(),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client_name')
                    ->label(__("filament_form.client_name"))
                    ->sortable(),


                CuratorColumn::make('client_image')
                    ->label(__("filament_form.client_image"))
                    ->width('100px'),


                Tables\Columns\TextColumn::make('stars')
                    ->label("[1 - 5] " . __("filament_form.stars"))
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
            'index' => Pages\ListOurClientReviews::route('/'),
            'create' => Pages\CreateOurClientReview::route('/create'),
            'view' => Pages\ViewOurClientReview::route('/{record}'),
            'edit' => Pages\EditOurClientReview::route('/{record}/edit'),
        ];
    }
}
