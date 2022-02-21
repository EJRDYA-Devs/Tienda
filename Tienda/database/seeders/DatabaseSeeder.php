<?php

namespace Database\Seeders;

use App\Models\CATEGORIA;
use App\Models\CATEGORIAPRODUCTO;
use App\Models\PRODUCTO;
use App\Models\Usuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $usuario=new Usuario();
        $categoria1=new CATEGORIA();
        $categoria2=new CATEGORIA();
        $categoria3=new CATEGORIA();
        $categoria4=new CATEGORIA();
        $categoria5=new CATEGORIA();
        $producto1=new PRODUCTO();
        $producto2=new PRODUCTO();
        $producto3=new PRODUCTO();
        $producto4=new PRODUCTO();
        $producto5=new PRODUCTO();
        $producto6=new PRODUCTO();
        $producto7=new PRODUCTO();
        $producto8=new PRODUCTO();
        $producto9=new PRODUCTO();
        $producto10=new PRODUCTO();
        $catpro1=new CATEGORIAPRODUCTO();
        $catpro2=new CATEGORIAPRODUCTO();
        $catpro3=new CATEGORIAPRODUCTO();
        $catpro4=new CATEGORIAPRODUCTO();
        $catpro5=new CATEGORIAPRODUCTO();
        $catpro6=new CATEGORIAPRODUCTO();
        $catpro7=new CATEGORIAPRODUCTO();
        $catpro8=new CATEGORIAPRODUCTO();
        $catpro9=new CATEGORIAPRODUCTO();
        $catpro10=new CATEGORIAPRODUCTO();

        $usuario->nombre="Pedro Pablo Pintor";
        $usuario->email="pedor@yahoo.es";
        $usuario->password="PintordeCasas";
        $usuario->remember_token="hdasbubas434h324h";
        $usuario->verificado=true;
        $usuario->verificacion_token=true;
        $usuario->admin=false;
$usuario->save();

        $categoria1->nombre="Linea Blanca";
        $categoria1->descripcion="Electrodomesticos para el hogar, principalmente cocina";
        $categoria1->save();
        $producto1->nombre="Lavadora LG";
        $producto1->descripcion="Modelo: lg-124 30Lbs";
        $producto1->cantidad=100;
        $producto1->estado=true;
        $producto1->save();
        $producto2->nombre="Cocina Indurama";
        $producto2->descripcion="Modelo: Ind-r33 6 quemadores";
        $producto2->cantidad=100;
        $producto2->estado=true;
        $producto2->save();
        
        
        
       
        $categoria2->nombre="Calzado";
        $categoria2->descripcion="Variedad de calzados para hombre y mujer";
        $categoria2->save();
        $producto3->nombre="Adidas";
        $producto3->descripcion="RunRun Talla:42";
        $producto3->cantidad=100;
        $producto3->estado=true;
        $producto3->save();
        $producto4->nombre="Zuela";
        $producto4->descripcion="CueroVaca Talla:43";
        $producto4->cantidad=100;
        $producto4->estado=true;
        $producto4->save();

        $categoria3->nombre="Muebleria";
        $categoria3->descripcion="Todo tipo de muebles";
        $categoria3->save();
        $producto5->nombre="Mueble Imperias";
        $producto5->descripcion="Color Azul con cojines";
        $producto5->cantidad=100;
        $producto5->estado=true;
        $producto5->save();
        $producto6->nombre="Mueble Economico";
        $producto6->descripcion="Sin mesa 3 piezas";
        $producto6->cantidad=100;
        $producto6->estado=true;
        $producto6->save();

        $categoria4->nombre="Frutas";
        $categoria4->descripcion="Frutas de costa y sierra";
        $categoria4->save();
        $producto7->nombre="Manzana";
        $producto7->descripcion="rojas y verdes";
        $producto7->cantidad=100;
        $producto7->estado=true;
        $producto7->save();
        $producto8->nombre="Piña";
        $producto8->descripcion="Maduras";
        $producto8->cantidad=100;
        $producto8->estado=true;
        $producto8->save();

        $categoria5->nombre="Mascotas";
        $categoria5->descripcion="razas pequeñas y grandes";
        $categoria5->save();
        $producto9->nombre="Pitbull";
        $producto9->descripcion="Macho 6 meses";
        $producto9->cantidad=100;
        $producto9->estado=true;
        $producto9->save();
        $producto10->nombre="Chiguagua";
        $producto10->descripcion="Macho 3 meses";
        $producto10->cantidad=100;
        $producto10->estado=true;
        $producto10->save();


        $catpro1->id_categoria=1;
        $catpro1->id_producto=1;
        $catpro2->id_categoria=1;
        $catpro2->id_producto=2;
        $catpro3->id_categoria=2;
        $catpro3->id_producto=3;
        $catpro4->id_categoria=2;
        $catpro4->id_producto=4;
        $catpro5->id_categoria=3;
        $catpro5->id_producto=5;
        $catpro6->id_categoria=3;
        $catpro6->id_producto=6;
        $catpro7->id_categoria=4;
        $catpro7->id_producto=7;
        $catpro8->id_categoria=4;
        $catpro8->id_producto=8;
        $catpro9->id_categoria=5;
        $catpro9->id_producto=9;
        $catpro10->id_categoria=5;
        $catpro10->id_producto=10;
        $catpro1->save();
        $catpro2->save();
        $catpro3->save();
        $catpro4->save();
        $catpro5->save();
        $catpro6->save();
        $catpro7->save();
        $catpro8->save();
        $catpro9->save();
        $catpro10->save();

       
        // \App\Models\User::factory(10)->create();
    }
}
