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
          
     

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                    Forms\Components\TextInput::make('title')
                    ->label(__("filament_form.title"))
                    ->maxLength(30)
                    ->required(),

                Forms\Components\TextInput::make('phone')
                    ->label(__("filament_form.phone"))
                ->hidden(fn (Get $get): bool => !$get('Has_Phone'))
                    ->tel()
                    ->required()
                    ->maxLength(16),
                Forms\Components\TextInput::make('button_title')
                    ->label(__("filament_form.button_title"))
                ->maxLength(20)
                ->required(),

                Forms\Components\TextInput::make('button_link')
                    ->label(__("filament_form.button_link"))
                    ->hidden(fn (Get $get): bool => !$get('Has_Email'))
                    ->url()
                    ->required()
                    ->maxLength(50),

                    
                    Forms\Components\FileUpload::make('background_image')
                    ->label(__("filament_form.image"))
                    ->label('الصورة')
                    ->image()
                    ->columnSpanFull()
                    ->required(),
                    
                    Forms\Components\Toggle::make('Has_Phone')
                    ->label(__("filament_form.Has_Phone"))
                    ->dehydrated()
                    ->default(false)
                    ->live(),

                    Forms\Components\Toggle::make('Has_Email')
                    ->label(__("filament_form.Has_Email"))
                    ->dehydrated()
                    ->default(false)
                    ->live(),

                Forms\Components\Toggle::make('status')
                    ->label(__("filament_form.status"))
                ,
                ])->columns(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('button_link')
                    ->label(__("filament_form.button_link"))
                
                    ->searchable(),
                Tables\Columns\ImageColumn::make('background_image')
                ->label(__("filament_form.image"))
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
