<table class="table">
        <thead>
          <tr>  
              <th>#</th>
              <th>Title</th>
              <th>Options</th>
          </tr> 
        </thead>
        <tbody> 
           <?php foreach($todos as $todo): ;?>
            <tr>  
                <td><?php echo $todo['id']; ?></td>
                <td><?php echo $todo['title'];?></td>
                <td>
                  <a href="<?php echo base_url('todo/edit');?>?id=<?php echo $todo['id']; ?>" class="btn btn-info btn-sm">Edit</a>
                  <a href="<?php echo base_url('todo/delete');?>?id=<?php echo $todo['id']; ?>"  class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete <?php echo$todo['title'] ?>?');">Delete</a>
                   <a href="<?php echo base_url('todo/view');?>?id=<?php echo $todo['id']; ?>" class="btn btn-primary btn-sm">View Details</a>
                </td>
            </tr> 
          <?php endforeach;?>
        </tbody>  

    </table>