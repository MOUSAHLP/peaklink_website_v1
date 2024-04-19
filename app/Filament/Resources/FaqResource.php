<?php

namespace App\Filament\Resources;

use App\Models\Faq;
use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use App\Filament\Resources\FaqResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Resources\Concerns\Translatable;

class FaqResource extends Resource
{
    use Translatable;
    protected static ?string $model = Faq::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationGroup = 'الصفحة الرئيسية';

    protected static ?int $navigationSort = 15;

        public static function getModelLabel(): string
        {
            return 'الأسئلة';
        }
            public static function getPluralLabel(): string
        {
            return 'الأسئلة';
        }
            public static function getNavigationLabel(): string
        {
            return 'الأسئلة';
        }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Section::make()
               ->schema([
                Forms\Components\TextInput::make('title')
                ->label('العنوان')
                    ->required(),

                // Forms\Components\FileUpload::make('image')
                // ->label('الصورة')
                //     ->image()
                //     ->required(),


                    CuratorPicker::make('image')->label(__('الصورة'))
                    ->size('sm') 
                    ->outlined(false)
                    ->color('info')
                    ->constrained(true)
                    ->listDisplay(false)
                    ->columnSpanFull(),

                    Forms\Components\Toggle::make('status')
                    ->label('حالة نشر الاسئلة'),
               

                    Repeater::make('questions')
                    ->schema([

                        Forms\Components\TextInput::make('question')
                        ->label('سؤال')
                        ->required(),
                        Forms\Components\TextInput::make('answer')
                        ->label('جواب')
                        ->required(),

                    ])->grid(2)->columnSpanFull(),

               ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title') ->label('العنوان'),
                Tables\Columns\ImageColumn::make('image')->label('الصورة'),
                Tables\Columns\ToggleColumn::make('status')->label('حالة نشر الاسئلة'),
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
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'view' => Pages\ViewFaq::route('/{record}'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
