<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->boolean('isCreated')->default(true); // Jest tworzony... Na true po kliknięciu w utworzenie nowego ogłoszenia...
            $table->boolean('isActive')->default(false); // Czy aktywny lub wersja robocza
            $table->boolean('isDeactive')->default(false); // Czy upłynął czas, lub oferta została zakończona/usunieta
            $table->boolean('isAcceptMod')->default(false); // Czy oferta została zaakceptowana przez moderatora
            $table->bigInteger('category_id')->unsigned()->nullable(); // Pod jaką kategorią ma być podpięte oferta
            $table->unsignedbigInteger('user_id'); // Id użytkownika, właściciela oferty
            $table->bigInteger('images_id')->nullable(); // Id głównego zdjęcia
            $table->bigInteger('payment_id')->nullable(); // Wybór płatnośći za jaki okres
            $table->bigInteger('typeoffer_id')->nullable(); // Typ ogłoszenia (prywatne, firma, ...)
            // TABIELE SASTĘPUJĄCE PONIŻEJ ZAKOMENTOWANE.
            $table->bigInteger('heating')->nullable(); // Ogrzewanie. Wybór z bazy danych
            $table->bigInteger('media')->nullable(); // media. Wybór z bazy
            $table->bigInteger('security')->nullable(); // Zabezpieczenia posiadłości
            $table->bigInteger('charges')->nullable(); //Opłaty
            $table->bigInteger('equipment')->nullable(); // Wyposażenie
            $table->bigInteger('parking')->nullable(); // Miejsce parkingowe
            // KONIEC TABELI ZAKOMENTOWANYCH
            $table->string('name')->nullable(); //title
            $table->string('slug')->nullable(); //
            $table->text('description')->nullable(); // opis w podglądzie
            $table->string('short_description')->nullable(); // krótki opis do wyszukiwarki
            $table->integer('rooms')->nullable(); // Ilość pokoi
            $table->integer('surface')->nullable(); // Powierzchnia w m2
            $table->integer('land_area')->nullable(); // Powierzchnia działki w m2
            /* TE TABELE SĄ ZMIENIONE I SĄ U GÓRY!
            $table->string('heating')->nullable(); // Ogrzewanie.
            $table->string('media')->nullable(); // media.
            $table->string('security')->nullable(); // Zabezpieczenia (kamery, alarm, ...)
            $table->string('charges')->nullable(); // Opłaty
            $table->string('equipment')->nullable(); // Wyposażenie
            $table->string('parking')->nullable(); // Miejsce parkingowe
            */
            $table->decimal('regular_rent')->nullable(); // cena wystawienia
            $table->decimal('sale_rent')->nullable(); // nizsza cena po edycji
            $table->decimal('deposit')->nullable(); // kaucja
            $table->string('contact_tel')->nullable(); // numer telefoniu
            $table->string('contact_email')->nullable(); // adress email
            $table->boolean('featured')->default(false); // Wyróżnienie na stronie
            $table->boolean('archivum')->default(false); // Czy oferta jest archiwizowana
            $table->boolean('older')->default(false);
            // Adres posiadłości
            //$table->string('country')->nullable(); // Państwo
            //$table->string('voivodeship')->nullable(); // Województwo
            $table->string('state')->nullable(); // Gmina
            $table->string('city')->nullable(); // Miasto
            $table->string('postcode')->nullable(); // Kod pocztowy
            //$table->string('street')->nullable(); // Ulica
            //$table->integer('house_number')->nullable(); // Nr domu
            //$table->integer('apartment_number')->nullable(); // Nr mieszkania
            //$table->integer('floor')->nullable(); // Które piętro?
            $table->string('additional_information')->nullable(); // Dodatkowe informacje
            // Relacje pomiędzy tabelami.
            $table->foreign('user_id') // Tworzenie relacji. Określenie kolumny z tej tabeli
                ->references('id') // Określenie kolumny z tabeli zewnętrznej
                ->on('users') // Określenie, z którą tabelą ma zostać stworzona relacja.
                ->onDelete('cascade'); // Usuwanie kaskadowe
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
