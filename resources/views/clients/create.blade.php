<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulario de Creación de Clientes</title>
</head>
<body>
<form action="{{ route('clients.store') }}" method="POST">
    @csrf
    <table>
        <tbody>
            <tr>
                <td><input type="text" name="name" placeholder="Nombre Completo"></td>
            </tr>
            <tr>
                <td><input type="text" name="email" placeholder="Correo electrónico"></td>
            </tr>
            <tr>
                <td><input type="text" name="phone" placeholder="Número de Celular"></td>
            </tr>
            <tr>
                <td><input type="text" name="address" placeholder="Dirrección"></td>
            </tr>
        </tbody>
    </table>

    <button type="submit">Crear</button>
</form>
</body>
</html>
