<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrigger extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        CREATE TRIGGER insertArticle AFTER INSERT ON `articles` FOR EACH ROW
            BEGIN
                INSERT INTO canvis (`nom`, `tipus`, `usuari`, `operacio`, `data`) 
                VALUES (NEW.NomArt, 'article', NEW.usuariMod, 'crear', now());
            END
        ");

        DB::unprepared("
        CREATE TRIGGER updateArticle AFTER UPDATE ON `articles` FOR EACH ROW
            BEGIN
                IF(NEW.deleted_at IS NOT NULL) THEN
                    INSERT INTO canvis (`nom`, `tipus`, `usuari`, `operacio`, `data`) 
                    VALUES (NEW.NomArt, 'article', NEW.usuariMod, 'eliminar', now());
                ELSE
                    INSERT INTO canvis (`nom`, `tipus`, `usuari`, `operacio`, `data`) 
                    VALUES (NEW.NomArt, 'article', NEW.usuariMod, 'actualitzar', now());
                END IF;
            END
        ");

        DB::unprepared("
        CREATE TRIGGER insertCategoria AFTER INSERT ON `categorias` FOR EACH ROW
            BEGIN
                INSERT INTO canvis (`nom`, `tipus`, `usuari`, `operacio`, `data`) 
                VALUES (NEW.NomCat, 'categoria', NEW.usuariMod, 'crear', now());
            END
        ");

        DB::unprepared("
        CREATE TRIGGER updateCategoria AFTER UPDATE ON `categorias` FOR EACH ROW
            BEGIN
                IF(NEW.deleted_at IS NOT NULL) THEN
                    INSERT INTO canvis (`nom`, `tipus`, `usuari`, `operacio`, `data`) 
                    VALUES (NEW.NomCat, 'categoria', NEW.usuariMod, 'eliminar', now());
                ELSE
                    INSERT INTO canvis (`nom`, `tipus`, `usuari`, `operacio`, `data`) 
                    VALUES (NEW.NomCat, 'categoria', NEW.usuariMod, 'actualitzar', now());
                END IF;
            END
        ");

        DB::unprepared("
        CREATE TRIGGER insertCategoriaEsp AFTER INSERT ON `categoria_esps` FOR EACH ROW
            BEGIN
                INSERT INTO canvis (`nom`, `tipus`, `usuari`, `operacio`, `data`) 
                VALUES (NEW.NomEsp, 'categoria específica', NEW.usuariMod, 'crear', now());
            END
        ");

        DB::unprepared("
        CREATE TRIGGER updateCategoriaEsp AFTER UPDATE ON `categoria_esps` FOR EACH ROW
            BEGIN
                IF(NEW.deleted_at IS NOT NULL) THEN
                    INSERT INTO canvis (`nom`, `tipus`, `usuari`, `operacio`, `data`) 
                    VALUES (NEW.NomEsp, 'categoria específica', NEW.usuariMod, 'eliminar', now());
                ELSE
                    INSERT INTO canvis (`nom`, `tipus`, `usuari`, `operacio`, `data`) 
                    VALUES (NEW.NomEsp, 'categoria específica', NEW.usuariMod, 'actualitzar', now());
                END IF;
            END
        ");


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER `insertArticle`');
        DB::unprepared('DROP TRIGGER `updateArticle`');
        DB::unprepared('DROP TRIGGER `insertCategoria`');
        DB::unprepared('DROP TRIGGER `updateCategoria`');
        DB::unprepared('DROP TRIGGER `insertCategoriaEsp`');
        DB::unprepared('DROP TRIGGER `updateCategoriaEsp`');
    }
}

// DROP TRIGGER `insertArticle`;
// DROP TRIGGER `updateArticle`;
// DROP TRIGGER `insertCategoria`;
// DROP TRIGGER `updateCategoria`;
// DROP TRIGGER `insertCategoriaEsp`;
// DROP TRIGGER `updateCategoriaEsp`;

// SET FOREIGN_KEY_CHECKS = 0; 
// TRUNCATE pictures;
// TRUNCATE articles; 
// DROP TABLE categorias;
// DROP TABLE categoria_esps;
// SET FOREIGN_KEY_CHECKS = 1;

// SET FOREIGN_KEY_CHECKS = 0; 
// TRUNCATE pictures;
// TRUNCATE articles; 
// TRUNCATE categorias;
// TRUNCATE categoria_esps;
// TRUNCATE canvis;
// SET FOREIGN_KEY_CHECKS = 1;
