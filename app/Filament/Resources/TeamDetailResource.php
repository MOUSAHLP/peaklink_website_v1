<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamDetailResource\Pages;
use App\Models\TeamDetail;
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
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Filament\Forms\Components\Tabs;

class TeamDetailResource extends Resource
{
    use Translatable;

    protected static ?string $model = TeamDetail::class;

    protected static ?string $navigationIcon = 'heroicon-o-identification';

    protected static ?string $navigationGroup = 'إدارة الفريق';
    protected static ?int $navigationSort = 2;

    public static function getPluralLabel(): string
    {
        return 'تفاصيل الفريق';
    }
    public static function getNavigationLabel(): string
    {
        return 'تفاصيل الفريق';
    }
    public static function getNavigationGroup(): ?string
    {
        return __('team.team');
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
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('معلومات عامة')
                            ->icon('heroicon-o-chat-bubble-bottom-center-text')
                            ->schema([
                                Section::make("")->Schema([

                                    Forms\Components\Select::make('team_id')
                                        ->label(_("العضو"))
                                        ->required()
                                        ->searchable()
                                        ->preload()
                                        ->relationship('team', 'name', fn ($query) => $query->doesntHave("detail"))
                                        ->getOptionLabelFromRecordUsing(fn ($record, $livewire) => $record->hasTranslation('name', $livewire->activeLocale)
                                            ? $record->getTranslation('name', $livewire->activeLocale)
                                            : $record->title),
                                    Forms\Components\TextInput::make('email')
                                        ->label(_("البريد الاكتروني"))
                                        ->required()
                                        ->email()
                                        ->maxLength(255),
                                    Forms\Components\TextInput::make('phone')
                                        ->label(_("رقم الهاتف"))
                                        ->required()
                                        ->tel()
                                        ->maxLength(255),
                                    Forms\Components\TextInput::make('website')
                                        ->label(_("رابط الموقع"))
                                        ->required()
                                        ->url()
                                        ->maxLength(255),
                                    TinyEditor::make('description')
                                        ->label(_("الشرح"))
                                        ->required()
                                        ->columnSpanFull(),
                                    CuratorPicker::make('image')->label(__(''))
                                        ->label(_("الصورة"))
                                        ->size('sm')
                                        ->outlined(false)
                                        ->color('info')
                                        ->constrained(true)
                                        ->listDisplay(false)
                                        ->required(),
                                ])->columns(3),
                            ]),
                        Tabs\Tab::make('قسم المهارات')
                            ->icon('heroicon-o-document-arrow-up')
                            ->schema([

                                Forms\Components\TextInput::make('skills_title')
                                    ->label(_("عنوان قسم المهارات"))
                                    ->required()
                                    ->maxLength(255),
                                TinyEditor::make('skills_description')
                                    ->label(_("شرح قسم المهارات"))
                                    ->required(),
                                Repeater::make("skills")
                                    ->label(_("المهارات"))
                                    ->Schema([
                                        Forms\Components\TextInput::make('title')
                                            ->label(_("عنوان المهارة"))
                                            ->required(),
                                        Forms\Components\TextInput::make('progress')
                                            ->label(_("التقدم (0 - 100)"))
                                            ->required()
                                            ->numeric()
                                            ->minValue(0)
                                            ->maxValue(100)
                                    ])->grid(3)->columnSpanFull(),
                            ])
                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                CuratorColumn::make('image')
                    ->label(_("صورة المشروع"))
                    ->width('100px'),
                Tables\Columns\TextColumn::make('team.name')
                    ->label(_("اسم العضو"))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('team.position')
                    ->label(_("منصب العضو"))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email')
                    ->label(_("البريد الالكتروني"))
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label(_("رقم الهاتف"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->label(_("الموقع الالكتروني"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('description')
                    ->label(_("الشرح"))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('skills_title')
                    ->label(_("عنوان قسم المهارات"))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('skills_description')
                    ->label(_("شرح قسم المهارات"))
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('skills')
                    ->label(_("المهارات"))
                    ->searchable()
                    ->badge()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->state(function (TeamDetail $record) {
                        $value = [];
                        foreach ($record["skills"] as $skill) {
                            $value[] = $skill["title"] . ':' . $skill["progress"];
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
            'index' => Pages\ListTeamDetails::route('/'),
            'create' => Pages\CreateTeamDetail::route('/create'),
            'edit' => Pages\EditTeamDetail::route('/{record}/edit'),
        ];
    }
}
