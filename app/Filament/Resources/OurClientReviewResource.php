<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\OurClientReview;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\OurClientReviewResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;

class OurClientReviewResource extends Resource
{
    use Translatable;

    protected static ?string $model = OurClientReview::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'الصفحة الرئيسية';
    protected static ?int $navigationSort = 8;

                public static function getModelLabel(): string
            {
                return 'مراجعة العملاء';
            }
                public static function getPluralLabel(): string
            {
                return 'مراجعة العملاء';
            }
                public static function getNavigationLabel(): string
            {
                return 'مراجعة العملاء';
            }
         


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                // Forms\Components\FileUpload::make('client_image')
                // ->label('صورة العميل')
                //     ->disk('public')
                //     ->directory('clients_images')
                //     ->visibility('public')
                //     ->image()
                //     ->avatar()
                // ->columnSpanFull()
                //     ->required()
                //     ->imageEditor(),

                CuratorPicker::make('client_image')->label(__(''))
                ->size('sm') 
                ->outlined(false)
                ->color('info')
                ->constrained(true)
                ->listDisplay(false)
                ->columnSpanFull(),

                    Forms\Components\TextInput::make('client_name')
                ->label('اسم العميل')
                ->maxLength(30)
                    ->required(),

                Forms\Components\TextInput::make('client_job')
                ->label('وظيفة العميل')
                ->maxLength(30)

                    ->required(),
                Forms\Components\Select::make('stars')
                ->label('تقييم العميل  [1 - 5]')
                    ->options([
                        
                        1,2,3,4,5

                    ])
                    ->required(),

                Forms\Components\TextInput::make('description')
                ->label('تعليق العميل')
                ->columnSpanFull()
                ->maxLength(255)
                    ->required(),

                Forms\Components\Toggle::make('status')
                ->label('حالة نشر  مراجعة العميل ')
                ->columnSpanFull(),
                ])->columns(3),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('client_name')
                ->label('اسم العميل')

                    ->sortable(),
                Tables\Columns\ImageColumn::make('client_image')
                   ->label('صورة العميل'),
                Tables\Columns\TextColumn::make('stars')
                   ->label('تقييم العميل  [1 - 5]')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('status')
                    ->label('حالة نشر  مراجعة العميل '),
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
            'index' => Pages\ListOurClientReviews::route('/'),
            'create' => Pages\CreateOurClientReview::route('/create'),
            'view' => Pages\ViewOurClientReview::route('/{record}'),
            'edit' => Pages\EditOurClientReview::route('/{record}/edit'),
        ];
    }
}
