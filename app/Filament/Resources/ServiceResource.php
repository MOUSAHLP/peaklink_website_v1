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

                public static function getModelLabel(): string
            {
                return 'الخدمات';
            }
                public static function getPluralLabel(): string
            {
                return 'الخدمات';
            }
                public static function getNavigationLabel(): string
            {
                return 'الخدمات';
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
        Tabs\Tab::make('الخدمات')
                ->icon('heroicon-m-rectangle-group')
                ->iconPosition(IconPosition::After)
                ->schema([
                    Forms\Components\TextInput::make('title')
                    ->maxLength(30)
                    ->label('العنوان')
                    ->required()
                    ->debounce(1000),

                    Forms\Components\TextInput::make('slug')
                    ->label('الرابط')
                    ->required()
                    ->maxLength(30),
                Forms\Components\TextInput::make('short_description')
                ->maxLength(55)
                ->columnSpanFull()
                ->label('وصف قصير')

                    ->required(),
                    TinyEditor::make('description')
                    ->label('الوصف')
                    ->showMenuBar()
                    ->toolbarSticky(true)
                    ->language('ar')
                    ->columnSpan('full')
                ->columnSpanFull()

                ->required(),
                
                CuratorPicker::make('image')->label(__(''))
                ->size('sm') 
                ->outlined(false)
                ->color('info')
                ->constrained(true)
                ->listDisplay(false),
                Forms\Components\Toggle::make('status')
                ->label('الحالة'),
            ])->columns(2),
            Tabs\Tab::make('محركات البحث جوجل "SEO"')
            ->icon('heroicon-m-globe-europe-africa')
                ->iconPosition(IconPosition::After)
            ->schema([
                Forms\Components\TextInput::make('meta_title')
                ->maxLength(30),
                Forms\Components\TagsInput::make('meta_keywords'),
                Forms\Components\TextInput::make('meta_description')
                ->columnSpanFull()
                ,
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
                Tables\Columns\TextColumn::make('title')
                ->label('العنوان')
                    ->searchable(),
                Tables\Columns\TextColumn::make('short_description')
                ->label('وصف قصير')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                ->label('الرابط')
                    ->searchable(),
                    CuratorColumn::make('image')
                    ->label(_("الصورة"))
                    ->width('100px'),
                ToggleColumn::make('status')
                ->label('الحالة')
                
                ,
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
