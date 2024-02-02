<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Setting;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\ColorPicker;
use Filament\Resources\Concerns\Translatable;
use App\Filament\Resources\SettingResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\SettingResource\RelationManagers;

class SettingResource extends Resource
{
    use Translatable;
    protected static ?string $model = Setting::class;

    protected static ?string $navigationIcon = 'heroicon-o-wrench-screwdriver';
    protected static ?string $navigationGroup = 'الإعدادات';
    protected static ?int $navigationSort = 3;

                public static function getModelLabel(): string
            {
                return 'إدارة  الموقع';
            }
                public static function getPluralLabel(): string
            {
                return 'إدارة  الموقع';
            }
                public static function getNavigationLabel(): string
            {
                return 'إدارة  الموقع';
            }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                ->schema([
                    Section::make(__('البيانات الأساسية'))
                    ->schema([
                        TextInput::make('email')->label(__('البريد الالكتروني') ),
                        TextInput::make('phone')->label(__('رقم الهاتف') )->numeric(),
                        TextInput::make('location_map')->label(__('خريطة قوقل') ),
                        TextInput::make('site_name')->label(__('اسم الموقع') ),
                        TextInput::make('powered_by')->label(__('نشئ بواسطة  " اسم الموقع  "') ),
                        TextInput::make('powered_by_link')
                            ->maxLength(255)->label(__('رابط الموقع " www.exmaple.com " ') ),
                            FileUpload::make('headerlogo')
                            ->label(__('شعار رأس الصفحة'))
                            ->required()
                            ->acceptedFileTypes(['image/png','image/jpg','image/jpeg'])
                            ->directory('settingImages/favIcon')
                            ->visibility('public')
                            ->disk('public')
                            ->imageEditor(),
                            FileUpload::make('footerlogo')
                            ->label(__('شعار إسفل الصفحة'))
                            ->required()
                            ->acceptedFileTypes(['image/png','image/jpg','image/jpeg'])
                            ->directory('settingImages/favIcon')
                            ->visibility('public')
                            ->disk('public')
                            ->imageEditor(),

                        Toggle::make('maintenance')->label(__('الصيانة') ),
    
    
                    ])
                    ->columnSpan(
                        [  
                          'default' => 1,
                          'sm' => 3,
                          'md' => 3,
                          'lg' => 3,
                          'xl' => 3,
                          '2xl' => 1,
                          ]
                      ),

                    Section::make()
                    ->schema([
                        
                        
                        Repeater::make('color')->label(__('اللون'))
                        ->schema([
                            TextInput::make('primary_name')->required()->label(__('اسم الون الأساسي')),
                        ColorPicker::make('primary_value')->required()->label(__('قيمة اللون')),
                        
                        TextInput::make('seondary_name')->label(__('اسم الون الفرعي')),
                        ColorPicker::make('seondary_value')->label(__('قيمة اللون')),
                        ])
                        ->disableItemCreation()
                        ->disableItemDeletion()
                        ->columns(4)
                        ,

                        Repeater::make('open_time')->label(__('أوقات العمل'))
                    ->schema([
                        TagsInput::make('day')->label(__('اليوم  [ أيام الأسبوع ]')),
                        TextInput::make('time')->label(__('الوقت'))->default('10:00 صباحاً الى 9:00 مساءً'),
                    ])
                    ->grid(1)
                    ->columns(2)
                    ->columnSpanFull()
                    ,

                        Repeater::make('close_time')->label(__('أوقات الغلق'))
                    ->schema([
                        TagsInput::make('day')->required()->label(__('اليوم  [ أيام الأسبوع ]')),
                        TextInput::make('time')->required()->label(__('الوقت'))->default('الجمعة 10:00 صباحاً الى 9:00 مساءً'),
                    ])
                    ->grid(1)
                    ->columns(2)
                    ->columnSpanFull()
                    ,

                        Repeater::make('social_links')->label(__('روابط التواصل الاجتماعي') )
                        ->schema([
                            TextInput::make('name')->required()->label(__('اسم الشوسل ميديا')),
                            TextInput::make('url')->rules('url')->required()->label(__('الرابط السوشل ميديا')),
                            FileUpload::make('icon')
                            ->label(__('الأيقونة السوشل ميديا'))
                            ->required()
                            ->directory('settingImages/socialIcon')
                            ->visibility('public')
                            ->disk('public')
                            ->imageEditor(),
                        ])
                        ->columns(1)
                        ->grid(3)
                        ,
                  

    
                    ])
                    ->columnSpan(
                      [  
                        'default' => 1,
                        'sm' => 3,
                        'md' => 3,
                        'lg' => 3,
                        'xl' => 3,
                        '2xl' => 2,
                        ]
                    ),

                ])->columns(3),


             

                Section::make(__('seo -- بيانات لمحرك البحث جوجل'))
                ->schema([
                 TextInput::make('meta_title'),
                 FileUpload::make('meta_image')
                 ->image()
                 ->imageEditor(),
                 TagsInput::make('meta_keywords'),
                 TextInput::make('meta_description'),
                ]),
                
              
              
            
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('site_name')
                ->label(__('اسم الموقع') )
                    ->searchable(),
                Tables\Columns\ImageColumn::make('headerlogo')
                ->label(__('شعار رأس الصفحة'))
                    ->searchable(),
                Tables\Columns\ImageColumn::make('footerlogo')
                ->label(__('شعار إسفل الصفحة'))
                    ->searchable(),
                Tables\Columns\ToggleColumn::make('maintenance')
                ->label(__('الصيانة') ),
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
            'index' => Pages\ListSettings::route('/'),
            'create' => Pages\CreateSetting::route('/create'),
            'view' => Pages\ViewSetting::route('/{record}'),
            'edit' => Pages\EditSetting::route('/{record}/edit'),
        ];
    }
}
