<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('email')
                    ->email()
                    ->required()
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\TextInput::make('password')
                    ->password()
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('email'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\Action::make('action1')
                ->requiresConfirmation()
                ->icon('heroicon-o-user')
                ->action(function () {
                }),

            Tables\Actions\Action::make('action2')
                ->requiresConfirmation()
                ->icon('heroicon-o-user')
                ->action(function () {
                }),

            Tables\Actions\Action::make('action3')
                ->requiresConfirmation()
                ->icon('heroicon-o-user')
                ->action(function () {
                }),
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\Action::make('action_group1')
                        ->requiresConfirmation()
                        ->icon('heroicon-o-user')
                        ->action(function () {
                        }),

                    Tables\Actions\Action::make('action_group2')
                        ->requiresConfirmation()
                        ->icon('heroicon-o-user')
                        ->action(function () {
                        }),

                    Tables\Actions\Action::make('action_group3')
                        ->requiresConfirmation()
                        ->icon('heroicon-o-user')
                        ->action(function () {
                        }),
                ]),

            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\BulkAction::make('action')
                    ->requiresConfirmation()
                    ->icon('heroicon-o-user')
                    ->action(function () {
                    }),

                Tables\Actions\BulkAction::make('action2')
                    ->requiresConfirmation()
                    ->icon('heroicon-o-user')
                    ->action(function () {
                    }),

                Tables\Actions\BulkAction::make('action3')
                    ->requiresConfirmation()
                    ->icon('heroicon-o-user')
                    ->action(function () {
                    }),
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
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
