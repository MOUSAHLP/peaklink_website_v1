<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Footer;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Repeater;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\FooterResource\Pages;
use Filament\Forms\Components\Section;

class FooterResource extends Resource
{
    use Translatable;

    protected static ?string $model = Footer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Footer';
    protected static ?int $navigationSort = 1;

                public static function getModelLabel(): string
            {
                return 'Footer';
            }
                public static function getPluralLabel(): string
            {
                return 'Footer';
            }
                public static function getNavigationLabel(): string
            {
                return 'Footer';
            }
          

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                    Forms\Components\Toggle::make('is_inputSubscrip')
                ->label("هل لديك طريقة لإشتراك في النشرة الإخبارية؟")
                ->default(false)
                ->live()
                    ->required(),

                Repeater::make('inputSubscrip')
                ->label('بيانات الإشتراك')
                ->hidden(fn (Get $get): bool => !$get('is_inputSubscrip'))
                ->schema([
                        Forms\Components\TextInput::make('inputSubscrip_title')->label('العنوان')->required(),
                       Forms\Components\TextInput::make('inputSubscrip_description')->label('الوصف')->required(),
                ])->columns(2)
                ->disableItemCreation()
                ->disableItemDeletion()
                ->columnSpanFull(),

                Repeater::make('footers')
                ->schema([
                    Forms\Components\TextInput::make('title')->label('عنوان القسم')->required()
                    ,
                    Repeater::make('footers')
                    ->label('اقسام  المنيو')
                    ->schema([
                        Forms\Components\Select::make('type')
                    ->options(["email"=>"البريد الالكتروني","text"=>"النص","phone"=>"رقم الهاتف","url"=>"الرابط"])
                    ->label('is -> [email - text - phone - url]')
                    ->required()
                    ->reactive()
                    ->afterStateUpdated(function (Get $get,Set $set){
                        $set('name',$get('type'));
                    })
                    ,
                    Forms\Components\TextInput::make('name')
                    ->label('بيانات التواصل')
                    ->required(),
                    ])->grid(2)
                    ->columns(2)
                    ->columnSpanFull(),
                ])
                ->columns(2)
                ->defaultItems(2)
                ->disableItemCreation()
                ->disableItemDeletion()
                ->columnSpanFull(),


                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\IconColumn::make('is_inputSubscrip')
                    ->boolean(),
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
            'index' => Pages\ListFooters::route('/'),
            'create' => Pages\CreateFooter::route('/create'),
            'view' => Pages\ViewFooter::route('/{record}'),
            'edit' => Pages\EditFooter::route('/{record}/edit'),
        ];
    }
}
