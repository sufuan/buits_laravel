<?php

namespace App\Filament\Resources;

use Filament\Forms;
use App\Models\Post;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\SelectColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
   {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->required(),
                Forms\Components\Select::make('post_status')
                    ->options([
                        'pending' => 'Pending',
                        'published' => 'published',
                    ])
                    ->required(),
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
  {
        return $table
            ->columns([
                TextColumn::make('title')->sortable(),
                TextColumn::make('description')->sortable(),
                SelectColumn::make('post_status')
                    ->options([
                        'pending' => 'Pending',
                        'published' => 'published',
                    ])
                    ->sortable()
                    // Update the action to use `update()` directly on the record
                    ->action(function (SelectColumn $column, $record, $value) {
                        $record->update(['post_status' => $value]);

                        if ($value === 'published') {
                            $user = $record->user;
                            if ($user) {
                                $user->update(['usertype' => 'volunteer']);
                            }
                        }

                        // Optionally, refresh the table data to reflect the change
                        $this->refreshTable();
                    }),
                TextColumn::make('user.name')->label('User')->sortable(),
            ])
            ->filters([
                // ... (optional filters)
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}










