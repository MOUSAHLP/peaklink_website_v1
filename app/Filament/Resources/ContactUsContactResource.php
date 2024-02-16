<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\ContactUsContact;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ContactUsContactResource\Pages;
use App\Filament\Resources\ContactUsContactResource\RelationManagers;

class ContactUsContactResource extends Resource
{
    protected static ?string $model = ContactUsContact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    
    protected static ?string $navigationGroup = 'الصفحة الرئيسية';

    protected static ?int $navigationSort = 14;

        public static function getModelLabel(): string
        {
            return 'تواصل بنا';
        }
            public static function getPluralLabel(): string
        {
            return 'تواصل بنا';
        }
            public static function getNavigationLabel(): string
        {
            return 'تواصل بنا';
        }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Section::make()
               ->schema(
                [
                    Repeater::make("contacts")
                    ->label(" تواصل بنا")
                    ->schema([
                        Select::make('btn_type')
                        ->options(["email"=>"البريد الالكتروني","text"=>"النص","phone"=>"رقم الهاتف","url"=>"الرابط"])
                        ->label('is -> [email - text - phone - url]')
                        ->required()
                        ,

                        Repeater::make("contacts")
                        ->label("نوع  التواصل")
                        ->schema([
                        TextInput::make('name')
                        ->label('بيانات التواصل')
                        ->required(),
                        TextInput::make('title')
                        ->label('العنوان')
                        ->required(),

                        Toggle::make('status')
                        ->label('حالة الظهور')
                        ->columnSpanFull(),

                        ])
                        ->grid(2)
                        ->columns(2)
                        ->columnSpanFull(),
                    ])
                    ->columnSpanFull(),
                ]
               ),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('contacts.name'),
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
            'index' => Pages\ListContactUsContacts::route('/'),
            'create' => Pages\CreateContactUsContact::route('/create'),
            'view' => Pages\ViewContactUsContact::route('/{record}'),
            'edit' => Pages\EditContactUsContact::route('/{record}/edit'),
        ];
    }
}
