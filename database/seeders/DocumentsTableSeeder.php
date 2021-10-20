<?php
namespace Database\Seeders;

use App\Models\Document;
use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::create([
            'name' => 'demo_video.pdf',
            'description' => 'Download course videose',
            'type' => 'mp4'
        ]);
    }
}
