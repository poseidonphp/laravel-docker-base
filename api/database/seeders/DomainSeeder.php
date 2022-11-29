<?php

namespace Database\Seeders;

use App\Models\Domain;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;

class DomainSeeder extends Seeder
{

    /**
     * The current Faker instance.
     *
     * @var \Faker\Generator
     */
    protected $faker;

    /**
     * Create a new seeder instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->faker = FakerFactory::create();
    }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $i = 0;
        while($i < 20) {
            $part = $this->faker->domainWord();
            $root = $this->faker->domainName();
            $rootDomainObject = Domain::factory()->create(['name' => $root]);
            Domain::factory()->create(['name' => $part .'.'.$root, 'parent_domain_id' => $rootDomainObject->id]);
            $i++;
        }
    }
}
