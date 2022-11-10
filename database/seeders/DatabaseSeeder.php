<?php

namespace Database\Seeders;

use App\Models\Posting;
use App\Models\Pengguna;
use App\Models\kategori;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Pengguna::factory(10)->create();
        Posting::factory(10)->create();
        kategori::factory(10)->create();

        // Posting::factory()->create([
        //     'tittle' => 'Postingan 1',
        //     'type' => 'ujicoba',
        //     'url' => 'postingan-1',
        //     'preview' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt aspernatur maxime in nam quasi porro voluptas quibusdam nemo ut deserunt eaque saepe, placeat consequuntur id quae cupiditate quia inventore reprehenderit?',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt aspernatur maxime in nam quasi porro voluptas quibusdam nemo ut deserunt eaque saepe, placeat consequuntur id quae cupiditate quia inventore reprehenderit? Laboriosam quaerat, modi commodi, exercitationem a temporibus expedita vero id explicabo voluptas quisquam suscipit porro? Aperiam voluptates voluptatibus vel exercitationem beatae odit quam soluta perferendis nihil ipsum esse, pariatur dignissimos culpa quia inventore quo ipsa dolor! Eius, hic esse similique neque libero, dolorem eveniet atque recusandae quam consequatur ipsam mollitia! Reiciendis doloremque exercitationem beatae provident magni non cumque repellendus facere dicta ratione earum fuga quam, ipsum veniam alias architecto nobis.</p>',
        //     'kategori_id' => 2,
        //     'pengguna_id' => 2
        // ]);
        // Posting::factory()->create([
        //     'tittle' => 'Postingan 4',
        //     'type' => 'ujicoba',
        //     'url' => 'postingan-4',
        //     'preview' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt aspernatur maxime in nam quasi porro voluptas quibusdam nemo ut deserunt eaque saepe, placeat consequuntur id quae cupiditate quia inventore reprehenderit?',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt aspernatur maxime in nam quasi porro voluptas quibusdam nemo ut deserunt eaque saepe, placeat consequuntur id quae cupiditate quia inventore reprehenderit? Laboriosam quaerat, modi commodi, exercitationem a temporibus expedita vero id explicabo voluptas quisquam suscipit porro? Aperiam voluptates voluptatibus vel exercitationem beatae odit quam soluta perferendis nihil ipsum esse, pariatur dignissimos culpa quia inventore quo ipsa dolor! Eius, hic esse similique neque libero, dolorem eveniet atque recusandae quam consequatur ipsam mollitia! Reiciendis doloremque exercitationem beatae provident magni non cumque repellendus facere dicta ratione earum fuga quam, ipsum veniam alias architecto nobis.</p>',
        //     'kategori_id' => 1,
        //     'pengguna_id' => 1
        // ]);
        // Posting::factory()->create([
        //     'tittle' => 'Postingan 2',
        //     'type' => 'ujicoba',
        //     'url' => 'postingan-2',
        //     'preview' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt aspernatur maxime in nam quasi porro voluptas quibusdam nemo ut deserunt eaque saepe, placeat consequuntur id quae cupiditate quia inventore reprehenderit?',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt aspernatur maxime in nam quasi porro voluptas quibusdam nemo ut deserunt eaque saepe, placeat consequuntur id quae cupiditate quia inventore reprehenderit? Laboriosam quaerat, modi commodi, exercitationem a temporibus expedita vero id explicabo voluptas quisquam suscipit porro? Aperiam voluptates voluptatibus vel exercitationem beatae odit quam soluta perferendis nihil ipsum esse, pariatur dignissimos culpa quia inventore quo ipsa dolor! Eius, hic esse similique neque libero, dolorem eveniet atque recusandae quam consequatur ipsam mollitia! Reiciendis doloremque exercitationem beatae provident magni non cumque repellendus facere dicta ratione earum fuga quam, ipsum veniam alias architecto nobis.</p>',
        //     'kategori_id' => 2,
        //     'pengguna_id' => 1
        // ]);
        // Posting::factory()->create([
        //     'tittle' => 'Postingan 3',
        //     'type' => 'ujicoba',
        //     'url' => 'postingan-3',
        //     'preview' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt aspernatur maxime in nam quasi porro voluptas quibusdam nemo ut deserunt eaque saepe, placeat consequuntur id quae cupiditate quia inventore reprehenderit?',
        //     'body' => '<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt aspernatur maxime in nam quasi porro voluptas quibusdam nemo ut deserunt eaque saepe, placeat consequuntur id quae cupiditate quia inventore reprehenderit? Laboriosam quaerat, modi commodi, exercitationem a temporibus expedita vero id explicabo voluptas quisquam suscipit porro? Aperiam voluptates voluptatibus vel exercitationem beatae odit quam soluta perferendis nihil ipsum esse, pariatur dignissimos culpa quia inventore quo ipsa dolor! Eius, hic esse similique neque libero, dolorem eveniet atque recusandae quam consequatur ipsam mollitia! Reiciendis doloremque exercitationem beatae provident magni non cumque repellendus facere dicta ratione earum fuga quam, ipsum veniam alias architecto nobis.</p>',
        //     'kategori_id' => 1,
        //     'pengguna_id' => 2
        // ]);

        // Pengguna::factory()->create([
        //     'nama_user' => 'admin1',
        //     'alamat' => 'random places',
        //     'umur' => '12',
        // ]);

        // Pengguna::factory()->create([
        //     'nama_user' => 'admin2',
        //     'alamat' => 'random places',
        //     'umur' => '10',
        // ]);

        // kategori::factory()->create([
        //     'nama' => 'ujicoba1',
        //     'url' => 'uji-coba-1',
           
        // ]);
        // kategori::factory()->create([
        //     'nama' => 'ujicoba2',
        //     'url' => 'uji-coba-2',
           
        // ]);
    }
}
