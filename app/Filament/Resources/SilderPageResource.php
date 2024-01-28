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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Home';
    protected static ?string $navigationLabel = 'Slider';
    protected static ?int $navigationSort = 1;
    protected static ?string $recordTitleAttribute = 'title';
    protected static ?string $navigationBadge = 'new';
    protected static ?string $navigationBadgeLabel = 'New';
    protected static ?string $navigationBadgeStyle = 'rounded-full';
    protected static ?string $navigationBadgeIcon = 'heroicon-o-check';
    protected static ?string $navigationBadgeIconStyle = 'w-4 h-4';
    protected static ?string $navigationBadgeIconBackgroundStyle = 'rounded-full';
    protected static ?string $navigationBadgeIconBackgroundPosition = 'center';
    protected static ?int $navigationBadgeIconBackgroundOpacity = 100;
    protected static ?string $navigationBadgeIconBackgroundSize = 'w-4 h-4';
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
              Section::make()
              ->schema([
                Forms\Components\TextInput::make('title')
                ->required(),
            Forms\Components\TextInput::make('button_link')
                ->required()
                ->maxLength(255),
            Forms\Components\TextInput::make('button_title')
                ->required(),
            Forms\Components\TextInput::make('description')
            ->columnSpanFull()
                ->required(),
            
                Forms\Components\Toggle::make('Has_Video')
                ->columnSpanFull()
                ->dehydrated()
                ->default(false)
                ->live(),
            Forms\Components\FileUpload::make('video')
                ->columnSpanFull()
                ->required()
                ->hidden(fn (Get $get): bool => !$get('Has_Video')),


                CuratorPicker::make('image')->label(__(''))
                    ->size('sm') 
                    ->outlined(false)
                    ->color('primary')
                    ->constrained(true)
                    ->listDisplay(false),
                    
            Forms\Components\Toggle::make('status')
            ->columnSpanFull(),
              ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('button_link')
                    ->searchable(),
                CuratorColumn::make('image')
                ->width('100px')
                ,
                Tables\Columns\ToggleColumn::make('status'),
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
            'index' => Pages\ListSilderPages::route('/'),
            'create' => Pages\CreateSilderPage::route('/create'),
            'view' => Pages\ViewSilderPage::route('/{record}'),
            'edit' => Pages\EditSilderPage::route('/{record}/edit'),
        ];
    }
}
