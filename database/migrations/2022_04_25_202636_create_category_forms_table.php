<?php

use App\Models\CategoryForm;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_forms', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->timestamps();
        });

        /*$item = array('images' => 'files',
            'payment' => 'select',
            'typeoffer' => 'select',
            'name' => 'text',
            'slug' => 'text',
            'description' => 'textarea',
            'short_description' => 'text',
            'rooms' => 'select',
            'surface' => 'select',
            'land_area' => 'select',
            'heating' => 'select',
            'media' => 'select',
            'security' => 'select',
            'charges' => 'select',
            'equipment' => 'select',
            'parking' => 'select',
            'regular_rent' => 'text',
            'deposit' => 'text',
            'contact_tel' => 'text',
            'country' => 'text',
            'voivodeship' => 'text',
            'community' => 'text',
            'city' => 'text',
            'zip_code' => 'text',
            'street' => 'text',
            'house_number' => 'text',
            'apartment_number' => 'text',
            'floor' => 'select/number',
            'additional_information' => 'text');

        foreach($item as $value => $type)
        {
            $form = new CategoryForm();
            $form->name = $value;
            $form->type = $type;
            $form->create();
        }*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_forms');
    }
}
