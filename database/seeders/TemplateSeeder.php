<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $template = "
            Bismillahirahmanirrahim\n
            Assalamu'alaikum Warahmatullahi Wabarakatuh\n\n
            
            Kepada Yth.\n
            *[NAMA_PENERIMA]*\n\n
            
            Dengan memohon rahmat & ridho Allah SWT., dan tanpa mengurangi rasa hormat, kami ingin mengundang Bapak/ Ibu/ Saudara/ i serta teman-teman untuk menghadiri pernikahan kami melalui Undangan Digital ini :\n\n 
            
            https://murni-alif.my.id/?to=[NAMA_PENERIMA]\n\n
            
            Merupakan suatu kehormatan dan kebahagiaan bagi kami apabila Bapak/ Ibu/ Saudara/ I serta teman-teman berkenan hadir dan memberikan doa restu dalam acara pernikahan kami.\n\n 
            
            Atas doa restu dan kehadirannya, kami mengucapkan terima kasih.\n\n 
            
            Wassalamu’alaikum Warahmatullahi Wabarakatuh.\n\n  
            
            Hormat kami yang berbahagia,\n  
            Murni & Alif                                                                     
        ";

        DB::table('templates')->insert([
            'message' => $template,
            'created_at' => date('Y-m-d h:i:s')
        ]);
    }
}
