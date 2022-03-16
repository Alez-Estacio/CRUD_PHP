
<a href= "?c=product&a=form">Nuevo Poducto </a>
<table class="table table-hover table-striped"> 
    <thead>
        <tr>
            <td>ID </td>
            <td> Name</td>
            <td> Cost</td>
            <td>Price </td>
            <td>Quantity</td>
            <td>Brand</td>
            <td></td>
</tr>    
</thead>  
<tbody>
    <?php foreach($products as $product): ?>
        <tr>
        <td> <?= $product->getId() ?> </td>
        <td> <?= $product->getName() ?></td>
        <td> <?= $product->getCost() ?></td>
        <td> <?= $product->getPrice() ?></td>
        <td> <?= $product->getQuantity() ?></td>
        <td> <?= $brand->getById($product->getBrandId())->getName() ?></td>
       <td>
        <a href="?c=product&a=form&id=<?= $product->getId() ?>" class= "btn btn-warning">Editar</a>
        <a href="?c=product&a=delete&id=<?= $product->getId() ?>" class= "btn btn-danger">Eliminar</a>
        
    </td>
    </tr>
    <?php endforeach; ?>
    </body>
</table>