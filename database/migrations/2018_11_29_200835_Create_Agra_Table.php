<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAgraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agras', function (Blueprint $table) {
           $table->increments('id');
           $table->string('CABANG');
           $table->string('CIF');
           $table->string('NO_REK');
           $table->string('NASABAH');
           $table->string('GROUP_NASABAH');
           $table->string('CUSTOMER_RATING');
           $table->string('PRODUK');
           $table->string('OWNERSHIP');
           $table->string('PRIME');
           $table->string('SEKTOR');
           $table->string('BUC');

           $table->string('NIP_RM');
           $table->string('NAMA_RM');
           $table->integer('KOLEKTABILITAS');
           $table->string('RESTRU');
           $table->double('LIMIT');
           $table->double('BADE');
           $table->string('VALUTA');
           $table->integer('KURS');
           $table->date('TANGGAL_PEMBUKAAN');
           $table->date('TANGGAL_JATUH_TEMPO');
           $table->integer('NILAI_RY');

           $table->integer('RATE');
           $table->enum('WRITE_OFF',array('Y','N'));
           $table->enum('STATUS_DOWNGRADE',array('Y','N'));
           $table->enum('FAR',array('Y','N'));
           $table->string('JAMINAN');
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
         Schema::drop("agras");
    }
}
