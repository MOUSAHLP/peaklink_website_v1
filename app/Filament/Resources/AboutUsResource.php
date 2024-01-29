<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\AboutUs;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\ActionGroup;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\AboutUsResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;

class AboutUsResource extends Resource
{
    use Translatable;
    protected static ?string $model = AboutUs::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 3;

                public static function getModelLabel(): string
            {
                return 'من نحن';
            }
                public static function getPluralLabel(): string
            {
                return 'من نحن';
            }
                public static function getNavigationLabel(): string
            {
                return 'من نحن';
            }
            public static function getNavigationBadge(): ?string
            {
                return static::getModel()::count();
            }
            public static function getNavigationBadgeColor(): ?string
            {
                return static::getModel()::count() > 10 ? 'warning' : 'info';
            }
     


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Section::make()
               ->schema([
                CuratorPicker::make('back_image')->label(__(''))
                ->size('sm') 
                ->outlined(false)
                ->color('info')
                ->constrained(true)
                ->listDisplay(false)
                ->columnSpanFull(),
                
                Forms\Components\TextInput::make('title')
                ->label('العنوان')
                ->maxLength(20)
                ->required(),
         
        
            Forms\Components\TextInput::make('phone')
            ->label('رقم الهاتف')
                ->tel()
                ->required()
                ->maxLength(255),
           
            Forms\Components\TextInput::make('label_title')
            ->label('عنوان الصورة')
            ->maxLength(20)
                ->required(),
                
                Forms\Components\TextInput::make('description')
                ->label('الوصف')
                ->maxLength(255)
                    ->required()
                ,

                Forms\Components\Toggle::make('Has_Video')
                ->label(_("هل لديك فيديوة ؟"))
                ->columnSpanFull()
                ->dehydrated()
                ->default(false)
                ->live(),
            Forms\Components\FileUpload::make('video')
            ->label(_("الفيديو"))
                ->columnSpanFull()
                ->required()
                ->hidden(fn (Get $get): bool => !$get('Has_Video')),

                
                
               ])->columns(2)
               ->columnSpanFull(),

               Section::make()
               ->schema([
                Repeater::make('facts')
            ->label('الاحصائيات')

               ->schema([
                Forms\Components\TextInput::make('number')
            ->label('الاحصائية')
                ->numeric()
                ,
                Forms\Components\TextInput::make('title')
            ->label('عنوان الاحصائية')
            ->maxLength(30)
                ->string()
                ,
               ])->grid(3)
               ->columns(2),

               ])
               ->columnSpanFull(),

               
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label('العنوان')
                    ->searchable(),
                    CuratorColumn::make('back_image')
                    ->label('الصورة')
                    ->width('100px')
                    ,
                    Tables\Columns\TextColumn::make('phone')
                    ->label('رقم الهاتف')
                        ->searchable(),
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
            'index' => Pages\ListAboutUs::route('/'),
            'create' => Pages\CreateAboutUs::route('/create'),
            'view' => Pages\ViewAboutUs::route('/{record}'),
            'edit' => Pages\EditAboutUs::route('/{record}/edit'),
        ];
    }
}
