<?php>
<input type="submit" name="action" value="Update" />
<input type="submit" name="action" value="Delete" />


if ($_POST['action'] == 'Update') {
    //action for update here
} else if ($_POST['action'] == 'Delete') {
    //action for delete
} else {
    //invalid action!
}
<input type="submit" name="update_button" value="Update" />
<input type="submit" name="delete_button" value="Delete" />

if (isset($_POST['update_button'])) {
    //update action
} else if (isset($_POST['delete_button'])) {
    //delete action
} else {
    //no button pressed
}
?>