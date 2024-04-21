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
use Awcodes\Curator\Components\Tables\CuratorColumn;
use Filament\Resources\Concerns\Translatable;

class FaqResource extends Resource
{
    use Translatable;
    protected static ?string $model = Faq::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationGroup = 'الصفحة الرئيسية';

    protected static ?int $navigationSort = 15;

    
        public static function getNavigationGroup(): ?string
        {
            return __('home/homepage.homepage');
        }
        public static function getModelLabel(): string
        {
            return __('home/faq.faq');
        }
            public static function getPluralLabel(): string
        {
            return __('home/faq.faq');
        }
            public static function getNavigationLabel(): string
        {
            return __('home/faq.faq');
        }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Section::make()
               ->schema([
                Forms\Components\TextInput::make('title')
                    ->label(__("filament_form.title"))
                    ->required(),

                // Forms\Components\FileUpload::make('image')
                // ->label('الصورة')
                //     ->image()
                //     ->required(),


                    CuratorPicker::make('image')
                    ->label(__("filament_form.image"))
                    ->size('sm') 
                    ->outlined(false)
                    ->color('info')
                    ->constrained(true)
                    ->listDisplay(false)
                    ->columnSpanFull(),

                    Forms\Components\Toggle::make('status')
                    ->label(__("filament_form.status")),
               

                    Repeater::make('questions')
                    ->label(__("home/faq.faq"))
                    ->schema([

                        Forms\Components\TextInput::make('question')
                        ->label(__("home/faq.question"))
                        ->required(),
                        Forms\Components\TextInput::make('answer')
                        ->label(__("home/faq.answer"))
                        ->required(),

                    ])->grid(2)->columnSpanFull(),

               ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label(__("filament_form.title")),

                CuratorColumn::make('image')
                    ->label(__("filament_form.image"))
                    ->width('100px'),

                    Tables\Columns\TextColumn::make('questions.0')
                    ->label(__("home/faq.questions"))
                    ->badge()
                    ->color("danger")
                    ->state(function (Faq $record){
                        $questions = [];
                        foreach ($record->questions as $key => $value) {
                            $questions[] = $value["question"];
                        }
                        return $questions;
                    }),

                    
                    Tables\Columns\TextColumn::make('questions.0.answer')
                    ->label(__("home/faq.answers"))
                    ->badge()
                    ->state(function (Faq $record){
                        $answers = [];
                        foreach ($record->questions as $key => $value) {
                            $answers[] = $value["answer"];
                        }
                        return $answers;
                    }),

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
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'view' => Pages\ViewFaq::route('/{record}'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
