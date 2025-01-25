<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Името на модела, свързан с фабриката.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Дефинирай как да се генерират данните.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle, // Генерира случайна длъжност
            'description' => $this->faker->paragraph, // Генерира случайно описание
            'company' => $this->faker->company, // Генерира случайно име на компания
            'location' => $this->faker->city, // Генерира случайно име на град
            'salary' => '$' . $this->faker->numberBetween(50000, 120000) . 'k', // Генерира случайна заплата
            'image' => $this->faker->imageUrl(), // Генерира случайна URL на изображение
            'category' => $this->faker->randomElement(['web-development', 'mobile-development', 'data-science']), // Генерира случайна категория
        ];
    }
}
