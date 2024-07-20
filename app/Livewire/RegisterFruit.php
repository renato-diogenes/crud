<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Enums\FruitCategory;
use App\Models\Fruit;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Validate;
use Livewire\Component;

class RegisterFruit extends Component
{
    #[Validate('required|min:3|max:30')]
    public string $name;

    #[Validate]
    public string $classification;

    #[Validate('required')]
    public bool $fresh;

    public int $quantity;

    public float $price;

    public function save(): void
    {
        $fruit = new Fruit();

        $fruit->name = $this->name;
        $fruit->classification = $this->classification;
        $fruit->fresh = $this->fresh;
        $fruit->quantity = $this->quantity;
        $fruit->price = $this->price;

        $fruit->save();
    }

    public function rules(): array
    {
        return [
            'classification' => Rule::enum(FruitCategory::class),
        ];
    }

    public function render(): View
    {
        return view('livewire.register-fruit');
    }
}
