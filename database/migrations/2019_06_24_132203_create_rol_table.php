<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //Se crea la tabla de categoria
      Schema::create('categoria', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',30);
            $table->string('descripcion',255);
            $table->boolean('condicion')->default(1);
            $table->timestamps();
        });
      //Se crea la tabla rol  
      Schema::create('rol', function (Blueprint $table) {
           $table->increments('id');
            $table->string('nombre',30);
            $table->string('descripcion',255);
            $table->boolean('estado')->default(1);
            $table->timestamps();
        });
      //Se crea la tabla persona
       Schema::create('persona', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->string('tipo_documento',20);
            $table->string('num_documento',64);
            $table->string('direccion',70);
            $table->string('telefono',20);
            $table->string('email',50);
         $table->timestamps();
            });
      //Se crea la tabla usuario
      Schema::create('usuario', function (Blueprint $table) {
          // $table->increments('idusuario');   
          $table->integer('id')->unsigned()->nullable();
          $table->integer('idrol')->unsigned()->nullable();
            $table->string('clave',64);
         $table->boolean('condicion')->default(1);
        $table->timestamps();
          $table->foreign('id')->references('id')->on('persona')->onDelete('cascade');
          $table->foreign('idrol')->references('id')->on('rol')->onDelete('cascade');
        });
      // creacion de la tabla de proveedores
       Schema::create('proveedor', function (Blueprint $table) {
         //  $table->increments('idproveedor'); 
          $table->integer('id')->unsigned()->nullable();
          $table->string('contacto',50);
          $table->string('telefono_contacto',64); 
         $table->timestamps();
          $table->foreign('id')->references('id')->on('persona')->onDelete('cascade');
          
        });
       Schema::create('ingreso', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idproveedor')->unsigned()->nullable();
            $table->integer('idusuario')->unsigned()->nullable();
            $table->string('tipo_comprobante',20);
            $table->string('serie_comprobante',7);
            $table->string('num_comprobante',10);
            $table->dateTime('fecha_hora');
            $table->decimal('impuesto', 4, 2);	
            $table->decimal('total_compra', 11, 2);	
            $table->string('estado',20);
            $table->timestamps();
            $table->foreign('idproveedor')->references('id')->on('proveedor')->onDelete('cascade');
            $table->foreign('idusuario')->references('id')->on('usuario')->onDelete('cascade');
     
        });
       Schema::create('venta', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('idcliente')->unsigned()->nullable();
          $table->integer('idusuario')->unsigned()->nullable();
          $table->string('tipo_comprobante',20);
          $table->string('serie_comprobante',7);
          $table->string('num_comprobante',10);
          $table->dateTime('fecha_hora');
          $table->decimal('impuesto',4,2);
          $table->decimal('total_venta',11,2);
          $table->string('estado',20);
          $table->timestamps();
          $table->foreign('idcliente')->references('id')->on('persona')->onDelete('cascade');
          $table->foreign('idusuario')->references('id')->on('usuario')->onDelete('cascade');
        
        });
      Schema::create('articulo', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idcategoria')->unsigned()->nullable();
          
           $table->string('codigo',50);
           $table->string('nombre',100);
                          
           $table->decimal('precio_venta',11,2);
           $table->integer('stock');
          
            $table->string('descripcion',250);
           $table->timestamps();
           $table->boolean('condicion')->default(1);
          $table->foreign('idcategoria')->references('id')->on('categoria')->onDelete('cascade');
        
        });
       Schema::create('detalle_venta', function (Blueprint $table) {
           $table->increments('id'); 
          $table->integer('idventa')->unsigned()->nullable();
             $table->integer('idarticulo')->unsigned()->nullable();
          
          $table->integer('cantidad');
           
          $table->decimal('precio_venta',11,2);
          $table->decimal('descuento',11,2);
          
          $table->timestamps();
          $table->foreign('idventa')->references('id')->on('venta')->onDelete('cascade');
          $table->foreign('idarticulo')->references('id')->on('articulo')->onDelete('cascade');
        
        });
       Schema::create('detalle_ingreso', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('idingreso')->unsigned()->nullable();
          $table->integer('idarticulo')->unsigned()->nullable();
          
          $table->integer('cantidad');
          $table->decimal('precio_compra', 11, 2);	
          $table->timestamps();
          $table->foreign('idingreso')->references('id')->on('ingreso')->onDelete('cascade');
          $table->foreign('idarticulo')->references('id')->on('articulo')->onDelete('cascade');
     
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rol');
       Schema::dropIfExists('categoria');
        Schema::dropIfExists('ingreso');
      Schema::dropIfExists('proveedor');
       Schema::dropIfExists('usuario');
       Schema::dropIfExists('password_resets');
        Schema::dropIfExists('persona');
       Schema::dropIfExists('categorias_table2');
        Schema::dropIfExists('detalle_ingreso');
       Schema::dropIfExists('articulo');
       Schema::dropIfExists('detalle_venta');
        Schema::dropIfExists('venta');
    }
}
