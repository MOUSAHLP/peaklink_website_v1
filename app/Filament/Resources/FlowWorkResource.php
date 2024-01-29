<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\FlowWork;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\ActionGroup;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\FlowWorkResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Awcodes\Curator\Components\Tables\CuratorColumn;

class FlowWorkResource extends Resource
{
    use Translatable;
    protected static ?string $model = FlowWork::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 4;

                public static function getModelLabel(): string
            {
                return 'سير العمل';
            }
                public static function getPluralLabel(): string
            {
                return 'سير العمل';
            }
                public static function getNavigationLabel(): string
            {
                return 'سير العمل';
            }
            public static function getNavigationBadge(): ?string
            {
                return static::getModel()::count();
            }
            public static function getNavigationBadgeColor(): ?string
            {
                return static::getModel()::count() > 10 ? 'warning' : 'dark';
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
                    Forms\Components\TextInput::make('short_description')
                    ->label('وصف قصير')

                    ->maxLength(60)
                    ->required(),
                    CuratorPicker::make('image')->label(__(''))
                ->size('sm') 
                ->outlined(false)
                ->color('info')
                ->constrained(true)
                ->listDisplay(false),
                Forms\Components\Toggle::make('status')
                ->label('حالة النشر')
                ->columnSpanFull(),

                ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                ->label('العنوان')
                ->searchable()
                ,
                CuratorColumn::make('image')
                ->label('الإيقونة')
                ->width('100px')
                ,
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
            'index' => Pages\ListFlowWorks::route('/'),
            'create' => Pages\CreateFlowWork::route('/create'),
            'view' => Pages\ViewFlowWork::route('/{record}'),
            'edit' => Pages\EditFlowWork::route('/{record}/edit'),
        ];
    }
}
