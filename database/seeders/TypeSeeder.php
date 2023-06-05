<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['app', 'game', 'frontend', 'backend', 'database'];

        Schema::disableForeignKeyConstraints(); // disabilita la chiave esterna
        Type::truncate(); // svuota la tabella
        Schema::enableForeignKeyConstraints(); // riabilita la chiave esterna

        foreach ($types as $type) {
            $new_type = new Type();
            $new_type->name = $type;
            $new_type->slug = Str::slug($new_type->title, '-');
            $new_type->save();
        }
    }
}
