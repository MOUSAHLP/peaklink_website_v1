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
use App\Filament\Resources\ContactUsContactResource\Pages;
use App\Filament\Resources\ContactUsContactResource\RelationManagers;
use Closure;

class ContactUsContactResource extends Resource
{
    protected static ?string $model = ContactUsContact::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'الصفحة الرئيسية';

    protected static ?int $navigationSort = 14;


    public static function getNavigationGroup(): ?string
    {
        return __('home/homepage.homepage');
    }
    public static function getModelLabel(): string
    {
        return __('home/contact_us.contact_us');
    }
    public static function getPluralLabel(): string
    {
        return __('home/contact_us.contact_us');
    }
    public static function getNavigationLabel(): string
    {
        return __('home/contact_us.contact_us');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema(
                        [
                            Repeater::make("contacts")
                                ->label(__('home/contact_us.contact_us'))
                                ->schema([
                                    Select::make('btn_type')
                                        ->options([
                                            "email" => __("filament_form.email"),
                                            "text" => __("filament_form.text"),
                                            "phone" => __("filament_form.phone"),
                                            "url" => __("filament_form.link")
                                        ])
                                        ->label('is -> [email - text - phone - url]')
                                        ->required(),

                                    Repeater::make("contacts")
                                        ->label(__("filament_form.contact_us_info"))
                                        ->schema([
                                            TextInput::make('value')
                                                ->label(__("filament_form.contact_us_value"))

                                                ->required(),
                                            TextInput::make('title')
                                                ->label(__("filament_form.title"))
                                                ->required(),

                                            Toggle::make('status')
                                                ->label(__("filament_form.status"))
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
                Tables\Columns\TextColumn::make('contacts.contacts.btn_type')
                    ->label(__("filament_form.contact_us_type"))
                    ->badge()
                    ->color("danger")
                    ->state(function (ContactUsContact $record) {
                        $types = [];
                        foreach ($record->contacts as $key => $value) {
                            $types[] = $value["btn_type"];
                        }
                        return $types;
                    }),

                Tables\Columns\TextColumn::make('contacts.contacts.name')
                    ->label(__("filament_form.contact_us_values"))
                    ->badge()
                    ->state(function (ContactUsContact $record) {
                        $values = [];
                        foreach ($record->contacts as $key => $contacts) {
                            foreach ($contacts["contacts"] as $key => $value) {
                                $values[] = $value["value"];
                            }
                        }
                        return $values;
                    }),

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
                    // Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
