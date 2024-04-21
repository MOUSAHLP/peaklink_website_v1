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
use Awcodes\Curator\Components\Forms\CuratorPicker;

class WhyChooseOurServiceResource extends Resource
{
    use Translatable;
    protected static ?string $model = WhyChooseOurService::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-list';
    protected static ?string $navigationGroup = 'الصفحة الرئيسية';
    protected static ?int $navigationSort = 9;


            public static function getNavigationGroup(): ?string
            {
                return __('home/homepage.homepage');
            }

                public static function getModelLabel(): string
            {
                return __('home/why_choose_our_service.why_choose_our_service');
            }
                public static function getPluralLabel(): string
            {
                return __('home/why_choose_our_service.why_choose_our_service');
            }
                public static function getNavigationLabel(): string
            {
                return __('home/why_choose_our_service.why_choose_our_service');
            }
         
     

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
             Section::make()
             ->schema([
                Forms\Components\TextInput::make('title')
                    ->label(__("filament_form.title"))
                ->maxLength(50)
                ->required(),
                Forms\Components\TextInput::make('years_of_experience')
                    ->label(__("filament_form.years_of_experience"))
                    ->numeric()
                ->hidden(fn (Get $get): bool => !$get('Has_years_of_experience'))
                    ->required(),
                Forms\Components\TextInput::make('title_experience')
                    ->label(__("filament_form.title_experience"))
                    ->maxLength(30)
                ->hidden(fn (Get $get): bool => !$get('Has_title_experience'))
                    ->required(),
            Forms\Components\TextInput::make('description')
                    ->label(__("filament_form.description"))
                    ->maxLength(255)
                   ->columnSpanFull()
                    ->required(),
            // Forms\Components\FileUpload::make('image')
            // ->label('الصورة')
            // ->image()
            // ->columnSpanFull()
            // ->required(),

            Forms\Components\Toggle::make('Has_title_experience')
            ->label(__("filament_form.Has_title_experience"))
            ->dehydrated()
            ->default(false)
            ->live(),

            Forms\Components\Toggle::make('Has_years_of_experience')
            ->label(__("filament_form.Has_years_of_experience"))
            ->dehydrated()
            ->default(false)
            ->live(),

            CuratorPicker::make('image')
            ->label(__("filament_form.image"))
            ->size('sm') 
            ->outlined(false)
            ->color('info')
            ->constrained(true)
            ->listDisplay(false)
            ->columnSpanFull(),

               
                Forms\Components\Toggle::make('status')
                ->label(__("filament_form.status"))
                ->label('حالة النشر'),

                Repeater::make('features')
                ->label(__("filament_form.features"))
                ->schema([
                    Forms\Components\TextInput::make('title')
                    ->maxLength(50)
                ->label(__("filament_form.title")),

                ])->grid(3)
                ->columns(1)
        ->columnSpanFull()
        ,
            
                Repeater::make('facts')
                ->label(__("filament_form.facts"))

                ->schema([
                    
            Forms\Components\TextInput::make('title')
                ->label(__("filament_form.title"))
                ->maxLength(30),

        //     Forms\Components\FileUpload::make('image')
        //     ->label('الصورة')

        //     ->image()
        // ->columnSpanFull(),

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
                Tables\Columns\TextColumn::make('title')
                ->label(__("filament_form.title")),

                Tables\Columns\ImageColumn::make('image')
                ->label(__("filament_form.image")),

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
            'index' => Pages\ListWhyChooseOurServices::route('/'),
            'create' => Pages\CreateWhyChooseOurService::route('/create'),
            'view' => Pages\ViewWhyChooseOurService::route('/{record}'),
            'edit' => Pages\EditWhyChooseOurService::route('/{record}/edit'),
        ];
    }
}
