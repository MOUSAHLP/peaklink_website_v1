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

    public static function getNavigationGroup(): ?string
    {
        return __('projects.projects');
    }

    public static function getModelLabel(): string
    {
        return __('projects.projects');
    }
    public static function getPluralLabel(): string
    {
        return __('projects.projects');
    }
    public static function getNavigationLabel(): string
    {
        return __('projects.projects');
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
                        Tabs\Tab::make(__("filament_form.general_info"))
                            ->icon('heroicon-m-rectangle-group')
                            ->iconPosition(IconPosition::After)
                            ->schema([
                                Forms\Components\Select::make('category_project_id')
                                    ->label(__('projects.pickCategory'))
                                    ->required()
                                    ->relationship('categories', 'title', fn ($query) => $query->where("status", 1))
                                    ->getOptionLabelFromRecordUsing(fn ($record, $livewire) => $record->hasTranslation('title', $livewire->activeLocale)
                                        ? $record->getTranslation('title', $livewire->activeLocale)
                                        : $record->title),
                                Forms\Components\TextInput::make('title')
                                    ->label(__('projects.projectTitle'))
                                    ->required(),

                                Forms\Components\DatePicker::make('date')
                                    ->label(__('projects.projectDate'))
                                    ->required(),
                                Forms\Components\Toggle::make('Has_website')
                                    ->label(__('projects.doYouHaveLink'))
                                    ->columnSpanFull()
                                    ->dehydrated()
                                    ->default(false)
                                    ->live(),

                                Forms\Components\Toggle::make('Has_location')
                                    ->label(__('projects.doYouHaveClientLocation'))
                                    ->columnSpanFull()
                                    ->dehydrated()
                                    ->default(false)
                                    ->live(),
                                Forms\Components\TextInput::make('client_name')
                                    ->label(__('projects.client_name'))
                                    ->required(),

                                Forms\Components\TextInput::make('website')
                                    ->label(__('projects.websiteLink'))
                                    ->maxLength(255)
                                    ->hidden(fn (Get $get): bool => !$get('Has_website')),


                                Forms\Components\TextInput::make('location')
                                    ->label(__('projects.clientLocation'))
                                    ->maxLength(255)
                                    ->hidden(fn (Get $get): bool => !$get('Has_location')),

                                TinyEditor::make('description')
                                    ->label(__('projects.project_description'))
                                    ->showMenuBar()
                                    ->toolbarSticky(true)
                                    ->language('ar')
                                    ->columnSpanFull(),

                                CuratorPicker::make('image')->label(__(''))
                                    ->label(__("filament_form.image"))
                                    ->size('sm')
                                    ->outlined(false)
                                    ->color('info')
                                    ->constrained(true)
                                    ->listDisplay(false),

                                Forms\Components\Toggle::make('status')
                                    ->label('حالة نشر المشروع')
                                    ->label(__("filament_form.status"))
                                    ->columnSpanFull(),


                            ])->columns(3),

                        Tabs\Tab::make('محركات البحث جوجل "SEO"')
                            ->icon('heroicon-m-globe-europe-africa')
                            ->iconPosition(IconPosition::After)
                            ->label(__("filament_form.SEO"))
                            ->schema([
                                Forms\Components\TextInput::make('meta_title')
                                    ->label(__("filament_form.meta_title"))
                                    ->maxLength(30),
                                Forms\Components\TagsInput::make('meta_keywords')
                                    ->label(__("filament_form.meta_keywords")),
                                Forms\Components\TextInput::make('meta_description')
                                    ->label(__("filament_form.meta_description"))
                                    ->columnSpanFull(),
                                CuratorPicker::make('meta_image')
                                    ->label(__("filament_form.meta_image"))
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
                    ->label(__('projects.categoryTitle'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->label(__('projects.projectTitle'))
                    ->sortable(),
                Tables\Columns\TextColumn::make('client_name')
                    ->label(__('projects.client_name'))
                    ->sortable(),
                CuratorColumn::make('image')
                    ->label(__("filament_form.image"))
                    ->width('100px'),
                Tables\Columns\TextColumn::make('date')
                    ->label(__('projects.projectDate'))
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('website')
                    ->label(__('projects.websiteLink'))
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->label(__('projects.clientLocation'))
                    ->toggleable(isToggledHiddenByDefault: true)
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
