<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use App\Models\BlogCategory;
use Filament\Resources\Resource;
use Filament\Forms\Components\Section;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\BlogCategoryResource\Pages;

class BlogCategoryResource extends Resource
{
    use Translatable;
    protected static ?string $model = BlogCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Home';
    protected static ?int $navigationSort = 12;

                public static function getModelLabel(): string
            {
                return 'أقسام المدونة';
            }
                public static function getPluralLabel(): string
            {
                return 'أقسام المدونة';
            }
                public static function getNavigationLabel(): string
            {
                return 'أقسام المدونة';
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
                Forms\Components\TextInput::make('slug')
                ->label('رابط القسم')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('status')
                ->label('حالة نشر القسم')
                    ->required(),
               ])->columns(2),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                ->label('عنوان القسم')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                ->label('رابط القسم')
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('status')
                ->label('حالة نشر القسم'),
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
            'index' => Pages\ListBlogCategories::route('/'),
            'create' => Pages\CreateBlogCategory::route('/create'),
            'view' => Pages\ViewBlogCategory::route('/{record}'),
            'edit' => Pages\EditBlogCategory::route('/{record}/edit'),
        ];
    }
}
