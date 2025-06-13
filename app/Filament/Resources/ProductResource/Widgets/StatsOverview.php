<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use App\Models\Category;
use App\Models\Product;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $date = \Carbon\Carbon::today()->subDays(7);

        return [
            Stat::make('الأقسام', Category::query()->where('is_active', 1)->count())
                ->description(Category::query()->where('is_active', 1)->where('created_at','>=',$date)->count() . ' تم إضافتهم خلال الأسبوع الفائت ' )
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 10, 3, 15, 4, 17])
                ->color('success'),

            Stat::make('المنتجات', Product::query()->where('is_active', 1)->count())
                ->description(Product::query()->where('is_active', 1)->where('created_at','>=',$date)->count() . ' تم إضافتهم خلال الأسبوع الفائت ' )
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->chart([7, 2, 8, 3, 3, 4, 2])
                ->color('info'),
        ];
    }
}
