<?php

namespace App\Filament\Resources\VaultResource\RelationManagers;

use App\Models\Asset;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;

class AssetsRelationManager extends RelationManager
{
    protected static string $relationship = 'assets';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('Asset')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('Asset')
            ->columns([
                Tables\Columns\TextColumn::make('Token symbol')->getStateUsing(fn(Asset $asset) => $asset->token->currency),
                Tables\Columns\TextColumn::make('Token name')->getStateUsing(fn(Asset $asset) => $asset->token->name),
                Tables\Columns\TextColumn::make('quantity'),
                Tables\Columns\TextColumn::make('purchase_price'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
}
