<html>
<head>
    <title>AlarmAlert Home Page</title>
    <style> /* ordinarily would be in included css file */
        table {
            border: double;
        }
        td {
            padding: 5px 10px;
            border: solid 1px black;
        }
        .fail {
            background-color: pink;
        }
        .pass {
            background-color: palegreen;
        }
    </style>
</head>
<body>
<table>
    <thead>
    <tr>
        <th colspan = 3>Sensor Status</th>
        <th colspan = 3>{$dateTime}</th>
    </tr>
    <tr>
        <th>Name</th>
        <th>Type</th>
        <th>State</th>
        <th>Current Value</th>
        <th>Upper Limit</th>
        <th>Lower Limit</th>
    </tr>
    </thead>
        {foreach from=$sensors item=sensor}
            <tr class={$sensor->alarm}>
                <td>{$sensor->name}</td>
                <td>{$sensor->type}</td>
                <td>{$sensor->state}</td>
                <td>{$sensor->currValue}</td>
                <td>{$sensor->upperLimit}</td>
                <td>{$sensor->lowerLimit}</td>
            </tr>
        {/foreach}
    </table>
</body>
</html>