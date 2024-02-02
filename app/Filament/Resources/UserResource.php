<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\User;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Hash;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\ActionGroup;
use App\Filament\Resources\UserResource\Pages;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    protected static ?string $navigationGroup = 'مستخدمين النظام';
    protected static ?int $navigationSort = 1;

                public static function getPluralLabel(): string
            {
                return 'المستخدمين';
            }
                public static function getNavigationLabel(): string
            {
                return 'المستخدمين';
            }
            public static function getNavigationBadge(): ?string
            {
                return static::getModel()::count();
            }
            public static function getNavigationBadgeColor(): ?string
            {
                return static::getModel()::count() > 10 ? 'warning' : 'danger';
            }
     
    

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label(__('الاسم'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                ->label(__('البريد الالكتروني'))
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at')
                ->required()
                ->native(false)
                ->default(now())
                ->format('Y-m-d')
                ->minDate(now()->toDateString())
                ,
                Forms\Components\TextInput::make('password')
                ->label(__('التحقق'))
                    ->password()
                    ->maxLength(255)
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->dehydrated(fn (?string $state): bool => filled($state))
                    ->required(fn (string $operation): bool => $operation === 'create') ,

                    Forms\Components\Select::make('role')
                    ->relationship(name:'roles',titleAttribute: 'name')
                    ->label(__('صلاحية المستخدم'))
                    ->searchable()
                    ->multiple()
                    ->preload()
                    ->live()
                    ->label('اختر الدور')
                    ->columnSpanFull()
                        ,
                        
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                  ->label(__('الاسم'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                ->label(__('البريد الالكتروني'))
                    ->searchable(),
                Tables\Columns\TextColumn::make('email_verified_at')
                ->label(__('التحقق'))
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                ->label(__('تاريخ الأنشاء'))
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                ->label(__('تاريخ التعديل'))
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
                Tables\Actions\DeleteAction::make(),
                    ]
                )
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'view' => Pages\ViewUser::route('/{record}'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
