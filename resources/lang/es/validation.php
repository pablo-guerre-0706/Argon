<?php

return [


/*
|--------------------------------------------
|Lineas de lenguaje de validacion (Globales)
|-------------------------------------------- 
*/
    'required' => 'El campo :attribute es obligatorio.',
    'numeric'  => 'El campo :attribute debe ser un número.',
    'integer'  => 'El campo :attribute debe ser un número entero.',
    'date'     => 'El campo :attribute no es una fecha válida.',
    'unique'   => 'El campo :attribute ya ha sido registrado en el sistema.',
    'string'   => 'El campo :attribute debe ser una cadena de texto.',
    'email'    => 'El campo :attribute debe ser una dirección de correo válida.',
    'exists'   => 'El elemento seleccionado para :attribute no es válido.',
    'max'      => [
        'numeric' => 'El campo :attribute no debe ser mayor que :max.',
        'file'    => 'El archivo :attribute no debe pesar más de :max kilobytes.',
        'string'  => 'El campo :attribute no debe contener más de :max caracteres.',
    ],
    'min'      => [
        'numeric' => 'El campo :attribute debe ser como mínimo :min.',
        'file'    => 'El archivo :attribute debe pesar al menos :min kilobytes.',
        'string'  => 'El campo :attribute debe contener al menos :min caracteres.',
    ],
    'required_without' => 'El campo :attribute es obligatorio cuando :values no está presente.',



    /*
    |---------------------------------------
    |Atributos de validacion personalizados
    |---------------------------------------
    */
    'attributes' => [
        'name' => 'Nombre',
        'description' => 'Description',
        'card_id' => 'Cédula',
        'status' => 'Estado',
        'address' => 'Dirección',
        'phone_number' => 'Teléfono',
        'email' => 'Correo electrónico',
        'origin' => 'Origen / País',
        'name_bread' => 'Nombre del pan',
        'sale_price' => 'Precio de venta',
        'bar_code' => 'Código de barras',
        'purchase_price' => 'Precio de compra',
        'weight' => 'Peso',
        'unit_measure_id' => 'Unidad de medida',
        'category_mat_id' => 'Categoria de materia prima',
        'brand_id' => 'Marca',
        'type' => 'Tipo de unidad',
        'abbreviation' => 'abreviación / sigla',
        'preparat_instructions' => 'Instrucciones de preparación',
        'estimated_time_minutes' => 'Tiempo estimado en minutos',
        'oven_temperature_c' => 'Temperatura del horno en °C',
        'ingredient_quantity' => 'Cantidad de ingrediente',
        'unit_measure_recipe' => 'Unidad de medida de la receta',
        'recipe_id' => 'Receta asociada',
        'raw_material_id' => 'Materia prima / Ingredientes',
        'fullname' => 'Nombre completo',
        'date_order' => 'Fecha de la orden',
        'order_number' => 'Número de orden',
        'subtotal' => 'Subtotal',
        'tax' => 'Impuesto',
        'total' => 'Total',
        'status_order' => 'Estado de la orden',
        'supplier_id' => 'Proveedor',
        'user_id' => 'Usuario',
        'ordered_quantity' => 'Cantidad ordenada',
        'unit_cost' => 'Costo unitario',
        'purchase_order_id' => 'Orden de compra asociada',
        'start_date' => 'Fecha de incio',
        'end_date' => 'Fecha de finalización',
        'sale_number' => 'Número de venta',
        'sale_date' => 'Fecha de venta',
        'total_to_pay' => 'Total a pagar',
        'customer_id' => 'Cliente',
        'quantity_sold' => 'Cantidad vendida',
        'unit_price' => 'Precio unitario',
        'sale_id' => 'Compra realizada',
        'finished_product_id' => 'Producto terminado / Pan',
        'required_mat_quantity' => 'Materia prima requerida',
        'dispatched_mat_quantity' => 'Materia prima despachada',
        'scheduled_quantity' => 'Cantida programada',
        'quantity_produced' => 'Cantidad producida',
        'loss_quantity' => 'Cantidad perdida / Merma',
        'bake_number' => 'Número de horneada',
        'production_order_id' => 'Orden de producción asociada',
        'movement_date' => 'Fecha de movimiento',
        'movement_type' => 'Tipo de movimiento',
        'quantity' => 'Cantidad',
        'observations' => 'Observaciones',
        'purchase_order_detail_id' => 'Detalle de orden de compra',
        'sale_detail_id' => 'Detalle de venta asociada',
        'prod_order_detail_id' => 'Detalle de orden de producción',
        'real_stock' => 'Stock real / Actual',
        'max_stock' => 'Stock máximo',
        'min_stock' => 'Stock mínimo'
    ]
];

