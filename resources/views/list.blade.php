<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <style type="text/css">
        <!--
        table, td, th {
            border: 1px #000000 solid;
        }
        -->
    </style>
    <meta charset="utf-8">
    <title>一覧</title>
</head>
<body>
<h1>参加者一覧</h1>
<table>
    <tr>
        <th>参加者</th>
        <th>対応予定日</th>
        <th>残</th>
        <th>メッセージ</th>
    </tr>
    @foreach ($participantList as $patricipant)
        <tr>
            <td>{{ $patricipant->getName() }}</td>
            <td>{{ $patriEipant->getCorrespondingDate() }}</td>
            <td>{{ $patricipant->getRemainDate() }}</td>
            <td>{{ $patricipant->getMessage() }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
