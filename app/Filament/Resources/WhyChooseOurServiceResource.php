<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use App\Models\WhyChooseOurService;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Tables\Actions\ActionGroup;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\WhyChooseOurServiceResource\Pages;

class WhyChooseOurServiceResource extends Resource
{
    use Translatable;
    protected static ?string $model = WhyChooseOurService::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'الصفحة الرئيسية';
    protected static ?int $navigationSort = 9;

                public static function getModelLabel(): string
            {
                return 'لماذا يجب عليك اختيار خدماتنا';
            }
                public static function getPluralLabel(): string
            {
                return 'لماذا يجب عليك اختيار خدماتنا';
            }
                public static function getNavigationLabel(): string
            {
                return 'لماذا يجب عليك اختيار خدماتنا';
            }
         
     

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
             Section::make()
             ->schema([
                Forms\Components\TextInput::make('title')
                ->label('العنوان')
                ->maxLength(50)
                ->required(),
                Forms\Components\TextInput::make('years_of_experience')
                ->numeric()
                ->label('سنة من الخبرة')
                ->hidden(fn (Get $get): bool => !$get('Has_years_of_experience'))
                    ->required(),
                Forms\Components\TextInput::make('title_experience')
                ->maxLength(30)
                ->label('عنوان  سنة الخبرة')
                ->hidden(fn (Get $get): bool => !$get('Has_title_experience'))
                    ->required(),
            Forms\Components\TextInput::make('description')
            ->maxLength(255)
            ->label('الوصف')

            ->columnSpanFull()
                ->required(),
            Forms\Components\FileUpload::make('image')
            ->label('الصورة')

                ->image()
            ->columnSpanFull()
                ->required(),

                Forms\Components\Toggle::make('Has_title_experience')
                ->label(_("هل لديك عنوان  سنة الخبرة ؟"))
                ->dehydrated()
                ->default(false)
                ->live(),

                Forms\Components\Toggle::make('Has_years_of_experience')
                ->label(_("هل لديك سنة من الخبرة ؟"))
                ->dehydrated()
                ->default(false)
                ->live(),
               
                Forms\Components\Toggle::make('status')
                ->label('حالة النشر'),

                Repeater::make('features')
                ->label('المميزات')
                ->schema([
                    Forms\Components\TextInput::make('title')
                    ->maxLength(50)
                ->label('العنوان'),
                ])->grid(3)
                ->columns(1)
        ->columnSpanFull()
        ,
            
                Repeater::make('facts')
                ->label('امتيازات')

                ->schema([
                    
            Forms\Components\TextInput::make('title')
            ->maxLength(30)
            ->label('العنوان'),

            Forms\Components\FileUpload::make('image')
            ->label('الصورة')

            ->image()
        ->columnSpanFull(),

                ])->grid(3)
                ->columns(1)
        ->columnSpanFull()
        ,






             ])->columns(3)
             ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')->label('العنوان'),
                Tables\Columns\ImageColumn::make('image')->label('الصورة'),
                Tables\Columns\ToggleColumn::make('status')->label('حالة النشر'),
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
            'index' => Pages\ListWhyChooseOurServices::route('/'),
            'create' => Pages\CreateWhyChooseOurService::route('/create'),
            'view' => Pages\ViewWhyChooseOurService::route('/{record}'),
            'edit' => Pages\EditWhyChooseOurService::route('/{record}/edit'),
        ];
    }
}
