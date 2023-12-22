<?php

namespace Database\Seeders;

use App\Models\Photo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Esegue il popolamento della tabella photos nel database con dati di esempio.
     */
    public function run(): void
    {
        // Cicla da 1 a 27 per generare 27 foto di esempio.
        for ($i = 1; $i <= 27; $i++) {

            // Crea una nuova istanza di Photo.
            $photo = new Photo();

            // Imposta il titolo della foto in base all'iterazione.
            $photo->title = 'Photo : ' . $i;

            // Imposta l'URL dell'immagine in base all'iterazione.
            $photo->url = '/img/' . $i . '.png';

            // Salva la foto nel database.
            $photo->save();
        }
    }
}
