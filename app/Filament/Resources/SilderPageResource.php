<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use App\Models\SilderPage;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Filament\Resources\Concerns\Translatable;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SilderPageResource\Pages;
use Awcodes\Curator\Components\Tables\CuratorColumn;
use App\Filament\Resources\SilderPageResource\RelationManagers;

class SilderPageResource extends Resource
{
    use Translatable;
    protected static ?string $model = SilderPage::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationGroup = 'الصفحة الرئيسية';
    protected static ?int $navigationSort = 1;

            public static function getNavigationGroup(): ?string
            {
                return __('home/homepage.homepage');
            }
            
            public static function getPluralLabel(): string
            {
                return __('home/slider.sliders');
            }
                public static function getNavigationLabel(): string
            {
                return __('home/slider.sliders');
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
              Section::make()
              ->schema([
                Forms\Components\TextInput::make('title')
                ->label(__("filament_form.title"))
                ->required(),
            Forms\Components\TextInput::make('button_link')
            ->label(__("filament_form.link"))
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('button_title')
            ->label(__("filament_form.button_title"))
                ->required(),
            Forms\Components\TextInput::make('description')
            ->label(__("filament_form.description"))
            ->columnSpanFull()
                ->required(),
            
            //     Forms\Components\Toggle::make('Has_Video')
            //     ->label(__("هل لديك فيديو ؟"))
            //     ->columnSpanFull()
            //     ->dehydrated()
            //     ->default(false)
            //     ->live(),
            // Forms\Components\FileUpload::make('video')
            // ->label(__("الفيديو"))
            // ->acceptedFileTypes(['video/mp4','video/x-m4v','video/*'])
            // ->columnSpanFull()
            //     ->required()
            //     ->hidden(fn (Get $get): bool => !$get('Has_Video')),


                CuratorPicker::make('image')
                    ->label(__('filament_form.image'))
                    ->required()
                    ->size('md') 
                    ->outlined(false)
                    ->color('primary')
                    ->constrained(true)
                    ->listDisplay(false),
                    
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
                Tables\Columns\TextColumn::make('title')
                ->label(__("filament_form.title"))
                    ->searchable(),
                Tables\Columns\TextColumn::make('button_link')
                ->label(__("filament_form.link"))
                    ->searchable(),
                CuratorColumn::make('image')
                ->label(__("filament_form.image"))
                ->width('100px')
                ,
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
            'index' => Pages\ListSilderPages::route('/'),
            'create' => Pages\CreateSilderPage::route('/create'),
            'view' => Pages\ViewSilderPage::route('/{record}'),
            'edit' => Pages\EditSilderPage::route('/{record}/edit'),
        ];
    }
}
