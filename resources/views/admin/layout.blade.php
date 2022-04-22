<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>買うものリスト 管理画面 @yield('title')</title>
    </head>
    <body>
@auth('admin')
        <menu label="リンク">
        <a href="/admin">管理画面</a><br>
        <a href="/admin/user/list">ユーザ一覧</a><br>
        <a href="/admin/logout">ログアウト</a><br>
        </menu>
@endauth
@yield('contets')
    </body>
</html>
