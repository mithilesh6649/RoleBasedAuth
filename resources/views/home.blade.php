<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datetime Validation</title>
</head>
<body>
    <form>
        <label for="from_date">From Date:</label>
        <input id="from_date" value="2024-05-28T23:44" class="form-control" type="datetime-local" name="from_date" />
        
        <label for="to_date">To Date:</label>
        <input id="to_date" value="2024-05-28T23:46" class="form-control" type="datetime-local" name="to_date" />
        
        <div id="error-message" style="color: red;"></div>
        
        <button type="submit">Submit</button>
    </form>

    <script>
        document.getElementById('from_date').addEventListener('change', validateDate);
        document.getElementById('to_date').addEventListener('change', validateDate);

        function validateDate() {
            const fromDate = new Date(document.getElementById('from_date').value);
            const toDate = new Date(document.getElementById('to_date').value);
            const errorMessage = document.getElementById('error-message');

            if (isNaN(fromDate) || isNaN(toDate)) {
                errorMessage.textContent = "Please enter valid dates.";
                return;
            }

            const timeDifference = (toDate - fromDate) / (1000 * 60 * 60); // time difference in hours

            if (timeDifference > 24) {
                errorMessage.textContent = "The time difference should not be greater than 24 hours.";
            } else {
                errorMessage.textContent = "";
            }
        }
    </script>
</body>
</html>
