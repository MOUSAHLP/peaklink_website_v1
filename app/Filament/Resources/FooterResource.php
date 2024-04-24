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

                        Forms\Components\TextInput::make('name')
                            ->label('عنوان القسم')
                            ->required(),

                        Repeater::make('links')
                            ->label('روابط القسم')
                            ->schema([
                                Forms\Components\TextInput::make('text')
                                    ->label('نص الرابط')
                                    ->required(),
                                Forms\Components\TextInput::make('url')
                                    ->label('رابط الرابط')
                                    ->url()
                                    ->required(),
                            ])->grid(3)
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(_("عنوان القسم"))
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('links')
                    ->label(_("روابط القسم"))
                    ->searchable()
                    ->badge()
                    ->state(function (Footer $record) {
                        $value = [];
                        foreach ($record["links"] as $skill) {
                            $value[] = $skill["text"];
                        }
                        return $value;
                    }),

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
