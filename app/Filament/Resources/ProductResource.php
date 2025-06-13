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
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Set;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Str;
use Filament\Forms\Get;

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
                    Section::make('مواصفات المنتج')->schema([
                        Forms\Components\TextInput::make('name')
                                ->label("الإسم")
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
                            ->label("الإسم البحثي")
                            ->required()
                            ->disabled()
                            ->dehydrated()
                            ->maxLength(255)
                            ->unique(Product::class, 'slug', ignoreRecord: true),




                        Forms\Components\TextInput::make('storage_quantity')
                            ->label('الكمية في المخزون')
                            ->required()
                            ->numeric(),

                        Forms\Components\TextInput::make('promo')
                            ->label('وصف العرض')
                            ->required(),



                    ])->columns(2),


                    Section::make()->schema([
                        MarkdownEditor::make('description')
                            ->label("الوصف")
                            ->required()
                            ->columnSpanFull()
                            ->fileAttachmentsDirectory('products'),
                    ]),


                    Section::make()->schema([
                        FileUpload::make('images')
                                ->label('الصور')
                                ->required()
                                ->multiple()
                                ->directory('products')
                                ->maxFiles(5)
                                ->reorderable()
                    ]),

                    Forms\Components\Section::make('خيارات طلب المنتج')
                    ->schema([
                        Forms\Components\Repeater::make('options')
                            ->relationship()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->label('وصف الخيار')
                                    ->placeholder('اشتري قطعة فقط ب...')
                                    ->required(),

                                Forms\Components\TextInput::make('price')
                                    ->label('مبلغ الخيار')
                                    ->placeholder('200')
                                    ->numeric()
                                    ->required(),


                                Forms\Components\TextInput::make('price_before_discount')
                                    ->label('السعر قبل الخصم')
                                    ->numeric()
                                    ->maxLength(255),

                                Toggle::make('has_shipping_fee')
                                        ->label('هل يوجد رسوم للتوصيل')
                                        ->live()
                                        ->afterStateUpdated(function (Get $get, Set $set) {
                                            if (!$get('has_shipping_fee')) {
                                                $set('shipping_fees', 0);
                                            }
                                        }),

                                Forms\Components\TextInput::make('shipping_fees')
                                    ->label('مبلغ التوصيل')
                                    ->numeric()
                                    ->default(0)
                                    ->visible(fn (Get $get): bool => $get('has_shipping_fee'))
                                    ->disabled(fn (Get $get): bool => !$get('has_shipping_fee')),
                            ])
                            ->columns(2)
                            ->itemLabel(fn (array $state): ?string => $state['title'] ?? null)
                            ->defaultItems(1)
                            ->collapsible()
                            ->collapsed()
                            ->addActionLabel('اضافة خيار'),
                    ]),


                ])->columnSpan(2),

                Group::make()->schema([
                    Section::make()->schema(([
                            Select::make('category_id')
                                ->label('القسم')
                                ->required()
                                ->preload()
                                ->searchable()
                                ->relationship('category', 'name'),



                            Toggle::make('is_active')
                                ->label('ايقاف \ تفعيل المنتج')
                                ->onIcon('heroicon-m-bolt')
                                ->offIcon('heroicon-m-x-circle')
                                ->onColor('success')
                                ->offColor('danger')
                                ->default(true)
                                ->required(),
                        ])),

                    Forms\Components\Section::make('الخصم')
                        ->schema([
                            Forms\Components\TextInput::make('price')
                                ->label('السعر')
                                ->required()
                                ->numeric()
                                ->prefix('$'),

                            Forms\Components\DateTimePicker::make('discount_start')
                                ->label('تاريخ بداية الخصم'),

                            Forms\Components\DateTimePicker::make('discount_end')
                                ->label('تاريخ نهاية الخصم'),
                    ]),
                ])->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label("الاسم")
                    ->limit(40)
                    ->sortable(),

                Tables\Columns\TextColumn::make('category.name')
                    ->label("القسم")
                    ->sortable(),

                Tables\Columns\TextColumn::make('price')
                    ->label("السعر")
                    ->sortable(),

                Tables\Columns\IconColumn::make('is_active')
                    ->label("حالة المنتج")
                    ->boolean(),

                ImageColumn::make('images')
                    ->label('الصورة')
                    ->getStateUsing(function ($record) {
                        // Get the first image from the JSON array
                        $images = $record->images;
                        return is_array($images) && !empty($images) ? $images[0] : null;
                    })
                    ->width(50) // Set the width of the image in the table
                    ->height(50), // Set the height of the image in the table

                Tables\Columns\TextColumn::make('created_at')
                    ->label("تاريخ الإنشاء")
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label("تاريخ اخر تعديل")
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

      public static function getNavigationLabel(): string
    {
        return 'المنتجات';
    }

    public static function getModelLabel(): string
    {
        return "منتج";
    }

    public static function getPluralModelLabel(): string
    {
        return "المنتجات";
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
