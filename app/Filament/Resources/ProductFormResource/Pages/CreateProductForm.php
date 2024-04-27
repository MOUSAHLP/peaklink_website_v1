<?php

namespace App\Filament\Resources\ProductFormResource\Pages;

use App\Filament\Resources\ProductFormResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateProductForm extends CreateRecord
{
    protected static string $resource = ProductFormResource::class;
}
