<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Models\Team;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Forms;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TeamResource extends Resource
{
    use Translatable;
    protected static ?string $model = Team::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-plus';
    protected static ?string $navigationGroup = 'إدارة الفريق';
    protected static ?int $navigationSort = 1;

    public static function getPluralLabel(): string
    {
        return 'الفريق';
    }
    public static function getNavigationLabel(): string
    {
        return 'الفريق';
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'warning' : 'primary';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make("")->Schema([

                    Forms\Components\TextInput::make('name')
                        ->label(_("الاسم"))
                        ->required()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('position')
                        ->label(_("المنصب"))
                        ->required()
                        ->maxLength(255),
                    CuratorPicker::make('image')->label(__(''))
                        ->label(_("الصورة"))
                        ->size('sm')
                        ->outlined(false)
                        ->color('info')
                        ->constrained(true)
                        ->listDisplay(false)
                        ->required(),
                ])->columns(2),
                Section::make("")
                ->Schema([
                        Repeater::make("socials")
                        ->label(_("الروابط الاجتماعية"))
                        ->Schema([
                            CuratorPicker::make('image')->label(__(''))
                                ->label(_("الصورة"))
                                ->size('sm')
                                ->outlined(false)
                                ->color('info')
                                ->constrained(true)
                                ->listDisplay(false)
                                ->required(),
                            Forms\Components\TextInput::make('url')
                                ->label(_("الرابط"))
                                ->required()->url()
                        ])->grid(3)->columnSpanFull(),
                    ])->label("الروابط")
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('image')
                    ->label(_("صورة المشروع"))
                    ->width('100px'),
                Tables\Columns\TextColumn::make('name')
                    ->label(_("الاسم"))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('position')
                    ->label(_("المنصب"))
                    ->searchable()
                    ->sortable(),
               
                CuratorColumn::make('socials.image')
                    ->label(_("تواصل اجتماعي"))
                    ->width("50px")
                    ->stacked()
                    ->searchable()
                    ->state(function (Team $record) {
                        $value = [];
                        foreach ($record["socials"] as $social) {
                            $value[] = $social["image"];
                        }
                        return $value;
                    }),
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
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}
