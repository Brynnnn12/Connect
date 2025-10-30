<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $contents = [
            'Hari ini cuaca sangat cerah 🌞 Sempurna untuk jalan-jalan dan menikmati keindahan alam!',
            'Baru selesai ngoding whole day 💻 Rasanya begitu puas ketika aplikasi akhirnya berfungsi sempurna!',
            'Ngopi sambil coding adalah combo terbaik ☕ Produktivitas meningkat drastis hehe',
            'Setiap hari adalah kesempatan baru untuk belajar dan berkembang 📚 #Motivation',
            'Jangan lupa istirahat cukup guys! Kesehatan adalah investasi terbaik ❤️',
            'Berhasil menyelesaikan project besar hari ini! Terima kasih untuk support dari teman-teman 🙏',
            'Nature photography session kemarin sangat menyenangkan! Hasil fotonya lumayan bagus 📸',
            'Tips produktivitas: Fokus pada satu hal di satu waktu. Multi-tasking hanya mengurangi kualitas 💪',
            'Makan siang yang enak di tempat favorit kami 🍜 Rasanya selalu istimewa!',
            'Pagi yang cerah dimulai dengan secangkir teh hangat dan good vibes ☀️ Semoga hari kalian baik!',
        ];

        return [
            'user_id' => User::factory(),
            'content' => fake()->randomElement($contents),
            'created_at' => fake()->dateTimeBetween('-30 days', 'now'),
        ];
    }
}
