<h4><?=$product->getId() ? 'Editar' : 'Nuevo'?>Producto </h4>
<form action= "?c=product&a=save" method ="post">

<input type="hidden" name="id" value="<?=$product->getId() ?>">
<div class="row">
    <div class="col-md-4">
<label for="name"> Nombre: </label>
</div>
<div class="col-md-8">
<input type="text" name="name" value="<?=$product->getName() ?>" class="form-control">
    </div>
</div>

<div class="row">
    <div class="col-md-4">
<label for="cost"> Costo: </label>
</div>
<div class="col-md-8">
<input type="number" name="cost" value="<?=$product->getCost() ?>"class="form-control">
</div>
</div>

<div class="row">
    <div class="col-md-4">
<label for="price"> Precio: </label>
</div>
<div class="col-md-8">
<input type="text" name="price" value="<?=$product->getPrice() ?>"class="form-control">
</div>
</div>

<div class="row">
    <div class="col-md-4">
<label for="quantity"> Cantidad: </label>
<input type="text" name="quantity" value="<?=$product->getQuantity() ?>"class="form-control">
</div>
</div>

<div class="row">
    <div class="col-md-4">
<label for="brand_id"> Marca: </label>
</div>
<div class="col-md-8">
    <select  name="brand_id" class="form-select">
<option>Seleccione Marca</option>
<?php foreach($brands as $brand): ?>
    <option value="<?=$brand->getId()?>" <?=$brand->getId() == $product->getBrandId() ? 
    'selected' : ''?> >
     <?=$brand->getName()?> </option>
    <?php endforeach;?>
</select>
</div>
</div>

<div class="row">
    <div class="col-md-9"></div>
    <div class="col-md-3">
<a href="?c=product"class="btn btn-secondary">Cancelar</a>
<button type="submit"> Guardar</button>
</div>
</div>
</form>