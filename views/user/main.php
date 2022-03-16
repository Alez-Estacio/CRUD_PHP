<br>
<div class="container"> 
<a href= "?c=user&a=form" class="btn btn-dark btn-sm">Nuevo Usuario </a>
</div> 
<br>
<div class="container">  
<br>
<table class="table table-hover table-striped"> 
    <thead class="table-dark">
        <tr>
            <td>ID </td>
            <td> Email</td>
            <td> Name</td>
            <td>Role_id</td>
            <td>State</td>


            
</tr>    
</thead>  
<tbody>
    <?php foreach($users as $user): ?>
        <tr>
        <td> <?= $user->getId() ?> </td>
        <td> <?= $user->getEmail() ?></td>
        <td> <?= $user->getName() ?></td>
        <td> <?= $user->getRole_Id() ?></td>
        <td> <?= $user->getState() ?></td>
        <td> <?= $role->getById($user->getRole_Id())->getName() ?></td>
       
        <td> 
    <a href="?c=user&a=changeState&id=<?= $user->getId() ?>" 
                        class="btn <?= $user->getState() ? "btn-danger" : "btn-success" ?>" >
                        <?= $user->getState() ? "Desactivar" : "Activar" ?>
        </a>
    
        </td>
    </tr>
    <?php endforeach; ?>

    </body>
</table>
    </div>