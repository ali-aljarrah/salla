<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Models\Product;
use App\Models\Size;
use Filament\Tables\Actions\ActionGroup;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Str;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    protected static ?string $recordTitleAttribute = 'name';

    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Product Information')->schema([
                        Forms\Components\TextInput::make('title')
                                ->required()
                                ->maxLength(255)
                                ->live(onBlur:true)
                                ->afterStateUpdated(function(string $operation, $state, Set $set) {
                                    if($operation !== 'create') {
                                        return;
                                    }
                                    $set('slug', Str::slug($state));
                                }),


                        Forms\Components\TextInput::make('slug')
                            ->required()
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(255)
                            ->unique(Product::class, 'slug', ignoreRecord: true),


                        Forms\Components\TextInput::make('price')
                            ->required()
                            ->numeric()
                            ->prefix('$'),

                        Forms\Components\TextInput::make('promo')
                            ->required(),

                    ])->columns(2),


                    Section::make()->schema([
                        MarkdownEditor::make('description')
                            ->required()
                            ->columnSpanFull()
                            ->fileAttachmentsDirectory('products'),
                    ]),


                    Section::make()->schema([
                        Tabs::make()->tabs([
                            Tabs\Tab::make('English Additional Information')
                                ->schema([
                                    MarkdownEditor::make('additional_info')
                                        ->columnSpanFull()
                                        ->fileAttachmentsDirectory('products'),
                            ]),
                            Tabs\Tab::make('Arabic Additional Information')
                                ->schema([
                                    MarkdownEditor::make('arabic_additional_info')
                                        ->columnSpanFull()
                                        ->fileAttachmentsDirectory('products')
                            ]),
                        ])



                    ]),

                    Section::make()->schema([
                        FileUpload::make('images')
                                ->required()
                                ->multiple()
                                ->directory('products')
                                ->maxFiles(5)
                                ->reorderable()
                    ])


                ])->columnSpan(2),

                Group::make()->schema([
                    Section::make()->schema(([
                            Select::make('category_id')
                                ->required()
                                ->preload()
                                ->searchable()
                                ->relationship('category', 'name'),



                            Toggle::make('is_active')
                                ->required()
                                ->default(true),
                        ])),
                ])->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label("Category")
                    ->sortable(),

                Tables\Columns\TextColumn::make('model_number')
                    ->sortable(),

                ImageColumn::make('images')
                    ->label('First Image')
                    ->getStateUsing(function ($record) {
                        // Get the first image from the JSON array
                        $images = $record->images;
                        return is_array($images) && !empty($images) ? $images[0] : null;
                    })
                    ->width(50) // Set the width of the image in the table
                    ->height(50), // Set the height of the image in the table

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
                    Tables\Actions\DeleteAction::make(),
                ])
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
