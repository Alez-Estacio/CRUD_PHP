<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<br>
<div class="container"> 
<a href= "?c=brand&a=form2" class="btn btn-dark btn-sm">Nueva Marca </a>
</div> 
<br>
<div class="container">  
<br>
<table class="table table-hover table-striped"> 
    <thead class="table-dark">
        <tr>
            <td>ID </td>
            <td> Name</td>
            <td> description</td>
            <td> acciones</td>

            
</tr>    
</thead>  
<tbody>
    <?php foreach($brands as $brand): ?>
        <tr>
        <td> <?= $brand->getId() ?> </td>
        <td> <?= $brand->getName() ?></td>
        <td> <?= $brand->getDescription() ?></td>
        
        <td>
        <a href="?c=brand&a=form2&id=<?= $brand->getId() ?>" class= "btn btn-warning">Editar</a>
        <a href="?c=brand&a=delete&id=<?= $brand->getId() ?>" class= "btn btn-danger">Eliminar</a>
        
    </td>
    </tr>
    <?php endforeach; ?>

    </body>
</table>
    </div>