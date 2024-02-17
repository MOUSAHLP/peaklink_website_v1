<?php

namespace App\Filament\Resources;

use App\Models\Tag;
use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\IconPosition;
use Filament\Tables\Actions\ActionGroup;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\PostResource\Pages;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class PostResource extends Resource
{
    use Translatable;
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'المدونة';
    protected static ?int $navigationSort = 3;

    public static function getModelLabel(): string
    {
        return 'التدوينات';
    }
    public static function getPluralLabel(): string
    {
        return 'التدوينات';
    }
    public static function getNavigationLabel(): string
    {
        return 'التدوينات';
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([


                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('الخدمات')
                            ->icon('heroicon-m-rectangle-group')
                            ->iconPosition(IconPosition::After)
                            ->schema([


                                Forms\Components\Select::make('category_id')
                                    ->required()
                                    ->label('أختر القسم')
                                    ->relationship('categories', 'name')
                                    ->getOptionLabelFromRecordUsing(fn ($record, $livewire) => $record->hasTranslation('name', $livewire->activeLocale)
                                        ? $record->getTranslation('name', $livewire->activeLocale)
                                        : $record->name),

                                Forms\Components\Select::make('tags')
                                ->options(Tag::all()->pluck('name','id'))
                                    ->label('اختر الوسوم')
                                    ->multiple()
                                    ->preload(),


                                Forms\Components\TextInput::make('title')
                                    ->label('عنوان المدونة')
                                    ->required(),

                                Forms\Components\TextInput::make('slug')
                                    ->required()
                                    ->unique(ignoreRecord: true)
                                    ->label('رابط المدونة')
                                    ->maxLength(255),

                                TinyEditor::make('content')
                                    ->label('محتوى المدونة')
                                    ->showMenuBar()
                                    ->toolbarSticky(true)
                                    ->language('ar')
                                    ->columnSpan('full')
                                    ->required(),


                                    Forms\Components\FileUpload::make('image')
                                    ->label('صورة')
                                    ->required()
                                    ->acceptedFileTypes(['image/png','image/jpg','image/jpeg'])
                                    ->directory('images/posts')
                                    ->visibility('public')
                                    ->disk('public')
                                    ->columnSpanFull(),

                                Forms\Components\Toggle::make('status')
                                    ->label('حالة نشر المدونة')
                                    ->required(),

                            ])->columns(4),

                        Tabs\Tab::make('محركات البحث جوجل "SEO"')
                            ->icon('heroicon-m-globe-europe-africa')
                            ->iconPosition(IconPosition::After)
                            ->schema([

                                Forms\Components\TextInput::make('meta_title')
                                    ->maxLength(30),
                                Forms\Components\TagsInput::make('meta_keywords'),
                                Forms\Components\TextInput::make('meta_description')
                                    ->columnSpanFull(),
                                CuratorPicker::make('meta_image')->label(__(''))
                                    ->size('sm')
                                    ->outlined(false)
                                    ->color('info')
                                    ->constrained(true)
                                    ->listDisplay(false),

                            ])->columns(2),

                    ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('عنوان المدونة')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image')
                    ->label('صورة')
                    ->disk('public')
                    ->visibility('private'),
                Tables\Columns\TextColumn::make('slug')
                    ->label('رابط المدونة')
                    ->searchable(),
                Tables\Columns\TextColumn::make('users.name')
                    ->label('اسم المستخدم')
                    ->sortable(),
                Tables\Columns\TextColumn::make('categories.name')
                    ->label('عنوان القسم')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('tags.name')
                    ->label('الوسوم')
                    ->sortable()
                    ->badge()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\ToggleColumn::make('status')
                    ->label('حالة نشر المدونة'),

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
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                ]),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'view' => Pages\ViewPost::route('/{record}'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
