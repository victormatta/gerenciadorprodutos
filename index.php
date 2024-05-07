<?php
    include_once 'templates/header.php';
?>

    <div class="container centered-container">
        <div class="card text-center custom-card">
            <div class="card-header">
                Make login before to start
            </div>
            <div class="card-body">
                <form action="controller/actions_login.php" method="post" class="form">
                    <input type="hidden" name="type" value="create">
                    <br>
                    <div class="form-group">
                        <input type="text" name="userName" id="userName" placeholder="Type your username" class="form-control" required>
                    </div>

                    <br><br>

                    <div class="form-group">
                        <input type="password" name="password" id="password" placeholder="Type your password" class="form-control" required>
                    </div>

                </div>
                <div class="card-footer text-body-secondary">
                    <button type="submit" class="btn btn-primary btn-right">Send</button>
                </div>
            </form>
        </div>
    </div>

<?php
    include_once 'templates/footer.php';
?>