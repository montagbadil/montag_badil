<?php

namespace App\Filament\Resources\ProductAlternativeResource\Pages;

use App\Filament\Resources\ProductAlternativeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Components\Tab;
use Illuminate\Database\Eloquent\Builder;

class ListProductAlternatives extends ListRecords
{
    protected static string $resource = ProductAlternativeResource::class;
    public function getTabs(): array
    {
        return [
            'all' => Tab::make(),
            'pending' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'pending')),
            'approved' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'approved')),
            'rejected' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->where('status', 'rejected')),
        ];
    }
    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
