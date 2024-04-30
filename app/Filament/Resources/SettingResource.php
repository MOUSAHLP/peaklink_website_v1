<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\ColorPicker;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\SettingResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\TimePicker;
use Filament\Support\Enums\IconPosition;
use Guava\FilamentIconPicker\Forms\IconPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms\Components\Section;

class SettingResource extends Resource
{
    use Translatable;
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationGroup = 'الإعدادات';
    protected static ?int $navigationSort = 3;

    public static function getModelLabel(): string
    {
        return 'إدارة  الموقع';
    }
    public static function getPluralLabel(): string
    {
        return 'إدارة  الموقع';
    }
    public static function getNavigationLabel(): string
    {
        return 'إدارة  الموقع';
    }
    public static function getNavigationGroup(): ?string
    {
        return __("filament_form.settings");
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('البيانات الأساسية')
                            ->icon('heroicon-o-chat-bubble-bottom-center-text')
                            ->schema([
                                TextInput::make('email')->label(__('البريد الالكتروني'))->email(),
                                TextInput::make('phone')->label(__('رقم الهاتف'))->numeric()->prefix("+963"),
                                TextInput::make('location')->label(__('الموقع الجغرافي'))
                                    ->columnSpanFull(),

                                TimePicker::make('open_time')->label(__('وقت الفتح')),
                                TimePicker::make('close_time')->label(__('وقت الاغلاق')),

                                CuratorPicker::make('headerlogo')->label(__('شعار اعلى الصفحة'))
                                    ->size('sm')
                                    ->outlined(false)
                                    ->color('info')
                                    ->listDisplay(false)
                                    ->columns(2)
                                    ->columnSpanFull(),

                                CuratorPicker::make('footerlogo')->label(__('شعار إسفل الصفحة'))
                                    ->size('sm')
                                    ->outlined(false)
                                    ->color('info')
                                    ->constrained(true)
                                    ->listDisplay(false)
                                    ->columns(2)
                                    ->columnSpanFull(),

                                Section::make("color")
                                    ->label(__('اللون'))
                                    ->schema([
                                        ColorPicker::make('color.primary')->required()->label(__('قيمة اللون الأساسي')),
                                        ColorPicker::make('color.secondary')->required()->label(__('قيمة اللون الفرعي')),
                                        ColorPicker::make('color.third')->required()->label(__('قيمة اللون الثالث')),
                                    ])
                                    ->columns(3)
                                    ->columnSpanFull(),

                                Toggle::make('maintenance')->label(__('الصيانة')),
                            ])
                            ->columns(2),
                        Tabs\Tab::make('الروابط الاجتماعية')
                            ->icon('heroicon-m-link')
                            ->schema([
                                Repeater::make("socials")
                                    ->label(_("الروابط الاجتماعية"))
                                    ->Schema([
                                        IconPicker::make('icon')->label(__('الايقونة')),
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
                    ])
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('headerlogo')
                    ->label(_("شعار الرأس"))
                    ->width('100px'),
                CuratorColumn::make('footerlogo')
                    ->label(_("شعار التذييل"))
                    ->width('100px'),
                Tables\Columns\TextColumn::make('email')
                    ->label(__('البريد الالكتروني'))
                    ->searchable(),

                Tables\Columns\TextColumn::make('phone')
                    ->label(__('رقم الهاتف'))
                    ->searchable(),

                Tables\Columns\ToggleColumn::make('maintenance')
                    ->label(__('الصيانة')),

                Tables\Columns\TextColumn::make('location')
                    ->label(__('المكان'))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make("socials")
                    ->label(__("filament_form.socials"))
                    ->badge()
                    ->state(function (Setting $record) {
                        $value = [];
                        foreach ($record["socials"] as $social) {
                            $value[] = $social["url"];
                        }
                        return $value;
                    })
                    ->toggleable(isToggledHiddenByDefault: true),

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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'view' => Pages\ViewSetting::route('/{record}'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
