<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .dashboard-heading {
    margin-top: 2em;
    margin-bottom: 2em;
}

.alert-info {
    background-color: #cce5ff;
    color: #004085;
    padding: 1em;
    margin-bottom: 1em;
    border: 1px solid #b8daff;
    border-radius: 0.25em;
    position: relative;
}

.close {
    position: absolute;
    right: 1em;
    top: 0.5em;
    color: inherit;
}

.row {
    display: flex;
    flex-wrap: wrap;
}

.card-primary, .card-warning, .card-success {
    flex: 1 0 30%; /* Adjust width as needed */
    margin-right: 1em;
    margin-bottom: 1em;
    background-color: #007bff;
    color: white;
}

.card-body {
    padding: 1em;
}

.card-content {
    display: flex;
    align-items: center;
}

.card-text {
    flex: 1;
    font-size: 0.8em;
    font-weight: bold;
}

.card-number {
    font-size: 1.5em;
    font-weight: bold;
    margin-right: 0.5em;
}

.card-icon {
    font-size: 3em;
}

    </style>
</head>
<body>
    <h2 class="dashboard-heading">Dashboard</h2>

<div class="alert-info">
    <strong>Hi,</strong> Selamat Datang Admin
    <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>


</body>
</html>    

