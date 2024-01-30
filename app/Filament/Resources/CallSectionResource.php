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

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 11;

                public static function getModelLabel(): string
            {
                return 'اتصل بنا';
            }
                public static function getPluralLabel(): string
            {
                return 'اتصل بنا';
            }
                public static function getNavigationLabel(): string
            {
                return 'اتصل بنا';
            }
          
     

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                    Forms\Components\TextInput::make('title')
                    ->label('العنوان')
                    ->maxLength(30)
                    ->required(),

                Forms\Components\TextInput::make('phone')
                ->label('رقم الهاتف')
                ->hidden(fn (Get $get): bool => !$get('Has_Phone'))
                    ->tel()
                    ->required()
                    ->maxLength(16),
                Forms\Components\TextInput::make('button_title')
                ->label('عنوان الزر')
                ->maxLength(20)
                ->required(),

                Forms\Components\TextInput::make('button_link')
                ->hidden(fn (Get $get): bool => !$get('Has_Email'))
                ->label('رابط الزر')
                ->url()
                ->required()
                ->maxLength(50),

                    
                    Forms\Components\FileUpload::make('background_image')
                    ->label('الصورة')
                    ->image()
                    ->columnSpanFull()
                    ->required(),
                    
                    Forms\Components\Toggle::make('Has_Phone')
                    ->label(_("هل لديك رقم هاتف للتواصل ؟"))
                    ->dehydrated()
                    ->default(false)
                    ->live(),

                    Forms\Components\Toggle::make('Has_Email')
                    ->label(_("هل لديك ايميل للتواصل ؟"))
                    ->dehydrated()
                    ->default(false)
                    ->live(),

                Forms\Components\Toggle::make('status')
                ->label('حالة النشر')
                ,
                ])->columns(4),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('button_link')
                ->label('رابط الزر')
                
                    ->searchable(),
                Tables\Columns\ImageColumn::make('background_image'),
                Tables\Columns\ToggleColumn::make('status')
                ->label('حالة النشر'),
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
            'index' => Pages\ListCallSections::route('/'),
            'create' => Pages\CreateCallSection::route('/create'),
            'view' => Pages\ViewCallSection::route('/{record}'),
            'edit' => Pages\EditCallSection::route('/{record}/edit'),
        ];
    }
}
