<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire avec Validation</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <form id="myForm" action="votre_action.php" method="post">
        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label>Formations:</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="formation1" name="formations[]" value="Formation 1">
                <label class="form-check-label" for="formation1">Formation 1</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="formation2" name="formations[]" value="Formation 2">
                <label class="form-check-label" for="formation2">Formation 2</label>
            </div>
        </div>
        <button type="submit" id="submitButton" class="btn btn-primary">Soumettre</button>
    </form>

    <script>
    $(document).ready(function() {
        $('#myForm').on('submit', function(event) {
            event.preventDefault();

            var isChecked = false;
            $('.form-check-input').each(function() {
                if ($(this).is(':checked')) {
                    isChecked = true;
                    return false;
                }
            });

            var allFieldsFilled = true;
            $('[required]').each(function() {
                if (!$(this).val()) {
                    allFieldsFilled = false;
                    return false;
                }
            });

            if (isChecked && allFieldsFilled) {
                this.submit();
            } else {
                alert("Veuillez remplir tous les champs obligatoires et sélectionner au moins une option.");
            }
        });
    });
    </script>
</body>
</html>
