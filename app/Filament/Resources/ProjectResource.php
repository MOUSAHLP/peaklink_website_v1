<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Project;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Support\Enums\IconPosition;
use Filament\Tables\Actions\ActionGroup;
use Filament\Resources\Concerns\Translatable;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use App\Filament\Resources\ProjectResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;

class ProjectResource extends Resource
{
    use Translatable;
    protected static ?string $model = Project::class;

    protected static ?string $navigationIcon = 'heroicon-o-presentation-chart-line';
    protected static ?string $navigationGroup = 'المشاريع';
    protected static ?int $navigationSort = 2;

    public static function getModelLabel(): string
    {
        return 'المشاريع';
    }
    public static function getPluralLabel(): string
    {
        return 'المشاريع';
    }
    public static function getNavigationLabel(): string
    {
        return 'المشاريع';
    }
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'danger' : 'warning';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('الخدمات')
                            ->icon('heroicon-m-rectangle-group')
                            ->iconPosition(IconPosition::After)
                            ->schema([
                                Forms\Components\Select::make('category_project_id')
                                    ->label('أختر قسم')
                                    ->required()
                                    ->relationship('categories', 'title', fn ($query) => $query->where("status", 1))
                                    ->getOptionLabelFromRecordUsing(fn ($record, $livewire) => $record->hasTranslation('title', $livewire->activeLocale)
                                        ? $record->getTranslation('title', $livewire->activeLocale)
                                        : $record->title),
                                Forms\Components\TextInput::make('title')
                                    ->label('عنوان المشروع')
                                    ->required(),


                                Forms\Components\DatePicker::make('date')
                                    ->label('تاريخ المشروع')
                                    ->required(),
                                Forms\Components\Toggle::make('Has_website')
                                    ->label(_("هل لديك رابط الموقع ؟"))
                                    ->columnSpanFull()
                                    ->dehydrated()
                                    ->default(false)
                                    ->live(),

                                Forms\Components\Toggle::make('Has_location')
                                    ->label(_("هل لديك موقع العميل ؟"))
                                    ->columnSpanFull()
                                    ->dehydrated()
                                    ->default(false)
                                    ->live(),
                                Forms\Components\TextInput::make('client_name')
                                    ->label('أسم العميل')
                                    ->required(),

                                Forms\Components\TextInput::make('website')
                                    ->label('رابط الموقع')
                                    ->maxLength(255)
                                    ->hidden(fn (Get $get): bool => !$get('Has_website')),


                                Forms\Components\TextInput::make('location')
                                    ->label('موقع العميل')
                                    ->maxLength(255)
                                    ->hidden(fn (Get $get): bool => !$get('Has_location')),

                                TinyEditor::make('description')
                                    ->label('وصف المشروع')
                                    ->showMenuBar()
                                    ->toolbarSticky(true)
                                    ->language('ar')
                                    ->columnSpanFull(),

                                CuratorPicker::make('image')->label(__(''))
                                    ->size('sm')
                                    ->outlined(false)
                                    ->color('info')
                                    ->constrained(true)
                                    ->listDisplay(false),

                                Forms\Components\Toggle::make('status')
                                    ->label('حالة نشر المشروع')
                                    ->columnSpanFull(),


                            ])->columns(3),

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
                Tables\Columns\TextColumn::make('categories.title')
                    ->label('اسم القسم')
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label('عنوان المشورع')
                    ->sortable(),
                Tables\Columns\TextColumn::make('client_name')
                    ->label('اسم العميل')
                    ->sortable(),
                CuratorColumn::make('image')
                    ->label(_("صورة المشروع"))
                    ->width('100px'),
                Tables\Columns\TextColumn::make('date')
                    ->label('التاريخ')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('website')
                    ->label('رابط الموقع')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->label('موقع العميل')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),

                Tables\Columns\ToggleColumn::make('status')
                    ->label('حالة نشر المشروع'),
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
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ]),
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'view' => Pages\ViewProject::route('/{record}'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
        ];
    }
}
