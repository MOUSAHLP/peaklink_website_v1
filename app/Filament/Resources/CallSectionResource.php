<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\CallSection;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\CallSectionResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;

class CallSectionResource extends Resource
{
    use Translatable;
    protected static ?string $model = CallSection::class;

    protected static ?string $navigationIcon = 'heroicon-o-phone-x-mark';
    protected static ?string $navigationGroup = 'الصفحة الرئيسية';
    protected static ?int $navigationSort = 11;


    public static function getNavigationGroup(): ?string
    {
        return __('home/homepage.homepage');
    }
    public static function getModelLabel(): string
    {
        return __('home/call_us_section.call_us');
    }
    public static function getPluralLabel(): string
    {
        return __('home/call_us_section.call_us');
    }
    public static function getNavigationLabel(): string
    {
        return __('home/call_us_section.call_us');
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
                            ->columnSpanFull()
                            ->required(),

                        Section::make(__("filament_form.phone"))
                            ->label(__("filament_form.phone"))
                            ->schema([
                                Forms\Components\TextInput::make('phone')
                                    ->label(__("filament_form.phone"))
                                    ->tel()
                                    ->live()
                                    ->maxLength(16),

                                Forms\Components\TextInput::make('phone_button_title')
                                    ->label(__("filament_form.phone_title"))
                                    ->hidden(fn (Get $get): bool => !$get('phone'))
                                    ->live()
                                    ->maxLength(20)
                                    ->required(fn (Get $get): bool => !$get('email')),

                            ])->columns(2),


                        Section::make(__("filament_form.email"))
                            ->label(__("filament_form.email"))
                            ->schema([
                                Forms\Components\TextInput::make('email')
                                    ->label(__("filament_form.email"))
                                    ->email()
                                    ->live(),

                                Forms\Components\TextInput::make('email_button_title')
                                    ->label(__("filament_form.email_title"))
                                    ->maxLength(20)
                                    ->hidden(fn (Get $get): bool => !$get('email'))
                                    ->live()
                                    ->required(fn (Get $get): bool => !$get('email')),

                            ])->columns(2),

                        CuratorPicker::make('background_image')
                            ->label(__("filament_form.image"))
                            ->size('sm')
                            ->outlined(false)
                            ->color('info')
                            ->constrained(true)
                            ->listDisplay(false)
                            ->required()
                            ->columnSpanFull(),



                        Forms\Components\Toggle::make('status')
                            ->label(__("filament_form.status")),
                    ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label(__("filament_form.title"))
                    ->searchable(),
                CuratorColumn::make('background_image')
                    ->label(__("filament_form.image"))
                    ->width('100px'),

                Tables\Columns\TextColumn::make('phone')
                    ->label(__("filament_form.phone"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label(__("filament_form.email"))
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
            'index' => Pages\ListCallSections::route('/'),
            'create' => Pages\CreateCallSection::route('/create'),
            'view' => Pages\ViewCallSection::route('/{record}'),
            'edit' => Pages\EditCallSection::route('/{record}/edit'),
        ];
    }
}
