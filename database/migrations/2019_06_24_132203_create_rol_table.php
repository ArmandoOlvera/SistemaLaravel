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
            $table->increments('idcategoria');
            $table->string('nombre',30);
            $table->string('descripcion',255);
            $table->boolean('condicion')->default(1);
            $table->timestamps();
        });
      //Se crea la tabla rol  
      Schema::create('rol', function (Blueprint $table) {
           $table->increments('idrol');
            $table->string('nombre',30);
            $table->string('descripcion',255);
            $table->boolean('estado')->default(1);
            $table->timestamps();
        });
      //Se crea la tabla persona
       Schema::create('persona', function (Blueprint $table) {
            $table->increments('idpersona');
            $table->string('nombre',100);
            $table->string('tipo_documento',20);
            $table->string('num_documento',64);
            $table->string('direccion',70);
            $table->string('telefono',20);
            $table->string('email',50);
            });
      //Se crea la tabla usuario
      Schema::create('usuario', function (Blueprint $table) {
           $table->increments('idusuario');   
          $table->integer('idpersona')->unsigned()->nullable();
          $table->integer('idrol')->unsigned()->nullable();
            $table->string('clave',64);
         $table->boolean('condicion')->default(1);
          $table->foreign('idpersona')->references('idpersona')->on('persona')->onDelete('cascade');
          $table->foreign('idrol')->references('idrol')->on('rol')->onDelete('cascade');
        });
      // creacion de la tabla de proveedores
       Schema::create('proveedor', function (Blueprint $table) {
           $table->increments('idproveedor'); 
          $table->integer('idpersona')->unsigned()->nullable();
          $table->string('contacto',50);
          $table->string('telefono_contacto',64); 
          $table->foreign('idpersona')->references('idpersona')->on('persona')->onDelete('cascade');
          
        });
       Schema::create('ingreso', function (Blueprint $table) {
            $table->increments('idingreso');
             $table->integer('idproveedor')->unsigned()->nullable();
          $table->integer('idusuario')->unsigned()->nullable();
           $table->string('tipo_comprobante',20);
           $table->string('serie_comprobante',7);
           $table->string('num_comprobante',10);
           $table->dateTime('fecha_hora');
          $table->decimal('impuesto', 4, 2);	
          $table->decimal('total_compra', 11, 2);	
            $table->string('estado',20);
          $table->foreign('idproveedor')->references('idproveedor')->on('proveedor')->onDelete('cascade');
          $table->foreign('idusuario')->references('idusuario')->on('usuario')->onDelete('cascade');
     
        });
       Schema::create('venta', function (Blueprint $table) {
            $table->increments('idventa');
             $table->integer('idcliente')->unsigned()->nullable();
          $table->integer('idusuario')->unsigned()->nullable();
          $table->string('tipo_comprobante',20);
          $table->string('serie_comprobante',7);
          $table->string('num_comprobante',10);
          $table->dateTime('fecha_hora');
          $table->decimal('impuesto',4,2);
          $table->decimal('total_venta',11,2);
          $table->string('estado',20);
          
          $table->foreign('idcliente')->references('idpersona')->on('persona')->onDelete('cascade');
          $table->foreign('idusuario')->references('idusuario')->on('usuario')->onDelete('cascade');
        
        });
      Schema::create('articulo', function (Blueprint $table) {
             $table->increments('idarticulo');
             $table->integer('idcategoria')->unsigned()->nullable();
          
           $table->string('codigo',50);
           $table->string('nombre',100);
                          
           $table->decimal('precio_venta',11,2);
           $table->integer('stock');
          
            $table->string('descripcion',250);
           $table->boolean('condicion')->default(1);
          $table->foreign('idcategoria')->references('idcategoria')->on('categoria')->onDelete('cascade');
        
        });
       Schema::create('detalle_venta', function (Blueprint $table) {
           $table->increments('iddetalle_venta'); 
          $table->integer('idventa')->unsigned()->nullable();
             $table->integer('idarticulo')->unsigned()->nullable();
          
          $table->integer('cantidad');
           
          $table->decimal('precio_venta',11,2);
          $table->decimal('descuento',11,2);
          
          
          $table->foreign('idventa')->references('idventa')->on('venta')->onDelete('cascade');
          $table->foreign('idarticulo')->references('idarticulo')->on('articulo')->onDelete('cascade');
        
        });
       Schema::create('detalle_ingreso', function (Blueprint $table) {
           $table->increments('iddetalle_ingreso');
           $table->integer('idingreso')->unsigned()->nullable();
          $table->integer('idarticulo')->unsigned()->nullable();
          
          $table->integer('cantidad');
          $table->decimal('precio_compra', 11, 2);	
          
          $table->foreign('idingreso')->references('idingreso')->on('ingreso')->onDelete('cascade');
          $table->foreign('idarticulo')->references('idarticulo')->on('articulo')->onDelete('cascade');
     
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
