<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Service;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Support\Enums\IconPosition;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Resources\Concerns\Translatable;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use App\Filament\Resources\ServiceResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;

class ServiceResource extends Resource
{
    use Translatable;
    protected static ?string $model = Service::class;

    protected static ?string $navigationIcon = 'heroicon-o-server-stack';
    protected static ?string $navigationGroup = 'الصفحة الرئيسية';
    protected static ?int $navigationSort = 2;

    
            public static function getNavigationGroup(): ?string
            {
                return __('home/homepage.homepage');
            }
                public static function getModelLabel(): string
            {
                return __('home/services.services');
            }
                public static function getPluralLabel(): string
            {
                return __('home/services.services');
            }
                public static function getNavigationLabel(): string
            {
                return __('home/services.services');
            }
            public static function getNavigationBadge(): ?string
            {
                return static::getModel()::count();
            }
            public static function getNavigationBadgeColor(): ?string
            {
                return static::getModel()::count() > 3 ? 'primary' : 'info';
            }
     

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Tabs::make('Tabs')
        ->tabs([
        Tabs\Tab::make(__('home/services.services'))
                ->icon('heroicon-m-rectangle-group')
                ->iconPosition(IconPosition::After)
                ->schema([
                    Forms\Components\TextInput::make('title')
                    ->maxLength(30)
                    ->label(__("filament_form.title"))
                    ->required()
                    ->debounce(1000),

                    Forms\Components\TextInput::make('slug')
                    ->label(__("filament_form.link"))
                    ->required()
                    ->maxLength(30),
                Forms\Components\TextInput::make('short_description')
                    ->label(__("filament_form.short_description"))
                    ->maxLength(55)
                    ->columnSpanFull()
                    ->required(),
                    TinyEditor::make('description')
                    ->label(__("filament_form.description"))
                    ->showMenuBar()
                    ->toolbarSticky(true)
                    ->language('ar')
                    ->columnSpan('full')
                ->columnSpanFull()

                ->required(),
                
                CuratorPicker::make('image')
                    ->label(__("filament_form.image"))
                    ->size('sm') 
                    ->outlined(false)
                    ->color('info')
                    ->constrained(true)
                    ->listDisplay(false),
                Forms\Components\Toggle::make('status')
                    ->label(__("filament_form.status")),

            ])->columns(2),
            Tabs\Tab::make("SEO")
            ->icon('heroicon-m-globe-europe-africa')
                ->iconPosition(IconPosition::After)
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
                    ->label(__("filament_form.image"))
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
                Tables\Columns\TextColumn::make('title')
                    ->label(__("filament_form.title"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('short_description')
                    ->label(__("filament_form.short_description"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->label(__("filament_form.link"))
                    ->searchable(),
                    CuratorColumn::make('image')
                    ->label(__("filament_form.image"))
                    ->width('100px'),
                ToggleColumn::make('status')
                    ->label(__("filament_form.status"))
                ,
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
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'view' => Pages\ViewService::route('/{record}'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
